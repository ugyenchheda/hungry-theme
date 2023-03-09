<?php
/**
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  SECTION: Slogan 03
 *
 *  1.0.2 - File added.
 *          Added Custom Slug Name.
 *  1.0.1 - Improved sanitization output.
 *
 */

global $hungry_options;

$slogan_03_text      = empty( $hungry_options['hungry_slogan_03_text'] ) ? '' : $hungry_options['hungry_slogan_03_text'];
$slogan_03_link      = empty( $hungry_options['hungry_slogan_03_link'] ) ? '' : $hungry_options['hungry_slogan_03_link'];
$slogan_03_slug      = empty( $hungry_options['hungry_slogan_03_slug'] ) ? 'hungry-slogan-03' : $hungry_options['hungry_slogan_03_slug'];
$slogan_03_video_url = empty( $hungry_options['hungry_slogan_03_video_url'] ) ? '' : $hungry_options['hungry_slogan_03_video_url'];

$vide_data = '';
if( $slogan_03_video_url['url'] ) {
	
	$vide_data = ' data-vide-bg="' . esc_url( $slogan_03_video_url['url'] ) . '"';
	
}

?>
	<!-- START Section - Slogan 03 -->
	<?php if( $slogan_03_link ) : ?>
		<a href="<?php echo esc_url( $slogan_03_link ); ?>" class="clickable-slogan">
	<?php endif; ?>
	<section id="<?php echo esc_attr( $slogan_03_slug ); ?>" class="section-container parallax"<?php echo wp_kses_data( $vide_data ); ?>>
		<div class="grid-container">
			<?php if( $slogan_03_text ) : ?>
			
				<div class="grid-100 tablet-grid-100 mobile-grid-100 no-margin">
					<div class="wow zoomIn" data-wow-duration="2s" data-wow-offset="250">
						<div class="hungry-slogan">
							<h2 class="hungry-slogan-text">
							<?php 
								
								echo wp_kses( $slogan_03_text, array(
		
									'br'   => array(),
									'em'   => array(),
									'span' => array()

								) );
								
							?>
							</h2>
						</div>
					</div>
				</div>
			
			<?php endif; ?>
		</div>
	</section>
	<?php if( $slogan_03_link ) : ?>
		</a>
	<?php endif; ?>
	<!-- END Section - Slogan 03 -->