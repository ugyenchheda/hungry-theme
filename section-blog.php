<?php
/**
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  SECTION: Blog
 *
 *  1.0.2 - Added Custom Slug Name.
 *  1.0.1 - Added more output sanitization.
 *
 */

global $hungry_options;
$blog_title       = empty( $hungry_options['hungry_blog_title'] )       ? ''  : $hungry_options['hungry_blog_title'];
$blog_subtitle    = empty( $hungry_options['hungry_blog_subtitle'] )    ? ''  : $hungry_options['hungry_blog_subtitle'];
$blog_amount      = empty( $hungry_options['hungry_blog_amount'] )      ? '4' : $hungry_options['hungry_blog_amount'];
$blog_button_text = empty( $hungry_options['hungry_blog_button_text'] ) ? ''  : $hungry_options['hungry_blog_button_text'];
$blog_button_url  = empty( $hungry_options['hungry_blog_button_url'] )  ? ''  : $hungry_options['hungry_blog_button_url'];
$blog_slug        = empty( $hungry_options['hungry_blog_slug'] )        ? 'hungry-blog' : $hungry_options['hungry_blog_slug'];

?>
	<!-- START Section - Blog -->
	<section id="<?php echo esc_attr( $blog_slug ); ?>" class="section-container parallax">
	
		<?php 
		
			if( ( $blog_title || $blog_subtitle ) && shortcode_exists( 'intro' ) ) :
			
				echo do_shortcode( '[intro title="' . esc_attr( $blog_title ) . '" subtitle="' . esc_attr( $blog_subtitle ) . '"]' );
				
			endif;

			$args = array(
			
				'post_type'           => 'post',
				'ignore_sticky_posts' => 1,
				'posts_per_page'      => intval( $blog_amount )
			
			);
			
			$posts          = new WP_Query( $args );
			$counter        = 0;
			$swap_class     = '';
			$fade_dir       = 'Left';
			$blocks_to_swap = array( 3, 4, 7, 8, 11, 12, 15, 16, 19, 20 );
			
		?>
		
		<?php if( $posts->have_posts() ) : ?>
		
		<div class="grid-container">
			<div class="hungry-blog-container">
				
				<?php 
				
					while( $posts->have_posts() ) : 
					
						$posts->the_post();
						$counter ++;
						
						if( in_array( $counter, $blocks_to_swap ) ) :
						
							$swap_class = ' swap';
						
						else :
						
							$swap_class = '';
						
						endif;
						
						if( $counter % 2 == 0 ) :
						
							$fade_dir = 'Right';
						
						else :
						
							$fade_dir = 'Left';
						
						endif;
					
				?>
				
				<!-- START Blog Post Block -->
				<div id="home-blog-post-<?php the_ID(); ?>">
					<div class="grid-50 tablet-grid-50 mobile-grid-100 wow fadeIn<?php echo esc_attr( $fade_dir ); ?>" data-wow-duration="2s" data-wow-offset="250">
						<div class="hungry-blog-block<?php echo esc_attr( $swap_class ); ?>">
							<div class="hungry-blog-arrow"></div>
							<?php if( has_post_thumbnail() ) : ?>
							
							<div class="hungry-blog-featured-image">
								<a class="image-hover" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'hungry-recipe' ); ?>
									<div class="image-hover-overlay">
										<i class="fa fa-link"></i>
									</div>
								</a>
							</div>
							
							<?php else : ?>
							
							<div class="hungry-blog-featured-image-placeholder"></div>
							
							<?php endif; ?>
							
							<div class="hungry-blog-meta">
								<span class="hungry-blog-date">
									<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ); ?></time>
								</span>
								<h3 class="hungry-blog-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<span class="hungry-blog-author">by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
							</div>
						</div>
					</div>
				</div>
				<!-- END Blog Post Block -->
				
				<?php endwhile; ?>
				
				<br class="clear" />
			</div>
			
			<?php if( $blog_button_text && $blog_button_url ) : ?>
			
			<!-- "View Blog" Button -->
			<div class="wow fadeInUp" data-wow-duration="2s" data-wow-offset="250">
				<div class="grid-100 tablet-grid-100 mobile-grid-100 aligncenter">
					<a class="hungry-button dark aligncenter" href="<?php echo esc_url( get_permalink( $blog_button_url ) ); ?>"><?php echo esc_html( $blog_button_text ); ?></a>
				</div>
			</div>
			
			<?php endif; ?>
		
		</div>
		
		<?php endif; // End have_posts() ?>
		
	</section>
	<!-- END Section - Blog -->