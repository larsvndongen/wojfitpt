<?php global $acf_active; ?>

<?php
if ($acf_active) {
    $site_icon = get_field('site_icon', 'option');
    $site_description = get_field('site_description', 'option');

    $header_code = get_field('header_code', 'option');
    $body_code = get_field('body_code', 'option');
}
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Lars van Dongen">
    <?php if ($site_description) { ?>
        <meta name="description" content="<?= $site_description ?>">
    <?php } ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php if ($site_icon) { ?>
        <link rel="shortcut icon" href="<?= $site_icon ?>" type="image/x-icon" />
    <?php } ?>

    <?php if ($header_code) { ?>
        <?= $header_code ?>
    <?php } ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php if ($body_code) { ?>
        <?= $body_code ?>
    <?php } ?>

    <div id="wrapper">

        <?php

        if ($acf_active) {
            get_template_part('header-templates/content', 'header');
        }

        ?>