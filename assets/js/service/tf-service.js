;(function($) {



    "use strict";

    var filterServices = function() {
        $('.list-filter-services .btn-filter').on('click', function(e) {
            e.preventDefault();
            var attrBtn = $(this).data('filter');
            $(this).closest('.list-filter-services').find('.btn-filter').removeClass('active');
            $(this).addClass('active');
            if($('.wrap-services-post .item.'+attrBtn).length) {
                $('.wrap-services-post .item').removeClass('active').addClass('inactive');
                $('.wrap-services-post .item.'+attrBtn).removeClass('inactive').addClass('active');
            }else {
                $('.wrap-services-post .item').removeClass('active');
                $('.wrap-services-post .item').addClass('inactive');
            }
        });
    } 


    var servicessOwl = function() {

        if ( $().owlCarousel ) {

            $('.tf-services-wrap.has-carousel').each(function(){

                var

                $this = $(this),

                item = $this.data("column"),

                item2 = $this.data("column2"),

                item3 = $this.data("column3"),

                gap = $this.data("spacer"),

                prev_icon = $this.data("prev_icon"),

                next_icon = $this.data("next_icon");



                var loop = false;

                if ($this.data("loop") == 'yes') {

                    loop = true;

                }



                var arrow = false;

                if ($this.data("arrow") == 'yes') {

                    arrow = true;

                } 



                var bullets = false;

                if ($this.data("bullets") == 'yes') {

                    bullets = true;

                }



                var auto = false;

                if ($this.data("auto") == 'yes') {

                    auto = true;

                }  



                $this.find('.owl-carousel').owlCarousel({

                    loop: loop,

                    margin: gap,

                    nav: arrow,

                    dots: bullets,

                    autoplay: auto,

                    autoplayTimeout: 5000,

                    smartSpeed: 850,

                    autoplayHoverPause: true,

                    navText : ["<i class=\""+prev_icon+"\"></i>","<i class=\""+next_icon+"\"></i>"],

                    responsive: {

                        0:{

                            items:item3

                        },

                        768:{

                            items:item2

                        },

                        1000:{

                            items:item

                        }

                    }

                });



            });

        }

    } 


    var hover_ActiveThumb = function() {
        if ($(".group-services-thumb").length > 0) {
            $('.group-services-thumb .group-title .title:first').addClass('active');
            $('.group-services-thumb .wrap-services-post .item:first').addClass('active-thumb');
            $(".group-services-thumb .group-title .title").hover(function() {
                var item_id = $(this).attr('data-post');
                $('.group-services-thumb .wrap-services-post .item').removeClass('active-thumb');
                $('.group-services-thumb .group-title .title').removeClass('active');
                $(this).addClass('active');
                $('.group-services-thumb .wrap-services-post .data-'+item_id).addClass('active-thumb');
            });
        }
    }



    $(window).on('elementor/frontend/init', function() {        

        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-service.default', servicessOwl );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-service.default', filterServices );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-service.default', hover_ActiveThumb );

    });



})(jQuery);

