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

function public_widgets_init() {

    register_sidebar(array(
        'name' => __('Public - Top Widget Area', 'wrktg-p2'),
        'id' => 'public_top',
        'description' => __('This widget area shows up in header on public theme.', 'wrktg-p2'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s group">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Public - Sidebar Widget Area', 'wrktg-p2'),
        'id' => 'public_side',
        'description' => __('This widget area shows up in the sidebar on public theme.', 'wrktg-p2'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s group">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

}

add_action('widgets_init', 'public_widgets_init');