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
});