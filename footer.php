<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  All the main footer content, including footer sidebars and widgets.
 *
 *  1.0.1 - Added more output sanitization.
 *
 */

global $hungry_options;
$footer_logo     = empty( $hungry_options['hungry_footer_logo'] )     ? ''  : $hungry_options['hungry_footer_logo'];
$footer_logo_alt = empty( $hungry_options['hungry_footer_logo_alt'] ) ? ''  : $hungry_options['hungry_footer_logo_alt'];
$footer_text     = empty( $hungry_options['hungry_footer_text'] )     ? ''  : $hungry_options['hungry_footer_text'];
$btt             = checked( $hungry_options['hungry_btt'], 1, false ) ? '1' : '';

/*
 *  Amend the column size depending on what options are set.
 *  Single column will center the content.
 */
$grid = 'grid-100 tablet-grid-100 mobile-grid-100 footer-center';
if( $footer_logo['url'] && $footer_text ) {

	$grid = 'grid-50 tablet-grid-100 mobile-grid-100';

}

?>
<!-- START Site Footer -->
<footer id="site-footer">

	<?php if( is_active_sidebar( 'sidebar-footer-01' ) || is_active_sidebar( 'sidebar-footer-02' ) || is_active_sidebar( 'sidebar-footer-03' ) || is_active_sidebar( 'sidebar-footer-04' ) ) : ?>
	
		<!-- START Widget Area -->
		<div class="widget-area grid-container">
			<?php hungry_footer_widgets_layout(); ?>
		</div>
		<!-- END Widget Area -->
		
	<?php endif; ?>
	
	<?php if( $footer_logo['url'] || $footer_text ) : ?>
	
		<!-- START Bottom Area -->
		<div id="bottom-footer">
			<div class="grid-container">
				<?php if( $footer_logo['url'] ) : ?>
				
					<!-- Footer Logo -->
					<div class="footer-logo <?php echo esc_attr( $grid ); ?>">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img class="footer-logo-image" src="<?php echo esc_url( $footer_logo['url'] ); ?>" alt="<?php echo esc_attr( sanitize_text_field( $footer_logo_alt ) ); ?>" />
						</a>
					</div>
				
				<?php endif; ?>
				<?php if( $footer_text ) : ?>
			
					<!-- Footer Text -->
					<div class="footer-text <?php echo esc_attr( $grid ); ?>">
						<?php echo wpautop( wp_kses_post( $footer_text ) ); ?>
					</div>
			
				<?php endif; ?>
			</div>
		</div>
		<!-- END Bottom Area -->
		
	<?php endif; // Check for logo URL and footer text. ?>
</footer>
<!-- END Site Footer -->

<?php if( $btt ) : ?>

	<!-- "Back-to-Top" Button -->
	<div id="btt">
		<i class="fa fa-angle-up"></i>
	</div>

<?php endif; ?>
<?php wp_footer(); ?>

</body>
</html>