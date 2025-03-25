<?php

// -- Row 4 - Content -- //
$text = get_sub_field('row4_text');
$button_repeater = 'row4_button_repeater';
$posts = get_sub_field('row4_posts');

// -- Row 4 - Settings -- //
$view = get_sub_field('row4_view');
include(get_stylesheet_directory() . '/content/settings.php');

?>

<section class="<?= $row_class ?>">
    <?php if ($row_id) { ?>
        <div class="scrollto" id="<?= $row_id ?>"></div>
    <?php } ?>

    <?php if(($row_bgcolor == 'gray' || $row_bgcolor == 'black') && ($row_set_padding == 'padding-opt3' || $row_set_padding == 'padding-opt4')): ?>
        <?php if ($view == 'simple'): ?>
            <img src="/wp-content/themes/larsvd-child/content/products/dumbbell.png" alt="Dumbbell">
        <?php endif; ?>
    <?php endif; ?>

    <div class="row-container">
        <div class="blocks-container">
            <?php if ($text) { ?>
                <div class="blocks-group text-group <?= $view ?>">
                    <?php if($text): ?>
                        <div class="block text">
                            <?= $text ?>
                        </div>
                    <?php endif; ?>

                    <?php if(have_rows($button_repeater) && $view == 'detailled'): ?>
                        <?php larsvd_button_repeater($button_repeater); ?>
                    <?php endif; ?>
                </div>
            <?php } ?>
            
            <?php if ($posts) { ?>
                <div class="blocks-group product-group <?= $view ?> fade-bottom">
                    <?php foreach ($posts as $ID) { 
                            $product = wc_get_product($ID);
                            $title = get_the_title($ID);
	
                            $icon = get_field('product_icon', $ID);
                            $discount = get_field('product_discount', $ID);

                            $text = get_field('product_preview_text', $ID);

                            $target = get_field('product_target', $ID);
                            $usp_repeater = 'product_usp_rep';
                        ?>

                        <?php if ($icon || $title || $text) { ?>
                            <article class="product-item <?= $row_bgcolor ?>">
                                <?php if($icon || $title || $text): ?>
                                    <div class="block info">
                                        <?php if ($icon || $discount) { ?>
                                            <div class="inner-block top">
                                                <?php if ($icon) { ?>
                                                    <div class="icon">
                                                        <?= $icon ?>
                                                    </div>
                                                <?php } ?>

                                                <?php if ($discount && $discount > 0) { ?>
                                                    <div class="discount">
                                                        <p><?= $discount ?>% korting</p>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>

                                        <?php if ($title) { ?>
                                            <div class="inner-block bottom">
                                                <div class="title">
                                                    <p><strong><?= $title ?></strong></p>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if ($text) { ?>
                                            <div class="inner-block text">
                                                <?= $text ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (($view == 'detailled') && ($target || have_rows($usp_repeater, $ID) || $options || have_rows($product_button_repeater, $ID))): ?>
                                    <div class="block detailled">
                                        <?php if ($target): ?>
                                            <div class="inner-block target">
                                                <p><strong>Voor wie?</strong></p>
                                                <?= $target ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (have_rows($usp_repeater, $ID)): ?>
                                            <div class="inner-block usp">
                                                <p><strong>Wat krijg je?</strong></p>

                                                <div class="repeater">
                                                    <?php while (have_rows($usp_repeater, $ID)): the_row();
                                                        $icon_opt = get_sub_field('icon_opt');
                                                        $text = get_sub_field('text');
                                                    ?>
                                                        <?php if ($icon_opt && $text): ?>
                                                            <article class="<?= ($icon_opt == 'included') ? 'included' : 'excluded' ?>">
                                                                <div class="icon">
                                                                    <?php if ($icon_opt == 'included'): ?>
                                                                        <i class="fa-solid fa-check"></i>
                                                                    <?php else: ?>
                                                                        <i class="fa-solid fa-xmark"></i>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="text">
                                                                    <?= $text ?>
                                                                </div>
                                                            </article>
                                                        <?php endif; ?>
                                                    <?php endwhile; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($product && $product->is_type('variable')) { ?>
                                            <div class="inner-block wc">
                                                <p class="price" data-default-price="<?php echo esc_attr($product->get_price_html()); ?>">
                                                    <?php echo $product->get_price_html(); ?>
                                                </p>

                                                <form class="variations_form cart" method="post" enctype="multipart/form-data"
                                                    data-product_id="<?php echo esc_attr($product_id); ?>"
                                                    data-product_variations="<?php echo htmlspecialchars(json_encode($product->get_available_variations())); ?>">
                                                    
                                                    <?php woocommerce_variable_add_to_cart(); ?>
                                                </form>
                                            </div>
                                            <?php
                                        } ?>

                                    </div>
                                <?php endif; ?>

                                <?php if (($permalink && $permalink_opt) || have_rows($product_button_repeater, $ID)) { ?>
                                    <div class="block button-repeater">
                                        <?php if ($permalink && $permalink_opt) { ?>
                                            <a href="<?= $permalink ?>" class="button gray">Lees meer</a>
                                        <?php } ?>

                                        <?php if (have_rows($product_button_repeater, $ID)) { ?>
                                            <?php while(have_rows($product_button_repeater, $ID)): the_row();
                                                $link = get_sub_field('link');
                                                $color = get_sub_field('color');

                                                if ($link && $color) { ?>
                                                    <a href="<?= $link['url'] ?>" target="<?= $link['target'] ?>" class="button <?= $color ?>"><?= $link['title'] ?></a>
                                                <?php } ?>
                                            <?php endwhile; ?>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </article>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (have_rows($button_repeater) && $view == 'simple') { ?>
                <div class="blocks-group button-group <?= $view ?>">
                    <?php larsvd_button_repeater($button_repeater); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>