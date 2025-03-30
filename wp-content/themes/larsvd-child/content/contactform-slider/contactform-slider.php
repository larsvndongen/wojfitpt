<?php
$current_name = get_row_layout(); // Name of the row


// -- Content -- //
$text = get_sub_field('row7_text');
$form = get_sub_field('row7_form');

$bgimage = get_sub_field('row7_bgimage');
$slider = 'row7_slider';
if (have_rows($slider)):
    $count = 0;
    while (have_rows($slider)):
        the_row();
        $image = get_sub_field('image');
        if ($image):
            $count++;
        endif;
    endwhile;
endif;

// -- Settings -- //
$reverse = get_sub_field('row7_reverse');

include(get_stylesheet_directory() . '/content/settings.php');

?>

<section class="<?= $row_class ?> <?php if ($form) {?>has-form<?php } ?>">
    <?php if ($row_id) { ?>
        <div class="scrollto" id="<?= $row_id ?>"></div>
    <?php } ?>

    <div class="row-container">
        <?php if ($bgimage): ?>
            <div class="bgimage<?php if($reverse): ?> reverse<?php endif; ?>">
                <img src="<?= $bgimage['url'] ?>" alt="<?= $bgimage['alt'] ?>">
            </div>
        <?php endif; ?>

        <div class="blocks-container<?php if($reverse): ?> reverse<?php endif; ?>">
            <?php if (have_rows($slider)): ?>
                <div class="blocks-group image-group<?php if ($count > 1) { ?> swiper<?php } ?>">
                    <div class="swiper-wrapper">
                        <?php while (have_rows($slider)):
                            the_row();
                            $image = get_sub_field('image');
                            ?>
                            <?php if ($image): ?>
                                <div class="swiper-slide">
                                    <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($text || $form): ?>
                <div class="blocks-group text-group fade-bottom">
                    <?php if ($text): ?>
                        <div class="block text">
                            <?= $text ?>
                        </div>
                    <?php endif; ?>

                    <?php if($form): ?>
                        <div class="block form">
                            <?php echo do_shortcode('[ninja_form id=' . $form . ']'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>

</section>