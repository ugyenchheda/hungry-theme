<?php
/**
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  SECTION: Gallery
 *
 *  1.0.2 - Added Custom Slug Name.
 *
 */

global $hungry_options;
$gallery_title         = empty( $hungry_options['hungry_gallery_title'] )    ? '' : $hungry_options['hungry_gallery_title'];
$gallery_subtitle      = empty( $hungry_options['hungry_gallery_subtitle'] ) ? '' : $hungry_options['hungry_gallery_subtitle'];
$gallery_images_string = empty( $hungry_options['hungry_gallery_images'] )   ? '' : $hungry_options['hungry_gallery_images'];
$gallery_slug          = empty( $hungry_options['hungry_gallery_slug'] )     ? 'hungry-gallery' : $hungry_options['hungry_gallery_slug'];

$gallery_images = '';
if( $gallery_images_string ) {

	$gallery_images = explode( ',', $gallery_images_string );
	
}

?>
	<!-- START Section - Gallery -->
	<section id="<?php echo esc_attr( $gallery_slug ); ?>" class="section-container">
	
		<?php 
		
			if( ( $gallery_title || $gallery_subtitle ) && shortcode_exists( 'intro' ) ) :
			
				echo do_shortcode( '[intro title="' . esc_attr( $gallery_title ) . '" subtitle="' . esc_attr( $gallery_subtitle ) . '"]' );
				
			endif;

		?>
	
		<?php if( $gallery_images ) : ?>
	
		<!-- START Main Gallery -->
		<div class="grid-container">
			<div class="grid-100 tablet-grid-100 mobile-grid-100">
				<div class="hungry-gallery">
				
				<?php foreach( $gallery_images as $image ) : ?>
				
					<?php
					
						$class   = '';
						$caption = '';
						$src     = wp_get_attachment_image_src( $image, 'full' );
						if( function_exists( 'hungry_get_attachment' ) ) :
						
							$atts = hungry_get_attachment( $image );
							if( $atts['hungry_class'] ) :
							
								$class = ' ' . $atts['hungry_class'];
								
							endif;
							if( $atts['caption'] ) :
							
								$caption = $atts['caption'];
							
							endif;
						
						endif;
					
					?>
				
					<div class="hungry-gallery-item<?php echo esc_attr( $class ); ?> wow fadeIn" data-wow-duration="2s" data-wow-offset="250">
						<a class="image-hover lightbox-gallery" href="<?php echo esc_url( $src[0] ); ?>"<?php if( $caption ) : ?> title="<?php echo esc_attr( $caption ); ?>"<?php endif; ?>>
							<?php echo wp_get_attachment_image( $image, 'full'  ); ?>
							<div class="image-hover-overlay">
								<i class="fa fa-search-plus"></i>
							</div>
						</a>
					</div>
					
				<?php endforeach; ?>
					
				</div>
			</div>
		</div>
		<!-- END Main Gallery -->
		
		<?php endif; ?>
		
	</section>
	<!-- END Section - Gallery -->