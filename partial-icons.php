<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Template part used to display the social icons on the homepage.
 *
 */

global $hungry_options;

$target     = checked( $hungry_options['hungry_social_target'], 1, false ) ? ' target="_blank"' : '';

$icon_01    = empty( $hungry_options['hungry_social_icon_01'] )    ? '' : $hungry_options['hungry_social_icon_01'];
$url_01     = empty( $hungry_options['hungry_social_link_01'] )    ? '' : $hungry_options['hungry_social_link_01'];
$tooltip_01 = empty( $hungry_options['hungry_social_tooltip_01'] ) ? '' : $hungry_options['hungry_social_tooltip_01'];
$icon_02    = empty( $hungry_options['hungry_social_icon_02'] )    ? '' : $hungry_options['hungry_social_icon_02'];
$url_02     = empty( $hungry_options['hungry_social_link_02'] )    ? '' : $hungry_options['hungry_social_link_02'];
$tooltip_02 = empty( $hungry_options['hungry_social_tooltip_02'] ) ? '' : $hungry_options['hungry_social_tooltip_02'];
$icon_03    = empty( $hungry_options['hungry_social_icon_03'] )    ? '' : $hungry_options['hungry_social_icon_03'];
$url_03     = empty( $hungry_options['hungry_social_link_03'] )    ? '' : $hungry_options['hungry_social_link_03'];
$tooltip_03 = empty( $hungry_options['hungry_social_tooltip_03'] ) ? '' : $hungry_options['hungry_social_tooltip_03'];
$icon_04    = empty( $hungry_options['hungry_social_icon_04'] )    ? '' : $hungry_options['hungry_social_icon_04'];
$url_04     = empty( $hungry_options['hungry_social_link_04'] )    ? '' : $hungry_options['hungry_social_link_04'];
$tooltip_04 = empty( $hungry_options['hungry_social_tooltip_04'] ) ? '' : $hungry_options['hungry_social_tooltip_04'];
$icon_05    = empty( $hungry_options['hungry_social_icon_05'] )    ? '' : $hungry_options['hungry_social_icon_05'];
$url_05     = empty( $hungry_options['hungry_social_link_05'] )    ? '' : $hungry_options['hungry_social_link_05'];
$tooltip_05 = empty( $hungry_options['hungry_social_tooltip_05'] ) ? '' : $hungry_options['hungry_social_tooltip_05'];
$icon_06    = empty( $hungry_options['hungry_social_icon_06'] )    ? '' : $hungry_options['hungry_social_icon_06'];
$url_06     = empty( $hungry_options['hungry_social_link_06'] )    ? '' : $hungry_options['hungry_social_link_06'];
$tooltip_06 = empty( $hungry_options['hungry_social_tooltip_06'] ) ? '' : $hungry_options['hungry_social_tooltip_06'];

/*
 *  If there's no icons or URLs, don't print empty markup.
 */
if( ( ! $icon_01 || ! $url_01 ) &&
	( ! $icon_02 || ! $url_02 ) &&
	( ! $icon_03 || ! $url_03 ) &&
	( ! $icon_04 || ! $url_04 ) &&
	( ! $icon_05 || ! $url_05 ) &&
	( ! $icon_06 || ! $url_06 ) ) {

	return;

}

?>
	<!-- START Social Icons -->
	<div class="single-page-social-icons">
		<ul class="single-page-social-icons-list">
		
			<?php if( $icon_01 && $url_01 ) : ?>
				<li><a href="<?php echo esc_url( $url_01 ); ?>"<?php if( $tooltip_01 ) : ?> class="header-social-icon-tooltip" title="<?php echo esc_attr( $tooltip_01 ); ?>"<?php endif; echo esc_attr( $target ); ?>><i class="<?php echo esc_attr( $icon_01 ); ?>"></i></a></li>
			<?php endif; ?>
			<?php if( $icon_02 && $url_02 ) : ?>
				<li><a href="<?php echo esc_url( $url_02 ); ?>"<?php if( $tooltip_02 ) : ?> class="header-social-icon-tooltip" title="<?php echo esc_attr( $tooltip_02 ); ?>"<?php endif; echo esc_attr( $target ); ?>><i class="<?php echo esc_attr( $icon_02 ); ?>"></i></a></li>
			<?php endif; ?>
			<?php if( $icon_03 && $url_03 ) : ?>
				<li><a href="<?php echo esc_url( $url_03 ); ?>"<?php if( $tooltip_03 ) : ?> class="header-social-icon-tooltip" title="<?php echo esc_attr( $tooltip_03 ); ?>"<?php endif; echo esc_attr( $target ); ?>><i class="<?php echo esc_attr( $icon_03 ); ?>"></i></a></li>
			<?php endif; ?>
			<?php if( $icon_04 && $url_04 ) : ?>
				<li><a href="<?php echo esc_url( $url_04 ); ?>"<?php if( $tooltip_04 ) : ?> class="header-social-icon-tooltip" title="<?php echo esc_attr( $tooltip_04 ); ?>"<?php endif; echo esc_attr( $target ); ?>><i class="<?php echo esc_attr( $icon_04 ); ?>"></i></a></li>
			<?php endif; ?>
			<?php if( $icon_05 && $url_05 ) : ?>
				<li><a href="<?php echo esc_url( $url_05 ); ?>"<?php if( $tooltip_05 ) : ?> class="header-social-icon-tooltip" title="<?php echo esc_attr( $tooltip_05 ); ?>"<?php endif; echo esc_attr( $target ); ?>><i class="<?php echo esc_attr( $icon_05 ); ?>"></i></a></li>
			<?php endif; ?>
			<?php if( $icon_06 && $url_06 ) : ?>
				<li><a href="<?php echo esc_url( $url_06 ); ?>"<?php if( $tooltip_06 ) : ?> class="header-social-icon-tooltip" title="<?php echo esc_attr( $tooltip_06 ); ?>"<?php endif; echo esc_attr( $target ); ?>><i class="<?php echo esc_attr( $icon_06 ); ?>"></i></a></li>
			<?php endif; ?>
			
		</ul>
	</div>
	<!-- END Social Icons -->