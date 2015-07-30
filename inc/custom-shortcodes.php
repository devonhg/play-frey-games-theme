<?php 
/**
* This file includes custom shortcodes specific to the theme
*/

class pfg_custom_sc{
	public static function latest_posts_f( $atts ){
		//$o = "";

		$query = new WP_Query( "post_type=post");

		if( $query->have_posts() ){
			while( $query->have_posts() ){
				$query->the_post();

				$post = $query; 

				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( "front-page-news" ); ?>>
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

								//the_title(); 
							?>
						</div>
					</a>
				</article>

				<?php

				//$o = the_title(); 
			}
		}

		//return "Puppies"; 
	}
}

add_shortcode( "latest_posts", array( "pfg_custom_sc" ,"latest_posts_f") );