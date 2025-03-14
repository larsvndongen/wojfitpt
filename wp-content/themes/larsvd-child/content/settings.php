<?php

// Variables
$row_name = get_row_layout();
$row_id = strtolower(get_sub_field('set_id'));
$row_set_padding = get_sub_field('set_padding');
$row_bgcolor = get_sub_field('bgcolor');
$row_fade = get_sub_field('fade');
if(!$row_fade):
    $row_fade = 'fade-none';
endif;

// Check and add classes
$row_class = implode(' ', array_filter([
    $row_name,
    $row_set_padding,
    $row_bgcolor,
]));

// Add additional classes
$row_class = trim("row larsvd $row_class");

?>