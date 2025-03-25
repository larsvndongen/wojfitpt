<?php

// Responsive-Menu
if( ! function_exists( 'larsvd_responsive_menu' ) ) {

    function larsvd_responsive_menu( $menu_name = 'menu-1' ) {
        if (function_exists('get_field')) {
            $header_logo = get_field('header_logo', 'option');
            $header_button_repeater = 'header_button_repeater';

            $responsive_menu_searchform = get_field('responsive_menu_searchform', 'option');
        } else {
            $header_logo = false;
            $header_button_repeater = false;

            $responsive_menu_searchform = false;
        }

        $locations = get_nav_menu_locations();
        $menu_exists = false;
        
        if (isset($locations[$menu_name])) {
            $menu_exists = true;
        } else {
            $menus = wp_get_nav_menus();
			
            foreach ($menus as $menu) {
                if ($menu->name == $menu_name) {
                    $menu_exists = true;
                    $menu_name = $menu->slug;
                    break;
                }
            }
        }

        if ($menu_exists) {
            ?>

            <div class='responsive-menu' id='<?= $menu_name ?>'>

                <div class="block top">
                    <?php if ($header_logo) { ?>
                        <div class="inner-block image">
                            <a href="/"></a>

                            <?php larsvd_image($header_logo); ?>
                        </div>
                    <?php } ?>

                    <div class="inner-block close-btn">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>

                <div class="block menu">
                    <?php wp_nav_menu( array( 'menu' => $menu_name, 'menu_id' => 'primary-menu' ) ); ?>
                </div>

                <?php if (have_rows($header_button_repeater, 'option')) { ?>
                    <?php larsvd_button_repeater($header_button_repeater); ?>
                <?php } ?>

                <div class="block wc-links">
                    <a href="/winkelwagen">Winkelwagen <i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="/mijn-account">Mijn Account <i class="fa-solid fa-user"></i></a>
                </div>

                <?php if ($responsive_menu_searchform == 'yes') { ?>
                    <div class="block searchform">
                        <?php get_search_form(); ?>
                    </div>
                <?php } ?>
            </div>

            <?php
        }
    }
}


// #######################################################


// Responsive-Menu trigger button
function larsvd_responsive_menu_button() {
    echo "<div id='trigger-btn' class='responsive-menu-trigger-btn'><i class='fa fa-bars' aria-hidden='true'></i></div>";
}


// #######################################################