/**
 * Theme Front end main js
 *
 */

(function($) {

    $(document).ready(function() {

        var $body = $("body");

        /**
         * brands-slider-wrapper
         */
        var $rtl = ( $body.hasClass("rtl-body") ) ? true : false; //console.log($(".brands-slider-wrapper"));

        $(".brands-slider-wrapper").livequery(function(){

            $(this).slick({
                //mobileFirst         : true ,
                arrows              : true,
                slidesToShow        : 4,
                slidesToScroll      : 1,
                dots                : false,
                //centerMode          : false,
                rtl                 : $rtl,
                //swipe               : true ,
                touchMove           : true ,
                infinite            : true,
                prevArrow : '<span class="slide-nav-bt slide-prev"><i class="fa fa-angle-left"></i></span>',
                nextArrow : '<span class="slide-nav-bt slide-next"><i class="fa fa-angle-right"></i></span>',

                responsive: [
                  {
                    breakpoint: 910,
                    settings: {
                      slidesToShow: 3,
                      slidesToScroll: 1,
                    }
                  },
                  {
                    breakpoint: 600,
                    settings: {
                      slidesToShow: 2, 
                      slidesToScroll: 1
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
                  // You can unslick at a given breakpoint now by adding:
                  // settings: "unslick"
                  // instead of a settings object
                ]

            });

        });



        $(".news-slider-wrapper").livequery(function(){

            $(this).slick({
                //mobileFirst         : true ,
                arrows              : true,
                slidesToShow        : 2,
                slidesToScroll      : 1,
                dots                : false,
                //centerMode          : false,
                rtl                 : $rtl,
                //swipe               : true ,
                touchMove           : true ,
                infinite            : true,
                prevArrow : '<span class="slide-nav-bt slide-prev"><i class="fa fa-angle-left"></i></span>',
                nextArrow : '<span class="slide-nav-bt slide-next"><i class="fa fa-angle-right"></i></span>',

                responsive: [
                  {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
                  // You can unslick at a given breakpoint now by adding:
                  // settings: "unslick"
                  // instead of a settings object
                ]

            });

        });


        /**
         * FAQ Accordion
         */
        var _faqAccordionEl = $(".sed-shop-faq-wrapper");

        _faqAccordionEl.accordion({
            heightStyle     : "content",
            active          : 0,
            collapsible     : true,
            icons           :false 
        });


        /**
         * Agency Single Page open
         */
        $(".agancy-col-map > a").on("click", function(e){

            e.preventDefault();

            var _href = $(this).attr("href"),
                _width = $(window).width(),
                _height = $(window).height();

            var _nwidth = _width > 1100 ? 1100 : _width,
                _nheight = _height > 350 ? 350 : _height,
                _left = Math.floor( (_width - _nwidth) / 2 ),
                _top = Math.floor( (_height - _nheight) / 2 );

            window.open( _href , "_blank" , "toolbar=yes,scrollbars=yes,resizable=yes,top=" + _top + ",left=" + _left + ",width=" + _nwidth + ",height=" + _nheight );

        });



        /**
         * Single Products
         */

        var dialog_btn = $(".advertise-posts-wrapper .advertise-posts-item.video-advertise-posts-item");

        dialog_btn.on("click" , function(){

            var $dialog = $("#sed-dialog-popup");

            $dialog.addClass( 'active' );

        });

        $(".sed-dialog-popup-close").on("click" , function(){
            $("#sed-dialog-popup").removeClass( 'active' );
        });

        $("#sed-dialog-popup").on('click', function (e) {

            if ( !$(e.target).hasClass("sed-dialog-popup-inner") && $(e.target).parents(".sed-dialog-popup-inner:first").length == 0 ) {

                $(this).removeClass( 'active' );
            }

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
