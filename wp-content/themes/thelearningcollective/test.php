<?php
/**
 * Template Name: Test
 *
 * @package aThemes
 */

get_header();
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			
			TEST
					
			
			<?php
//				$json = wp_remote_get( 'http://thelearningcollective.site/wp-json/posts?filter[s]=jav' );
//				$result = wp_remote_retrieve_body($json);
//				print_r($result);
			?>
			
			<?php
				function slug_get_json($url) {
					$response = wp_remote_get($url);
					
					if( is_wp_error($response) ) {
						return sprintf('The URL %1s could not be retreived', $url);
					}
					
					$data = wp_remote_retrieve_body( $response );
					
					if( ! is_wp_error($data) ) {
						
						return json_decode($data);;
					}
				}

				$url = 'http://thelearningcollective.site/wp-json/posts/1';
				$results = slug_get_json( 'http://thelearningcollective.site/wp-json/posts/1233' );
				print_r($results);
			?>
			

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>