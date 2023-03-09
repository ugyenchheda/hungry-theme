<?php
/**
 *
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  SECTION: Meet the Staff
 *
 *  1.0.2 - Added Custom Slug Name.
 *
 */

global $hungry_options;
$team_title              = empty( $hungry_options['hungry_team_title'] )              ? '' : $hungry_options['hungry_team_title'];
$team_subtitle           = empty( $hungry_options['hungry_team_subtitle'] )           ? '' : $hungry_options['hungry_team_subtitle'];
$team_slug               = empty( $hungry_options['hungry_team_slug'] )               ? 'hungry-staff' : $hungry_options['hungry_team_slug'];

$team_01_name            = empty( $hungry_options['hungry_team_01_name'] )            ? '' : $hungry_options['hungry_team_01_name'];
$team_01_role            = empty( $hungry_options['hungry_team_01_role'] )            ? '' : $hungry_options['hungry_team_01_role'];
$team_01_thumbnail       = empty( $hungry_options['hungry_team_01_thumbnail'] )       ? '' : $hungry_options['hungry_team_01_thumbnail'];
$team_01_desc            = empty( $hungry_options['hungry_team_01_desc'] )            ? '' : $hungry_options['hungry_team_01_desc'];
$team_01_icon_01_icon    = empty( $hungry_options['hungry_team_01_icon_01_icon'] )    ? '' : $hungry_options['hungry_team_01_icon_01_icon'];
$team_01_icon_02_icon    = empty( $hungry_options['hungry_team_01_icon_02_icon'] )    ? '' : $hungry_options['hungry_team_01_icon_02_icon'];
$team_01_icon_03_icon    = empty( $hungry_options['hungry_team_01_icon_03_icon'] )    ? '' : $hungry_options['hungry_team_01_icon_03_icon'];
$team_01_icon_01_url     = empty( $hungry_options['hungry_team_01_icon_01_url'] )     ? '' : $hungry_options['hungry_team_01_icon_01_url'];
$team_01_icon_02_url     = empty( $hungry_options['hungry_team_01_icon_02_url'] )     ? '' : $hungry_options['hungry_team_01_icon_02_url'];
$team_01_icon_03_url     = empty( $hungry_options['hungry_team_01_icon_03_url'] )     ? '' : $hungry_options['hungry_team_01_icon_03_url'];
$team_01_icon_01_tooltip = empty( $hungry_options['hungry_team_01_icon_01_tooltip'] ) ? '' : $hungry_options['hungry_team_01_icon_01_tooltip'];
$team_01_icon_02_tooltip = empty( $hungry_options['hungry_team_01_icon_02_tooltip'] ) ? '' : $hungry_options['hungry_team_01_icon_02_tooltip'];
$team_01_icon_03_tooltip = empty( $hungry_options['hungry_team_01_icon_03_tooltip'] ) ? '' : $hungry_options['hungry_team_01_icon_03_tooltip'];

$team_02_name            = empty( $hungry_options['hungry_team_02_name'] )            ? '' : $hungry_options['hungry_team_02_name'];
$team_02_role            = empty( $hungry_options['hungry_team_02_role'] )            ? '' : $hungry_options['hungry_team_02_role'];
$team_02_thumbnail       = empty( $hungry_options['hungry_team_02_thumbnail'] )       ? '' : $hungry_options['hungry_team_02_thumbnail'];
$team_02_desc            = empty( $hungry_options['hungry_team_02_desc'] )            ? '' : $hungry_options['hungry_team_02_desc'];
$team_02_icon_01_icon    = empty( $hungry_options['hungry_team_02_icon_01_icon'] )    ? '' : $hungry_options['hungry_team_02_icon_01_icon'];
$team_02_icon_02_icon    = empty( $hungry_options['hungry_team_02_icon_02_icon'] )    ? '' : $hungry_options['hungry_team_02_icon_02_icon'];
$team_02_icon_03_icon    = empty( $hungry_options['hungry_team_02_icon_03_icon'] )    ? '' : $hungry_options['hungry_team_02_icon_03_icon'];
$team_02_icon_01_url     = empty( $hungry_options['hungry_team_02_icon_01_url'] )     ? '' : $hungry_options['hungry_team_02_icon_01_url'];
$team_02_icon_02_url     = empty( $hungry_options['hungry_team_02_icon_02_url'] )     ? '' : $hungry_options['hungry_team_02_icon_02_url'];
$team_02_icon_03_url     = empty( $hungry_options['hungry_team_02_icon_03_url'] )     ? '' : $hungry_options['hungry_team_02_icon_03_url'];
$team_02_icon_01_tooltip = empty( $hungry_options['hungry_team_02_icon_01_tooltip'] ) ? '' : $hungry_options['hungry_team_02_icon_01_tooltip'];
$team_02_icon_02_tooltip = empty( $hungry_options['hungry_team_02_icon_02_tooltip'] ) ? '' : $hungry_options['hungry_team_02_icon_02_tooltip'];
$team_02_icon_03_tooltip = empty( $hungry_options['hungry_team_02_icon_03_tooltip'] ) ? '' : $hungry_options['hungry_team_02_icon_03_tooltip'];

$team_03_name            = empty( $hungry_options['hungry_team_03_name'] )            ? '' : $hungry_options['hungry_team_03_name'];
$team_03_role            = empty( $hungry_options['hungry_team_03_role'] )            ? '' : $hungry_options['hungry_team_03_role'];
$team_03_thumbnail       = empty( $hungry_options['hungry_team_03_thumbnail'] )       ? '' : $hungry_options['hungry_team_03_thumbnail'];
$team_03_desc            = empty( $hungry_options['hungry_team_03_desc'] )            ? '' : $hungry_options['hungry_team_03_desc'];
$team_03_icon_01_icon    = empty( $hungry_options['hungry_team_03_icon_01_icon'] )    ? '' : $hungry_options['hungry_team_03_icon_01_icon'];
$team_03_icon_02_icon    = empty( $hungry_options['hungry_team_03_icon_02_icon'] )    ? '' : $hungry_options['hungry_team_03_icon_02_icon'];
$team_03_icon_03_icon    = empty( $hungry_options['hungry_team_03_icon_03_icon'] )    ? '' : $hungry_options['hungry_team_03_icon_03_icon'];
$team_03_icon_01_url     = empty( $hungry_options['hungry_team_03_icon_01_url'] )     ? '' : $hungry_options['hungry_team_03_icon_01_url'];
$team_03_icon_02_url     = empty( $hungry_options['hungry_team_03_icon_02_url'] )     ? '' : $hungry_options['hungry_team_03_icon_02_url'];
$team_03_icon_03_url     = empty( $hungry_options['hungry_team_03_icon_03_url'] )     ? '' : $hungry_options['hungry_team_03_icon_03_url'];
$team_03_icon_01_tooltip = empty( $hungry_options['hungry_team_03_icon_01_tooltip'] ) ? '' : $hungry_options['hungry_team_03_icon_01_tooltip'];
$team_03_icon_02_tooltip = empty( $hungry_options['hungry_team_03_icon_02_tooltip'] ) ? '' : $hungry_options['hungry_team_03_icon_02_tooltip'];
$team_03_icon_03_tooltip = empty( $hungry_options['hungry_team_03_icon_03_tooltip'] ) ? '' : $hungry_options['hungry_team_03_icon_03_tooltip'];

$allowed_html = array(

	'strong' => array(),
	'em'     => array(),
	'p'      => array(),
	'a'      => array(
	
		'href'   => array(),
		'target' => array(),
		'title'  => array()
		
	)

);

// One column layout (default)
$grid = 'prefix-30 grid-40 suffix-30 tablet-prefix-20 tablet-grid-60 tablet-suffix-20 mobile-grid-100';

// Two column layout
if( ( $team_01_name || $team_01_role || $team_01_thumbnail['url'] ) && ( $team_02_name || $team_02_role || $team_02_thumbnail['url'] ) ) {
	$grid = 'prefix-5 grid-40 suffix-5 tablet-prefix-20 tablet-grid-60 tablet-suffix-20 mobile-grid-100';
}

if( ( $team_01_name || $team_01_role || $team_01_thumbnail['url'] ) && ( $team_03_name || $team_03_role || $team_03_thumbnail['url'] ) ) {
	$grid = 'prefix-5 grid-40 suffix-5 tablet-prefix-20 tablet-grid-60 tablet-suffix-20 mobile-grid-100';
}

if( ( $team_02_name || $team_02_role || $team_02_thumbnail['url'] ) && ( $team_03_name || $team_03_role || $team_03_thumbnail['url'] ) ) {
	$grid = 'prefix-5 grid-40 suffix-5 tablet-prefix-20 tablet-grid-60 tablet-suffix-20 mobile-grid-100';
}

// Three column layout
if( ( $team_01_name || $team_01_role || $team_01_thumbnail['url'] ) && ( $team_02_name || $team_02_role || $team_02_thumbnail['url'] ) && ( $team_03_name || $team_03_role || $team_03_thumbnail['url'] ) ) {
	$grid = 'grid-33 tablet-prefix-20 tablet-grid-60 tablet-suffix-20 mobile-grid-100';
}

?>
	<!-- START Section - Staff -->
	<section id="<?php echo esc_attr( $team_slug ); ?>" class="section-container">
		<?php 
		
			if( ( $team_title || $team_subtitle ) && shortcode_exists( 'intro' ) ) :
			
				echo do_shortcode( '[intro title="' . esc_attr( $team_title ) . '" subtitle="' . esc_attr( $team_subtitle ) . '"]' );
				
			endif;
		
		?>
		<div class="grid-container">
	
			<?php if( $team_01_name || $team_01_role || $team_01_thumbnail['url'] ) : ?>
	
			<!-- START Staff Member -->
			<div class="<?php echo esc_attr( $grid ); ?>">
				<div class="wow fadeInLeft" data-wow-duration="2s" data-wow-offset="250">
					
					<?php
					
						if( shortcode_exists( 'staff' ) ) :

							echo do_shortcode( sprintf(

								'[staff name="%1$s" role="%2$s" thumbnail="%3$s" icon1="%5$s" icon2="%6$s" icon3="%7$s" link1="%8$s" link2="%9$s" link3="%10$s" tooltip1="%11$s" tooltip2="%12$s" tooltip3="%13$s"]%4$s[/staff]',
								esc_attr( $team_01_name ),
								esc_attr( $team_01_role ),
								esc_url( $team_01_thumbnail['url'] ),
								wp_kses( $team_01_desc, $allowed_html ),
								esc_attr( $team_01_icon_01_icon ),
								esc_attr( $team_01_icon_02_icon ),
								esc_attr( $team_01_icon_03_icon ),
								esc_url( $team_01_icon_01_url ),
								esc_url( $team_01_icon_02_url ),
								esc_url( $team_01_icon_03_url ),
								esc_attr( $team_01_icon_01_tooltip ),
								esc_attr( $team_01_icon_02_tooltip ),
								esc_attr( $team_01_icon_03_tooltip )
								
							) );
						
						endif;
						
					?>
					
				</div>
			</div>
			<!-- END Staff Member -->
			
			<?php endif; ?>
			<?php if( $team_02_name || $team_02_role || $team_02_thumbnail['url'] ) : ?>
			
			<!-- START Staff Member -->
			<div class="<?php echo esc_attr( $grid ); ?>">
				<div class="wow fadeInUp" data-wow-duration="2s" data-wow-offset="250">
					
					<?php
					
						if( shortcode_exists( 'staff' ) ) :

							echo do_shortcode( sprintf(

								'[staff name="%1$s" role="%2$s" thumbnail="%3$s" icon1="%5$s" icon2="%6$s" icon3="%7$s" link1="%8$s" link2="%9$s" link3="%10$s" tooltip1="%11$s" tooltip2="%12$s" tooltip3="%13$s"]%4$s[/staff]',
								esc_attr( $team_02_name ),
								esc_attr( $team_02_role ),
								esc_url( $team_02_thumbnail['url'] ),
								wp_kses( $team_02_desc, $allowed_html ),
								esc_attr( $team_02_icon_01_icon ),
								esc_attr( $team_02_icon_02_icon ),
								esc_attr( $team_02_icon_03_icon ),
								esc_url( $team_02_icon_01_url ),
								esc_url( $team_02_icon_02_url ),
								esc_url( $team_02_icon_03_url ),
								esc_attr( $team_02_icon_01_tooltip ),
								esc_attr( $team_02_icon_02_tooltip ),
								esc_attr( $team_02_icon_03_tooltip )
								
							) );
						
						endif;
						
					?>
					
				</div>
			</div>
			<!-- END Staff Member -->
			
			<?php endif; ?>
			<?php if( $team_03_name || $team_03_role || $team_03_thumbnail['url'] ) : ?>
			
			<!-- START Staff Member -->
			<div class="<?php echo esc_attr( $grid ); ?>">
				<div class="wow fadeInRight" data-wow-duration="2s" data-wow-offset="250">
					
					<?php
					
						if( shortcode_exists( 'staff' ) ) :

							echo do_shortcode( sprintf(

								'[staff name="%1$s" role="%2$s" thumbnail="%3$s" icon1="%5$s" icon2="%6$s" icon3="%7$s" link1="%8$s" link2="%9$s" link3="%10$s" tooltip1="%11$s" tooltip2="%12$s" tooltip3="%13$s"]%4$s[/staff]',
								esc_attr( $team_03_name ),
								esc_attr( $team_03_role ),
								esc_url( $team_03_thumbnail['url'] ),
								wp_kses( $team_03_desc, $allowed_html ),
								esc_attr( $team_03_icon_01_icon ),
								esc_attr( $team_03_icon_02_icon ),
								esc_attr( $team_03_icon_03_icon ),
								esc_url( $team_03_icon_01_url ),
								esc_url( $team_03_icon_02_url ),
								esc_url( $team_03_icon_03_url ),
								esc_attr( $team_03_icon_01_tooltip ),
								esc_attr( $team_03_icon_02_tooltip ),
								esc_attr( $team_03_icon_03_tooltip )
								
							) );
						
						endif;
						
					?>
					
				</div>
			</div>
			<!-- END Staff Member -->
			
			<?php endif; ?>
			
		</div>
	</section>
	<!-- END Section - Staff -->