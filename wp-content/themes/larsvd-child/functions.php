<?php

// TinyMCE Editor
require_once( get_stylesheet_directory() . '/includes/tinymce/config.php' );

// Post-types
$post_types_dir = get_stylesheet_directory() . '/includes/post-types/';

foreach (glob($post_types_dir . '*.php') as $file) {
    require_once $file;
}

// Scripts
$script_files = glob(get_stylesheet_directory() . '/scripts/*.js');

if ($script_files) {
    foreach ($script_files as $script_file) {
        $script_handle = basename($script_file, '.js');
        wp_enqueue_script($script_handle, get_stylesheet_directory_uri() . '/scripts/' . basename($script_file), array('jquery'), null, true);
    }
}