;(function($) {



    "use strict";

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

                            items:item3,
                            margin: 10,
                        },

                        768:{

                            items:item2,
                            margin: 20,

                        },

                        1000:{

                            items:item

                        }

                    }

                });



            });

        }

    } 




    $(window).on('elementor/frontend/init', function() {        

        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-service.default', servicessOwl );

    });



})(jQuery);

