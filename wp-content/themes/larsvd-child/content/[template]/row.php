<?php
$current_name = get_row_layout(); // Name of the row


// -- Content -- //
//$title      = get_sub_field('row_title');

// -- Settings -- //
include(get_stylesheet_directory() . '/content/settings.php');

?>

<section class="<?= $row_class ?>">
    <?php if ($row_id) { ?>
        <div class="scrollto" id="<?= $row_id ?>"></div>
    <?php } ?>

    <div class="full-row">

        <div class="blocks-container">

        </div>

    </div>

</section>