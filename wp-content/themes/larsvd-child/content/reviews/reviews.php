<?php

// -- Row 6 - Content -- //
$text = get_sub_field('row6_text');
$button_repeater = 'row6_button_repeater';

$args = array(
    'post_type' => 'reviews',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
);
$query = new WP_Query($args);
if ($query->have_posts()):
    $count = 0;

    while ($query->have_posts()): $query->the_post();
        $count++;
    endwhile;

    wp_reset_postdata();
endif;

// -- Row 6 - Settings -- //
$reverse = get_sub_field('row6_reverse');
if (!$reverse) {
    $fade_class = 'fade-right';
} else {
    $fade_class = 'fade-left';
}

$row_effect = get_sub_field('effect');
$row_effect_color = get_sub_field('effect_color');

include(get_stylesheet_directory() . '/content/settings.php');

?>

<?php if ($text || $query->have_posts()) { ?>
    <section class="<?= $row_class ?>">
        <?php if ($row_id) { ?>
            <div class="scrollto" id="<?= $row_id ?>"></div>
        <?php } ?>

        <div class="row-container">
            <div class="blocks-container <?php if ($reverse) { ?>reverse<?php } ?>">
                <div class="blocks-group text-group">
                    <?php if ($text): ?>
                        <div
                            class="block text<?php if ($row_effect && $row_effect_color) { ?> effect <?= $row_effect_color ?><?php } ?>">
                            <?= $text ?>
                        </div>
                    <?php endif; ?>

                    <?php if (have_rows($button_repeater)) { ?>
                        <?php larsvd_button_repeater($button_repeater); ?>
                    <?php } ?>
                </div>

                <?php if ($query->have_posts()) { ?>
                    <div class="blocks-group post-group<?php if ($count > 1): ?> swiper<?php endif; ?> <?= $fade_class ?>">
                        <div class="<?php if ($count > 1): ?> swiper<?php endif; ?>">
                            <div class="swiper-wrapper">
                                <?php while ($query->have_posts()):
                                    $query->the_post();
                                    $ID = get_the_ID();

                                    $name = get_the_title($ID);
                                    $person_image = get_field('review_person_image', $ID);
                                    $person_location = get_field('review_person_location', $ID);
                                    $review_rating = get_field('review_rating', $ID);
                                    $review_text = get_field('review_text', $ID);

                                    ?>

                                    <?php if ($name || $person_image || $person_location || $review_rating || $review_text): ?>
                                        <article class="swiper-slide">
                                            <?php if ($review_rating && $review_rating > 0): ?>
                                                <div class="block stars">
                                                    <?php for ($i = 0; $i < $review_rating; $i++): ?>
                                                        <i class="fa-solid fa-star"></i>
                                                    <?php endfor; ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($review_text): ?>
                                                <div class="block text">
                                                    <p><?= $review_text ?></p>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($person_image || $person_location || $name): ?>
                                                <div class="block person">
                                                    <?php if ($person_image): ?>
                                                        <div class="inner-block image">
                                                            <?= larsvd_image($person_image); ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if ($name || $person_location): ?>
                                                        <div class="inner-block info">
                                                            <?php if ($name): ?>
                                                                <div class="name">
                                                                    <p><strong><?= $name ?></strong></p>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if ($person_location): ?>
                                                                <div class="location">
                                                                    <p><?= $person_location ?></p>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </article>
                                    <?php endif; ?>

                                <?php endwhile; ?>
                            </div>
                        </div>

                        <?php if ($count > 1): ?>
                            <div class="swiper-button prev">
                                <i class="fa-solid fa-chevron-left"></i>
                            </div>
                            
                            <div class="swiper-button next">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>
                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>