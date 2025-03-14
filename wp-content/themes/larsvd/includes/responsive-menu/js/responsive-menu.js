jQuery(document).ready(function($){
    $('.responsive-menu-trigger-btn').click(function(){
        $('.responsive-menu').addClass('active');
    });

    $('.responsive-menu .close-btn').click(function(){
        $('.responsive-menu').removeClass('active');
    });

    $('.responsive-menu li.menu-item-has-children').each(function() {
        var openSubmenu = $('<div class="open-submenu"><i class="fa-solid fa-chevron-down"></i><i class="fa-solid fa-chevron-up"></i></div>');
        $(this).children('a').add(openSubmenu).wrapAll('<div class="container"></div>');
    });

    $('.responsive-menu .open-submenu').click(function(){
        var $submenu = $(this).closest('.menu-item-has-children').children('.sub-menu');
        
        $submenu.toggleClass('active');
        $(this).toggleClass('active');
        
        if ($submenu.hasClass('active')) {
            $submenu.css('display', 'flex');
        } else {
            $submenu.css('display', 'none');
        }
    });
});
