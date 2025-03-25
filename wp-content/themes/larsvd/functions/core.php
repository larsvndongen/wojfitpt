<?php

if (!defined('ABSPATH')) exit;

if (!function_exists('larsvd_setup')) {
    function larsvd_setup()
    {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
	    add_theme_support( 'woocommerce' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'larsvd'),
        ));

        $GLOBALS['content_width'] = apply_filters('larsvd_content_width', 1080);
        add_image_size('featured_preview', 400, 200);
    }
    
    add_action('after_setup_theme', 'larsvd_setup');
}


// #######################################################


// This code defines a global variable to track the ACF plugin activation status
global $acf_active;

// Check if ACF plugin is active
if (function_exists('get_field')) {
    $acf_active = true;
} else {
    $acf_active = false;
}


// #######################################################


// This function dequeues the font-awesome css from Ninja Forms
function larsvd_dequeue_font_awesome_from_nf() {
    wp_dequeue_style('nf-font-awesome');
}
add_action('nf_display_enqueue_scripts', 'larsvd_dequeue_font_awesome_from_nf', 20);


// #######################################################


// This function enqueues files from the child & parent
function larsvd_enqueue_files()
{
    // Basics
    wp_enqueue_script('match-height', get_template_directory_uri() . '/scripts/jquery.matchHeight.js', array('jquery'));
    wp_enqueue_script('animations', get_template_directory_uri() . '/scripts/animations.js', array('jquery'));

    // Swiper.js - https://swiperjs.com/
    wp_enqueue_script('swiper-script', get_template_directory_uri() . '/includes/swiper/swiper-bundle.min.js', array('jquery'));
    wp_enqueue_style('swiper-style', get_template_directory_uri() . '/includes/swiper/swiper-bundle.min.css');

    // Plyr - https://github.com/sampotts/plyr
    wp_enqueue_script('plyr-script', get_template_directory_uri() . '/includes/plyr/plyr.js', array('jquery'));
    wp_enqueue_style('plyr-style', get_template_directory_uri() . '/includes/plyr/plyr.css');

    // GSAP
    wp_enqueue_script('gsap-js', get_template_directory_uri() . '/includes/gsap/gsap.min.js', array(), false, true);
    wp_enqueue_script('gsap-st', get_template_directory_uri() . '/includes/gsap/ScrollTrigger.min.js', array('gsap-js'), false, true);


    // #######################


    // Child-Theme
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css');


    // #######################


    // Parent-Theme

    if (function_exists('get_field')) {
        $sticky_menu = get_field('sticky_menu', 'option');
        $responsive_menu = get_field('responsive_menu', 'option');

        // Sticky-active
        if ($sticky_menu == 'yes') {
            wp_enqueue_script('sticky-active', get_template_directory_uri() . '/scripts/sticky-active.js', array('jquery'));
        }

        // Responsive-Menu (PHP + JS)
        if ($responsive_menu == 'yes') {
            wp_enqueue_script('responsive-menu', get_template_directory_uri() . '/includes/responsive-menu/js/responsive-menu.js', array('jquery'));

            if (file_exists(get_stylesheet_directory() . '/includes/responsive-menu/responsive-menu.php')) {
                require_once(get_stylesheet_directory() . '/includes/responsive-menu/responsive-menu.php');
            } else {
                require_once(get_template_directory() . '/includes/responsive-menu/responsive-menu.php');
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'larsvd_enqueue_files');


// #######################################################


require_once( get_template_directory() . '/functions/includes/wordpress.php' );


// #######################################################