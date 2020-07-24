"use strict";

// document.addEventListener("DOMContentLoaded", function(event) {
//     $(window).on('load', function () {
//         $('#loader-wrapper').fadeOut('slow');
//     });
// });

// $('ul.slimmenu').slimmenu({
//     resizeWidth: '992',
//     collapserTitle: 'Menu',
//     animSpeed: 250,
//     indentChildren: true,
//     childrenIndenter: ''
// });

var mainMenu = $('#main-menu');

mainMenu.smartmenus({
    mainMenuSubOffsetX: 0,
    mainMenuSubOffsetY: 0,
    subMenusSubOffsetX: 0,
    subMenusSubOffsetY: -3
});

mainMenu.bind({
    'show.smapi': function(e, menu) {
        $(menu).removeClass('hide-animation').addClass('show-animation');
    },
    'hide.smapi': function(e, menu) {
        $(menu).removeClass('show-animation').addClass('hide-animation');
    }
}).on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', 'ul', function(e) {
    $(this).removeClass('show-animation hide-animation');
    e.stopPropagation();
});

var unveilImg = $(".lazyloader");
if(unveilImg.length) {
    unveilImg.unveil();
}

$('.btn').button();

$("[rel='tooltip']").tooltip();

$('.form-group').each(function() {
    var self = $(this),
        input = self.find('input');

    input.focus(function() {
        self.addClass('form-group-focus');
    })

    input.blur(function() {
        if (input.val()) {
            self.addClass('form-group-filled');
        } else {
            self.removeClass('form-group-filled');
        }
        self.removeClass('form-group-focus');
    });
});

$('div.bg-parallax').each(function() {
    var $obj = $(this);
    if($(window).width() > 992 ){
        $(window).scroll(function() {
            var animSpeed;
            if ($obj.hasClass('bg-blur')) {
                animSpeed = 10;
            } else {
                animSpeed = 15;
            }
            var yPos = -($(window).scrollTop() / animSpeed);
            var bgpos = '50% ' + yPos + 'px';
            $obj.css('background-position', bgpos);

        });
    }
});

$(document).ready(
    function() {

    // $('html').niceScroll({
    //     cursorcolor: "#000",
    //     cursorborder: "0px solid #fff",
    //     railpadding: {
    //         top: 0,
    //         right: 0,
    //         left: 0,
    //         bottom: 0
    //     },
    //     cursorwidth: "10px",
    //     cursorborderradius: "0px",
    //     cursoropacitymin: 0.2,
    //     cursoropacitymax: 0.8,
    //     boxzoom: true,
    //     horizrailenabled: false,
    //     zindex: 9999
    // });


        // Owl Carousel
        var owlCarouselSlider = $('.owl-carousel-slider'),
            owlNav = owlCarouselSlider.attr('data-nav');
            //owlSliderPagination = owlCarouselSlider.attr('data-pagination');

        var carouselCount = 0;
        $('.owl-carousel').each(function(){
            $(this).attr("id", "owl-carousel" + carouselCount);
            var owlItems = $(this).attr('data-items');
            var owlMobile = $(this).attr('data-items-mobile');
            var owlTablet = $(this).attr('data-items-tablet');
            owlMobile = owlMobile ? owlMobile : owlItems;
            owlTablet = owlTablet ? owlTablet : owlItems;
            var autoPlay = $(this).attr('data-autoplay') ? $(this).attr('data-autoplay') : false;
            $('#owl-carousel' + carouselCount).owlCarousel({
                items: owlItems,
                navigation: true,
                dots: true,
                responsive: true,
                autoPlay: autoPlay,
                transitionStyle : "fade",
                navigationText: ['', ''],
                itemsDesktop : [1199,owlItems],
                itemsDesktopSmall : [991,owlTablet],
                itemsTablet: [768,owlMobile],
                itemsTabletSmall: false,
                itemsMobile : [479,owlMobile]
            });
            carouselCount++;
        });

        owlCarouselSlider.owlCarousel({
            slideSpeed: 300,
            paginationSpeed: 400,
            //pagination: owlSliderPagination,
            singleItem: true,
            navigation: true,
            navigationText: ['', ''],
            transitionStyle: 'fade',
            autoPlay: 4500
        });
    }
);

$('.nav-drop').dropit();

$('.i-check, .i-radio').iCheck({
    checkboxClass: 'i-check',
    radioClass: 'i-radio'
});



$('.booking-item-review-expand').click(function(event) {
    console.log('baz');
    var parent = $(this).parent('.booking-item-review-content');
    if (parent.hasClass('expanded')) {
        parent.removeClass('expanded');
    } else {
        parent.addClass('expanded');
    }
});


$('.stats-list-select > li > .booking-item-rating-stars > li').each(function() {
    var list = $(this).parent(),
        listItems = list.children(),
        itemIndex = $(this).index();

    $(this).hover(function() {
        for (var i = 0; i < listItems.length; i++) {
            if (i <= itemIndex) {
                $(listItems[i]).addClass('hovered');
            } else {
                break;
            }
        };
        $(this).click(function() {
            for (var i = 0; i < listItems.length; i++) {
                if (i <= itemIndex) {
                    $(listItems[i]).addClass('selected');
                } else {
                    $(listItems[i]).removeClass('selected');
                }
            };
        });
    }, function() {
        listItems.removeClass('hovered');
    });
});



$('.booking-item-container').children('.booking-item').click(function(event) {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $(this).parent().removeClass('active');
    } else {
        $(this).addClass('active');
        $(this).parent().addClass('active');
        $(this).delay(1500).queue(function() {
            $(this).addClass('viewed')
        });
    }
});

var tid = setInterval(tagline_vertical_slide, 5000);

// vertical slide
function tagline_vertical_slide() {
    var curr = $("#tagline ul li.active");
    curr.removeClass("active").addClass("vs-out");
    setTimeout(function() {
        curr.removeClass("vs-out");
    }, 500);

    var nextTag = curr.next('li');
    if (!nextTag.length) {
        nextTag = $("#tagline ul li").first();
    }
    nextTag.addClass("active");
}

// Lighbox gallery
$('#popup-gallery').each(function() {
    $(this).magnificPopup({
        delegate: 'a.popup-gallery-image',
        type: 'image',
        gallery: {
            enabled: true
        }
    });
});

// Lighbox image
$('.popup-image').magnificPopup({
    type: 'image'
});

// Lighbox text
$('.popup-text').magnificPopup({
    removalDelay: 500,
    closeBtnInside: true,
    callbacks: {
        beforeOpen: function() {
            this.st.mainClass = this.st.el.attr('data-effect');
        }
    },
    midClick: true
});

// Lightbox iframe
$('.popup-iframe').magnificPopup({
    dispableOn: 700,
    type: 'iframe',
    removalDelay: 160,
    mainClass: 'mfp-fade',
    preloader: false
});

var loadDeferredStyles = function() {
    var addStylesNode = document.getElementById("deferred-styles");
    var replacement = document.createElement("div");
    replacement.innerHTML = addStylesNode.textContent;
    document.body.appendChild(replacement)
    addStylesNode.parentElement.removeChild(addStylesNode);
};
var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
    window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
else window.addEventListener('load', loadDeferredStyles);
