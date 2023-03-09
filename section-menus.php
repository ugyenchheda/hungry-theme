<?php
/**
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  SECTION: Menus
 *
 *  1.0.2 - Added Custom Slug Name.
 *  1.0.1 - Added more output sanitization.
 *
 */

global $hungry_options;
$food_title    = empty( $hungry_options['hungry_food_title'] )    ? ''    : $hungry_options['hungry_food_title'];
$food_subtitle = empty( $hungry_options['hungry_food_subtitle'] ) ? ''    : $hungry_options['hungry_food_subtitle'];
$food_slug     = empty( $hungry_options['hungry_food_slug'] )     ? 'hungry-menu' : $hungry_options['hungry_food_slug'];
$col_01        = empty( $hungry_options['hungry_food_col_01'] )   ? ''    : $hungry_options['hungry_food_col_01'];
$col_02        = empty( $hungry_options['hungry_food_col_02'] )   ? ''    : $hungry_options['hungry_food_col_02'];
$col_03        = empty( $hungry_options['hungry_food_col_03'] )   ? ''    : $hungry_options['hungry_food_col_03'];
$food_layout   = empty( $hungry_options['hungry_food_layout'] )   ? 'two' : $hungry_options['hungry_food_layout'];
$html          = '';

// Get the list of allowed HTML tags in a Post.
$allowed_tags = wp_kses_allowed_html( 'post' );

// Add some more of our own...
$allowed_tags['div']['data-wow-duration'] = true;
$allowed_tags['div']['data-wow-offset']   = true;

?>
	<!-- START Section - Menu -->
	<section id="<?php echo esc_attr( $food_slug ); ?>" class="section-container">
		<?php 
		
			if( ( $food_title || $food_subtitle ) && shortcode_exists( 'intro' ) ) :
			
				echo do_shortcode( '[intro title="' . esc_attr( $food_title ) . '" subtitle="' . esc_attr( $food_subtitle ) . '"]' );
				
			endif;
		
		?>
		
		<?php if( $col_01 || $col_02 || $col_03 ) : ?>
		
		<div class="grid-container">
		
			<?php 
			
				switch( $food_layout ) : 
				
					/*
					 *  One Column Layout
					 *  -------------------------------------------------------
					 */
					case 'one' :
					
						if( $col_01 ) :
						
							$html .= '<div class="prefix-20 grid-60 suffix-20 tablet-prefix-10 tablet-grid-80 tablet-suffix-10 mobile-grid-100">' . "\n";		
							foreach( $col_01 as $menu ) :
							
								$html .= do_shortcode( '[hungry_menu menu="' . esc_attr( $menu ) . '"]' );
								
							endforeach;
							$html .= '</div>' . "\n";
						
						endif;
					
					break;
					
					/*
					 *  Two Column Layout
					 *  -------------------------------------------------------
					 */
					case 'two' :
						
						if( $col_01 ) :
						
							$html .= '<div class="grid-45 suffix-5 tablet-prefix-5 tablet-grid-90 tablet-suffix-5 mobile-grid-100">' . "\n";		
							foreach( $col_01 as $menu ) :
							
								$html .= do_shortcode( '[hungry_menu menu="' . esc_attr( $menu ) . '"]' );
								
							endforeach;
							$html .= '</div>' . "\n";
							
						endif;
						
						if( $col_02 ) :
						
							$html .= '<div class="prefix-5 grid-45 tablet-prefix-5 tablet-grid-90 tablet-suffix-5 mobile-grid-100">' . "\n";		
							foreach( $col_02 as $menu ) :
							
								$html .= do_shortcode( '[hungry_menu menu="' . esc_attr( $menu ) . '"]' );
								
							endforeach;
							$html .= '</div>' . "\n";
				
						endif;
						
					break;
					
					/*
					 *  Three Column Layout
					 *  -------------------------------------------------------
					 */
					case 'three' :
					
						if( $col_01 ) :
						
							$html .= '<div class="grid-33 tablet-prefix-5 tablet-grid-90 tablet-suffix-5 mobile-grid-100 hungry-menu-three-col">' . "\n";		
							foreach( $col_01 as $menu ) :
							
								$html .= do_shortcode( '[hungry_menu menu="' . esc_attr( $menu ) . '"]' );
								
							endforeach;
							$html .= '</div>' . "\n";
						
						endif;
						
						if( $col_02 ) :
						
							$html .= '<div class="grid-33 tablet-prefix-5 tablet-grid-90 tablet-suffix-5 mobile-grid-100 hungry-menu-three-col">' . "\n";		
							foreach( $col_02 as $menu ) :
							
								$html .= do_shortcode( '[hungry_menu menu="' . esc_attr( $menu ) . '"]' );
								
							endforeach;
							$html .= '</div>' . "\n";
							
						endif;
						
						if( $col_03 ) :
						
							$html .= '<div class="grid-33 tablet-prefix-5 tablet-grid-90 tablet-suffix-5 mobile-grid-100 hungry-menu-three-col">' . "\n";		
							foreach( $col_03 as $menu ) :
							
								$html .= do_shortcode( '[hungry_menu menu="' . esc_attr( $menu ) . '"]' );
								
							endforeach;
							$html .= '</div>' . "\n";
						
						endif;
					
					break;
				
				endswitch; // 'food_layout'
			
				echo wp_kses( $html, $allowed_tags );
			
			?>
			
		</div>
		
		<?php endif; // End check for menus. ?>
	<div class="clickhere"><a href="http://www.myrachathai.com/menu">View Full Menu</a></div>	
	</section>
	<!-- END Section - Menu -->