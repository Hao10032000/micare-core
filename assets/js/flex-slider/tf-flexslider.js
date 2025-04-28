;(function($) {
    "use strict";

    var tf_flexslider = function() {
        $(".flexslider").each(function() {
            var $this = $(this),
                adminBar = $('#wpadminbar'),
                topBar = $('#top-bar'),
                headerHeight = $('header').height(),
                flexSliderContent = $this.find('.flex_caption');

            function updateFlexsliderSize() {
                var flexsliderHeight = $this.data('height'),
                    flexsliderHeightTablet = $this.data('height_tablet'),
                    flexsliderHeightMobile = $this.data('height_mobile');

                if (window.innerWidth <= 991) {
                    flexsliderHeight = flexsliderHeightTablet;
                }

                if (window.innerWidth <= 767) {
                    flexsliderHeight = flexsliderHeightMobile;
                }

                $this.find('.item-slide').height(flexsliderHeight);

                var topBarHeight = topBar.length ? topBar.height() : 0,
                    adminBarHeight = adminBar.length ? adminBar.height() : 0,
                    contentHeight = flexSliderContent.outerHeight() || (flexsliderHeight * 0.5),
                    contentTopMargin;

                if ($this.hasClass('header-absolute')) {
                    contentTopMargin = ((flexsliderHeight + topBarHeight + headerHeight - contentHeight) / 2);
                } else {
                    contentTopMargin = ((flexsliderHeight - contentHeight) / 2);
                }

                flexSliderContent.css("margin-top", contentTopMargin + "px");
            }

            // Cập nhật kích thước trước khi khởi tạo
            updateFlexsliderSize();

            // Khởi tạo Flexslider
            $this.flexslider({
                animation: 'fade',
                slideshow: $this.data('autoplay'),
                slideshowSpeed: $this.data('slideshowSpeed'),
                animationSpeed: 1000,
                animationLoop: true,
                controlNav: $this.data('controlnav'),
                directionNav: $this.data('directionnav'),
                prevText: '<i class="' + $this.data('prevtext') + '" aria-hidden="true"></i>',
                nextText: '<i class="' + $this.data('nexttext') + '" aria-hidden="true"></i>',
                useCSS: false,
                start: function() {
                    updateFlexsliderSize(); // Cập nhật lần nữa sau khi slider load
                }
            });

            // Lắng nghe sự kiện resize
            $(window).on("resize", function() {
                clearTimeout(window.resizedFinished);
                window.resizedFinished = setTimeout(function() {
                    updateFlexsliderSize();
                }, 100);
            });
        });
    };

    $(document).ready(function() {
        tf_flexslider();
    });

    // Elementor Support
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/flex-slider1.default', function() {
            tf_flexslider();
            setTimeout(tf_flexslider, 500); // Chạy lại sau khi Elementor render
        });
    });

})(jQuery);
