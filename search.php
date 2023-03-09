<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Template for displaying search results pages.
 *
 */
get_header(); ?>
<div class="site-content grid-container">

	<!-- START Main Content -->
	<main role="main">
		<div class="grid-70 suffix-5 tablet-grid-100 mobile-grid-100">
			
			<?php 
			
				if( have_posts() ) :
								
					while( have_posts() ) : the_post();
				
						get_template_part( 'content', 'search' );
				
					endwhile;
					
					if( function_exists( 'the_posts_pagination' ) ) :
					
						the_posts_pagination( array(
						
							'prev_text' => '<i class="fa fa-chevron-left"></i>',
							'next_text' => '<i class="fa fa-chevron-right"></i>',
							'end_size'  => 2,
							'mid_size'  => 2
							
						) );
						
					else: 
					
						previous_posts_link( esc_html__( '&laquo; Newer Entries', 'hungry' ) );
						next_posts_link( esc_html__( 'Older Entries &raquo;', 'hungry' ), 0 );
					
					endif;
				
				else :
				
					get_template_part( 'content', 'none' );
				
				endif; 
			
			?>
			
		</div>
	</main>
	<!-- END Main Content -->

	<?php get_sidebar(); ?>
	
</div>
<?php get_footer(); ?>