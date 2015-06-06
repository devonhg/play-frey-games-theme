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

	<?php if ( is_active_sidebar( 'below-content' ) ) : ?>
		<div id="below-content" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'below-content' ); ?>
		</div><!-- #primary-sidebar -->
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
			<div id="footer-widget" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-widget' ); ?>
			</div><!-- #primary-sidebar -->
		<?php endif; ?>
		
		<div class="site-info">
			<sub>All website content &copy; <?php echo date('Y') . " " . get_bloginfo('name') ; ?> unless otherwise specified.</sub>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
