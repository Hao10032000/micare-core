;(function($) {



    "use strict";



    var tftabs = function($scope) {   
     
        $scope.find('.tf-tabs').each( function() {
            
            $(this).find('.tf-tabnav ul > li').filter(':first').addClass('active').removeClass('inactive');
            $(this).find('.tf-tabcontent').children().filter(':first').addClass('active');

            
            if ( $(this).find('.tf-tabnav ul > li').hasClass('set-active-tab') ) {
                $(this).find('.tf-tabnav ul > li').siblings().removeClass('active');                
            }
            if ( $(this).find('.tf-tabcontent').children().hasClass('set-active-tab') ) {
                $(this).find('.tf-tabcontent').children().siblings().removeClass('active');
            }

            $(this).find('.tf-tabnav ul > li').on('click', function(){
                var tab_id = $(this).attr('data-tab');

                $(this).siblings().removeClass('active').removeClass('set-active-tab').addClass('inactive');
                $(this).closest('.tf-tabs').find('.tf-tabcontent').children().removeClass('active').removeClass('set-active-tab').addClass('inactive');

                $(this).addClass('active').removeClass('inactive');
                $(this).closest('.tf-tabs').find('.tf-tabcontent').children('.'+tab_id).addClass('active').removeClass('inactive');
            });

            $(this).find('.toggle-btn-tabs .btn-tog').on('click', function(){
                var tab_id = $(this).attr('data-tab');

                $(this).siblings().removeClass('active').removeClass('set-active-tab').addClass('inactive');
                $(this).closest('.tf-tabs').find('.tf-tabcontent').children().removeClass('active').removeClass('set-active-tab').addClass('inactive');
                
                $(this).addClass('active').removeClass('inactive');
                $(this).closest('.tf-tabs').find('.tf-tabcontent').children('.'+tab_id).addClass('active').removeClass('inactive');
            });

            $(this).find('.toggle-btn-tabs .btn-tog.btn-2').on('click', function(){
                $(this).closest('.tf-tabs').find('.text-toggle.left').removeClass('active');
                $(this).closest('.tf-tabs').find('.toggle-btn-tabs').addClass('active');
                $(this).closest('.tf-tabs').find('.text-toggle.right').addClass('active');
            });
            $(this).find('.toggle-btn-tabs .btn-tog.btn-1').on('click', function(){
                $(this).closest('.tf-tabs').find('.text-toggle.right').removeClass('active');
                $(this).closest('.tf-tabs').find('.toggle-btn-tabs').removeClass('active');
                $(this).closest('.tf-tabs').find('.text-toggle.left').addClass('active');
            });
           
        });
    }



    $(window).on('elementor/frontend/init', function() {

        elementorFrontend.hooks.addAction( 'frontend/element_ready/tftabs_fr.default', tftabs );

    });



})(jQuery);

