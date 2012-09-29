<?php

add_action( 'wp_enqueue_scripts', 'wrktg_enqueue_print_css' );

/**
* Enqueue plugin style-file
*/
function wrktg_enqueue_print_css() {
  // Respects SSL, Style.css is relative to the current file
  wp_register_style( 'wrktg-print-css', get_stylesheet_directory_uri() . '/print.css', null, null, 'print' );
  wp_enqueue_style( 'wrktg-print-css' );
}