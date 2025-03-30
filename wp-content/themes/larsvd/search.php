<?php get_header(); ?>

<main>
    <div class="loader">
        <div class="spinner"></div>
    </div>

    <section class='row search row1'>

        <div class='row-container'>

            <div class='blocks-container'>

                <div class='block title'>

                    <h3>Zoekresultaten voor: <?= get_search_query() ?></h3>

                </div>

                <div class='block content'>

                    <?php if (have_posts()) { ?>

                        <?php while (have_posts()) {
                            the_post();

                            $url             = get_the_permalink();
                            $title             = get_the_title();

                            $search_text     = get_field('search_text');

                        ?>

                            <article>

                                <a href="<?php echo $url; ?>">

                                    <div class='search-title'>

                                        <h4><?php echo $title; ?></h4>

                                        <p><?= $search_text ?></p>

                                    </div>

                                </a>

                            </article>

                        <?php } ?>

                    <?php } else { ?>

                        <p>Geen resultaten</p>

                    <?php } ?>

                </div>

            </div>

        </div>

    </section>

</main>

<?php get_footer(); ?>