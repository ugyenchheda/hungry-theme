<?php
/**
 *  
 *  Template Name: One Page Layout
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  This is the main template for displaying single-page content. It will
 *  check for built-in and custom sections.
 *
 */

/*
 *  Get all the "enabled" sections from the theme options.
 */ 
global $hungry_options;
$layout = empty( $hungry_options['hungry_home_layout']['enabled'] ) ? '' : $hungry_options['hungry_home_layout']['enabled'];

get_header(); ?>
<!-- START Main Content -->
<main class="site-content" role="main">

	<?php
	
		if( $layout ) :
		
			foreach( $layout as $key => $value ) :
			
				switch( $key ) :
				
					case 'hungry_about_us' :
						get_template_part( 'section', 'about' );
					break;
				
					case 'hungry_testimonials' :
						get_template_part( 'section', 'testimonials' );
					break;
					
					case 'hungry_food_menu' :
						get_template_part( 'section', 'menus' );
					break;
					
					case 'hungry_slogan_one' :
						get_template_part( 'section', 'slogan-one' );
					break;
					
					case 'hungry_staff' :
						get_template_part( 'section', 'team' );
					break;
					
					case 'hungry_slogan_two' :
						get_template_part( 'section', 'slogan-two' );
					break;
					
					case 'hungry_gallery' :
						get_template_part( 'section', 'gallery' );
					break;
					
					case 'hungry_blog' :
						get_template_part( 'section', 'blog' );
					break;
					
					case 'hungry_reservations' :
						get_template_part( 'section', 'reservations' );
					break;
					
					case 'hungry_slogan_three' :
						get_template_part( 'section', 'slogan-three' );
					break;
					
					case 'hungry_slogan_four' :
						get_template_part( 'section', 'slogan-four' );
					break;
					
					case 'placebo' : break;
				
					default :
						if( shortcode_exists( 'section' ) ) {
						
							echo do_shortcode( '[section id="' . esc_attr( $key ) . '"]' );
						
						}
				
				endswitch;
		
			endforeach;
		
		endif;
	
	?>

</main>
<!-- END Main Content -->
<?php get_footer(); ?>