<?php

// -- Row 2 - Content -- //
$image = get_sub_field('row2_image');
$video = get_sub_field('row2_video');
$text = get_sub_field('row2_text');
$button_repeater = 'row2_button_repeater';

// -- Row 2 - Settings -- //
$choice = get_sub_field('row2_choice');
$image_opt = get_sub_field('row2_image_opt');
$form_opt = get_sub_field('row2_form_opt');

if ($form_opt) {
    $form = get_sub_field('row2_form');
}

$reverse = get_sub_field('row2_reverse');
if (!$reverse) {
    $fade_class = 'fade-right';
} else {
    $fade_class = 'fade-left';
}

$row_effect = get_sub_field('effect');
$row_effect_color = get_sub_field('effect_color');

include(get_stylesheet_directory() . '/content/settings.php');

?>

<?php if ($text || $form) { ?>
    <section class="<?= $row_class ?>">
        <?php if ($row_id) { ?>
            <div class="scrollto" id="<?= $row_id ?>"></div>
        <?php } ?>

        <div class="row-container">
            <div class="blocks-container <?php if ($reverse) { ?>reverse<?php } ?>">
                <div class="blocks-group text-group">
                    <?php if($text): ?>
                        <div class="block text<?php if ($row_effect && $row_effect_color) { ?> effect <?= $row_effect_color ?><?php } ?>">
                            <?= $text ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($form) { ?>
                        <div class="block form">
                            <?php echo do_shortcode('[ninja_form id=' . $form . ']'); ?>
                        </div>
                    <?php } ?>

                    <?php if (have_rows($button_repeater)) { ?>
                        <?php larsvd_button_repeater($button_repeater); ?>
                    <?php } ?>
                </div>

                <?php if ($image) { ?>
                    <div class="blocks-group image-group <?= $fade_class ?><?php if ($image_opt) { ?> image-contain<?php } ?> effect">
                        <?php larsvd_image($image); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>