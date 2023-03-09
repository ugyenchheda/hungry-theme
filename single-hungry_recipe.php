<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Template used to display single Recipe posts.
 *
 */
get_header(); ?>
<div class="site-content grid-container">

	<!-- START Main Content -->
	<main role="main">
		
		<?php
		
			while( have_posts() ) : the_post();
			
				get_template_part( 'content', 'recipe' );
			
				?>
				<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<?php
			
				the_post_navigation( array(
					
					'next_text'	=> '%title<i class="fa fa-angle-double-right"></i>',
					'prev_text'	=> '<i class="fa fa-angle-double-left"></i>%title'
				
				) );
		
				if ( comments_open() || get_comments_number() ) :
				
					comments_template();
					
				endif;
				
				?>
				</div>
				<?php
			
			endwhile;
		
		?>
		
	</main>
	<!-- END Main Content -->
	
</div>
<?php get_footer(); ?>