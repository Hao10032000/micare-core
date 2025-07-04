(function($) {
    "use strict";

    var themesflatAnimationFadeUp = function(container, item, animatedClass = 'tfanimated') {
        $(window).on('scroll', function() {
            var windowBottom = $(this).scrollTop() + $(this).innerHeight();
            
            $(container).each(function() {
                var $this = $(this);
                var objectBottom = $this.offset().top + $this.outerHeight() * 0.1;
                
                if (objectBottom < windowBottom) { 
                    var seat = $this.find(item);
                    seat.each(function(index) {
                        setTimeout(function() {
                            $(this).addClass(animatedClass);
                        }.bind(this), 200 * index);
                    });
                }
            });
        }).trigger('scroll'); 
    };

    var initAnimations = function() {
        var animationConfigs = [
            { container: ".tf-animated-column-elementor", item: ".elementor-column" },
            { container: ".tf-animated-item", item: ".elementor-widget-container" },
            { container: ".tf-animated-item-fade", item: ".elementor-widget-container" },
            { container: ".tf-animated-item-left", item: ".elementor-widget-container" },
            { container: ".tf-animated-item-right", item: ".elementor-widget-container" },
            { container: ".tf-animated-item-zoom-slide", item: ".elementor-widget-container" },
            { container: ".tf-animated-item-slide-right", item: ".elementor-widget-container" }
        ];
        
        animationConfigs.forEach(function(config) {
            themesflatAnimationFadeUp(config.container, config.item);
        });
    };

    var textSplit = function() {
        if ($(".tf-split-text").length) {
            Splitting();
            themesflatAnimationFadeUp(".tf-split-text", ".splitting", 'tf-animated');
        }
    };

    // Run general animations
    $(function() {
        initAnimations();
    });

    // Run textSplit on Elementor section load
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/tf-title-section.default', textSplit);
    });

})(jQuery);