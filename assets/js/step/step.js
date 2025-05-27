;(function($) {



    "use strict";


    var tf_accordion_step = function ($scope) {

        $('.tf-step .item-step').on('click', function() {
            $(this).siblings('.item-step').removeClass('active');
            $(this).toggleClass('active');
          });

    }


    $(window).on('elementor/frontend/init', function() {        

        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-step.default', tf_accordion_step);

    });



})(jQuery);

