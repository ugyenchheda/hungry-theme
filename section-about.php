<?php
/**
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  SECTION: About Us
 *
 *  1.0.2 - Added Custom Slug Name.
 *  1.0.1 - Added more output sanitization.
 *
 */

global $hungry_options;

$about_us_title       = empty( $hungry_options['hungry_about_us_title'] )       ? '' : $hungry_options['hungry_about_us_title'];
$about_us_subtitle    = empty( $hungry_options['hungry_about_us_subtitle'] )    ? '' : $hungry_options['hungry_about_us_subtitle'];
$about_us_slug        = empty( $hungry_options['hungry_about_us_slug'] )        ? 'hungry-about-us' : $hungry_options['hungry_about_us_slug'];

$about_us_main_image  = empty( $hungry_options['hungry_about_us_main_image'] )  ? '' : $hungry_options['hungry_about_us_main_image'];
$about_us_inset_image = empty( $hungry_options['hungry_about_us_inset_image'] ) ? '' : $hungry_options['hungry_about_us_inset_image'];
$about_us_content     = empty( $hungry_options['hungry_about_us_content'] )     ? '' : $hungry_options['hungry_about_us_content'];

?>
	<!-- START Section - About Us -->
	<section id="<?php echo esc_attr( $about_us_slug ); ?>" class="section-container">
		<?php 
		
			if( ( $about_us_title || $about_us_subtitle ) && shortcode_exists( 'intro' ) ) :
			
				echo do_shortcode( '[intro title="' . esc_attr( $about_us_title ) . '" subtitle="' . esc_attr( $about_us_subtitle ) . '"]' );
				
			endif;
		
		?>
		<div class="grid-container">
		
			<?php if( $about_us_main_image['url'] && shortcode_exists( 'dual_images' ) ) : ?>
		
				<div class="grid-50 tablet-grid-100 mobile-grid-100">
					<?php echo do_shortcode( '[dual_images main="' . esc_url( $about_us_main_image['url'] ) . '" inset="' . esc_url( $about_us_inset_image['url'] ) . '"]' ); ?>
				</div>
				
			<?php endif; ?>
			
			<?php if( $about_us_content ) : ?>
			
				<!-- START Section Content -->
				<?php if( ! $about_us_main_image['url'] ) : ?>
					<div class="grid-100 tablet-prefix-10 tablet-grid-80 tablet-suffix-10 mobile-grid-100 tablet-center mobile-center">
				<?php else : ?>
					<div class="grid-50 tablet-prefix-10 tablet-grid-80 tablet-suffix-10 mobile-grid-100 tablet-center mobile-center">
				<?php endif; ?>
					<div class="wow fadeInRight" data-wow-duration="2s" data-wow-offset="250">
						<?php echo wp_kses_post( wpautop( $about_us_content ) ); ?>
					</div>
				</div>
				<!-- END Section Content -->
				
			<?php endif; ?>
			
		</div>
	</section>
	<!-- END Section - About Us -->