<?php global $acf_active; ?>

<?php

    if ($acf_active) {
        get_template_part('footer-templates/content', 'footer');
    }

?>

<?php wp_footer(); ?>

<?php
    if ($acf_active) {
        $footer_code = get_field('footer_code', 'option');
    }
?>

<?php if ($footer_code) { ?>

    <?= $footer_code ?>

<?php } ?>

</body>

</html>