<?php
/**
 * Template Name: Front Page
 * The front page template file
 * 
 * Select this template to represent the front page. 
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
					<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>" >
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
											$out .= "<div class='" . "tn-image no-image" . "'>";
												$out .= "<img src='" . get_template_directory_uri() . "/images/g7875_small.png" . "' alt='" . get_the_title() . "'>";
											$out .= "</div>";	
										}									
									}


								$out .= "<p>";
								$out .= get_the_title(); 
								$out .= "</p>"; 

								echo $out; 


								get_template_part( 'template-parts/content', 'page' ); 

								
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
								

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
