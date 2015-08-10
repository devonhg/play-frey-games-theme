<?php
/**
 * Template Name: No Content Background
 *
 * Removes the content background. Good for archive-like pages.
 *
 * @package _s
 */

get_header(); ?>



	<div id="primary" class="content-area no-back">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
					<?php edit_post_link( esc_html__( 'Edit', '_s' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>
