<?php

if (!defined('ABSPATH')) exit;

// This function removes all standard roles from Wordpress
function larsvd_remove_standard_roles()
{
    remove_role('subscriber');
    remove_role('contributor');
    remove_role('author');
    remove_role('editor');
}
add_action('init', 'larsvd_remove_standard_roles');


// #######################################################


function larsvd_remove_default_post_type($args, $postType)
{
    if ($postType === 'post') {
        $args['public'] = false;
        $args['show_ui'] = false;
        $args['show_in_menu'] = false;
        $args['show_in_admin_bar'] = false;
        $args['show_in_nav_menus'] = false;
        $args['can_export'] = false;
        $args['has_archive'] = false;
        $args['exclude_from_search'] = true;
        $args['publicly_queryable'] = false;
        $args['show_in_rest'] = false;
    }

    return $args;
}
add_filter('register_post_type_args', 'larsvd_remove_default_post_type', 0, 2);

// ##############

function larsvd_remove_comments_menu()
{
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'larsvd_remove_comments_menu');

// ##############

function larsvd_remove_appearance_menu()
{
    if (!current_user_can('administrator')) {
        remove_menu_page('tools.php');
        remove_menu_page('themes.php');
    }
}
add_action('admin_menu', 'larsvd_remove_appearance_menu');

// ##############

function larsvd_remove_admin_bar_items()
{
    global $wp_admin_bar;

    $remove_items = array(
        'comments',
        'new-media',
        'new-user',
        'customize',
        'wp-logo-external'
    );

    foreach ($remove_items as $item) {
        $wp_admin_bar->remove_node($item);
    }
}

add_action('wp_before_admin_bar_render', 'larsvd_remove_admin_bar_items', 999);



// #######################################################


// This function adds the 'Website beheerder' role
if (!function_exists('larsvd_add_client_role')) {

    function larsvd_add_client_role()
    {

        global $wp_roles;

        if (!isset($wp_roles)) {

            $wp_roles = new WP_Roles();
        }

        $adm = $wp_roles->get_role('administrator');
        $wp_roles->add_role('client', __('Website beheerder', 'larsvd'), $adm->capabilities);
        $web = $wp_roles->get_role('client');

        // Restrictments to plugins
        $web->remove_cap('delete_plugins');
        $web->remove_cap('update_plugins');
        $web->remove_cap('edit_plugins');
        $web->remove_cap('install_plugins');

        // Restrictments to theme
        $web->remove_cap('delete_themes');
        $web->remove_cap('update_themes');
        $web->remove_cap('edit_themes');
        $web->remove_cap('install_themes');
        $web->remove_cap('switch_themes');

        // Restrictments to other
        $web->remove_cap('manage_options');
        $web->remove_cap('export');
        $web->remove_cap('import');
        $web->remove_cap('delete_site');
    }
    add_action('init', 'larsvd_add_client_role');

    // ##############

    // This allows the 'Website beheerder' role to view Ninja Forms submissions
    add_filter('ninja_forms_admin_submissions_capabilities',   'larsvd_nf_subs_capabilities');

    function larsvd_nf_subs_capabilities($cap)
    {
        return 'edit_posts';
    }

    add_filter('ninja_forms_api_allow_get_submissions', 'larsvd_nf_define_permission_level', 10, 2);
    add_filter('ninja_forms_api_allow_delete_submissions', 'larsvd_nf_define_permission_level', 10, 2);
    add_filter('ninja_forms_api_allow_update_submission', 'larsvd_nf_define_permission_level', 10, 2);
    add_filter('ninja_forms_api_allow_handle_extra_submission', 'larsvd_nf_define_permission_level', 10, 2);
    add_filter('ninja_forms_api_allow_email_action', 'larsvd_nf_define_permission_level', 10, 2);

    function larsvd_nf_define_permission_level()
    {
        $allowed = \current_user_can("delete_others_posts");

        return $allowed;
    }
}

// This functions restricts roles from adding administrators
function larsvd_restrict_client_role($all_roles)
{
    $current_user = wp_get_current_user();

    if (!in_array('administrator', $current_user->roles)) {
        unset($all_roles['administrator']);
    }

    return $all_roles;
}
add_filter('editable_roles', 'larsvd_restrict_client_role');


// #######################################################

require_once(get_template_directory() . '/includes/login/login.php');

// #######################################################


// This adds a custom 'Menu' menu-item to Wordpress.
function larsvd_custom_admin_menu_item()
{
    add_menu_page(
        __('Menu\'s', 'textdomain'), // Page title
        __('Menu\'s', 'textdomain'), // Menu title
        'edit_theme_options', // Capability required to access this menu item
        'nav-menus.php', // URL slug
        '', // Function to call (leave empty to just link to nav-menus.php)
        'dashicons-menu', // Icon (you can change it to whatever icon you prefer)
    );

    remove_submenu_page('themes.php', 'nav-menus.php');
}

function larsvd_custom_admin_menu_styles_and_scripts()
{
    echo '<style>
    #adminmenu li.wp-menu-separator {
        display: none;
    }
    </style>';

    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
        var customMenu = document.querySelector("#toplevel_page_nav-menus");
        var appearanceMenu = document.querySelector("#menu-appearance");

        if (customMenu && appearanceMenu && customMenu.classList.contains("current")) {
            appearanceMenu.classList.remove("wp-has-current-submenu", "wp-menu-open", "current");
            customMenu.classList.add("wp-has-current-submenu", "wp-menu-open", "current");
        }
    });
    </script>';
}

add_action('admin_menu', 'larsvd_custom_admin_menu_item');
add_action('admin_head', 'larsvd_custom_admin_menu_styles_and_scripts');


// #######################################################


// This code adds the 'Algemeen' wp menu-item
function larsvd_custom_acf_menu()
{
    if (function_exists('acf_add_options_page')) {
        add_menu_page(
            __('Algemeen', 'textdomain'), // Page title
            __('Algemeen', 'textdomain'), // Menu title
            'manage_options', // Capability required to access this menu item
            'custom-acf-sections', // URL slug
            '', // Function to call (leave empty to just link to nav-menus.php)
            'dashicons-admin-generic', // Icon (you can change it to whatever icon you prefer)
        );

        $acf_option_pages = acf_get_options_pages();

        if ($acf_option_pages) {
            foreach ($acf_option_pages as $acf_option_page) {
                if ($acf_option_page['menu_slug'] !== 'custom-acf-sections') {
                    add_submenu_page(
                        'custom-acf-sections',
                        $acf_option_page['page_title'],
                        $acf_option_page['menu_title'],
                        $acf_option_page['capability'],
                        $acf_option_page['menu_slug']
                    );
                    remove_menu_page($acf_option_page['menu_slug']);
                }
            }
        }

        remove_submenu_page('custom-acf-sections', 'custom-acf-sections');
    }
}

add_action('admin_menu', 'larsvd_custom_acf_menu', 99);


// #######################################################


// This code adds the larsvd_menu() shortcode for the wp-menu
if (!function_exists('larsvd_menu')) {

    function larsvd_menu()
    { ?>

        <nav id='main-navigation' class='block menu'>

            <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu')); ?>

        </nav>

<?php }
}


// #######################################################


function larsvd_replace_dashboard_text()
{
    // Original text
    $original_text = "Thank you for creating with WordPress.";

    // Replacement text
    $replacement_text = "Developed by Lars van Dongen";

    add_filter('admin_footer_text', function () use ($original_text, $replacement_text) {
        return str_replace($original_text, $replacement_text, '<span id="footer-thankyou">' . $replacement_text . '</span>');
    });
}
add_action('admin_init', 'larsvd_replace_dashboard_text');


// #######################################################


// Add custom acf fields
function larsvd_custom_acf_fields()
{
    if (function_exists('acf_get_field')) {
        $custom_fields_dir = get_template_directory() . '/includes/acf/fields/';

        if (is_dir($custom_fields_dir)) {
            $field_files = scandir($custom_fields_dir);

            foreach ($field_files as $file) {
                $file_path = $custom_fields_dir . $file;

                if (is_file($file_path) && pathinfo($file_path, PATHINFO_EXTENSION) === 'php') {
                    include_once $file_path;
                }
            }
        }
    }
}

add_action('acf/include_field_types', 'larsvd_custom_acf_fields');


// #######################################################