<?php 
/**
* This file includes custom shortcodes specific to the theme
*/

class pfg_custom_sc{
	public static function latest_posts_f( $atts ){
		//$o = "";
		$out = "";

		$query = new WP_Query( "post_type=post&posts_per_page=12");		 

		$out .= "<div class='front-page-news-wrapper'>";

			if( $query->have_posts() ){
				while( $query->have_posts() ){
					$query->the_post();

					//$query = $query; 
					//$out = "";

					$out .= "<article class='front-page-news'>";
						$out .= "<a href='" . get_permalink( $query->ID ) . "' title='" .  get_the_title( $query->ID ) . "' >";
							$out .= "<div class='article-wrapper'>";													
									if ( has_post_thumbnail( $query->ID ) ){	
								    	$out .= "<div class='" . "tn-image" . "'>";
								    		$out .= get_the_post_thumbnail( $query->ID, "medium" ); 
								    	$out .= "</div>";					
									}else{
										//$out = "";
										$out .= "<div class='" . "tn-image no-image" . "'>";
											$out .= "<p>" . get_bloginfo('name') . " News Post</p>";
										$out .= "</div>";	
									}									
									$out .= "<p>";
									$out .= get_the_title( $query->ID ); 
									$out .= "</p>"; 

									//echo $out; 

									//the_title(); 
							$out .= "</div>";
						$out .= "</a>";
					$out .= "</article>";
				wp_reset_postdata();

				//$o = the_title(); 
				}
			}

		$out .= "</div>";
		//var_dump( $out );
		return $out; 
	}
}

add_shortcode( "latest_posts", array( "pfg_custom_sc" ,"latest_posts_f") );


//backup
/*
public static function latest_posts_f( $atts ){
		//$o = "";
		//$out = "";

		$query = new WP_Query( "post_type=post&posts_per_page=12");

		?> 

		<div class='front-page-news-wrapper'> 

			<?php

			if( $query->have_posts() ){
				while( $query->have_posts() ){
					$query->the_post();

					//$query = $query; 
					$out = "";

					?>
					<article <?php post_class( "front-page-news" ); ?>>
						<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>" >
							<div class='article-wrapper'>
								<?php
													
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
		//var_dump( $out );
		//return $out; 
	}
*/