<?php 
/**
* This file includes custom shortcodes specific to the theme
*/

class pfg_custom_sc{
	public static function latest_posts_f( $atts ){
		//$o = "";

		$query = new WP_Query( "post_type=post&posts_per_page=12");

		?> 

		<div class='front-page-news-wrapper'> 

			<?php

			if( $query->have_posts() ){
				while( $query->have_posts() ){
					$query->the_post();

					//$query = $query; 

					?>
					<article <?php post_class( "front-page-news" ); ?>>
						<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>" >
							<div class='article-wrapper'>
								<?php
									$out = "";				
									if ( has_post_thumbnail( $query->ID ) ){
										
								    	$out .= "<div class='" . "tn-image" . "'>";
								    		$out .= get_the_post_thumbnail( $query->ID, "medium" ); 
								    	$out .= "</div>";					
									}else{
										$out = "";
										$out .= "<div class='" . "tn-image no-image" . "'>";
											$out .= "<p>Play Frey Games News Post</p>";
										$out .= "</div>";	
									}									
									$out .= "<p>";
									$out .= get_the_title( $query->ID ); 
									$out .= "</p>"; 

									echo $out; 

									//the_title(); 
								?>
							</div>
						</a>
					</article>
				<?php

				wp_reset_postdata();

				//$o = the_title(); 
				}
			}

			?>

		</div>
		<?php 
	}
}

add_shortcode( "latest_posts", array( "pfg_custom_sc" ,"latest_posts_f") );