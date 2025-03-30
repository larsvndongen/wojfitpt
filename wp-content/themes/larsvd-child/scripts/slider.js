jQuery(document).ready(function ($) {
    var slider = new Swiper(".row.larsvd.slider .row-container .blocks-container .blocks-group.image-group.swiper", {
        loop: true,
        autoplay: {
            delay: 3000
        },
        noSwiping: true,
        noSwipingClass: 'swiper-slide',
        effect: "fade",
    });

    var slider = new Swiper(".row.larsvd.contactform-slider .row-container .blocks-container .blocks-group.image-group.swiper", {
        loop: true,
        autoplay: {
            delay: 5000
        },
    });

    var slider = new Swiper(".row.larsvd.reviews .row-container .blocks-container .blocks-group.post-group .swiper", {
        loop: true,
        autoplay: {
            delay: 10000
        },
        navigation: {
            nextEl: '.swiper-button.next',
            prevEl: '.swiper-button.prev'
        }
    });

    var swiper = new Swiper(".row.larsvd.text-image-slider .mySwiper", {
        pagination: {
            el: ".row.larsvd.text-image-slider .swiper-pagination",
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '">' + "Fase " + (index + 1) + "</span>";
            },
        },
    });
});