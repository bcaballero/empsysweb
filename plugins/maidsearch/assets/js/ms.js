(function($) {
    "use strict";

    const skills = [
        'care_of_baby',
        'care_of_bedridden', 
        'care_of_children', 
        'care_of_disable', 
        'care_of_erderly', 
        'care_of_pet', 
        'cooking',
        'housekeeping'];

    var selectedMaids = {};

    var renderedResults = [];

    $.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    String.prototype.toProperCase = function () {
        return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
    };

    String.prototype.replaceAll = function(search, replacement) {
        var target = this;
        return target.replace(new RegExp(search, 'g'), replacement);
    };

    $(document).ready(function() {
        $('input#search').on('click', function(e) {
            e.preventDefault();
            let searchParams = getFormParams();
            searchMaid(searchParams);
        });

        $('input#reset-search').on('click', function(e) {
            e.preventDefault();
            resetSearch();
        });

        $('#maid-item-control-dialog').dialog({
            autoOpen:false,
            width:"70%",
            modal:true,
            open: function(e, ui) {
                $(this).dialog('widget').position({ my: "center", at: "center", of: window });
            }
        });
        $('#maid-inquiry-dialog').dialog({
            autoOpen: false,
            width: "50%",
            modal: true,
            title: ms_obj.lang.interested,
            open: function (e, ui) {
                var selectedMaidIds = $.map(selectedMaids, function(element,index) {return index});

                $('#maid-inquiry-dialog').find('form input[name="maid-numbers"]').val(selectedMaidIds.join(', '));

                if($(document).width() <= 480) {
                    $('#maid-inquiry-dialog').css('height', ($(window).height() - $('.ui-dialog-titlebar').height() - 54) + 'px');
                    $('#maid-inquiry-dialog').css('overflow-y', 'scroll !important');
                    $('#maid-inquiry-dialog').css('position', 'relative');
                }

                $(this).dialog('widget').position({ my: "center", at: "center", of: window });
            }
        });

        $('form.search-again').find('input[type="reset"]').on('click', function() {
            $('#maid-inquiry-dialog').dialog('close');
        });

        $('#maid-item-control-dialog').on('dialogclose', function() {
            $('#maid-item-control-dialog').html('');
        });

        $('.maid_search-pagination').on('click', '.page a', function(e) {
            e.preventDefault();

            if($(this).data('page')) {
                let searchParams = getFormParams();
                searchMaid(searchParams, $(this).data('page'));
            }

            return false;
        });

        $('.maid_search-controls #select-all-maids').on('click', function() {
            selectAllMaids();
        });

        $('.maid_search-controls #review-selected').on('click', function() {
            if(! $.isEmptyObject(selectedMaids)) {

                if ($(document).width() >= 576) {
                    $("#maid-inquiry-dialog").dialog("option", "width", "90%");
                    $('#section-video .vid-container').removeClass('mobile');
                } else {
                    $("#maid-inquiry-dialog").dialog("option", "width", "100%");
                    $('#section-video .vid-container').addClass('mobile');
                }

                $.each(selectedMaids, function(maidId, sm) {
                    let $smaid = $('<div class="sm-profile">');
                    let $smpic = $('<img class="selected-maid-picture col-xs-6">')
                                .attr('src', sm.photo)
                                .css('width', '80px');
                    let $smremove = $('<span class="remove-maid" data-maidid="'+maidId+'">x</span>');
                    let $smlinks = $('<div class="selected-maid-links col-xs-6">')
                                .html('<label>'+maidId+'</label></span><a href="#" class="review-video" data-type="vid" data-path="'+sm.video+'"><i class="fa fa-video-camera" aria-hidden="true"></i> '+ms_obj.lang.video+'</a>' + '<a href="'+sm.pdf+'" class="redirect-buttons" target="_blank"><i class="fa fa-list" aria-hidden="true"></i> '+ms_obj.lang.biodata+'</a>');
                    

                    $smaid.append($smpic);
                    $smaid.append($smremove);
                    $smaid.append($smlinks);
                    $('.selected-maids').append($smaid);
                });

                $('.selected-maids').slick({
                    infinite: false,
                    speed: 300,
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                                infinite: true,
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });

                $('.selected-maids').find('.remove-maid').on('click', function() {

                    let maidId = $(this).data('maidid');

                    let selectedMaidItem = $(this).parent().index();

                    $('.selected-maids').slick('slickRemove', selectedMaidItem);
                    $('.selected-maids').slick('setPosition');

                    if($('.maid_search_result_item[data-maid="'+maidId+'"]').length) {
                        $('.maid_search_result_item[data-maid="'+maidId+'"]').click();
                    } else {
                        delete selectedMaids[maidId];
                    }

                    // check if there will be nothing left before remove
                    if($('.selected-maids').find('.sm-profile').length == 0 ) {
                        $('#maid-inquiry-dialog').dialog('close');
                        return false;
                    }

                    var selectedMaidIds = $.map(selectedMaids, function(element,index) {return index});

                    $('#maid-inquiry-dialog').find('form input[name="maid-numbers"]').val(selectedMaidIds.join(', '));

                    return false;
                });

                $('.selected-maids').find('.review-video').on('click', function(e) {
                    e.preventDefault();

                    let $vid = $('<video controls>').attr('src', ms_obj.host + '/video/'+$(this).data('path'));

                    $('#section-video .vid-container').append($vid);
                    $('#section-video').show();
                    $('#section-inquiry').hide();
                    
                    return false;
                });

                $('#section-video').find('.back-section-inquiry').on('click', function(e) {
                    e.preventDefault();

                    $('#section-video .vid-container').html('');
                    $('#section-video').hide();
                    $('#section-inquiry').show();

                    return false;
                });

                $('#maid-inquiry-dialog').dialog('open');
            }
        });

        $('#maid-inquiry-dialog').on('dialogopen', function() {
            $('body').addClass('dialog-disable-scroll');
            $('.selected-maids').slick('setPosition');
        });

        $('#maid-inquiry-dialog').on('dialogclose', function() {
            $('body').removeClass('dialog-disable-scroll');
            $('.selected-maids').slick('unslick');
            $('.selected-maids').html('');

            $('#maid-inquiry-dialog').css('height', 'auto');
            $('#maid-inquiry-dialog').css('overflow-y', 'auto');
            $('#maid-inquiry-dialog').css('position', 'static');
        });
    });

    function getFormParams() {
        let formParams = $('form[name="maid_search_form"]').serializeObject();

        let searchParams = {};

        for (var key in formParams) {
            if (formParams.hasOwnProperty(key) && formParams[key].length > 0) {
                searchParams[key] = formParams[key];
            }
        }

        return searchParams;
    }

    function resetSearch() {
        $('form[name="maid_search_form"]').trigger("reset");
        $('.maid_search-controls').hide();
        $('.maid_search-result').html('');
        $('.maid_search-pagination').html('');
    }

    function searchMaid(searchParams, page) {
        $('.maid_search-controls').hide();
        $('.maid_search-result').html('');
        $('.maid_search-result').append('<center id="search-loader">'+ms_obj.lang.resultloading+'</center>');

        if(typeof page != 'undefined') {
            searchParams.page = page;
        }

        var topScroll = $("#search").offset().top + $("#search").outerHeight();

        if ($(document).width() >= 991) {
            topScroll -= $('#cshero-header').height();
        }

        $('html, body').animate({
            scrollTop: topScroll
        }, 1000);

        $.ajax({
            url: ms_obj.host + '/' + ms_obj.endpoint,
            data: searchParams,
            dataType: 'json',
            success: function(data, status) {
                $('.maid_search-result').html('');

                let $searchItems = $('<div class="maid_search_result_items">');
                $searchItems.append($('<div class="maid_search_result_body">'));
                $('.maid_search-result').append($searchItems);

                renderResult(data);
            },
            error: function(jqXHR, status, err) {
                $('.search-result').text(err);
            }
        });
    }

    function renderResult(data) {

        $('.maid_search-pagination').html('');

        renderedResults = data.applicant.data;

        if(renderedResults.length == 0) {
            $('.maid_search_result_body').html('No Result found.');
            return;
        }

        var ctr = 0;
        var resultMarkUp = '';

        // append rows
        let numRows = Math.round(renderedResults.length / 2);

        for (var i = 0; i < numRows; i++) {
            $('.maid_search_result_body').append('<div class="maid_search_result_row">');
        }

        var totalResult = data.applicant.total;

        $('.maid_search-controls').find('.maid-count').text(ms_obj.lang.totalresult.replace("{$a}", totalResult));

        $('.maid_search-controls').show();

        // append cells
        for (var i = 0; i < renderedResults.length; i++) {
            let maid = renderedResults[i];
            let fullName = maid.first_name;

             let maidName = maid.ref_no.split('-')[1]
            if(maid.last_name && maid.last_name !== null){
                maidName = maid.last_name.substring(0,3).toUpperCase() + '-' + maid.ref_no.split('-')[1];
            }
            

            if(maid.middle_name != null) {
                fullName += ' ' + maid.middle_name;
            }
            if(maid.last_name != null) {
                fullName += ' ' + maid.last_name;
            }

            // work exp
            let workExp = '';
            for (var j = 1; j <= 4; j++) {
                if(maid['employer_country_' + j] != null) {
                    if(workExp.length != 0) {
                        workExp += ', ';
                    }

                    let exp = ms_obj.lang['formfield_experience_'+maid['employer_country_' + j].toLowerCase().split(' ').join('_')];
                    workExp += exp || maid['employer_country_' + j];
                }
            }

            // skills
            let skillSet = '';
            $.each(skills, function(idx, val) {
                if(maid['job_desc_' + val + '_1'] != null ||
                        maid['job_desc_' + val + '_2'] != null ||
                        maid['job_desc_' + val + '_3'] != null ||
                        maid['job_desc_' + val + '_4'] != null) {

                    if(skillSet.length != 0) {
                        skillSet += ', ';
                    }

                    let skill = ms_obj.lang['formfield_abilities_'+val.replaceAll('_', ' ').toProperCase().toLowerCase().split(' ').join('_')];
                    skillSet += skill || val.replaceAll('_', ' ').toProperCase();
                }
            });

            let profilePic = ms_obj.host+'/uploads/avatar/'+maid.head_pic_path;

            if(maid.head_pic_path == null) {
                profilePic = ms_obj.host+'/images/headshot.png';
            }

            let selected = '';
            let checked = '';

            if (selectedMaids.hasOwnProperty(maid.ref_no)) {
                selected = 'selected';
                checked = 'checked';
            }

            let status = ms_obj.lang['formfield_status_'+maid.marital_status.toLowerCase().split(' ').join('_')] || maid.marital_status;
            let nationality = ms_obj.lang['formfield_nationality_'+maid.nationality.toLowerCase().split(' ').join('_')];
            
            let maidData = 'data-photo="'+profilePic+'" data-video="'+maid.video_path+'" data-pdf="'+ms_obj.host+'/biodata/'+maid.ref_no+'"';

            let $item = $('<div class="col-sm-6 maid_search_result_item '+selected+'" data-maid="'+maid.ref_no+'" '+maidData+'>' +
                                '<div class="item">' +
                                    '<div style="display:inline-block;">' +
                                    '<input type="checkbox" class="selected-maid" '+checked+' />'+
                                    '</div>' +
                                    '<div class="col-md-4 pic_column">' +
                                        '<img src="'+profilePic+'" />' +
                                    '</div>' +
                                    '<div class="col-md-8 details_column">' +
                                        '<label class="ref_no">'+maid.ref_no+'</label>' +
                                        '<div class="details"><label>'+ms_obj.lang.name+':</label> '+maidName+'</div>' +
                                        '<div class="details"><label>'+ms_obj.lang.formfield_age+':</label> '+maid.age+'</div>' +
                                        '<div class="details"><label>'+ms_obj.lang.formfield_status+':</label> '+status+'</div>' +
                                        '<div class="details"><label>'+ms_obj.lang.formfield_nationality+':</label> '+nationality+'</div>' +
                                        '<div class="details"><label>'+ms_obj.lang.formfield_experience+':</label> '+workExp+'</div>' +
                                        '<div class="details"><label>'+ms_obj.lang.formfield_abilities+':</label> '+skillSet+'</div>' +
                                        '<ul class="controls">' +
                                            '<li><a href="#" class="control-dialog" data-type="pic" data-path="'+maid.whole_body_pic_path+'"><i class="fa fa-image" aria-hidden="true"></i> '+ms_obj.lang.photo+'</a></li>' +
                                            '<li><a href="'+ms_obj.host+'/biodata/'+maid.ref_no+'" class="redirect-buttons" target="_blank"><i class="fa fa-list" aria-hidden="true"></i> '+ms_obj.lang.biodata+'</a></li>' +
                                        '</ul>' +
                                        '<ul class="controls">' +
                                            '<li><a href="#" class="control-dialog" data-type="vid" data-path="'+maid.video_path+'"><i class="fa fa-video-camera" aria-hidden="true"></i> '+ms_obj.lang.video+'</a></li><li>&nbsp;</li>' +
                                        '</ul>' +
                                    '</div>' +
                                '</div>' +
                            '</div>').on('click', function(e) {
                                $(this).toggleClass('selected');

                                if($(this).hasClass('selected')) {
                                    selectedMaids[$(this).data('maid')] = {
                                        photo: profilePic,
                                        video: maid.video_path,
                                        pdf: ms_obj.host+'/biodata/'+maid.ref_no
                                    }
                                    $(this).find('.selected-maid').prop('checked', true);
                                } else {
                                    delete selectedMaids[$(this).data('maid')];
                                    $(this).find('.selected-maid').prop('checked', false);
                                }

                                checkSelectedAll();
                                canInquire();
                            });
                            
            $item.find('.control-dialog').on('click', function(e) {
                e.preventDefault();
                $('#maid-item-control-dialog').html('');
    
                if($(this).data('type') == 'pic') {
                    var $content = $('<img>').attr('src', ms_obj.host + '/uploads/avatar/'+$(this).data('path'));
                }
    
                if($(this).data('type') == 'vid') {
                    var $content = $('<video controls>').attr('src', ms_obj.host + '/video/'+$(this).data('path'));
                }
    
                $('#maid-item-control-dialog').append($content);
    
                if ($(document).width() > 991) {
                    $("#maid-item-control-dialog").dialog("option", "width", "70%");
                } else if ($(document).width() < 767 && $(document).width() >= 576) {
                    $("#maid-item-control-dialog").dialog("option", "width", "80%");
                } else {
                    $("#maid-item-control-dialog").dialog("option", "width", "100%");
                }
    
                $('#maid-item-control-dialog').dialog('open');
                e.stopPropagation();
                return false;           
            });

            $('.maid_search_result_row:nth-child('+Math.round((i+1)/2)+')').append($item);

            $item.find('.redirect-buttons').on('click', function(e) {
                e.stopPropagation();
            });


        }

        // paginate
        let $pagination = $('<ul>').attr('class', 'pages');

        if(data.applicant.current_page - 1 > 0) {
            $pagination.append('<li class="page"><a href="#" data-page="'+(data.applicant.current_page - 1)+'">&laquo;</a></li>');
        } else {
            $pagination.append('<li class="page"><a href="#">&laquo;</a></li>');
        }

        for (var i = 1; i <= data.applicant.last_page; i++) {

            if(i == data.applicant.current_page) {
                $pagination.append('<li class="page current"><a href="#">'+i+'</a></li>');
            } else {
                $pagination.append('<li class="page"><a href="#" data-page="'+i+'">'+i+'</a></li>');
            }
        }

        if(data.applicant.current_page + 1 <= data.applicant.last_page) {
            $pagination.append('<li class="page"><a href="#" data-page="'+(data.applicant.current_page + 1)+'">&raquo;</a></li>');
        } else {
            $pagination.append('<li class="page"><a href="#">&raquo;</a></li>');
        }


        $('.maid_search-pagination').append($pagination);

        checkSelectedAll();
        canInquire();

        setTimeout(adjustHeight, 1000);
    }

    function selectAllMaids() {
        let selectAllItems = $('.maid_search-controls #select-all-maids input[name="select_all"]').prop('checked');

        $('.maid_search_result_item').each(function(idx, elem) {
            let maidNo = $(elem).data('maid');
            let photoPath = $(elem).data('photo');
            let videoPath = $(elem).data('video');
            let pdfPath = $(elem).data('pdf');

            if(selectAllItems) {
                if(! $(elem).hasClass('selected')) {
                    $(elem).addClass('selected');

                    $(elem).find('.selected-maid').prop('checked', true);

                    if(! selectedMaids.hasOwnProperty(maidNo)) {
                        selectedMaids[maidNo] = {
                            photo: photoPath,
                            video: videoPath,
                            pdf: pdfPath
                        }
                    }
                }
            } else {
                $(elem).removeClass('selected');
                $(elem).find('.selected-maid').prop('checked', false);
                delete selectedMaids[maidNo];
            }
        });

        canInquire();
    }

    function checkSelectedAll() {
        if ($('.maid_search_result_item').length == $('.maid_search_result_item.selected').length) {
            $('.maid_search-controls #select-all-maids input[name="select_all"]').prop('checked', true);
        } else {
            $('.maid_search-controls #select-all-maids input[name="select_all"]').prop('checked', false);
        }
    }

    function canInquire() {
        if(! $.isEmptyObject(selectedMaids)) {
            $('#review-selected').removeAttr('disabled');
        } else {
            $('#review-selected').attr('disabled', true);
        }
    }

    function adjustHeight() {
        if($(document).width() > 767) {
            $('.maid_search_result_row').each(function() {
                var $elem = $(this);
                var $left = $elem.find('.maid_search_result_item:nth-child(1)');
                var $right = $elem.find('.maid_search_result_item:nth-child(2)');
                
                if($left.outerHeight() > $right.outerHeight()) {
                    $right.outerHeight($left.outerHeight());
                }

                if($right.outerHeight() > $left.outerHeight()) {
                    $left.outerHeight($right.outerHeight());
                }

            });
        }
    }


}(jQuery));
