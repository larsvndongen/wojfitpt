<?php
    $header_text = get_field('header_text', 'option');

    $header_logo = get_field('header_logo', 'option');
    $header_button_repeater = 'header_button_repeater';

    // Theme Settings
    $responsive_menu = get_field('responsive_menu', 'option');
    $sticky_menu = get_field('sticky_menu', 'option');
?>

<header <?php if ($sticky_menu == "yes") { ?>class="sticky-menu"<?php } ?>>
    <?php if ($header_text) { ?>
        <div class="row header row1">
        <div class="row-container">
            <div class="blocks-container">
                <div class="blocks-group text-group">
                    <?= $header_text ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <div class="row header row2">
        <div class="row-container">
            <div class="blocks-container">
                <?php if ($header_logo) { ?>
                    <div class="blocks-group logo-group">
                        <a href="/"></a>

                        <?php larsvd_image($header_logo); ?>
                    </div>
                <?php } ?>

                <div class="blocks-group container-group">
                    <?php larsvd_menu(); ?>

                    <?php if ($responsive_menu) { ?>
                        <?php larsvd_responsive_menu_button(); ?>
                    <?php } ?>

                    <?php if (have_rows($header_button_repeater, 'option')) { ?>
                        <?php larsvd_button_repeater($header_button_repeater); ?>
                    <?php } ?>

                    <div class="block wc-links">
                        <a href="/winkelwagen"><i class="fa-solid fa-cart-shopping"></i></a>
                        <a href="/mijn-account"><i class="fa-solid fa-user"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php if ($responsive_menu) { ?>
    <?php larsvd_responsive_menu('Hoofdmenu'); ?>
<?php } ?>