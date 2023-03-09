<?php
/**
 *  
 *  Template Name: Page - Full Width
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Custom template for a full width page. No sidebars.
 *
 */
get_header(); ?>
<div class="site-content grid-container">

	<!-- START Main Content -->
	<main role="main">
		<?php 
				
			while( have_posts() ) : the_post();
		
				get_template_part( 'content', 'page' );
				
				if ( comments_open() || get_comments_number() ) :
				
					comments_template();
					
				endif;
		
			endwhile;
			
		?>
	</main>
	<!-- END Main Content -->
	
</div>
<?php get_footer(); ?>