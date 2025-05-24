(function( $ ) {

    "use strict";

   

    

    var iziModal = function(){

        if ($('body').find('div').hasClass('izimodal')) {

            $(".izimodal").iziModal({

                width: 850,

                top: null,

                bottom: null,

                borderBottom: false,

                padding: 0,

                radius: 3,

                zindex: 999999,

                iframe: false,

                iframeHeight: 400,

                iframeURL: null,

                focusInput: false,

                group: '',

                loop: false,

                arrowKeys: true,

                navigateCaption: true,

                navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'

                history: false,

                restoreDefaultContent: true,

                autoOpen: 0, // Boolean, Number

                bodyOverflow: false,

                fullscreen: false,

                openFullscreen: false,

                closeOnEscape: true,

                closeButton: true,

                appendTo: 'body', // or false

                appendToOverlay: 'body', // or false

                overlay: true,

                overlayClose: true,

                overlayColor: 'rgba(0, 0, 0, .7)',

                timeout: false,

                timeoutProgressbar: false,

                pauseOnHover: false,

                timeoutProgressbarColor: 'rgba(255,255,255,0)',

                transitionIn: 'comingIn',

                transitionOut: 'comingOut',

                transitionInOverlay: 'fadeIn',

                transitionOutOverlay: 'fadeOut',

                onFullscreen: function(){},

                onResize: function(){},

                onOpening: function(){},

                onOpened: function(){},

                onClosing: function(){},

                onClosed: function(){},

                afterRender: function(){}

            });



            $(document).on('click', '.trigger', function (event) {

                event.preventDefault();

                $('.izimodal').iziModal('setZindex', 99999999);

                $('.izimodal').iziModal('open', { zindex: 99999999 });

                $('.izimodal').iziModal('open');

            });

        }

    }

    var styleSingleServices = function(){
        if($('.widget-layout-single').length) {
            $('.widget-recent-services').appendTo(".widget-layout-single");
        }
        $(document).ready(function () {
            var currentUrl = window.location.href;
            console.log(currentUrl);
            $('.widget-recent-services .text a').each(function () {
                if ($(this).attr("href") === currentUrl) {
                    $(this).addClass("active");
                }
            });
        });
    }

    var portfolioLoadMore = function() { 
        var $container = $('.container-filter');
        $('.navigation.loadmore.case-study a').on('click', function(e) {
            e.preventDefault(); 
            var $item = '.item';

            $('<span/>', {
                class: 'infscr-loading',
                text: 'Loading...',
            }).appendTo($container);

            $.ajax({
                type: "GET",
                url: $(this).attr('href'),
                dataType: "html",
                success: function( out ) {
                    var result = $(out).find($item);  
                    var nextlink = $(out).find('.navigation.loadmore.case-study a').attr('href');

                    result.css({ opacity: 0 });
                    if ($container.hasClass('show-filter')) {
                        $container.append(result).imagesLoaded(function () {
                            result.css({ opacity: 1 });
                            $container.isotope('appended', result);
                        });
                    }
                    else {
                        result.css({ opacity: 1 });
                        $container.append(result);
                    }

                    if ( nextlink != undefined ) {
                        $('.navigation.loadmore.case-study a').attr('href', nextlink);
                        $container.find('.infscr-loading').remove();
                    } else {
                        $container.find('.infscr-loading').addClass('no-ajax').text('All posts loaded.').delay(2000).queue(function() {$(this).remove();});
                        $('.navigation.loadmore.case-study').remove();
                    }
                }
            })
        })       
    } 

    $(function() {

        iziModal();
        styleSingleServices();
        portfolioLoadMore();
    })



})(jQuery);