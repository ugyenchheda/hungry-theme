<?php
/**
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  SECTION: Reservations
 *
 *  1.0.2 - Added Custom Slug Name.
 *  1.0.1 - Added more output sanitization.
 *
 */

global $hungry_options;
$reservations_title    = empty( $hungry_options['hungry_reservations_title'] )    ? '' : $hungry_options['hungry_reservations_title'];
$reservations_subtitle = empty( $hungry_options['hungry_reservations_subtitle'] ) ? '' : $hungry_options['hungry_reservations_subtitle'];
$reservations_content  = empty( $hungry_options['hungry_reservations_content'] )  ? '' : $hungry_options['hungry_reservations_content'];
$reservations_slug     = empty( $hungry_options['hungry_reservations_slug'] )     ? 'hungry-reservations' : $hungry_options['hungry_reservations_slug'];

?>
	<!-- START Section - Reservations -->
	<section id="<?php echo esc_attr( $reservations_slug ); ?>" class="section-container">
		<?php 
		
			if( ( $reservations_title || $reservations_subtitle ) && shortcode_exists( 'intro' ) ) :
			
				echo do_shortcode( '[intro title="' . esc_attr( $reservations_title ) . '" subtitle="' . esc_attr( $reservations_subtitle ) . '"]' );
				
			endif;
		
		?>
		
		<?php if( $reservations_content ) : ?>
		
		<div class="grid-container">
			<div class="prefix-10 grid-80 suffix-10 tablet-grid-100 mobile-grid-100">
			
				<!-- START Section Content -->
				<?php echo do_shortcode( wp_kses_post( $reservations_content ) ); ?>
				<!-- END Section Content -->
			
			</div>
		</div>
		
		<?php endif; ?>
		
	</section>
	<!-- END Section - Reservations -->