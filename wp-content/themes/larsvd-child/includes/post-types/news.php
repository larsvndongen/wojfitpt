<?php

// function nieuws_post_type()
// {
//     $tag_default        = 'Nieuwsberichten';
//     $tag_single         = 'Nieuwsbericht';
//     $tag_low_single     = 'nieuws';

//     $labels = array(
//         'name'                  => _x($tag_default, 'Post Type General Name', 'minimal210-child'),
//         'singular_name'         => _x($tag_default, 'Post Type Singular Name', 'minimal210-child'),
//         'menu_name'             => __($tag_default, 'minimal210-child'),
//         'name_admin_bar'        => __($tag_default, 'minimal210-child'),
//         'archives'              => __($tag_single . ' archief', 'minimal210-child'),
//         'attributes'            => __($tag_single . ' attributen', 'minimal210-child'),
//         'parent_item_colon'     => __('Parent ' . $tag_single . ' item:', 'minimal210-child'),
//         'all_items'             => __('Alle ' . $tag_default . ' ', 'minimal210-child'),
//         'add_new_item'          => __('Voeg ' . $tag_single . ' toe', 'minimal210-child'),
//         'add_new'               => __('Voeg ' . $tag_single . ' toe', 'minimal210-child'),
//         'new_item'              => __('New ' . $tag_single . ' item', 'minimal210-child'),
//         'edit_item'             => __('Edit ' . $tag_single . ' item', 'minimal210-child'),
//         'update_item'           => __('Update ' . $tag_single . ' Item', 'minimal210-child'),
//         'view_item'             => __('View ' . $tag_single . ' item', 'minimal210-child'),
//         'view_items'            => __('View ' . $tag_single . ' items', 'minimal210-child'),
//         'search_items'          => __('Search ' . $tag_single . ' item', 'minimal210-child'),
//         'not_found'             => __('Not found', 'minimal210-child'),
//         'not_found_in_trash'    => __($tag_default . ' not found in trash', 'minimal210-child'),
//         'featured_image'        => __('Featured image', 'minimal210-child'),
//         'set_featured_image'    => __('Set featured image', 'minimal210-child'),
//         'remove_featured_image' => __('Remove featured image', 'minimal210-child'),
//         'use_featured_image'    => __('Use as featured image', 'minimal210-child'),
//         'insert_into_item'      => __('Insert into ' . $tag_single . ' item', 'minimal210-child'),
//         'uploaded_to_this_item' => __('Uploaded to this ' . $tag_single . ' item', 'minimal210-child'),
//         'items_list'            => __($tag_single . ' list', 'minimal210-child'),
//         'items_list_navigation' => __('Items list navigation', 'minimal210-child'),
//         'filter_items_list'     => __('Filter items list', 'minimal210-child'),
//     );

//     $args = array(
//         'label'                 => __($tag_default, 'minimal210-child'),
//         'description'           => __($tag_single . ' messages', 'minimal210-child'),
//         'labels'                => $labels,
//         'supports'              => array('title'),
//         'taxonomies'            => array('sub-category'),
//         'hierarchical'          => false,
//         'public'                => true,
//         'show_ui'               => true,
//         'show_in_menu'          => true,
//         'menu_position'         => 5,
//         'menu_icon'             => 'dashicons-format-aside',
//         'show_in_admin_bar'     => true,
//         'show_in_nav_menus'     => true,
//         'can_export'            => true,
//         'has_archive'           => false,
//         'exclude_from_search'   => false,
//         'publicly_queryable'    => true,
//         'capability_type'       => 'page',

//     );
//     register_post_type($tag_low_single, $args);
// }
// add_action('init', 'nieuws_post_type', 0);