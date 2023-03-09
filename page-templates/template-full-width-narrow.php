<?php
/**
 *  
 *  Template Name: Page - Narrow
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Custom template for a narrow single column. No sidebars.
 *
 */
get_header(); ?>
<div class="site-content grid-container">

	<!-- START Main Content -->
	<main role="main">
		<div class="prefix-20 grid-60 suffix-20 tablet-prefix-10 tablet-grid-80 tablet-suffix-10 mobile-grid-100">
			
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
	
</div>
<?php get_footer(); ?>