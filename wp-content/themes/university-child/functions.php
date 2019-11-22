<?php

function cactusthemes_scripts_styles_child_theme() {
	global $wp_styles;
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('bootstrap', 'font-awesome', 'owl-carousel', 'owl-carousel-theme'));
}
add_action( 'wp_enqueue_scripts', 'cactusthemes_scripts_styles_child_theme' );

