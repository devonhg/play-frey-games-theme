<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _s
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
			<div id="footer-widget" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-widget' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
		
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', '_s' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', '_s' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', '_s' ), '_s', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
