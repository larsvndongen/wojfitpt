<?php

global $acf_active;
$flex_content = 'acf_flexible_content';

get_header();

?>

<main>

    <?php if ($acf_active) { ?>
        <?php while (have_posts()) :
            the_post(); ?>

            <?php if (have_rows($flex_content)) { ?>

                <?php while (have_rows($flex_content)) {
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