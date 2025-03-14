jQuery(document).ready(function($) {
    stickyActive();
});

function stickyActive() {
    var nav_class = jQuery('.sticky-menu');
    var nav_height = nav_class.outerHeight();
    var initialOffset = nav_class.offset().top;

    // Create a placeholder element
    var placeholder = jQuery('<div></div>').addClass('sticky-placeholder').css('height', nav_height).hide();
    nav_class.before(placeholder);

    jQuery(window).scroll(function() {
        var scrollTop = jQuery(this).scrollTop();
        
        if (jQuery('body.admin-bar')[0]) {
            if (scrollTop + 32 > initialOffset) {
                nav_class.addClass('sticky-active').css({
                    'position': 'fixed',
                    'top': '32px',
                    'width': '100%',
                    'z-index': '999'
                });
                placeholder.show(); // Show the placeholder when sticky
            } else {
                nav_class.removeClass('sticky-active').css({
                    'position': 'relative',
                    'top': '',
                    'width': ''
                });
                placeholder.hide(); // Hide the placeholder when not sticky
            }
        } else {
            if (scrollTop > initialOffset) {
                nav_class.addClass('sticky-active').css({
                    'position': 'fixed',
                    'top': '0',
                    'width': '100%',
                    'z-index': '999'
                });
                placeholder.show(); // Show the placeholder when sticky
            } else {
                nav_class.removeClass('sticky-active').css({
                    'position': 'relative',
                    'top': '',
                    'width': ''
                });
                placeholder.hide(); // Hide the placeholder when not sticky
            }
        }
    });

    // Ensure padding-top is reset to 0 when the page is loaded
    jQuery('body').css('padding-top', '0');
}