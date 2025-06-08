;(function($) {
    "use strict";

    var tf_flexslider = function() {
        jQuery(document).ready(function($) {
            $('.swiper-container').each(function() {
                var $this = $(this);
                var options = $this.data('swiper-options') || {};

                // Khởi tạo Swiper
                var swiper = new Swiper($this[0], options);
            });
        });
    };

    // Elementor Support
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/custom_swiper_slider.default', tf_flexslider );
    });

})(jQuery);
