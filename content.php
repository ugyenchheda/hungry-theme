<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Used to display the main post content.
 *
 *  1.0.1 - Added more output sanitization.
 *
 */
?>
			<!-- START Single Post -->
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-container' ); ?>>
			
				<!-- START Post Header -->
				<header>
				
					<?php if( is_sticky() ) : ?>
				
						<h6 class="post-sticky-label"><?php esc_html_e( 'Featured Post', 'hungry' ); ?></h6>
				
					<?php endif; ?>
				
					<!-- Post Title -->
					<?php
						if ( is_single() ) :
							the_title( '<h2 class="post-title">', '</h2>' );
						else :
							the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
						endif;
					?>
					
					<!-- Featured Image -->
					<div class="featured-image">
						<?php hungry_post_thumbnail(); ?>
						<?php if( has_post_thumbnail() ) : ?>
						
							<div class="post-date-fixed tilt-left">
								<?php hungry_post_date(); ?>							
							</div>
							
						<?php endif; ?>
					</div>
					
					<!-- Post Meta -->
					<div class="post-meta">
						<?php hungry_post_meta(); ?>
					</div>
					
				</header>
				<!-- END Post Header -->
				
				<!-- START Post Main Content -->
				<div class="post-content">
				<?php 
				
					the_content( esc_html__( '&hellip;view the rest', 'hungry' ) );
					
					wp_link_pages( array(
					
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages', 'hungry' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>'
						
					) );
			
				?>
				</div>
				<!-- END Post Main Content -->
				
				<?php if( is_singular() ) : ?>
				
					<!-- START Post Footer -->
					<footer>
						<div class="post-tags">
							<?php hungry_post_tags(); ?>
						</div>
					</footer>
					<!-- END Post Footer -->
				
				<?php endif; ?>
			
			</article>
			<!-- END Single Post -->