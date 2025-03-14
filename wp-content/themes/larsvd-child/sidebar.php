<?php
    $sidebar_repeater = 'sidebar_repeater';
?>

<?php if (have_rows($sidebar_repeater, 'option')) { ?>
    <aside class='sidebar'>
        <?php while (have_rows($sidebar_repeater, 'option')) {
                the_row();

                $icon = get_sub_field('icon');
                $link = get_sub_field('link');
            ?>

            <?php if ($icon && $link) { ?>
                <div class="icon">
                    <a href="<?= $link['url'] ?>" target="<?= $link['target'] ?>"><?= $icon ?></a>
                </div>
            <?php } ?>
        <?php } ?>
    </aside>
<?php } ?>