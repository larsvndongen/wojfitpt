<?php

if (!defined('ABSPATH')) exit;

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


function larsvd_image($image_data)
{
    if (!empty($image_data['url'])) {
        $img_tag = '<img src="' . esc_url($image_data['url']) . '"';

        $alt_text = !empty($image_data['alt']) ? esc_attr($image_data['alt']) : '';
        $img_tag .= ' alt="' . $alt_text . '"';

        $img_tag .= !empty($image_data['title']) ? ' title="' . esc_attr($image_data['title']) . '"' : '';
        $img_tag .= !empty($image_data['caption']) ? ' caption="' . esc_attr($image_data['caption']) . '"' : '';
        $img_tag .= !empty($image_data['description']) ? ' description="' . esc_attr($image_data['description']) . '"' : '';
        $img_tag .= '>';

        echo $img_tag;
    }
}


// #######################################################


function larsvd_button_repeater($atts)
{
    $button_repeater = $atts;
    $output = '';

    if (function_exists('have_rows')) {
        if (have_rows($button_repeater)) { ?>
            <div class="block button-repeater">
                <?php while (have_rows($button_repeater)) {
                    the_row();

                    $link = get_sub_field('link');
                    $color = get_sub_field('color');
                ?>

                    <?php if ($link && $color) { ?>
                        <a class="button <?= $color ?>" href="<?= $link['url'] ?>" target="<?= $link['target'] ?>"><?= $link['title'] ?></a>
                    <?php } ?>

                <?php } ?>
            </div>
        <?php } else if (have_rows($button_repeater, 'option')) { ?>
            <div class="block button-repeater">
                <?php while (have_rows($button_repeater, 'option')) {
                    the_row();

                    $link = get_sub_field('link');
                    $color = get_sub_field('color');
                ?>

                    <?php if ($link && $color) { ?>
                        <a class="button <?= $color ?>" href="<?= $link['url'] ?>" target="<?= $link['target'] ?>"><?= $link['title'] ?></a>
                    <?php } ?>

                <?php } ?>
            </div>
        <?php } ?>
    <?php } ?>
<?php }

add_shortcode('button_repeater_count', 'larsvd_button_repeater');


// #######################################################