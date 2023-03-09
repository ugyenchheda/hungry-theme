<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Template part to display the slider and slogan rotator for the home page.
 *
 *  1.0.1 - Added more output sanitization.
 *
 */

global $hungry_options;
$before_slogan        = empty( $hungry_options['hungry_before_slogan'] )  ? ''     : $hungry_options['hungry_before_slogan'];
$slogans              = empty( $hungry_options['hungry_slogans'] )        ? ''     : $hungry_options['hungry_slogans'];
$slider_fx            = empty( $hungry_options['hungry_slider_fx'] )      ? 'fade' : $hungry_options['hungry_slider_fx'];
$slider_speed         = empty( $hungry_options['hungry_slider_speed'] )   ? 1200   : $hungry_options['hungry_slider_speed'];
$slider_timeout       = isset( $hungry_options['hungry_slider_timeout'] ) ? $hungry_options['hungry_slider_timeout'] : 16000;
$slider_images_string = empty( $hungry_options['hungry_slider_images'] )  ? ''     : $hungry_options['hungry_slider_images'];

$slider_controls      = checked( $hungry_options['hungry_slider_controls'], 1, false ) ? '1' : '';

$slider_images = '';
if( $slider_images_string ) {

	$slider_images = explode( ',', $slider_images_string );
	
}

?>
	<div class="single-page-header-content">

		<?php if( $slider_images_string ) : ?>
	
			<!-- START Slider Images -->
			<div class="cycle-slideshow"
				 data-cycle-swipe="true"
				 data-cycle-swipe-fx="fade"
				 data-cycle-fx="<?php echo esc_attr( $slider_fx ); ?>"
				 data-cycle-speed="<?php echo esc_attr( absint( $slider_speed ) ); ?>"
				 data-cycle-timeout="<?php echo esc_attr( absint( $slider_timeout ) ); ?>">
				
				<?php if( $slider_images ) : ?>
				
					<!-- Images -->
					<?php

						foreach( $slider_images as $image ) :
								
							echo wp_get_attachment_image( $image, 'full' ) . "\n";
							
						endforeach;
							
					endif;
						
					?>
				
				<?php if( $slider_controls ) : ?>
				
					<!-- Prev/Next Buttons -->
					<div class="cycle-prev"><i class="fa fa-chevron-left"></i></div>
					<div class="cycle-next"><i class="fa fa-chevron-right"></i></div>
				
				<?php endif; ?>
				
			</div>
			<!-- END Slider Images -->
	
		<?php endif; // End $slider_image_string check ?>
	
		<?php if( $before_slogan || ! empty( $slogans ) ) : ?>
	
			<!-- START Slider Texts -->
			<div class="single-page-header-text">
			
				<?php if( $before_slogan ) : ?>
			
					<!-- Pre-slogan -->
					<div class="tilt-left">
						<h3 class="header-text-pre-slogan"><?php echo wp_kses( $before_slogan, array( 'em' => array() ) ); ?></h3>
					</div>
					
				<?php endif; ?>
			
				<?php if( ! empty( $slogans ) ) : ?>
			
					<!-- START Slogan Rotator -->
					<div class="tlt">
						<ul class="header-texts">
							
							<?php
								
								foreach( $slogans as $slogan ) :
								
									if( $slogan ) :
								
										echo '<li>' . esc_html( $slogan ) . "</li>\n";
										
									endif;
								
								endforeach;
								
							?>
							
						</ul>
					</div>
					<!-- END Slogan Rotator -->
				
				<?php endif; ?>
				
				<!-- Divider -->
				<div class="header-text-divider"></div>
				
			</div>
			<!-- END Slider Texts -->
		
		<?php endif; // End check for slogans ?>
	
	</div>
	
	<?php get_template_part( 'partial', 'icons' ); ?>