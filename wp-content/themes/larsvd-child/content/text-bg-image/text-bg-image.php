<?php

// -- Row 5 - Content -- //
$image = get_sub_field('row5_image');
$text = get_sub_field('row5_text');
$form = get_sub_field('row5_form');
$button_repeater = 'row5_button_repeater';

// -- Row 5 - Settings -- //
$form_opt = get_sub_field('row5_form_opt');
include(get_stylesheet_directory() . '/content/settings.php');

?>

<section class="<?= $row_class ?>">
    <?php if ($row_id) { ?>
        <div class="scrollto" id="<?= $row_id ?>"></div>
    <?php } ?>

    <?php if ($row_effect && $row_effect_pos) { ?>
        <div class="effect <?= $row_effect_pos ?>"></div>
    <?php } ?>

    <?php if ($image) { ?>
        <?php larsvd_image($image); ?>
    <?php } ?>

    <?php if ($text || $form || have_rows($button_repeater)) { ?>
        <div class="row-container">
            <div class="blocks-container">
                <div class="blocks-group text-group">
                    <?php if ($text) { ?>
                        <div class="block text">
                            <?= $text ?>
                        </div>
                    <?php } ?>

                    <?php if ($form && $form_opt) { ?>
                        <div class="block form">
                            <?= do_shortcode('[ninja_form id=' . $form . ']') ?>
                        </div>
                    <?php } ?>

                    <?php if (have_rows($button_repeater)) { ?>
                        <?php larsvd_button_repeater($button_repeater); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</section>