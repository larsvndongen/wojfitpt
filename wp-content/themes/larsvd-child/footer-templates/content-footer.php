<?php
    // Top
    $footer_text1 = get_field('footer_text1', 'option');
    $footer_repeater = 'footer_repeater';

    $footer_text2 = get_field('footer_text2', 'option');

    $footer_sm_title = get_field('footer_sm_title', 'option');
    $footer_sm_repeater = 'footer_sm_repeater';

    // Bottom
    $footer_location_repeater = 'footer_location_repeater';

    $footer_copyright_repeater = 'footer_copyright_repeater';
    $footer_larsvd = get_field('footer_larsvd', 'option');
?>

<footer>
    <?php if ($footer_text1 || have_rows($footer_repeater, 'option') || $footer_text2 || $footer_sm_title || have_rows($footer_sm_repeater, 'option')) { ?>
        <div class="row footer row1">
            <div class="row-container">
                <div class="blocks-container">
                    <?php if ($footer_text1 || have_rows($footer_repeater, 'option') || $footer_text2 || $footer_sm_title || have_rows($footer_sm_repeater, 'option')) : ?>
                        <div class="top">
                            <?php if ($footer_text1 || have_rows(footer_repeater, 'option')) { ?>
                                <div class="blocks-group text-group left">
                                    <?php if ($footer_text1) { ?>
                                        <div class="block text">
                                            <?= $footer_text1 ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (have_rows($footer_repeater, 'option')) { ?>
                                        <div class="block repeater">
                                            <?php while (have_rows($footer_repeater, 'option')) {  the_row();
                                                $icon = get_sub_field('icon');
                                                $link = get_sub_field('link');
                                            ?>

                                            <?php if ($link) { ?>
                                                <article>
                                                    <?php if ($icon) { ?>
                                                        <?= $icon ?>
                                                    <?php } ?>

                                                    <a href="<?= $link['url'] ?>" target='<?= $link['target'] ?>'><?= $link['title'] ?></a>
                                                </article>
                                            <?php } ?>

                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php if ($footer_text2) { ?>
                                <div class="blocks-group text-group middle">
                                    <?php if ($footer_text2) { ?>
                                        <div class="block text">
                                            <?= $footer_text2 ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php if($footer_sm_title || have_rows($footer_sm_repeater, 'option')): ?>
                                <div class="blocks-group social-media-group right">
                                    <?php if($footer_sm_title): ?>
                                        <div class="block title">
                                            <p><strong><?= $footer_sm_title ?></strong></p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(have_rows($footer_sm_repeater, 'option')): ?>
                                        <div class="block repeater">
                                            <?php while(have_rows($footer_sm_repeater, 'option')): the_row();
                                                $icon = get_sub_field('icon');
                                                $link = get_sub_field('link'); 
                                                
                                                ?>

                                                <?php if($icon && $link): ?>
                                                    <a href="<?= $link ?>" target='_blank'><?= $icon ?></a>
                                                <?php endif; ?>
                                                
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="bottom">
                        <?php if (have_rows($footer_location_repeater, 'option')): $count = 0; ?>
                            <?php while (have_rows($footer_location_repeater, 'option')): the_row();
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');

                                    $count++;

                                    $classes = ['left', 'middle', 'right'];
                                    $positionClass = $classes[($count - 1) % 3];
                                ?>
                                
                                    <?php if($title || $text): ?>
                                        <div class="blocks-group text-group <?= $positionClass ?>">
                                            <article class="inner-block location">
                                                <?php if ($title): ?>
                                                    <p>📌  <strong><?= $title ?></strong></p>
                                                <?php endif; ?>

                                                <?php if($text): ?>
                                                    <?= $text ?>
                                                <?php endif; ?>
                                            </article>
                                        </div>
                                    <?php endif; ?>

                                <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (have_rows($footer_copyright_repeater, 'option') || $footer_larsvd) { ?>
        <div class="row footer row2">
            <div class="row-container">
                <div class="blocks-container">
                    <?php if (have_rows($footer_copyright_repeater, 'option')) { 
                            $count = 0;
                        ?>

                        <div class="block left">
                            <?php while (have_rows($footer_copyright_repeater, 'option')) { the_row();
                                $link = get_sub_field('link');
                                $count++;

                                if ($link): ?>
                                    <?php if ($count != 1) { ?>
                                        <span>|</span>
                                    <?php } ?>
                                                                
                                    <a href="<?= esc_url($link['url']) ?>" target="<?= esc_attr($link['target']) ?>">
                                        <?= esc_html($link['title']) ?>
                                    </a>
                                <?php endif; ?>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if ($footer_larsvd) { ?>
                        <div class="block right">
                            <p>Ontwikkeld door <a target='_blank' href="https://www.larsvandongen.nl/">Lars van Dongen</a></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</footer>

<?php include (get_stylesheet_directory() . '/sidebar.php'); ?>