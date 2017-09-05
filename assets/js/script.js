/**
 * Theme Front end main js
 *
 */

(function($) {

    $(document).ready(function() {

        var $body = $("body");

        /**
         * upsells
         */
        var $rtl = ( $body.hasClass("rtl-body") ) ? true : false;

        $(".single-slider-wrapper").livequery(function(){

            $(this).slick({
                //mobileFirst         : true ,
                arrows              : true,
                slidesToShow        : 1,
                slidesToScroll      : 1,
                dots                : false,
                //centerMode          : false,
                rtl                 : $rtl,
                //swipe               : true ,
                touchMove           : true ,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                prevArrow : '<span class="slide-nav-bt slide-prev"><i class="fa fa-angle-left"></i></span>',
                nextArrow : '<span class="slide-nav-bt slide-next"><i class="fa fa-angle-right"></i></span>'
            });

        });


        /**
         * FAQ Accordion
         */

        var _faqAccordionEl = $(".sed-shop-faq-wrapper-inner");

        _faqAccordionEl.accordion({
            heightStyle     : "content",
            active          : 0,
            collapsible     : true,
            icons           :false
        });


        /**
         * Terms Accordion
         */

        var _termsAccordionEl = $(".module-terms-inner");

        _termsAccordionEl.accordion({
            heightStyle     : "content",
            header          : ".header-terms",
            collapsible     : true,
            active          : false,
            collapsible     : true,
            icons           : false
        });


        /**
         * Resize
         */
        setTimeout(function(){$(window).trigger(window.tg_debounce_resize);}, 2000);

        /**
         * Loading
         */

        var removePreloader = function() {
            setTimeout(function() {
                jQuery('.preloader').hide();
            }, 1500);
        };

        removePreloader();

    });


})(jQuery);
