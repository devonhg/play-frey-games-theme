<?php
/**
 * Template part for displaying single posts.
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php _s_posted_on(); ?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->
	<?php
		$out = "";
    	if ( has_post_thumbnail( $post->ID ) ){
	    	$out .= "<div class='" . "tn-image" . "'>";
	    		$out .= get_the_post_thumbnail( $post->ID, "full" ); 
	    	$out .= "</div>";
		}

		echo $out;
	?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php _s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

