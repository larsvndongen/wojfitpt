<?php

$current_name = get_row_layout(); // Name of the row

// -- Settings -- //
$opt = get_sub_field('row8_opt');

include(get_stylesheet_directory() . '/content/settings.php');

?>

<?php if($opt): ?>
    <section class="<?= $row_class ?>">
        <?php if ($row_id) { ?>
            <div class="scrollto" id="<?= $row_id ?>"></div>
        <?php } ?>

        <div class="row-container">
            <div class="blocks-container<?php if($reverse): ?> reverse<?php endif; ?>">
                <div class="blocks-group woocommerce-group">
                    <?php if($opt == '[woocommerce_cart]'): ?>
                        <div class="block cart">
                            <?= do_shortcode($opt); ?>
                        </div>
                    <?php elseif ($opt == '[woocommerce_checkout]'): ?>
                        <div class="block checkout">
                            <?= do_shortcode($opt); ?>
                        </div>
                    <?php elseif ($opt == '[woocommerce_my_account]'): ?>
                        <div class="block my-account">
                            <?= do_shortcode($opt); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>