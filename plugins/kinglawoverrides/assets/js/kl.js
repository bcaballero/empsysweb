(function($) {
    "use strict";

    $(document).ready(function() {
        $('.cshero-box-address .cshero-box-title:nth(1) a').text(kl_obj.central);
        $('.cshero-box-address .cshero-box-title:nth(2) a').text(kl_obj.mongkok);

        $('.cshero-box-time .cshero-box-title:nth(1) a').text(kl_obj.shatin);
        $('.cshero-box-time .cshero-box-title:nth(2) a').text(kl_obj.tsuen);

        $('.cshero-box-address .cshero-box-title:nth(0) a').attr('href', 'http://technic.com.hk/%e8%81%af%e7%b5%a1%e6%88%91%e5%80%91/#contact-row1');
        $('.cshero-box-address .cshero-box-title:nth(1) a').attr('href', 'http://technic.com.hk/%e8%81%af%e7%b5%a1%e6%88%91%e5%80%91/#contact-row1');
        $('.cshero-box-address .cshero-box-title:nth(2) a').attr('href', 'http://technic.com.hk/%e8%81%af%e7%b5%a1%e6%88%91%e5%80%91/#contact-row2');
        
        $('.cshero-box-time .cshero-box-title:nth(0) a').attr('href', 'http://technic.com.hk/%e8%81%af%e7%b5%a1%e6%88%91%e5%80%91/#contact-row2');
        $('.cshero-box-time .cshero-box-title:nth(1) a').attr('href', 'http://technic.com.hk/%e8%81%af%e7%b5%a1%e6%88%91%e5%80%91/#contact-row3');
        $('.cshero-box-time .cshero-box-title:nth(2) a').attr('href', 'http://technic.com.hk/%e8%81%af%e7%b5%a1%e6%88%91%e5%80%91/#contact-row3');
    });

}(jQuery));