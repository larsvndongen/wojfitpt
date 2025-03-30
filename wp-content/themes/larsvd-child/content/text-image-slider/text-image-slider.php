<?php

// -- Content -- //
$repeater = 'row3_repeater';
if (have_rows($repeater)):
    $count = 0;
    while (have_rows($repeater)):
        the_row();
        $image = get_sub_field('image');
        if ($image):
            $count++;
        endif;
    endwhile;
endif;

// -- Settings -- //
include(get_stylesheet_directory() . '/content/settings.php');

?>

<?php if (have_rows($repeater)): ?>
    <section class="<?= $row_class ?>">
        <?php if ($row_id): ?>
            <div class="scrollto" id="<?= $row_id ?>"></div>
        <?php endif; ?>

        <div class="swiper mySwiper">
            <?php if ($count > 1): ?>
                <div class="swiper-pagination">
                    <?php while (have_rows($repeater)): the_row();
                        $title = get_sub_field('title'); 
                    ?>
                        <?php if($title): ?>
                            <span><?= $title ?></span>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <ul class="swiper-wrapper">
                <?php while (have_rows($repeater)):
                    the_row();

                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $link = get_sub_field('link');
                    $image = get_sub_field('image');

                    ?>

                    <?php if ($title || $text || $image): ?>
                        <li class="swiper-slide <?= $row_set_padding ?>">
                            <div class="row-container">
                                <div class="blocks-container">
                                    <?php if ($title || $text): ?>
                                        <div class="blocks-group text-group">
                                            <?php if ($title): ?>
                                                <div class="block title">
                                                    <h4><?= $title ?></h4>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($text): ?>
                                                <div class="block text">
                                                    <?= $text ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($link): ?>
                                                <div class="block link">
                                                    <a href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($image): ?>
                                        <div class="blocks-group image-group">
                                            <div class="block image">
                                                <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endwhile; ?>
            </ul>
        </div>

    </section>
<?php endif; ?>