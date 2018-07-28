<?php

add_filter( 'the_content', 'search_form' ); 
 
function search_form($content) { 
    $options = get_option('emp_options');

    if (function_exists('pll_current_language')) {
        $current_lang = pll_current_language();
        $check_lang = 'zh';
    } else {
        $current_lang = get_locale();
        $check_lang = 'zh_CN';
    }

    if($current_lang == $check_lang) {
        $option_name = 'emp_field_page_cn';
        $lang_key = 'cn';
        $inquiry_form_option = 'emp_field_inquiry_form_cn';
    } else {
        $option_name = 'emp_field_page';
        $lang_key = 'en';
        $inquiry_form_option = 'emp_field_inquiry_form';
    }

    require_once(MS_PLUGINPATH . '/lang/'.$lang_key.'.php');

    if(get_post()->post_name == get_post($options[$option_name])->post_name) {
        $form = '<center class="maid_search_form-description">'.$mslang['allinfo'].'</center>
            <form name="maid_search_form" method="post" class="wpcf7-form maid-search" onsubmit="return false;">
                <div class="col-sm-6">
                    <div class="maid_search_form_field">
                        <input type="text" name="ref_no" placeholder="'.$mslang['formfield_km'].'" class="wpcf7-form-control wpcf7-text" />
                    </div>
                    <div class="maid_search_form_field">
                        <select name="education" class="wpcf7-form-control">
                            <option selected="" value=""> - '.$mslang['formfield_education'].' - </option>
                            <option value="Elementary">'.$mslang['formfield_education_primary'].'</option>
                            <option value="High">'.$mslang['formfield_education_secondary'].'</option>
                            <option value="College">'.$mslang['formfield_education_college'].'</option>
                        </select>
                    </div>
                    <div class="maid_search_form_field">
                        <select name="nationality" class="wpcf7-form-control">
                            <option selected="" value=""> - '.$mslang['formfield_nationality'].' - </option>
                            <option value="Filipino">'.$mslang['formfield_nationality_filipino'].'</option>
                            <option value="Indonesian">'.$mslang['formfield_nationality_indonesian'].'</option>
                            <option value="Thailand">'.$mslang['formfield_nationality_thailand'].'</option>
                            <option value="Bengali">'.$mslang['formfield_nationality_bengali'].'</option>
                            <option value="SriLanka">'.$mslang['formfield_nationality_sri_lankan'].'</option>
                            <option value="Nepali">'.$mslang['formfield_nationality_nepali'].'</option>
                        </select>
                    </div>
                    <div class="maid_search_form_field">
                        <select name="age_range" class="wpcf7-form-control">
                            <option value="" selected="">- '.$mslang['formfield_age'].' -</option>
                            <option value="18 - 23">18 - 23</option>
                            <option value="24 - 29">24 - 29</option>
                            <option value="30">'.$mslang['formfield_age_30'].'</option>
                        </select>
                    </div>
                    <div class="maid_search_form_field">
                        <select name="marital_status" class="wpcf7-form-control">
                            <option selected="" value="">- '.$mslang['formfield_status'].' -</option>
                            <option value="Single">'.$mslang['formfield_status_single'].'</option>
                            <option value="Married">'.$mslang['formfield_status_married'].'</option>
                            <option value="Single Parent">'.$mslang['formfield_status_single_parent'].'</option>
                        </select>
                    </div>
                    <div class="maid_search_form_field">
                        <label class="field-label">'.$mslang['formfield_gender'].'</label>
                        <div class="field-options">
                            <div class="col-md-6">
                                <label class="field-option"><input type="radio" name="gender" value="female"> '.$mslang['formfield_gender_female'].'</label>
                            </div>
                            <div class="col-md-6">
                                <label class="field-option"><input type="radio" name="gender" value="male"> '.$mslang['formfield_gender_male'].'</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="maid_search_form_field">
                        <label class="field-label">'.$mslang['formfield_experience'].'</label>
                        <div class="field-options">
                            <div class="col-md-4">
                                <label class="field-option"><input type="radio" name="work_experience" value="hongkong"> '.$mslang['formfield_experience_hong_kong'].'</label>
                            </div>
                            <div class="col-md-4">
                                <label class="field-option"><input type="radio" name="work_experience" value="ex-abroad"> '.$mslang['formfield_experience_oversea'].'</label>
                            </div>
                            <div class="col-md-4">
                                <label class="field-option"><input type="radio" name="work_experience" value="local"> '.$mslang['formfield_experience_local'].'</label>
                            </div>
                        </div>
                    </div>
                    <div class="maid_search_form_field">
                        <label class="field-label">'.$mslang['formfield_abilities'].'</label>
                        <div class="field-options">
                            <div class="col-md-6">
                                <label class="field-option"><input type="checkbox" name="job_desc_cooking" value="cooking"> '.$mslang['formfield_abilities_cooking'].'</label>
                                <label class="field-option"><input type="checkbox" name="job_desc_housekeeping" value="housekeeping"> '.$mslang['formfield_abilities_housekeeping'].'</label>
                                <label class="field-option"><input type="checkbox" name="job_desc_care_of_baby" value="care of baby"> '.$mslang['formfield_abilities_care_of_baby'].'</label>
                                <label class="field-option"><input type="checkbox" name="job_desc_care_of_children" value="care of children"> '.$mslang['formfield_abilities_care_of_children'].'</label>
                                <label class="field-option"><input type="checkbox" name="job_desc_care_of_erderly" value="care of elderly"> '.$mslang['formfield_abilities_care_of_erderly'].'</label>
                            </div>
                            <div class="col-md-6">
                                <label class="field-option"><input type="checkbox" name="job_desc_care_of_bedridden" value="care of bedridden"> '.$mslang['formfield_abilities_care_of_bedridden'].'</label>
                                <label class="field-option"><input type="checkbox" name="job_desc_care_of_disable" value="care of disabled"> '.$mslang['formfield_abilities_care_of_disable'].'</label>
                                <label class="field-option"><input type="checkbox" name="job_desc_care_of_pet" value="care of pet"> '.$mslang['formfield_abilities_care_of_pet'].'</label>
                                <label class="field-option"><input type="checkbox" name="job_desc_tutoring" value="tutoring"> '.$mslang['formfield_abilities_tutoring'].'</label>
                                <label class="field-option"><input type="checkbox" name="job_desc_car_washing" value="car washing"> '.$mslang['formfield_abilities_car_washing'].'</label>
                            </div> 
                            
                        </div>
                    </div>
                    <div class="maid_search_form_field">
                        <input type="submit" id="reset-search" value="'.$mslang['formbutton_reset'].'" class="wpcf7-form-control wpcf7-submit reset" />
                        <input type="submit" id="search" value="'.$mslang['formbutton_search'].'" class="wpcf7-form-control wpcf7-submit" />
                    </div>
                </div>
            </form>
            <hr class="search-divider" />
            <div class="maid_search-controls">
                <div class="maid-count col-md-8"></div>
                <div class="maid-control-buttons col-md-4">
                    <label class="field-option" id="select-all-maids"><input name="select_all" value="select_all" class="wpcf7-form-control wpcf7-check" type="checkbox" /> '.$mslang['select_all'].'</label>
                    <input id="review-selected" value="'.$mslang['send_inquiry'].'" class="wpcf7-form-control wpcf7-submit" type="submit" disabled />
                </div>

            </div>
            <div class="maid_search-pagination"></div>
            <div class="maid_search-result"></div>
            <div class="maid_search-pagination"></div>' .
            '<div id="maid-item-control-dialog" title="---"><p>The content</p></div>
            <div id="maid-inquiry-dialog" title="--">
                <div id="section-inquiry">
                    <div class="selected-maids">
                    </div>
                    <form class="wpcf7-form search-again"><input type="reset" value="'.$mslang['searchagain'].'" class="wpcf7-form-control wpcf7-submit"></form>
                    <div class="inquiry-form"><hr/>'.
                    do_shortcode($options[$inquiry_form_option]).
                    '</div>
                </div>
                <div id="section-video">
                    <a class="back-section-inquiry" href="#">&laquo; Back</a>
                    <div class="vid-container"></div>
                </div>
            </div>
            <script type="text/javascript">ms_obj.lang='.json_encode($mslang).';</script>';

    	$content .= $form;

    }

    return $content;
}

function ms_assets() {
    $options = get_option('emp_options');

    if (function_exists('pll_current_language')) {
        $current_lang = pll_current_language();
        $check_lang = 'zh';
    } else {
        $current_lang = get_locale();
        $check_lang = 'zh_CN';
    }

    if($current_lang == $check_lang) {
        $option_name = 'emp_field_page_cn';
    } else {
        $option_name = 'emp_field_page';
    }

    if(get_post()->post_name == get_post($options[$option_name])->post_name) {
        wp_register_style('ms-styles',  MS_PLUGINDIRURL . 'assets/css/ms.css' );
        wp_enqueue_style('ms-styles');

        wp_register_style('slick-styles', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
        wp_enqueue_style('slick-styles');

        wp_register_style('slick-theme', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
        wp_enqueue_style('slick-theme');

        wp_register_script('ms-scripts',  MS_PLUGINDIRURL . 'assets/js/ms.js' );
        wp_enqueue_script('ms-scripts');

        wp_register_script('slick-scripts',  '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js' );
        wp_enqueue_script('slick-scripts');

        $ms_obj = array(
            'host' => $options['emp_field_host'],
            'endpoint' => $options['emp_field_endpoint']
        );

        wp_localize_script( 'ms-scripts', 'ms_obj', $ms_obj );

        wp_enqueue_script('jquery-ui-dialog');
        wp_enqueue_style('wp-jquery-ui-dialog');
    }
    
}
add_action( 'wp_enqueue_scripts', 'ms_assets' );


/*
 * Dynamic email handler
 */
function wpcf7_dynamic_to_filter_example($recipient, $args=array()) {
    if (isset($_POST['select-branch'])) {
        $branch = $_POST['select-branch'];
        
        if ($branch == 'Causeway Bay' || $branch == '銅 鑼 灣') {
            $recipient = 'causewaybay@technic.com.hk';
        } elseif ($branch == 'Central' || $branch == '中 環') {
            $recipient = 'central@technic.com.hk';
        } elseif ($branch == 'Mongkok' || $branch == '旺 角') {
            $recipient = 'mongkok@technic.com.hk';
        } elseif ($branch == 'Tseung Kwan O' || $branch == '將 軍 澳') {
            $recipient = 'tko@technic.com.hk';
        } elseif ($branch == 'Shatin' || $branch == '沙 田') {
            $recipient = 'shatin@technic.com.hk';
        } elseif ($branch == 'Tsuen Wan' || $branch == '荃 灣') {
            $recipient = 'tsuenwan@technic.com.hk';
        }
    }

    return $recipient;
}

add_filter('wpcf7-dynamic-recipient-example-filter', 'wpcf7_dynamic_to_filter_example', 10, 2);