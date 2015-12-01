<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package aThemes
 */
?>
		</div>
	<!-- #main --></div>

	<?php
		/* A sidebar in the footer? Yep. You can can customize
		 * your footer with up to four columns of widgets.
		 */
		get_sidebar( 'footer' );
	?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="clearfix container">
			<div class="site-info">
				<i class="fa fa-copyright fa-rotate-180" ></i> <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.
			</div><!-- .site-info -->

			<div class="site-credit">
				<a href="https://github.com/the-learning-collective/tlc-blog" target="_blank">Source</a>
			</div><!-- .site-credit -->
		</div>
	<!-- #colophon --></footer>

<?php wp_footer(); ?>

</body>
</html>