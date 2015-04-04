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


// Change sort order for Resources and Projects

function tlc_resources_projects_alpha_sort( $query ) {
    if ( $query->is_category( 'projects' ) || $query->is_category( 'resources' ) && $query->is_main_query()  ) {
        $query->set( 'orderby', 'title' );
    } 
}
add_action( 'pre_get_posts', 'tlc_resources_projects_alpha_sort' );

?>