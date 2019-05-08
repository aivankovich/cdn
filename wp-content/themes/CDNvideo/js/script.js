var html = $('html');
var body = $('body');
var $window = $(window);

$(document).ready(function () {
    var $window_width = $(window).width();

    var is_home = false;
    if(body.hasClass('home')) {
       is_home = true;
    }

    if(is_home) {

        /* Top news */

        var top_new = $('.top__new');
        var now = new Date().getTime();

        if(localStorage.getItem('top_new') == null) {
            top_new.addClass('show');
        } else if(now - localStorage.getItem('top_new') > 24*60*60*1000) {
            localStorage.clear();
            top_new.addClass('show');
        }

        $('.hide__top__new').on('click', function() {
            localStorage.setItem('top_new', now);
            top_new.slideUp(400, function() {
                $(this).removeClass('show');
            });
        });

        /* Map */

        function initialize() {
            var mapOptions = {
                zoom: 3,
                disableDefaultUI: false,
                scrollwheel: false,
                center: new google.maps.LatLng(25.0591777, 15.2176085),
                styles: [
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#e9e9e9"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#dedede"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "saturation": 36
                            },
                            {
                                "color": "#333333"
                            },
                            {
                                "lightness": 40
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.country",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    }
                ]
            };

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            for (var i = 0; i < markers.length; i++) {
                var marker = markers[i];
                var divClass = marker.network == 'CDNvideo&Wangsu' ? 'pulse__marker pulse__marker-yellow' : 'pulse__marker';

                new CustomMarker(
                    new google.maps.LatLng(marker.position[0], marker.position[1]),
                    map, {
                        marker_id: 'marker' + i,
                        title: marker.title,
                        divClass: divClass
                    }
                );
            }

            /* Map content */

            $('.country__options p').on('click', function() {
                var position = $(this).data('coordinates').split(',');
                centerMap(position);

                $('.country__list.flex').eq($(this).index()).addClass('show').siblings().removeClass('show');
            });

            $('.country__list p').on('click', function() {
                var position = $(this).data('coordinates').split(',');
                centerMap(position);
            });

            function centerMap(position) {
                map.setCenter(new google.maps.LatLng(position[0], position[1]));
            }
        }

        google.maps.event.addDomListener(window, 'load', function() {
            setTimeout(initialize, 2550)
        });

        /* Slider */

        $(".reviews__slider").owlCarousel({
            items: 2,
            slideBy: 2,
            margin: 33,
            nav: true,
            autoplay: false,
            loop: true,
            navText: [],
            autoplayTimeout: 6000,
            smartSpeed: 700,
            dots: false,
            responsive : {
                0: {
                    items: 1,
                    slideBy: 1,
                    margin: 0,
                },
                960: {
                    items: 2,
                    slideBy: 2,
                    margin: 33,
                }
            }
        });



        var mobile_slider_outer = $('.service__mobile__slider .owl-stage');

        if($window_width < 701) {
            $(".service__mobile__slider").owlCarousel({
                items: 1,
                slideBy: 1,
                nav: true,
                autoplay: false,
                loop: true,
                navText: [],
                autoplayTimeout: 6000,
                smartSpeed: 700,
                dots: false,
            });

            setTimeout(function() {
                mobile_slider_outer.css('height', mobile_slider_outer.height());
            }, 300);
        }

        if($window_width < 461) {
            $(".clients__mobile__slider").owlCarousel({
                items: 3,
                slideBy: 3,
                margin: 20,
                nav: false,
                autoplay: false,
                loop: true,
                navText: [],
                autoplayTimeout: 6000,
                smartSpeed: 700,
                dots: false,
            });
        } else {
            $(".clients__desctop__slider").owlCarousel({
                items: 4,
                slideBy: 4,
                margin: 20,
                nav: true,
                autoplay: true,
                loop: true,
                navText: [],
                autoplayTimeout: 6000,
                smartSpeed: 300,
                dots: false,
            });
        }
    }

    /* Search */

    var search_btn = $('.search__form input[type="submit"]');
    var search_input = $('.search__form input[type="search"]');

    search_btn.on('click', function(e) {
        e.preventDefault();
        if(!body.hasClass('search__form__show')) {
            body.addClass('search__form__show');
            setTimeout(function() {
                search_input.focus();
            }, 300);
        } else {
            $('.search__form').submit();
        }
    });

    /* Soc in menu */

    $('ul.menu > li.menu-item-has-children:first-child > ul.sub-menu > li:last-child').append('<li class="soc__menu flex"><a href="https://www.facebook.com/CDNvideoGlobal/"></a><a href="https://twitter.com/CdnvideoG"></a><a href="https://www.linkedin.com/company/cdnvideo/"></a></li>');

    /* Select */

    var option = $('.option');
    var options_show = false;

    if(option.length != 0) {
        var options = $('.options');
        var options_item = $('.options p');
        var cur_option;

        option.on('click', function() {
            cur_option = this;
            var cur_options = $(this).next('.options');
            options.not(cur_options).slideUp(300);
            cur_options.slideToggle(300);
            options_show = true;
        });

        options_item.on('click', function() {
            $(this).parent().prev('.option').text($(this).text());
        });
    }

    body.on('click', function(e) {
        if(body.hasClass('search__form__show')) {
            if(e.target == search_input[0] || e.target == search_btn[0]) {
                return;
            }
            $(this).removeClass('search__form__show');
        }

        if(options_show) {
            if(e.target == cur_option) {
                return;
            }
            options.slideUp(300);
            options_show = false;
        }
    });

    /* Mobile menu */

    var humburger = $('.mobile__menu__toggle');
    var check = $('#mobile__menu__toggle');
    var menu_overlay = $('.menu__overlay');

    humburger.on('click', function() {
        $(this).toggleClass('active');
        menu_overlay.toggleClass('active');
        html.toggleClass('overflow');
    });

    menu_overlay.on('click', function() {
        check.prop('checked', false);
        humburger.removeClass('active');
        html.removeClass('overflow');
        $(this).removeClass('active');
    });

    /* Modal */

    var modal_overlay = $('.modal__overlay');
    var modal;
    var modal_close;

    $('.modal__open').on('click', function() {
        modal = $('#' + $(this).data('modal'));

        if($window[0].innerWidth > $window.width()) {
            var scrollbar = $window[0].innerWidth - $window.width();
            body.css('padding-right', scrollbar);
        }
        html.addClass('overflow');
        var cur_scroll_top = $window.scrollTop();
        $window.on('scroll', function () {
            $window.scrollTop(cur_scroll_top);
        });

        modal_overlay.addClass('active');
        modal.scrollTop(0).addClass('show');
        modal_close = modal.find('.modal__close')[0];
        setTimeout(function() {
            $($('.modal input[type="text"]')[0]).focus();
        }, 300);
    });

    modal_overlay.on('click', close_modal);

    body.keydown(function(e) {
        if(e.which == 27 && html.hasClass('overflow')) {
            close_modal(e);
        }
    });

    function close_modal (e) {
        if (e.target != this && e.target != modal_close && e.which != 27) {
            return;
        }

        modal.removeClass('show');
        modal_overlay.removeClass('active');
        setTimeout(function() {
            html.removeClass('overflow');
            $window.off('scroll');
            body.css('padding-right', 0);
        }, 200);
    }

    /* Review */

    var reviews_slider = $(".reviews__slider__solution");

    if(reviews_slider.length != 0) {
        $(".reviews__slider__solution").owlCarousel({
            items: 1,
            slideBy: 1,
            margin: 32,
            nav: true,
            autoplay: false,
            loop: true,
            navText: [],
            autoplayTimeout: 6000,
            smartSpeed: 700,
            dots: false,
            responsive : {
                0: {
                    margin: 10,
                },
                460: {
                    margin: 32,
                }
            }
        });
    }

    var review = $('.review');

    if(review.length != 0) {
        var review_min_height;

        if (is_home) {
            if($window_width > 460) {
                review_min_height = 335;
            } else {
                review_min_height = 154;
            }
        } else {
            if($window_width > 460) {
                review_min_height = 260;
            } else {
                review_min_height = 150;
            }
        }

        review.each(function() {
            if($(this).height() < review_min_height) {
                $(this).addClass('show');
            }
        });

        $('.show__review').on('click', function() {
            $(this).prev('.review').addClass('show');
        });
    }

    var first_block_content = $('.first__block .content');

    if(first_block_content) {
        var first_block_content_height;

        if($window_width > 460) {
            first_block_content_height = 280;
        } else {
            first_block_content_height = 154;
        }

        if(first_block_content.height() < first_block_content_height) {
            first_block_content.addClass('show');
        }

        $('.first__block .content .read__more').on('click', function() {
            $(this).parent('.content').addClass('show');
        });
    }

    var what_we_do_content = $('.what__we__do .content');

    if(what_we_do_content) {
        var what_we_do_content_height;

        if($window_width > 460) {
            what_we_do_content_height = 275;
        } else {
            what_we_do_content_height = 154;
        }

        if(what_we_do_content.height() < what_we_do_content_height) {
            what_we_do_content.addClass('show');
        }

        $('.read__more').on('click', function() {
            if ($(this).hasClass('hide')){
                $(this).parent('.content').removeClass('show');
                $(this).text('Read mode');
            }else{
                $(this).parent('.content').addClass('show');
                $(this).addClass('hide');
                $(this).text('Hide');
            }
        });
    }

    /* Form mask */

    $('.time input[type="text"]').mask('01:21',
        {
            'translation': {
                0: {pattern: /[0-2]/},
                1: {pattern: /[0-9]/},
                2: {pattern: /[0-5]/},
            },
            placeholder: "__:__"
        }
    );

    if(window.location.href.indexOf('/en/') + 1) {
        $('input[type="tel"]').mask('0000000000',
            {
                'translation': {
                    0: {pattern: /[\+0-9]/},
                    optional: true
                },
                placeholder: "Your Phone Number"
            }
        );
    } else {
        $('input[type="tel"]').mask('+7 (000) 000-00-00',
            {
                placeholder: "Ваш телефон"
            }
        );
    }

    /* Scrollbar */

    var scrollbar_inner = $('.scrollbar-inner');

    if(scrollbar_inner.length != 0) {
        if($window_width > 961) {
            scrollbar_inner.scrollbar();
            var adv_solution_item = $('.adv__solution__item');
            var adv_height = Math.max(adv_solution_item.eq(0).outerHeight(true), adv_solution_item.eq(1).outerHeight(true)) + Math.max(adv_solution_item.eq(2).outerHeight(true), adv_solution_item.eq(3).outerHeight(true));
            console.log(adv_height);
            $('.adv__solution').height(adv_height);
        }

        if($window_width < 461) {
            $(".adv__solution__mobile__slider").owlCarousel({
                items: 1,
                slideBy: 1,
                margin: 0,
                nav: true,
                autoplay: false,
                loop: true,
                navText: [],
                autoplayTimeout: 6000,
                smartSpeed: 700,
                dots: false,
            });

             $(".special__offers__mobile__slider").owlCarousel({
                items: 1,
                slideBy: 1,
                margin: 0,
                nav: false,
                autoplay: false,
                loop: true,
                navText: [],
                autoplayTimeout: 6000,
                smartSpeed: 700,
                dots: false,
            });

            $(".cases__solution__mobile__slider").owlCarousel({
                items: 1,
                slideBy: 1,
                margin: 0,
                nav: false,
                autoplay: false,
                loop: true,
                navText: [],
                autoplayTimeout: 6000,
                smartSpeed: 700,
                dots: false,
            });
        }else{
            $(".clients__desctop__slider").owlCarousel({
                items: 4,
                slideBy: 4,
                margin: 20,
                nav: true,
                autoplay: true,
                loop: true,
                navText: [],
                autoplayTimeout: 6000,
                smartSpeed: 300,
                dots: false,
            });
        }
    }

    if($window_width < 461) {
        $(".solution__industry__mobile__slider").owlCarousel({
            items: 1,
            slideBy: 1,
            margin: 0,
            nav: true,
            autoplay: false,
            loop: true,
            navText: [],
            autoplayTimeout: 6000,
            smartSpeed: 700,
            dots: false,
        });

        $(".cases__industry__mobile__slider").owlCarousel({
            items: 1,
            slideBy: 1,
            margin: 0,
            nav: true,
            autoplay: false,
            loop: true,
            navText: [],
            autoplayTimeout: 6000,
            smartSpeed: 700,
            dots: false,
        });

        $(".clients__mobile__slider").owlCarousel({
            items: 3,
            slideBy: 3,
            margin: 20,
            nav: false,
            autoplay: false,
            loop: true,
            navText: [],
            autoplayTimeout: 6000,
            smartSpeed: 700,
            dots: false,
        });

        $(".functional__mobile__slider").owlCarousel({
            items: 1,
            slideBy: 1,
            margin: 0,
            nav: true,
            autoplay: false,
            loop: true,
            navText: [],
            autoplayTimeout: 6000,
            smartSpeed: 700,
            dots: false,
        });
    }

    /* Tab */

    var tab_title = $('.tab__titles > *');

    tab_title.on('click', function() {
        $(this).addClass('active').siblings().removeClass('active');
        $(this).parent().siblings('.tab__content').removeClass('show').eq(tab_title.index(this)).addClass('show');
    });

    /* Functional */

    var title_functional = $('.functional__descr > h3');

    $('.functional__filter > a.btn').on('click', function(){
        var index_filter = $(this).index();
        $(this).addClass('active').siblings().removeClass('active').parent().siblings().removeClass('active').not('.filter__' + index_filter).slideUp(300);
        $('.filter__' + index_filter).slideDown(300);
    });

    title_functional.on('click', function() {
         $(this).toggleClass('active').next('.functional__descr__content').slideToggle();
    });

    /* Hidden input */

    $('.day__select .options p').on('click', function () {
        $('input[name="day"]').val($(this).text());
    });

    $('a.contact__person__btn').on('click', function () {
        $(this).addClass('active').siblings('a.contact__person__btn').removeClass('active');
        $('input[name="contact-person"]').val($(this).text());
    });

    $('a.regularity__btn').on('click', function () {
        $(this).addClass('active').siblings('a.regularity__btn').removeClass('active');
        $('input[name="regularity"]').val($(this).text());
    });

    $('.select__tariffs-industry .options p').on('click', function() {
        $('input[name="industry"]').val($(this).text());
    });

    $('.select__tariffs-audience .options p').on('click', function() {
        $('input[name="audience"]').val($(this).text());
    });

    /* Resize */

    $window.on('resize', function () {
        $window_width = $(window).width();

        if(is_home) {

            /* Service home */

            if($window_width < 701) {
                setTimeout(function() {
                    mobile_slider_outer.css('height', 'auto');
                    mobile_slider_outer.css('height', mobile_slider_outer.height());
                }, 300);
            }

            /* Review home */

            if($window_width > 460) {
                review_min_height = 335;
            } else {
                review_min_height = 154;
            }
        } else {
            if($window_width > 460) {
                review_min_height = 260;
            } else {
                review_min_height = 150;
            }
        }

        /* Review */

        if(review.length != 0) {
            setTimeout(function() {
                review.each(function() {
                    if($(this).height() < review_min_height) {
                        $(this).addClass('show');
                    } else {
                        $(this).removeClass('show');
                    }
                });
            }, 200);
        }

        if(scrollbar_inner.length != 0 && $window_width > 961) {
            scrollbar_inner.scrollbar();
            var adv_solution_item = $('.adv__solution__item');
            var adv_height = adv_solution_item.eq(0).outerHeight(true) + adv_solution_item.eq(2).outerHeight(true);
            $('.adv__solution').height(adv_height);
        }
    });
    $('.clients div.client').hover(function () {
        $(this).toggleClass('grayscale');
    });

    if($window_width < 1080) {
        $('.menu-item a').click(function () {
            $(this).siblings('.sub-menu').toggle();
        });
    }
});

$window.on('load', function() {
    body.addClass('hide__preloader');
});