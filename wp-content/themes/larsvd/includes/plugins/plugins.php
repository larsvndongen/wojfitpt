<?php

if (!defined('ABSPATH')) exit;

require_once 'plugin-activation.php';

if( ! function_exists( 'larsvd_plugin_extra' ) ) {

    function larsvd_plugin_extra( ) {
        $plugins = array(
            array(
                'name'      => 'Admin and Site Enhancements (ASE)',
                'slug'      => 'admin-site-enhancements',
                'required'  => true,
            ),

            array(
                'name'      => 'LiteSpeed Cache',
                'slug'      => 'litespeed-cache',
                'required'  => true,
            ),

            array(
                'name'      => 'Manage WP Worker',
                'slug'      => 'worker',
                'required'  => true,
            ),

            array(
                'name'      => 'WP 2FA',
                'slug'      => 'wp-2fa',
                'required'  => false,
            ),

            array(
                'name'      => 'WP-SCSS',
                'slug'      => 'wp-scss',
                'required'  => true,
            ),

            array(
                'name'      => 'Imagify',
                'slug'      => 'imagify',
                'required'  => true,
            ),

            array(
                'name'      => 'Advanced Custom Fields (ACF) PRO',
                'slug'      => 'acf',
                'source'    => get_template_directory() . '/includes/acf/advanced-custom-fields-pro.zip',
                'required'  => false,
                'version'   => '6.2.10',
                'force_activation'   => false, 
            ),

            array(
                'name'      => 'Font Awesome',
                'slug'      => 'font-awesome',
                'required'  => true,
            ),

            array(
                'name'      => 'Advanced Custom Fields: Font Awesome Field',
                'slug'      => 'advanced-custom-fields-font-awesome',
                'required'  => false,
            ),

            array(
                'name'      => 'ACF: Better Search',
                'slug'      => 'acf-better-search',
                'required'  => false,
            ),

            array(
                'name'      => 'Klassieke editor',
                'slug'      => 'classic-editor',
                'required'  => true,
            ),

            array(
                'name'      => 'Ninja Forms',
                'slug'      => 'ninja-forms',
                'required'  => false,
            ),

            array(
                'name'      => 'ACF: Ninjaforms Add-on',
                'slug'      => 'acf-ninjaforms-add-on',
                'required'  => false,
            ),

            array(
                'name'      => 'Post SMTP',
                'slug'      => 'post-smtp',
                'required'  => true,
            ),

        );

        $config = array(
            'id'           => 'tgmpa',                 
            'default_path' => '',                      
            'menu'         => 'install-plugins-theme', 
            'parent_slug'  => 'plugins.php',            
            'capability'   => 'edit_theme_options',    
            'has_notices'  => true,                    
            'dismissable'  => true,                    
            'dismiss_msg'  => '',                     
            'is_automatic' => true,                   
            'message'      => '',                    
        );

        tgmpa( $plugins, $config );
    }

}

add_action( 'tgmpa_register', 'larsvd_plugin_extra' );


// #######################################################