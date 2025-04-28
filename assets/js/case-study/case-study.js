;(function($) {



    "use strict";


    var caseOwl = function() {

        if ( $().owlCarousel ) {

            $('.tf-case-study-wrap.has-carousel').each(function(){

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

                var centered = false;

                if ($this.data("centered") == 'yes') {

                    centered = true;

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

                    center: centered,

                    autoplayTimeout: 5000,

                    smartSpeed: 850,

                    autoplayHoverPause: true,

                    navText : ["<i class=\""+prev_icon+"\"></i>","<i class=\""+next_icon+"\"></i>"],

                    responsive: {

                        0:{

                            items:item3,
                            center: false

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


    var filterCaseIsotope = function() { 
        if ( $( '.container-filter' ).hasClass('show-filter') ) {
            if ( $().isotope ) {           
                var $container = $('.container-filter');
                $container.imagesLoaded(function(){
                    $container.isotope({
                        itemSelector: '.item',
                        transitionDuration: '1s'
                    });
                });

                $('.case-study-filter li').on('click',function() {                           
                    var selector = $(this).find("a").attr('data-filter');
                    $('.case-study-filter li').removeClass('active');
                    $(this).addClass('active');
                    $container.isotope({ filter: selector });
                    return false;
                });            
            };
        };        
    };

    $(function() {

        filterCaseIsotope();

    });

    var hoverChangeimage = function() { 
        $(document).ready(function() {
            $('.wrap-thumbnail .thumbnail-image').removeClass('active');
            $('.wrap-thumbnail .thumbnail-image[data-item="1"]').addClass('active');
            $('.wrap-case-study-post .item[data-item="1"]').addClass('active');
            $('.wrap-case-study-post .item').hover(function() {
                $('.wrap-case-study-post .item').removeClass('active');
                $(this).addClass('active');
                var dataItem = $(this).attr('data-item');
                $('.wrap-thumbnail .thumbnail-image').removeClass('active');
                $('.wrap-thumbnail .thumbnail-image[data-item="' + dataItem + '"]').addClass('active');
            });
        });
        
    };

    $(window).on('elementor/frontend/init', function() {        

        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-case-study.default', caseOwl );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-case-study.default', filterCaseIsotope );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-case-study.default', hoverChangeimage );

    });



})(jQuery);

