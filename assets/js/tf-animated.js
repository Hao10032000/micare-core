(function( $ ) {
    "use strict";

    var themesflat_animation_fadeup = function (container, item) {
        $(window).scroll(function () {
            var windowBottom = $(this).scrollTop() + $(this).innerHeight();
            $(container).each(function (index, value) {
                var objectBottom = $(this).offset().top + $(this).outerHeight() * 0.1;
                
                if (objectBottom < windowBottom) { 
                    var seat = $(this).find(item);
                    for (var i = 0; i < seat.length; i++) {
                        (function (index) {
                            setTimeout(function () {
                                seat.eq(index).addClass('tfanimated');
                            }, 200 * index);
                        })(i);
                    }
                }
            });
        }).scroll();
    };
    
    var themesflat_animation_classes_fadeup = function () {
        themesflat_animation_fadeup(".tf-animated-column-elementor", ".elementor-column");
        themesflat_animation_fadeup(".tf-animated-item", ".elementor-widget-container");
        themesflat_animation_fadeup(".tf-animated-item-fade", ".elementor-widget-container");
        themesflat_animation_fadeup(".tf-animated-item-left", ".elementor-widget-container");
        themesflat_animation_fadeup(".tf-animated-item-right", ".elementor-widget-container");
        themesflat_animation_fadeup(".tf-animated-item-zoom-slide", ".elementor-widget-container");
        themesflat_animation_fadeup(".tf-animated-item-slide-right", ".elementor-widget-container");
    };

    $(function() {
        themesflat_animation_classes_fadeup();
    });

})(jQuery);