<?php
/**
 * Custom Functions
 *
 */



/**
 * Enqueue scripts and styles
 */
function tlc_custom_scripts() {
	
	wp_enqueue_style( 'parent-style', trailingslashit( get_template_directory_uri() ) . 'style.css' );
    wp_enqueue_style( 'tlc-theme',
        trailingslashit( get_stylesheet_directory_uri() ) . 'assets/css/style.css',
        array('parent-style')
    );
}
add_action( 'wp_enqueue_scripts', 'tlc_custom_scripts', 99 );

/**
 * Custom Functions
 */

// Change sort order for Resources and Projects

function tlc_resources_projects_alpha_sort( $query ) {
    if ( $query->is_category( 'projects' ) || $query->is_category( 'resources' ) && $query->is_main_query()  ) {
        $query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
    } 
}
add_action( 'pre_get_posts', 'tlc_resources_projects_alpha_sort' );

?>