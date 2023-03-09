<?php
/**
 *  
 *  Template Name: Page - Left Sidebar
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Custom template for a page with a sidebar on the left. Uses
 *  "push" and "pull" classes so that content comes first.
 *
 */
get_header(); ?>
<div class="site-content grid-container">

	<!-- START Main Content -->
	<main role="main">
		<div class="grid-70 push-30 tablet-grid-100 mobile-grid-100">
			
			<?php 
					
				while( have_posts() ) : the_post();
			
					get_template_part( 'content', 'page' );
					
					if ( comments_open() || get_comments_number() ) :
					
						comments_template();
						
					endif;
			
				endwhile;
				
			?>
			
		</div>
	</main>
	<!-- END Main Content -->
	
	<?php get_sidebar(); ?>
	
</div>
<?php get_footer(); ?>