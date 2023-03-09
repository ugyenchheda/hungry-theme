<?php
/**
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  SECTION: Custom - Default
 *
 *  This template part is not currently in use. Maybe added if needed in a
 *  future release.
 *
 *  1.0.1 - Added more output sanitization.
 *
 */

$section = get_post( 1 );
$section_padding_top    = strip_tags( get_post_meta( $section->ID, '_hungry_section_padding_top', true ) );
$section_padding_bottom = strip_tags( get_post_meta( $section->ID, '_hungry_section_padding_bottom', true ) );

?>
	<!-- START Section - Custom -->
	<section id="hungry-custom-section-<?php echo esc_attr( $section->ID ); ?>"
		class="section-container"
		style="padding-top: <?php echo esc_attr( $section_padding_top ); ?>px; padding-bottom: <?php echo esc_attr( $section_padding_bottom ); ?>px;"
		>
		<div class="grid-container">
		
			<?php
			
				echo wp_kses_post( wpautop( $section->post_content ) );
			
			?>
		
		</div>
	</section>
	<!-- END Section - Custom -->