<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Used to display results in search pages.
 *
 */
?>
			<!-- START Single Post -->
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-container' ); ?>>
			
				<!-- START Post Header -->
				<header>
				
					<!-- Post Title -->
					<?php the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					
					<!-- Post Meta -->
					<div class="post-meta">
						<?php hungry_post_meta(); ?>
					</div>
					
				</header>
				<!-- END Post Header -->
				
				<!-- START Post Excerpt -->
				<div class="post-content post-excerpt">
					<?php the_excerpt(); ?>
				</div>
				<!-- END Post Excerpt -->
			
			</article>
			<!-- END Single Post -->