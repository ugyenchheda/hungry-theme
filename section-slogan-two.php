<?php
/**
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  SECTION: Slogan 02
 *
 *  1.0.2 - Added Custom Slug Name.
 *  1.0.1 - Improved sanitization output.
 *
 */

global $hungry_options;

$slogan_02_text      = empty( $hungry_options['hungry_slogan_02_text'] ) ? '' : $hungry_options['hungry_slogan_02_text'];
$slogan_02_link      = empty( $hungry_options['hungry_slogan_02_link'] ) ? '' : $hungry_options['hungry_slogan_02_link'];
$slogan_02_slug      = empty( $hungry_options['hungry_slogan_02_slug'] ) ? 'hungry-slogan-02' : $hungry_options['hungry_slogan_02_slug'];
$slogan_02_video_url = empty( $hungry_options['hungry_slogan_02_video_url'] ) ? '' : $hungry_options['hungry_slogan_02_video_url'];

$vide_data = '';
if( $slogan_02_video_url['url'] ) {
	
	$vide_data = ' data-vide-bg="' . esc_url( $slogan_02_video_url['url'] ) . '"';
	
}

?>
	<!-- START Section - Slogan 02 -->
	<?php if( $slogan_02_link ) : ?>
	<a href="<?php echo esc_url( $slogan_02_link ); ?>" class="clickable-slogan">
	<?php endif; ?>
	<section id="<?php echo esc_attr( $slogan_02_slug ); ?>" class="section-container parallax"<?php echo wp_kses_data( $vide_data ); ?>>
		<div class="grid-container">
			<?php if( $slogan_02_text ) : ?>
			
				<div class="grid-100 tablet-grid-100 mobile-grid-100 no-margin">
					<div class="wow zoomIn" data-wow-duration="2s" data-wow-offset="250">
						<div class="hungry-slogan">
							<h2 class="hungry-slogan-text">
							<?php 
								
								echo wp_kses( $slogan_02_text, array(
		
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
	<?php if( $slogan_02_link ) : ?>
	</a>
	<?php endif; ?>
	<!-- END Section - Slogan 02 -->