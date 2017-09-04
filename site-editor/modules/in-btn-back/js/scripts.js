jQuery(document).ready(function( $ ) {

    // ===== Scroll to Top ====
       /* $('.return-to-top-btn').click(function() {      // When arrow is clicked
            $('body,html').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 500);
        });*/

if ($('.return-to-top-btn').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('.return-to-top-btn').addClass('show');
            } else {
                $('.return-to-top-btn').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('.return-to-top-btn').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}



});