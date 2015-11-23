<?php
/**
 * @package aThemes
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
	<header class="clearfix entry-header">
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"> <?php comments_popup_link( __( '0', 'athemes' ), __( '1', 'athemes' ), __( '%', 'athemes' ) ); ?></span>
		<?php endif; ?>

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

	<!-- .entry-header --></header>

	<?php if ( ( is_search() && get_theme_mod('athemes_search_excerpt') =='' ) || ( is_home() && get_theme_mod('athemes_home_excerpt') =='' ) || ( is_archive() && get_theme_mod('athemes_arch_excerpt') =='' ) ) : ?>
		<div class="entry-summary">
			<?php the_content(); ?>
		<!-- .entry-summary --></div>
	<?php else : ?>
		<div class="clearfix entry-content">
			<?php the_content( __( 'Continue Reading <span class="meta-nav">&rarr;</span>', 'athemes' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'athemes' ), 'after' => '</div>' ) ); ?>
		<!-- .entry-content --></div>
	<?php endif; ?>

<!-- #post-<?php the_ID(); ?>--></article>