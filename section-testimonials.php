<?php
/**
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  SECTION: Testimonials
 *
 *  1.0.2 - Added Custom Slug Name.
 *  1.0.1 - Added more output sanitization.
 *
 */

global $hungry_options;

$testimonials_heading     = empty( $hungry_options['hungry_testimonials_heading'] ) ? '' : $hungry_options['hungry_testimonials_heading'];
$testimonials_layout      = empty( $hungry_options['hungry_testimonials_layout'] )  ? 'prefix-10 grid-30 suffix-10 tablet-grid-50 mobile-grid-100' : $hungry_options['hungry_testimonials_layout'];
$testimonials_slug        = empty( $hungry_options['hungry_testimonials_slug'] )    ? 'hungry-testimonials' : $hungry_options['hungry_testimonials_slug'];

$testimonial_quote_01     = empty( $hungry_options['hungry_testimonial_quote_01'] )     ? '' : $hungry_options['hungry_testimonial_quote_01'];
$testimonial_cite_01      = empty( $hungry_options['hungry_testimonial_cite_01'] )      ? '' : $hungry_options['hungry_testimonial_cite_01'];
$testimonial_thumbnail_01 = empty( $hungry_options['hungry_testimonial_thumbnail_01'] ) ? '' : $hungry_options['hungry_testimonial_thumbnail_01'];
$testimonial_quote_02     = empty( $hungry_options['hungry_testimonial_quote_02'] )     ? '' : $hungry_options['hungry_testimonial_quote_02'];
$testimonial_cite_02      = empty( $hungry_options['hungry_testimonial_cite_02'] )      ? '' : $hungry_options['hungry_testimonial_cite_02'];
$testimonial_thumbnail_02 = empty( $hungry_options['hungry_testimonial_thumbnail_02'] ) ? '' : $hungry_options['hungry_testimonial_thumbnail_02'];
$testimonial_quote_03     = empty( $hungry_options['hungry_testimonial_quote_03'] )     ? '' : $hungry_options['hungry_testimonial_quote_03'];
$testimonial_cite_03      = empty( $hungry_options['hungry_testimonial_cite_03'] )      ? '' : $hungry_options['hungry_testimonial_cite_03'];
$testimonial_thumbnail_03 = empty( $hungry_options['hungry_testimonial_thumbnail_03'] ) ? '' : $hungry_options['hungry_testimonial_thumbnail_03'];
$testimonial_quote_04     = empty( $hungry_options['hungry_testimonial_quote_04'] )     ? '' : $hungry_options['hungry_testimonial_quote_04'];
$testimonial_cite_04      = empty( $hungry_options['hungry_testimonial_cite_04'] )      ? '' : $hungry_options['hungry_testimonial_cite_04'];
$testimonial_thumbnail_04 = empty( $hungry_options['hungry_testimonial_thumbnail_04'] ) ? '' : $hungry_options['hungry_testimonial_thumbnail_04'];

?>
	<!-- START Section - Testimonials -->
	<section id="<?php echo esc_attr( $testimonials_slug ); ?>" class="section-container parallax">
		<div class="grid-container">
			<?php 
			
				if( $testimonials_heading && shortcode_exists( 'intro_alt' ) ) :
			
					echo do_shortcode( '[intro_alt title="' . wp_kses_data( $testimonials_heading ) . '"]' );
					
				endif;
			
			?>
			<?php if( $testimonial_quote_01 && shortcode_exists( 'testimonial' ) ) : ?>
			
				<div class="wow fadeInLeft" data-wow-duration="2s" data-wow-offset="250">
					<div class="<?php echo esc_attr( $testimonials_layout ); ?>">
						<?php echo do_shortcode( '[testimonial cite="' . wp_kses_data( $testimonial_cite_01 ) . '" thumbnail="' . esc_url( $testimonial_thumbnail_01['url'] ) . '"]' . wp_kses_post( $testimonial_quote_01 ) . '[/testimonial]' ); ?>
					</div>
				</div>
			
			<?php endif; ?>
			<?php if( $testimonial_quote_02 && shortcode_exists( 'testimonial' ) ) : ?>
			
				<div class="wow fadeInRight" data-wow-duration="2s" data-wow-offset="250">
					<div class="<?php echo esc_attr( $testimonials_layout ); ?>">
						<?php echo do_shortcode( '[testimonial cite="' . wp_kses_data( $testimonial_cite_02 ) . '" thumbnail="' . esc_url( $testimonial_thumbnail_02['url'] ) . '"]' . wp_kses_post( $testimonial_quote_02 ) . '[/testimonial]' ); ?>
					</div>
				</div>
			
			<?php endif; ?>
			<br class="clear" />
			<?php if( $testimonial_quote_03 && shortcode_exists( 'testimonial' ) ) : ?>
			
				<div class="wow fadeInLeft" data-wow-duration="2s" data-wow-offset="250">
					<div class="<?php echo esc_attr( $testimonials_layout ); ?>">
						<?php echo do_shortcode( '[testimonial cite="' . wp_kses_data( $testimonial_cite_03 ) . '" thumbnail="' . esc_url( $testimonial_thumbnail_03['url'] ) . '"]' . wp_kses_post( $testimonial_quote_03 ) . '[/testimonial]' ); ?>
					</div>
				</div>
			
			<?php endif; ?>
			<?php if( $testimonial_quote_04 && shortcode_exists( 'testimonial' ) ) : ?>
			
				<div class="wow fadeInRight" data-wow-duration="2s" data-wow-offset="250">
					<div class="<?php echo esc_attr( $testimonials_layout ); ?>">
						<?php echo do_shortcode( '[testimonial cite="' . wp_kses_data( $testimonial_cite_04 ) . '" thumbnail="' . esc_url( $testimonial_thumbnail_04['url'] ) . '"]' . wp_kses_post( $testimonial_quote_04 ) . '[/testimonial]' ); ?>
					</div>
				</div>
			
			<?php endif; ?>
		</div>
	</section>
	<!-- END Section - Testimonials -->