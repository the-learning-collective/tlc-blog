<?php
/**
 * Custom Functions
 *
 */



/**
 * Enqueue scripts and styles
 */
function tlc_custom_scripts() {
	
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'tlc-theme',
        get_stylesheet_directory_uri() . '/css/style.css',
        array('parent-style')
    );
}
add_action( 'wp_enqueue_scripts', 'tlc_custom_scripts', 99 );


?>