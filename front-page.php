<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( !is_page() ){ ?>
			<h1 class='front-header'>Latest Posts</h1>
		<?php } ?>

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( "front-page" ); ?>>
					<a href="<?php the_permalink(); ?>" >
						<div class='article-wrapper'>
							<?php
								$out = "";
									if ( is_page() ){
										get_template_part( 'template-parts/content', get_post_format() );
									}else{
										if ( has_post_thumbnail( $post->ID ) ){
											
									    	$out .= "<div class='" . "tn-image" . "'>";
									    		$out .= get_the_post_thumbnail( $post->ID, "medium" ); 
									    	$out .= "</div>";					
										}else{
											$out = "";
											$out .= "<div class='" . "tn-image" . "'>";
												$out .= "<img src='" . get_template_directory_uri() . "/images/g7875_small.png" . "' alt='" . get_the_title() . "'>";
											$out .= "</div>";	
										}									
									}


								$out .= "<h3>";
								$out .= get_the_title(); 
								$out .= "</h3>"; 

								echo $out; 

								//the_title(); 
							?>
						</div>
					</a>
				</article>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php if (is_page()) { get_sidebar(); } ?>
<?php get_footer(); ?>
