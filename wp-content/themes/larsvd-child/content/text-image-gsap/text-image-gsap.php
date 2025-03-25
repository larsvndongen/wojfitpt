<?php

// -- Row 3 - Content -- //
$repeater = 'row3_repeater';

// -- Row 3 - Settings -- //
include(get_stylesheet_directory() . '/content/settings.php');

?>

<?php if (have_rows($repeater)): ?>
    <section class="<?= $row_class ?>">
        <?php if ($row_id): ?>
            <div class="scrollto" id="<?= $row_id ?>"></div>
        <?php endif; ?>

        <div class="gsap-container">
            <ul class="block repeater horizontal">
                <?php while (have_rows($repeater)): the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $link = get_sub_field('link');
                    $image = get_sub_field('image');
                ?>

                    <?php if ($title || $text || $image): ?>
                        <li class="slide <?= $row_set_padding ?>">
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

            <div class="block progress before">
                <div class="custom-row-container">
                    <div class="progress-fill"></div>

                    <?php
                    $count = 0;

                    while (have_rows($repeater)): the_row();
                        $title = get_sub_field('title');
                        $count++;

                    ?>

                        <article>
                            <div class="progress-ball progress-<?= $count ?>"></div>
                            <?php if ($title): ?>
                                <p><?= $title ?></p>
                            <?php endif; ?>
                        </article>

                    <?php endwhile; ?>
                </div>

                <div class="inner-block">
                    <div class="progress-bar"></div>
                </div>

            </div>
        </div>

        <div class="responsive">
            <ul class="block repeater">
                <?php while (have_rows($repeater)): the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $link = get_sub_field('link');
                    $image = get_sub_field('image');

                ?>

                    <?php if ($title || $text || $image): ?>
                        <li class="slide padding-<?= $padding ?>">
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

                                            <?php if($popup_title || $popup_text): ?>
                                                <div class="block shortcut">
                                                    <h5>Shortcut <i class="fa-solid fa-arrow-right"></i></h5>

                                                    <div class="pop-up">
                                                        <?php if($popup_title): ?>
                                                            <div class="title">
                                                                <p><strong>
                                                                <?php if($popup_icon): ?>
                                                                    <?= $popup_icon ?> 
                                                                <?php endif; ?>

                                                                <?= $popup_title ?>
                                                            </strong></p>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($popup_text): ?>
                                                            <div class="text">
                                                                <p><?= $popup_text ?></p>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
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