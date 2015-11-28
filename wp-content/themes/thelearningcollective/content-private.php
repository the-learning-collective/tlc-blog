<?php
/**
 * @package aThemes
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
	<header class="clearfix entry-header">
		<h2 class="entry-title"><?php _e( 'Private Content', 'athemes' ); ?></h2>
	<!-- .entry-header --></header>

		<div class="entry-summary">
			
			<?php _e( 'Please', 'athemes' ); ?>

			<a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login"><?php _e( 'Log in', 'athemes' ); ?></a>

			<?php _e( 'to view content.', 'athemes' ); ?>
			
		<!-- .entry-summary --></div>
	
	<footer class="entry-meta entry-footer">
		
	<!-- .entry-meta --></footer>
<!-- #post-<?php the_ID(); ?>--></article>