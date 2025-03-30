<?php

// This removes the H1-element from the WYSIWYG-editor
if( ! function_exists( 'remove_h1_from_editor' ) ) {
    function remove_h1_from_editor( $settings ) {
        $settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre;';
        return $settings;

    }
    add_filter( 'tiny_mce_before_init', 'remove_h1_from_editor' );
}


// #######################################################

// This function adss custom colours to the WYSIWYG-editor
function my_mce4_options($init)
{

    $custom_colours = '
        "2674E1", "Blauw",
        "2365c1", "Donkerblauw",
        "000", "Zwart",

    ';

    $init['textcolor_map'] = '[' . $custom_colours . ']';
    $init['textcolor_rows'] = 4;

    return $init;
}

add_filter('tiny_mce_before_init', 'my_mce4_options');

// #######################################################