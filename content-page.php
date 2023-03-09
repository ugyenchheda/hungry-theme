<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Used to display the main page content.
 *
 *  1.0.1 - Added more output sanitization.
 *
 */
?>
			<!-- START Page Content -->
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-container' ); ?>>
				<?php if( has_post_thumbnail() ) : ?>
				
					<!-- START Page Header -->
					<header>
					
						<!-- Featured Image -->
						<div class="featured-image">
							<?php hungry_post_thumbnail(); ?>
						</div>
						
						<br class="clear" />
					</header>
					<!-- END Page Header -->
				
				<?php endif; ?>
				<!-- START Page Content -->
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
					<br class="clear" />
				
				</div>
				<!-- END Page Content -->
				
				<!-- START Page Footer -->
				<?php edit_post_link( esc_html__( 'Edit', 'hungry' ), '<footer><span class="edit-link">', '</span></footer>' ); ?>
				<!-- END Page Footer -->
				
				<br class="clear" />
			</article>
			<!-- END Page Content -->