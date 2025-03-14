jQuery(document).ready(function ($) {
    setTimeout(function(){
        jQuery('body').addClass('loaded');

        // Visible class
        function checkVisibility() {
            $('.row.larsvd').each(function () {
                var $this = $(this);
                var elementTop = $this.offset().top;
        
                var viewportTop = $(window).scrollTop();
                var viewportHeight = $(window).height();
                var viewportMidpoint = viewportTop + viewportHeight / 2;
        
                // console.log('Element top:', elementTop);
                // console.log('Viewport midpoint:', viewportMidpoint);
        
                if (elementTop <= viewportMidpoint && elementTop + $this.outerHeight() >= viewportMidpoint) {
                    $this.addClass('visible');
                    // console.log('Element is visible');
                }
            });
        }
        
        $(window).on('scroll', checkVisibility);
        $(document).ready(checkVisibility);  
    },500);
});