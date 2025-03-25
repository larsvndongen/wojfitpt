<?php
$current_name = get_row_layout(); // Name of the row


// -- Content -- //
$subtitle      = get_sub_field('row1_subtitle');
$text       = get_sub_field('row1_text');
$button_repeater = 'row1_button_repeater';

$bgimage = get_sub_field('row1_bgimage');
$image_repeater = 'row1_repeater';
if(have_rows($image_repeater)): $count = 0;
    while(have_rows($image_repeater)): the_row();
        $image = get_sub_field('image');
        if($image):
            $count++;
        endif;
    endwhile;
endif;

// -- Settings -- //
include(get_stylesheet_directory() . '/content/settings.php');

?>

<section class="<?= $row_class ?>">
    <?php if ($row_id) { ?>
        <div class="scrollto" id="<?= $row_id ?>"></div>
    <?php } ?>

    <div class="row-container">
        <?php if($bgimage): ?>
            <div class="bgimage">
                <img src="<?= $bgimage['url'] ?>" alt="<?= $bgimage['alt'] ?>">
            </div>
        <?php endif; ?>

        <div class="blocks-container<?php if ($bgimage || !have_rows($image_repeater)) { ?> padding<?php } ?>">
            <?php if($subtitle || $text || have_rows($button_repeater)): ?>
                <div class="blocks-group text-group<?php if(!$bgimage) { ?> fade-bottom<?php } ?>">
                    <?php if($subtitle): ?>
                        <div class="block subtitle">
                            <p><?= $subtitle ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if($text): ?>
                        <div class="block text">
                            <?= $text ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if(have_rows($button_repeater)): ?>
                        <?= larsvd_button_repeater($button_repeater); ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if(have_rows($image_repeater) && !$bgimage): ?>
                <div class="blocks-group image-group<?php if($count > 1) { ?> swiper<?php } ?>">
                    <div class="swiper-wrapper">
                        <?php while(have_rows($image_repeater)): the_row(); 
                            $image = get_sub_field('image');
                        ?>
                            <?php if($image): ?>
                                <div class="swiper-slide">
                                    <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>

</section>