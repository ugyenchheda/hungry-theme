<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Template part to display the intro section of a standard page.
 *
 *  1.0.1 - Added more output sanitization.
 *
 */

global $hungry_options;
$blog_title = empty( $hungry_options['hungry_blog_title'] ) ? '' : $hungry_options['hungry_blog_title'];

?>
	<!-- START Subpage Intro -->
	<div class="grid-container">
		<div class="page-meta grid-100 tablet-grid-100 mobile-grid-100">
		
			<div class="wow fadeInUp" data-wow-duration="2s" data-wow-offset="250">
			
				<!-- Page Title -->
				<h1 class="page-title">
				
				<?php
				
					if( is_404() ) :
						
						esc_html_e( 'Page Not Found!', 'hungry' );
						
					elseif( is_archive() && ! is_tax( 'food_menu' ) ) :
					
						the_archive_title();
					
					elseif( is_tax( 'food_menu' ) ) :
						
						hungry_menu_title();
					
					elseif( is_search() ) :
					
						printf(
						
							esc_html__( 'Search results for: %s', 'hungry' ),
							get_search_query()
							
						);
					
					elseif( is_singular() ) :
					
						single_post_title();
					
					else :
					
						echo esc_html( $blog_title );
					
					endif;
				
				?>
				
				</h1>
			
				<?php if( function_exists( 'breadcrumb_trail' ) ) :  ?>
			
					<!-- START Breadcrumb Trail -->
					<div class="breadcrumb-trail-container tilt-left">
					<?php
					
						breadcrumb_trail( array(
							
							'separator'     => '&nbsp;', // Using CSS instead.
							'show_browse'   => false,
							'show_on_front' => false
							
						) );
						
					?>
					</div>
					<!-- END Breadcrumb Trail -->
				
				<?php endif; ?>
			</div>
			
		</div>
	</div>
	<!-- END Subpage Intro -->