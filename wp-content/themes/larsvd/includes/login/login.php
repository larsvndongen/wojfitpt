<?php

function larsvd_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/includes/login/style.css" />';
}
add_action('login_head', 'larsvd_custom_login');


function larsvd_loginlogo_url($url) {
    return 'https://www.larsvandongen.nl';
}
add_filter( 'login_headerurl', 'larsvd_loginlogo_url' );


function larsvd_custom_footer() {
    ?>
		<div class="login-footer">
            <p class="contact">Bij vragen of problemen, neem contact op via <a href="mailto:zakelijk@larsvandongen.nl">zakelijk@larsvandongen.nl</a></p>
        </div>
    <?php
}
add_action( 'login_footer', 'larsvd_custom_footer' );