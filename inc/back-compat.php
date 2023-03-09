<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Prevents Hungry from running on WordPress versions prior to 4.1,
 *  since this theme is not meant to be backward compatible beyond that and
 *  relies on many newer functions and markup changes introduced in 4.1.
 *
 *  Lifted and slightly modified from Twenty Fifteen.
 *
 *  1.0.1 - Added more output sanitization.
 *
 */

/**
 *  Switch back to the default theme.
 *  ---------------------------------------------------------------------------
 */
function hungry_switch_theme() {

	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'hungry_upgrade_notice' );
	
}
add_action( 'after_switch_theme', 'hungry_switch_theme' );

/**
 *  Admin notice for unsuccessful theme switch.
 *  ---------------------------------------------------------------------------
 */
function hungry_upgrade_notice() {

	$message = sprintf( esc_html__( 'Hungry requires at least WordPress version 4.1. You are running version %s. Please upgrade to the latest version of WordPress and try again.', 'hungry' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
	
}

/**
 *  Prevent the customizer from loading on older versions of WordPress.
 *  ---------------------------------------------------------------------------
 */
function hungry_preview() {

	if ( isset( $_GET['preview'] ) ) {
	
		wp_die( sprintf( esc_html__( 'Hungry requires at least WordPress version 4.1. You are running version %s. Please upgrade to the latest version of WordPress and try again.', 'hungry' ), $GLOBALS['wp_version'] ) );
		
	}
	
}
add_action( 'template_redirect', 'hungry_preview' );