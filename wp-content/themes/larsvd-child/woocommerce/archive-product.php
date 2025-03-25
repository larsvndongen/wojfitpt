<?php

global $acf_active;

$ID = wc_get_page_id('shop'); 
$flex_content = 'acf_flexible_content';

get_header();

?>

<main>
    <div class="loader">
        <div class="spinner"></div>
    </div>

    <?php if ($acf_active) { ?>
        <?php while (have_posts()) :
            the_post(); ?>

            <?php if (have_rows($flex_content, $ID)) { ?>

                <?php while (have_rows($flex_content, $ID)) {
                    the_row();

                    $row = get_row_layout();

                ?>

                    <?php include(get_stylesheet_directory() . "/content/$row/$row.php"); ?>

                <?php } ?>

            <?php } ?>

        <?php endwhile; ?>
    <?php } ?>

</main>

<?php get_footer(); ?>