jQuery(document).ready(function($){
    // jQuery("").matchHeight({
	// 	property: "min-height",
	// 	byRow: true,
    //     target: '',
	// });

	// const players = Plyr.setup('#player');   
	// player.play();

	// WooCommerce Price
	$('.variations_form').on('found_variation', function (event, variation) {
        // Zoek de huidige prijsweergave en overschrijf de inhoud met de nieuwe prijs
        $(this).closest('.inner-block').find('.price').html(variation.price_html);
    });

    $('.variations_form').on('reset_data', function () {
        // Herstel de standaard prijs wanneer variaties worden gereset
        var default_price = $(this).closest('.inner-block').find('.price').data('default-price');
        $(this).closest('.inner-block').find('.price').html(default_price);
    });
});