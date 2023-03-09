<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Theme options created with Redux. For more info visit:
 *  http://reduxframework.com/
 *
 *  1.0.2 - Updated to Redux 3.5.2.2 and now uses the Redux API.
 *        - Added more options.
 *
 *  1.0.1 - Removed and altered some options (sanitization issues).
 *        - Removed NiceScroll option. No longer used.
 *        - Wrapped many of the text strings in esc_html__() and wp_kses_data() where needed.
 *
 */

if ( ! class_exists( 'Redux' ) ) {
	
	return;
	
}

/**
 *  Options Panel Settings.
 *  ---------------------------------------------------------------------------
 */
$opt_name = 'hungry_options';
$theme    = wp_get_theme();
$args     = array(

	'opt_name'             => $opt_name,
	'display_name'         => esc_html__( 'Hungry - Theme Options', 'hungry' ),
	'display_version'      => $theme->get( 'Version' ),
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Hungry Options', 'hungry' ),
	'page_title'           => esc_html__( 'Hungry Options', 'hungry' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => true,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-admin-generic',
	'admin_bar_priority'   => 50,
	'global_variable'      => '',
	'dev_mode'             => false,
	'update_notice'        => true,
	'customizer'           => true,
	// 'open_expanded'     => true,  // Allow you to start the panel in an expanded way initially.
	// 'disable_save_warn' => true,  // Disable the save warning when a user changes a field.
	'page_priority'        => null,
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => '',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => '_options',
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'show_import_export'   => true,
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	'output_tag'           => true,
	// 'footer_credit'     => '',  // Disable the footer credit of Redux. Please leave if you can help it.
	'database'             => '',
	'system_info'          => false,
	'hints'                => array(
	
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => '#ccad52',
		'icon_size'     => 'normal',
		'tip_style'     => array(
		
			'color'   => 'dark',
			'shadow'  => true,
			'rounded' => false,
			'style'   => ''
			
		),
		'tip_position'  => array(
		
			'my' => 'bottom center',
			'at' => 'top center'
			
		),
		'tip_effect'    => array(
		
			'show' => array(
			
				'effect'   => 'fade',
				'duration' => '150',
				'event'    => 'mouseover'
			
			),
			'hide' => array(
		
				'effect'   => 'fade',
				'duration' => '150',
				'event'    => 'click mouseleave'
			
			),
		
		),
	
	)

);

/**
 *  Share Icons.
 *  ---------------------------------------------------------------------------
 */
$args['share_icons'][] = array(
			
	'url'   => 'http://twitter.com/SubatomicThemes',
	'title' => esc_html__( 'Follow us on Twitter', 'hungry' ),
	'icon'  => 'el el-twitter'
	
);

/**
 *  Intro and Footer Text.
 *  ---------------------------------------------------------------------------
 */
$args['intro_text'] = sprintf(

	wp_kses_post( __( 'Welcome to the new and improved theme options panel for <strong>Hungry</strong>! Version 1.0.2 introduces a few new options and features. Learn more about this by checking out the theme\'s <a href="http://bit.do/ZYMg" target="_blank">documentation</a>. Enjoy!', 'hungry' ) ),
	get_template_directory_uri() . '/documentation/index.html'

);
$args['footer_text'] = wp_kses_data( __( 'Thanks for creating your site with <strong>Hungry</strong> and <strong>WordPress</strong>. If you have any questions, please drop by the item\'s comments page over at Themeforest.net and leave us a comment! If you like the theme, don\'t forget to rate it!', 'hungry' ) );
Redux::setArgs( $opt_name, $args );

/**
 *  Help Tabs.
 *  ---------------------------------------------------------------------------
 */
$tabs = array(

	 array(
			
		'id'      => 'hungry-help-contact',
		'title'   => esc_html__( 'Contact Me', 'hungry' ),
		'content' => wp_kses_post( __( '<p>If you have any problems or questions, there are two ways to do this. The first and easiest way is to leave a comment in the item\'s comment page over at Themeforest.net. The other way is to contact me directly by using the contact form found on my <a href="http://themeforest.net/user/SubatomicThemes" target="_blank">profile page</a>.</p>', 'hungry' ) )
		
	)
	
);
Redux::setHelpTab( $opt_name, $tabs );

/**
 *  Sidebar Help.
 *  ---------------------------------------------------------------------------
 */
$content = __( '<p><strong>Tip:</strong> Fields marked with <strong>*</strong>, are currently displaying default values.</p>', 'hungry' );
Redux::setHelpSidebar( $opt_name, $content );

/*
 *  Retrive a list of all allowed HTML tags for use in "Editor" fields.
 */
$allowed_html = wp_kses_allowed_html( 'post' );

/*
 *  Translations for switches.
 */
$hungry_enabled  = esc_html( _x( 'Enabled',  'Used for switches in the theme options', 'hungry' ) );
$hungry_disabled = esc_html( _x( 'Disabled', 'Used for switches in the theme options', 'hungry' ) );
$hungry_on       = esc_html( _x( 'On',       'Used for switches in the theme options', 'hungry' ) );
$hungry_off      = esc_html( _x( 'Off',      'Used for switches in the theme options', 'hungry' ) );

/*
 *  Predefined sections array.
 */
$hungry_sections = array(

	'hungry_about_us'     => "<i class='el el-home-alt'></i>"     . esc_html( _x( 'About Us', 'Section name', 'hungry' ) ),
	'hungry_testimonials' => "<i class='el el-smiley-alt'></i>"    . esc_html( _x( 'Testimonials', 'Section name', 'hungry' ) ),
	'hungry_food_menu'    => "<i class='el el-website-alt'></i>"   . esc_html( _x( 'Food Menu', 'Section name', 'hungry' ) ),
	'hungry_slogan_one'   => "<i class='el el-quote-alt'></i>"    . esc_html( _x( 'Slogan 01', 'Section name', 'hungry' ) ),
	'hungry_staff'        => "<i class='el el-group-alt'></i>"     . esc_html( _x( 'Meet the Staff', 'Section name', 'hungry' ) ),
	'hungry_slogan_two'   => "<i class='el el-quote-alt'></i>"    . esc_html( _x( 'Slogan 02', 'Section name', 'hungry' ) ),
	'hungry_gallery'      => "<i class='el el-photo-alt'></i>"     . esc_html( _x( 'Gallery', 'Section name', 'hungry' ) ),
	'hungry_blog'         => "<i class='el el-file-edit-alt'></i>" . esc_html( _x( 'Blog', 'Section name', 'hungry' ) ),
	'hungry_reservations' => "<i class='el el-calendar-sign'></i>" . esc_html( _x( 'Reservations', 'Section name', 'hungry' ) )
	
);

$page_ids     = array();
$page_slugs   = array();
$page_titles  = array();
$hungry_pages = array();
$pages        = get_pages();

foreach( $pages as $page ) {

	$page_ids[]    = 'page-' . $page->ID;
	$page_titles[] = "<i class='el el-file'></i>" . $page->post_title;
	
}

/*
 *  Add the new Slogans but don't insert them in the "Enabled" column by default.
 */
$page_ids[]    = 'hungry_slogan_three';
$page_ids[]    = 'hungry_slogan_four';

$page_titles[] = "<i class='el el-quote-alt'></i>" . esc_html( _x( 'Slogan 03', 'Section name', 'hungry' ) );
$page_titles[] = "<i class='el el-quote-alt'></i>" . esc_html( _x( 'Slogan 04', 'Section name', 'hungry' ) );

$hungry_pages  = array_combine( $page_ids, $page_titles );

$post_order_options = array(

	'none'       => esc_html( _x( 'None', 'Post order values', 'hungry' ) ),
	'ID'         => esc_html( _x( 'Post ID', 'Post order values', 'hungry' ) ),
	'author'     => esc_html( _x( 'Post Author', 'Post order values', 'hungry' ) ),
	'title'      => esc_html( _x( 'Post Title', 'Post order values', 'hungry' ) ),
	'name'       => esc_html( _x( 'Post Slug Name', 'Post order values', 'hungry' ) ),
	'date'       => esc_html( _x( 'Post Date', 'Post order values', 'hungry' ) ),
	'menu_order' => esc_html( _x( 'Menu Order', 'Post order values', 'hungry' ) ),
	'rand'       => esc_html( _x( 'Randomize', 'Post order values', 'hungry' ) )

);

$animate_options = array(

	esc_html__( 'Attention Seekers', 'hungry' ) => array(
	
		'bounce'             => esc_html__( 'Bounce', 'hungry' ),
		'flash'              => esc_html__( 'Flash', 'hungry' ),
		'pulse'              => esc_html__( 'Pulse', 'hungry' ),
		'rubberBand'         => esc_html__( 'Rubber Band', 'hungry' ),
		'shake'              => esc_html__( 'Shake', 'hungry' ),
		'swing'              => esc_html__( 'Swing', 'hungry' ),
		'tada'               => esc_html__( 'TaDa!', 'hungry' ),
		'wobble'             => esc_html__( 'Wobble', 'hungry' )
		
	),
	esc_html__( 'Bouncing Entrances', 'hungry' ) => array(
	
		'bounceIn'           => esc_html__( 'Bounce In', 'hungry' ),
		'bounceInDown'       => esc_html__( 'Bounce In Down', 'hungry' ),
		'bounceInLeft'       => esc_html__( 'Bounce In Left', 'hungry' ),
		'bounceInRight'      => esc_html__( 'Bounce In Right', 'hungry' ),
		'bounceInUp'         => esc_html__( 'Bounce In Up', 'hungry' )
	
	),
	esc_html__( 'Bouncing Exits', 'hungry' ) => array(
	
		'bounceOut'          => esc_html__( 'Bounce Out', 'hungry' ),
		'bounceOutDown'      => esc_html__( 'Bounce Out Down', 'hungry' ),
		'bounceOutLeft'      => esc_html__( 'Bounce Out Left', 'hungry' ),
		'bounceOutRight'     => esc_html__( 'Bounce Out Right', 'hungry' ),
		'bounceOutUp'        => esc_html__( 'Bounce Out Up', 'hungry' )
		
	),
	esc_html__( 'Fading Entrances', 'hungry' ) => array(
	
		'fadeIn'             => esc_html__( 'Fade In', 'hungry' ),
		'fadeInDown'         => esc_html__( 'Fade In Down', 'hungry' ),
		'fadeInDownBig'      => esc_html__( 'Fade In Down (Big)', 'hungry' ),
		'fadeInLeft'         => esc_html__( 'Fade In Left', 'hungry' ),
		'fadeInLeftBig'      => esc_html__( 'Fade In Left (Big)', 'hungry' ),
		'fadeInRight'        => esc_html__( 'Fade In Right', 'hungry' ),
		'fadeInRightBig'     => esc_html__( 'Fade In Right (Big)', 'hungry' ),
		'fadeInUp'           => esc_html__( 'Fade In Up', 'hungry' ),
		'fadeInUpBig'        => esc_html__( 'Fade In Up (Big)', 'hungry' )
		
	),
	esc_html__( 'Fading Exits', 'hungry' ) => array(
	
		'fadeOut'            => esc_html__( 'Fade Out', 'hungry' ),
		'fadeOutDown'        => esc_html__( 'Fade Out Down', 'hungry' ),
		'fadeOutDownBig'     => esc_html__( 'Fade Out Down (Big)', 'hungry' ),
		'fadeOutLeft'        => esc_html__( 'Fade Out Left', 'hungry' ),
		'fadeOutLeftBig'     => esc_html__( 'Fade Out Left (Big)', 'hungry' ),
		'fadeOutRight'       => esc_html__( 'Fade Out Right', 'hungry' ),
		'fadeOutRightBig'    => esc_html__( 'Fade Out Right (Big)', 'hungry' ),
		'fadeOutUp'          => esc_html__( 'Fade Out Up', 'hungry' ),
		'fadeOutUpBig'       => esc_html__( 'Fade Out Up (Big)', 'hungry' )
	
	),
	esc_html__( 'Flippers', 'hungry' ) => array(
	
		'flip'               => esc_html__( 'Flip', 'hungry' ),
		'flipInX'            => esc_html__( 'Flip In X', 'hungry' ),
		'flipInY'            => esc_html__( 'Flip In Y', 'hungry' ),
		'flipOutX'           => esc_html__( 'Flip Out X', 'hungry' ),
		'flipOutY'           => esc_html__( 'Flip Out Y', 'hungry' )
		
	),
	esc_html__( 'Lightspeed', 'hungry' ) => array(
	
		'lightSpeedIn'       => esc_html__( 'Lightspeed In', 'hungry' ),
		'lightSpeedOut'      => esc_html__( 'Lightspeed Out', 'hungry' )
		
	),
	esc_html__( 'Rotating Entrances', 'hungry' ) => array(
	
		'rotateIn'           => esc_html__( 'Rotate In', 'hungry' ),
		'rotateInDownLeft'   => esc_html__( 'Rotate In Down-Left', 'hungry' ),
		'rotateInDownRight'  => esc_html__( 'Rotate In Down-Right', 'hungry' ),
		'rotateInUpLeft'     => esc_html__( 'Rotate In Up-Left', 'hungry' ),
		'rotateInUpRight'    => esc_html__( 'Rotate In Up-Right', 'hungry' )
		
	),
	esc_html__( 'Rotating Exits', 'hungry' ) => array(
	
		'rotateOut'          => esc_html__( 'Rotate Out', 'hungry' ),
		'rotateOutDownLeft'  => esc_html__( 'Rotate Out Down-Left', 'hungry' ),
		'rotateOutDownRight' => esc_html__( 'Rotate Out Down-Right', 'hungry' ),
		'rotateOutUpLeft'    => esc_html__( 'Rotate Out Up-Left', 'hungry' ),
		'rotateOutUpRight'   => esc_html__( 'Rotate Out Up-Right', 'hungry' )
		
	),
	esc_html__( 'Specials', 'hungry' ) => array(
	
		'hunge'              => esc_html__( 'Hinge', 'hungry' ),
		'rollIn'             => esc_html__( 'Roll In', 'hungry' ),
		'rollOut'            => esc_html__( 'Roll Out', 'hungry' )
		
	),
	esc_html__( 'Zoom Entrances', 'hungry' ) => array(
	
		'zoomIn'             => esc_html__( 'Zoom In', 'hungry' ),
		'zoomInDown'         => esc_html__( 'Zoom In Down', 'hungry' ),
		'zoomInLeft'         => esc_html__( 'Zoom In Left', 'hungry' ),
		'zoomInRight'        => esc_html__( 'Zoom In Right', 'hungry' ),
		'zoomInUp'           => esc_html__( 'Zoom In Up', 'hungry' )
		
	),
	esc_html__( 'Zoom Exits', 'hungry' ) => array(
	
		'zoomOut'            => esc_html__( 'Zoom Out', 'hungry' ),
		'zoomOutDown'        => esc_html__( 'Zoom Out Down', 'hungry' ),
		'zoomOutLeft'        => esc_html__( 'Zoom Out Left', 'hungry' ),
		'zoomOutRight'       => esc_html__( 'Zoom Out Right', 'hungry' ),
		'zoomOutUp'          => esc_html__( 'Zoom Out Up', 'hungry' )
		
	)
	
);

/**
 *
 *  INTRODUCTION
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(
			
	'title'   => esc_html__( 'Introduction', 'hungry' ),
	'desc'    => wp_kses_data( __( 'Howdy! Welcome to the theme options panel for <strong>Hungry</strong>. There are plenty of options and settings to tinker with here, so you\'d best get exploring! But if you are having trouble figuring out where to start, then check out the handy guides found in the theme\'s documentaion. This can be found in the list of links below. Happy editing!', 'hungry' ) ),
	'icon'    => 'el el-home',
	'submenu' => false,
	'fields'  => array(
	
		array(
		
			'id'       => 'hungry_intro',
			'title'    => esc_html__( 'Useful links to help you on your way', 'hungry' ),
			'subtitle' => '',
			'desc'     => '
			
				  <ul><img src="http://www.ten28.com/qa.jpg"><br>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#introduction" target="_blank">'      . esc_html( _x( 'Introduction', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#install-wordpress" target="_blank">' . esc_html( _x( 'Installation - Wordpress', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#install-theme" target="_blank">'     . esc_html( _x( 'Installation - The Theme', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#install-plugins" target="_blank">'   . esc_html( _x( 'Installation - Plugins', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#child-theme" target="_blank">'       . esc_html( _x( 'Using a Child Theme', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#import" target="_blank">'            . esc_html( _x( 'Importing Demo Content', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#theme-options" target="_blank">'     . esc_html( _x( 'Theme Options', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#custom-headers" target="_blank">'    . esc_html( _x( 'Custom Headers', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#homepage-setup" target="_blank">'    . esc_html( _x( 'Homepage Setup', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#home-layout" target="_blank">'       . esc_html( _x( 'Homepage Layout', 'Documentation chapter name', 'hungry' ) ) . '</a></li>										 
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#navigation" target="_blank">'        . esc_html( _x( 'Navigation', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#adding-recipes" target="_blank">'    . esc_html( _x( 'Adding Recipes', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#menus" target="_blank">'             . esc_html( _x( 'Displaying Menus', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#gallery" target="_blank">'           . esc_html( _x( 'Gallery', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#custom-widgets" target="_blank">'    . esc_html( _x( 'Custom Widgets', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#shortcodes" target="_blank">'        . esc_html( _x( 'Shortcodes', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#reservation-form" target="_blank">'  . esc_html( _x( 'Reservation Form', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#translate" target="_blank">'         . esc_html( _x( 'Translation', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
					<li><a class="button" href="' . get_template_directory_uri() . '/documentation/index.html#credits" target="_blank">'           . esc_html( _x( 'Sources &amp; Credits', 'Documentation chapter name', 'hungry' ) ) . '</a></li>
				  </ul>
				  
							 ',
			'type'     => 'info',
			'style'    => 'normal'
			
		)
		
	)
	
) );

/**
 *
 *  GENERAL SETTINGS
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'   => esc_html__( 'General Settings', 'hungry' ),
	'desc'    => esc_html__( 'Options and settings that don\'t belong in any specific submenu can generally be found here.', 'hungry' ),
	'icon'    => 'el el-cog-alt',
	'submenu' => false,
	'fields'  => array(
	
		array(
		
			'id'          => 'hungry_accent_colour',
			'title'       => esc_html__( 'Accent Colour', 'hungry' ),
			'subtitle'    => esc_html__( 'The accent colour is used throughout site on certain elements, such as links, section headings, hover states, borders etc. You can configure this here using the colour picker tool.', 'hungry' ),
			'desc'        => esc_html__( 'Pick a colour that best suits your own branding identity.', 'hungry' ),
			'type'        => 'color',
			'transparent' => false,
			'default'     => '#ccad52',
			'validate'    => 'color'
			
		),
		
		array(
		
			'id'   => 'hungry_general_divider_01',
			'type' => 'divide'
			
		),
	
		array(
		
			'id'       => 'hungry_currency_symbol',
			'title'    => esc_html__( 'Currency Symbol', 'hungry' ),
			'subtitle' => esc_html__( 'Choose the currency symbol to be displayed. This symbol is prefixed to price values in the food menu.', 'hungry' ),
			'desc'     => esc_html__( 'Pick a currency symbol that is most used in your country.', 'hungry' ),
			'type'     => 'button_set',
			'options'  => array(
			
				'dol' => _x( '&dollar;', 'US Dollar', 'hungry' ),
				'pnd' => _x( '&pound;', 'Pound Sterling (GBP)', 'hungry' ),
				'eur' => _x( '&euro;','Euro', 'hungry' ),
				'yen' => _x( '&yen;', 'Yen', 'hungry' ),
				'fra' => _x( '&#8355;', 'Franc', 'hungry' ),
				'lir' => _x( '&#8356;', 'Lira', 'hungry' )
			
			),
			'default' => 'dol'
			
		),
		
		array(
		
			'id'   => 'hungry_general_divider_02',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_wow',
			'title'    => esc_html__( 'Scroll Reveal', 'hungry' ),
			'subtitle' => esc_html__( 'Use this option to enable revealing animations when elements are scrolled into view.', 'hungry' ),
			'desc'     => wp_kses_post( __( 'This uses <code>wow.js</code>. You can find out more about this plugin and its options by visiting their website - <a href="https://github.com/matthieua/WOW" target="_blank">github.com/matthieua/WOW</a>', 'hungry' ) ),
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => true
			
		),
		
		array(
		
			'id'   => 'hungry_general_divider_03',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_btt',
			'title'    => esc_html__( 'Enable the "Back-to-Top" Button', 'hungry' ),
			'subtitle' => esc_html__( 'Use this option to enable or disable the back-to-top button that appears in the bottom right hand side of the screen.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => true
			
		),
		
		array(
		
			'id'   => 'hungry_general_divider_04',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_favicon_ico',
			'title'    => esc_html__( 'Favicon', 'hungry' ),
			'subtitle' => esc_html__( 'Upload an icon to use for your site\'s favicon. If you already have one in your site\'s root directory, you don\'t need to worry about this.', 'hungry' ),
			'desc'     => wp_kses_post( __( 'Use an icon file with the <code>.ico</code> filename extension thats at least 16x16 pixels in size. You can also use a <code>.png</code> file too, but not all browsers support it. If you need to generate an <code>.ico</code> file, try <a href="http://www.favicon.co.uk/" target="_blank">this tool</a>.', 'hungry' ) ),
			'type'     => 'media',
			'url'      => true,
			'default'  => array(
			
				'url' => get_template_directory_uri() . '/images/defaults/favicon.ico'
				
			)
			
		),
		
		array(
		
			'id'       => 'hungry_favicon_touch',
			'title'    => esc_html__( 'Touch Icon', 'hungry' ),
			'subtitle' => esc_html__( 'These icons are similar to the above favicons but are usually bigger in size and are used for devices like smartphones and tablets.', 'hungry' ),
			'desc'     => wp_kses_data( __( 'The recommended size for this is 152x152 pixels in a <code>.png</code> format.', 'hungry' ) ),
			'type'     => 'media',
			'url'      => true,
			'default'  => array(
			
				'url' => get_template_directory_uri() . '/images/defaults/icon-apple.png'
				
			)
			
		),
		
		array(
		
			'id'       => 'hungry_blog_title',
			'title'    => esc_html__( 'Blog Title', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a title for the default blog page. This title will be used if no other title is found.', 'hungry' ),
			'desc'     => '',
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'Our Blog'
			
		)
			
	)

) );

/**
 *
 *  SITE HEADER
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'      => esc_html__( 'Site Header', 'hungry' ),
	'desc'       => esc_html__( 'Everything you see in the header of the site can be configured here.', 'hungry' ),
	'icon'       => 'el el-website',
	'submenu'    => false,
	'subsection' => true,
	'fields'     => array(
	
		array(
		
			'id'       => 'hungry_logo',
			'title'    => esc_html__( 'Logo', 'hungry' ),
			'subtitle' => esc_html__( 'Upload an image to use for your main logo. This will appear in your website\'s navigation bar.', 'hungry' ),
			'desc'     => esc_html__( 'Use a logo that is X2 the size of the original. This will make it look better on retina displays!', 'hungry' ),
			'type'     => 'media',
			'url'      => true,
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip!', 'hungry' ),
				'content' => esc_html__( 'If this field is empty, your site\'s title will be used as a H1 tag instead!', 'hungry' )
			
			),
			'default' => array(
			
				'url' => get_template_directory_uri() . '/images/defaults/logo.png'
				
			)
			
		),
		
		array(
		
			'id'       => 'hungry_logo_alt',
			'title'    => esc_html__( 'Logo\'s Alternate Text', 'hungry' ),
			'subtitle' => esc_html__( 'Enter some text for the image\'s "alt" attribute. Recommended for SEO purposes.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'Hungry Logo',
			'validate' => 'no_html'
			
		),
		
		array(
		
			'id'       => 'hungry_logo_dimensions',
			'title'    => esc_html__( 'Logo Dimensions', 'hungry' ),
			'subtitle' => esc_html__( 'Configure the size of your logo here. This is useful for re-sizing larger logos for divices that have retina displays.', 'hungry' ),
			'desc'     => esc_html__( 'These values should be the same size as the image you uploaded, or 2X smaller.', 'hungry' ),
			'type'     => 'dimensions',
			'output'   => array( '.site-logo' ),
			'units'    => array( 'px', 'em', '%' ),
			'default'  => array(
			
				'width'  => '140px',
				'height' => '20px',
				'units'  => 'px'
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_logo_dimensions_short',
			'title'    => esc_html__( 'Logo Dimensions (Short)', 'hungry' ),
			'subtitle' => esc_html__( 'This is handy for when the navbar shrinks as it moves from the top of the page.', 'hungry' ),
			'desc'     => esc_html__( 'This value is set in percentages - e.g. 50% = Half the original size.', 'hungry' ),
			'type'     => 'dimensions',
			'output'   => array( '.site-navbar.short .site-logo' ),
			'units'    => array( '%' ),
			'default'  => array(
			
				'width'  => '50%',
				'height' => '50%',
				'units'  => '%'
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_logo_positioning',
			'title'    => esc_html__( 'Logo Positioning', 'hungry' ),
			'subtitle' => esc_html__( 'This is handy for when the navbar shrinks as it moves from the top of the page.', 'hungry' ),
			'desc'     => '',
			'type'     => 'spacing',
			'mode'     => 'margin',
			'bottom'   => false,
			'right'    => false,
			'output'   => array( '.site-logo, .site-title' ),
			'units'    => array( 'px', 'em' ),
			'default'  => array(
			
				'margin-top'  => '60px',
				'margin-left' => '0',
				'units'       => 'px'
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_logo_pos_short',
			'title'    => esc_html__( 'Logo Positioning (Short)', 'hungry' ),
			'subtitle' => esc_html__( 'Position the logo more acurately when the navbar has moved from the top of the page and shrunk.', 'hungry' ),
			'desc'     => '',
			'type'     => 'spacing',
			'mode'     => 'margin',
			'bottom'   => false,
			'right'    => false,
			'output'   => array( '.site-navbar.short .site-logo, .site-navbar.short .site-title' ),
			'units'    => array( 'px', 'em' ),
			'default'  => array(
			
				'margin-top'  => '36px',
				'margin-left' => '0',
				'units'       => 'px'
			
			)
			
		),
		
		array(
		
			'id'   => 'hungry_site_header_divider_01',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_innerpage_parallax',
			'title'    => esc_html__( 'Use parallax effect for subpage headers', 'hungry' ),
			'subtitle' => esc_html__( 'By default, this theme uses WordPress\'s built-in custom header image feature. You can use this option to add a parallax scrolling effect similar to the section background images.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => true
			
		),
		
		array(
		
			'id'   => 'hungry_site_header_divider_02',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_nav_gradient',
			'title'    => esc_html__( 'Use Default Gradient', 'hungry' ),
			'subtitle' => esc_html__( 'Stick with the default gradient in the navigation bar by leaving this switched on, or you can configure your own colour using the option below.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => true
			
		),
		
		array(
		
			'id'       => 'hungry_nav_colour',
			'title'    => esc_html__( 'Nav Background Colour', 'hungry' ),
			'subtitle' => esc_html__( 'Use the colour picker to choose a custom background colour for your navigation bar. Transparency is also available', 'hungry' ),
			'desc'     => esc_html__( 'If you want this colour to take effect, make sure the option above is "Disabled".', 'hungry' ),
			'type'     => 'color_rgba',
			'default'  => array(
			
				'color' => '#000',
				'alpha' => '0.85',
				'rgba'  => 'rgba(0,0,0,0.85)'
			
			),
			'options'  => array(
			
				'input_text'  => esc_html( _x( 'Select Colour', 'For the RGBA Color Picker', 'hungry' ) ),
				'choose_text' => esc_html( _x( 'Choose', 'For the RGBA Color Picker', 'hungry' ) ),
				'cancel_text' => esc_html( _x( 'Cancel', 'For the RGBA Color Picker', 'hungry' ) )
			
			)
			
		),
		
		array(
		
			'id'          => 'hungry_nav_text_colour',
			'title'       => esc_html__( 'Nav Text Colour', 'hungry' ),
			'subtitle'    => esc_html__( 'Use the colour picker to change the colour of the text in the main navigation bar.', 'hungry' ),
			'desc'        => esc_html__( 'Note that this won\'t alter the colour in the submenus.', 'hungry' ),
			'type'        => 'color',
			'validate'    => 'color',
			'transparent' => false,
			'default'     => '#fff'
			
		),
		
		array(
		
			'id'   => 'hungry_site_header_divider_03',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_header_size',
			'title'    => esc_html__( 'Header Size Transition', 'hungry' ),
			'subtitle' => esc_html__( 'By default, the main header will shrink when you scroll down. Use this option to disable this effect.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => true
			
		)
	
	)

) );

/**
 *
 *  SITE FOOTER
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'      => esc_html__( 'Site Footer', 'hungry' ),
	'desc'       => esc_html__( 'All of the footer elements, including backgrounds, logos and copy text, can be edited here.', 'hungry' ),
	'icon'       => 'el el-download-alt',
	'submenu'    => false,
	'subsection' => true,
	'fields'     => array(
	
		array(
		
			'id'       => 'hungry_widget_background',
			'title'    => esc_html__( 'Footer Widget Area Background', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload an image to use as the footer\'s background, or if you prefer to keep things simple, you can have a background colour. You can even have both if you want to be creative!', 'hungry' ),
			'desc'     => esc_html__( 'It is recommended that you use an image that is 1920 pixels wide and quite high. This will make sure it looks good on screens with wide displays.', 'hungry' ),
			'type'     => 'background',
			'output'   => array( '#site-footer' ),
			'default'  => array( 'background-color' => '#202020' )
			
		),
		
		array(
		
			'id'       => 'hungry_footer_background',
			'title'    => esc_html__( 'Footer Bottom Area Background', 'hungry' ),
			'subtitle' => esc_html__( 'This is similar to the above option. This is the very bottom of the site, where the logo and copyright text is.', 'hungry' ),
			'desc'     => esc_html__( 'It is recommended that you use an image that is 1920 pixels wide and quite high. This will make sure it looks good on screens with wide displays.', 'hungry' ),
			'type'     => 'background',
			'output'   => array( '#bottom-footer' ),
			'default'  => array( 'background-color' => '#090909' )
			
		),
		
		array(
		
			'id'       => 'hungry_footer_logo',
			'title'    => esc_html__( 'Footer Logo', 'hungry' ),
			'subtitle' => esc_html__( 'Upload an image to use for the logo displayed in the site footer.', 'hungry' ),
			'desc'     => esc_html__( 'Use a logo that is X2 the size of the original. This will make it look better on retina displays.', 'hungry' ),
			'type'     => 'media',
			'url'      => true,
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip!', 'hungry' ),
				'content' => esc_html__( 'If this field is empty, the copyright text will be centered instead.', 'hungry' )
			
			),
			'default' => array(
			
				'url' => get_template_directory_uri() . '/images/defaults/footer-logo.png'
				
			)
			
		),
		
		array(
		
			'id'       => 'hungry_footer_logo_alt',
			'title'    => esc_html__( 'Footer Logo\'s Alternate Text', 'hungry' ),
			'subtitle' => esc_html__( 'Enter some text for the image\'s "alt" attribute. Recommended for SEO purposes.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'Hungry Footer Logo',
			'validate' => 'no_html'
			
		),
		
		array(
		
			'id'       => 'hungry_footer_logo_dimensions',
			'title'    => esc_html__( 'Footer Logo Dimensions', 'hungry' ),
			'subtitle' => esc_html__( 'Configure the size of your logo here. This is useful for re-sizing larger logos for divices that have retina displays.', 'hungry' ),
			'desc'     => esc_html__( 'These values should be the same size as the image you uploaded, or 2X smaller.', 'hungry' ),
			'type'     => 'dimensions',
			'output'   => array( '.footer-logo-image' ),
			'units'    => array( 'px', 'em', '%' ),
			'default'  => array(
			
				'width'  => '300px',
				'height' => '20px',
				'units'  => 'px'
			
			)
			
		),
		
		array(
		
			'id'           => 'hungry_footer_text',
			'title'        => esc_html__( 'Footer Copyright Text', 'hungry' ),
			'subtitle'     => esc_html__( 'Use this space to display some copyright information or something similar. It appears usually in the bottom right.', 'hungry' ),
			'desc'         => wp_kses_data( __( 'You can use <code>&lt;strong&gt;</code>, <code>&lt;em&gt;</code> and <code>&lt;a&gt;</code> tags here.', 'hungry' ) ),
			'type'         => 'textarea',
			'validate'     => 'html_custom',
			'allowed_html' => array(
			
				'strong' => array(),
				'em'     => array(),
				'a'      => array(
				
					'href'   => array(),
					'class'  => array(),
					'target' => array(),
					'title'  => array()
				
				)
			
			),
			'default'      => 'Designed by <a href="http://themeforest.net/user/SubatomicThemes" target="_blank">Subatomic Themes</a> for <a href="http://themeforest.net" target="_blank">Themeforest</a>. All Rights Reserved.'
			
		)
		
	)
	
) );

/**
 *
 *  TYPOGRAPHY
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'      => esc_html__( 'Typography', 'hungry' ),
	'desc'       => wp_kses_post( __( 'Hungry uses fonts from Google\'s huge font library. Default fonts have been set, but feel free to change them to your liking! For more information on Google fonts, please visit the website link below. Keep in mind that the primary and secondary fonts will load all of the available styles for that font. Just remember, the more variants there are, the longer your page will take to load!<br /><br /><a class="button" href="https://www.google.com/fonts" target="_blank">Google Fonts Website</a>', 'hungry' ) ),
	'icon'       => 'el el-fontsize',
	'submenu'    => false,
	'subsection' => true,
	'fields'     => array(
	
		array(
		
			'id'          => 'hungry_font_body',
			'title'       => esc_html__( 'Primary Font (Body)', 'hungry' ),
			'subtitle'    => esc_html__( 'This is the main font used throught out the site and is mainly used for body text.', 'hungry' ),
			'desc'        => esc_html__( 'Since this is generally the smallest font, be sure to use one that\'s easy to read.', 'hungry' ),
			'type'        => 'typography',
			'text-align'  => false,
			'font-backup' => true,
			'all_styles'  => true,
			'units'       => 'px',
			'preview'     => array(
			
				'text' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.'
			
			),
			'default'     => array(
			
				'font-family' => 'Droid Serif',
				'font-weight' => '400',
				'font-size'   => '14px',
				'font-backup' => 'Georgia, serif',
				'line-height' => '26px',
				'subsets'     => 'latin',
				'color'       => '#787878'
			
			)
			
		),
		
		array(
		
			'id'             => 'hungry_font_heading',
			'title'          => esc_html__( 'Secondary Font (Headings)', 'hungry' ),
			'subtitle'       => esc_html__( 'This font is used in headings and certain other elements, such as the navigation bar.', 'hungry' ),
			'desc'           => esc_html__( 'Note that this font mainly applies to headings H1 - H6. Some of the other stylings other than "font-family" may not be applied to other elements.', 'hungry' ),
			'type'           => 'typography',
			'font-size'      => false,
			'font-backup'    => true,
			'text-transform' => true,
			'text-align'     => false,
			'line-height'    => false,
			'letter-spacing' => true,
			'all_styles'     => true,
			'units'          => 'px',
			'preview'        => array(
			
				'text'      => 'The Quick Brown Fox Jumps Over the Lazy Dog',
				'font-size' => '32px'
			
			),
			'default'        => array(
			
				'font-family'    => 'Ubuntu',
				'font-weight'    => '700',
				'font-backup'    => 'Verdana, Geneva, sans-serif',
				'subsets'        => 'latin',
				'text-transform' => 'uppercase',
				'letter-spacing' => '2px',
				'color'          => '#000'
				
			)
			
		),
		
		array(
		
			'id'          => 'hungry_font_special',
			'title'       => esc_html__( 'Special Font', 'hungry' ),
			'subtitle'    => esc_html__( 'This font is used for special headers, such as section headings and the slogan rotator on the homepage.', 'hungry' ),
			'desc'        => '',
			'type'        => 'typography',
			'font-size'   => false,
			'font-weight' => false,
			'font-style'  => false,
			'font-backup' => true,
			'color'       => false,
			'text-align'  => false,
			'line-height' => false,
			'units'       => 'px',
			'preview'     => array(
			
				'text'      => 'The Quick Brown Fox Jumps Over the Lazy Dog',
				'font-size' => '48px'
			
			),
			'default'     => array(
			
				'font-family' => 'Aguafina Script',
				'font-backup' => 'Verdana, Geneva, sans-serif',
				'subsets'     => 'latin'
				
			)
			
		)
	
	)
	
) );

/**
 *
 *  CUSTOM CSS
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'      => esc_html__( 'Custom Styling', 'hungry' ),
	'desc'       => esc_html__( 'If there are elements in the theme that you need to do deeper customization with, this is the place to do it :)', 'hungry' ),
	'icon'       => 'el el-css',
	'submenu'    => false,
	'subsection' => true,
	'fields'     => array(
	
		array(
		
			'id'       => 'hungry_user_css',
			'title'    => esc_html__( 'Custom CSS', 'hungry' ),
			'subtitle' => esc_html__( 'You can use this editor to write your own custom CSS code. Any CSS that you write here will override any styling that has previously been declared.', 'hungry' ),
			'desc'     => wp_kses_data( __( 'No need to add <code>&lt;style&gt;</code> tags here, they will be added automatically!', 'hungry' ) ),
			'type'     => 'ace_editor',
			'mode'     => 'css',
			'theme'    => 'chrome',
			'validate' => 'css'
			
		)
		
	)
	
) );

/**
 *
 *  HOMEPAGE
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'   => esc_html__( 'Homepage', 'hungry' ),
	'desc'    => wp_kses_data( __( 'Here you can drag and drop sections to create a unique layout for your homepage. Simply drag items over to the <strong>Enabled</strong> column. Anything you don\'t want, simply drag it back to the <strong>Disabled</strong> column!', 'hungry' ) ),
	'icon'    => 'el-icon-home-alt',
	'submenu' => false,
	'fields'  => array(
	
		array(
		
			'id'          => 'hungry_home_layout',
			'title'       => esc_html__( 'Homepage Layout', 'hungry' ),
			'subtitle'    => wp_kses_data( __( '<strong>Note</strong> - The Homepage Template must be selected when you create your page via the "Pages" panel.', 'hungry' ) ),
			'desc'        => '',
			'hint'        => array(
			
				'title'   => esc_html__( 'Tip!', 'hungry' ),
				'content' => esc_html__( 'You can even display content from your WordPress pages. Simply drag them over from the list!', 'hungry' )
			
			),
			'type'        => 'sorter',
			'options'     => array(
			
				'enabled'  => $hungry_sections,
				'disabled' => $hungry_pages
			
			)						
			
		)
	
	)
	
) );

/**
 *
 *  SLOGAN ROTATOR
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'      => esc_html__( 'Slogan Rotator', 'hungry' ),
	'desc'       => esc_html__( 'The slogan rotator is a great way to display nice messages to viewers with some unique animation effects. This will display when the homepage template is used.', 'hungry' ),
	'icon'       => 'el el-quote-alt',
	'subsection' => true,
	'submenu'    => false,
	'fields'     => array(

		array(
		
			'id'           => 'hungry_before_slogan',
			'title'        => esc_html__( 'Text Before Slogans', 'hungry' ),
			'subtitle'     => esc_html__( 'The intro text that appears just above the slogan rotator.', 'hungry' ),
			'desc'         => wp_kses_data( __( 'Use <code>&lt;em&gt;</code> tags to use the theme\'s accent colour.', 'hungry' ) ),
			'type'         => 'text',
			'validate'     => 'html_custom',
			'allowed_html' => array( 'em' => array() ),
			'default'      => 'Come on in<em>&hellip;</em>'
			
		),
	
		array(
		
			'id'       => 'hungry_slogans',
			'title'    => esc_html__( 'Header Slogans', 'hungry' ),
			'subtitle' => esc_html__( 'Enter the text for each of the slogans here.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in these fields!', 'hungry' ),
			'type'     => 'sortable',
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'You can re-order your slogans by dragging the arrow icons.', 'hungry' )
			
			),
			'validate' => 'no_html',
			'options'  => array(
			
				'Slogan 01' => esc_html__( 'Slogan 01', 'hungry' ),
				'Slogan 02' => esc_html__( 'Slogan 02', 'hungry' ),
				'Slogan 03' => esc_html__( 'Slogan 03', 'hungry' ),
				'Slogan 04' => esc_html__( 'Slogan 04', 'hungry' ),
				'Slogan 05' => esc_html__( 'Slogan 05', 'hungry' ),
				'Slogan 06' => esc_html__( 'Slogan 06', 'hungry' ),
				'Slogan 07' => esc_html__( 'Slogan 07', 'hungry' ),
				'Slogan 08' => esc_html__( 'Slogan 08', 'hungry' ),
				'Slogan 09' => esc_html__( 'Slogan 09', 'hungry' ),
				'Slogan 10' => esc_html__( 'Slogan 10', 'hungry' )
				
			),
			'default'  => array(
			
				'Slogan 01' => 'Dine with us!',
				'Slogan 02' => 'Try the wine!',
				'Slogan 03' => 'Bring the family!',
				'Slogan 04' => 'Enjoy our food!',
				'Slogan 05' => 'Have a great time!',
				'Slogan 06' => 'Sit in, or eat out!',
				'Slogan 07' => 'Takeaway available!',
				'Slogan 08' => 'Top class chefs!',
				'Slogan 09' => 'Amazing prices!',
				'Slogan 10' => 'Slogans are cool!'
			
			)
									
		),
		
		array(
		
			'id'          => 'hungry_slogan_entrance',
			'title'       => esc_html__( 'Entrance Animation', 'hungry' ),
			'subtitle'    => esc_html__( 'Choose an animation for when the letters enter the screen.', 'hungry' ),
			'desc'        => '',
			'type'        => 'select',
			'placeholder' => esc_html__( 'Select an animation', 'hungry' ),
			'options'     => $animate_options,
			'default'     => 'flipInX'
			
		),
		
		array(
		
			'id'          => 'hungry_slogan_exit',
			'title'       => esc_html__( 'Exit Animation', 'hungry' ),
			'subtitle'    => esc_html__( 'Choose an animation for when the letters leave the screen.', 'hungry' ),
			'desc'        => '',
			'type'        => 'select',
			'placeholder' => esc_html__( 'Select an animation', 'hungry' ),
			'options'     => $animate_options,
			'default'     => 'bounceOut'
			
		),
		
		array(
		
			'id'            => 'hungry_slogan_display_time',
			'title'         => esc_html__( 'Display Time', 'hungry' ),
			'subtitle'      => esc_html__( 'The amount of time a slogan remains on the screen before it is replaced by the next one.', 'hungry' ),
			'desc'          => esc_html__( 'This value is in milliseconds - e.g. 1000 = 1 second', 'hungry' ),
			'type'          => 'slider',
			'min'           => '100',
			'max'           => '10000',
			'step'          => '100',
			'default'       => '6000',
			'display_value' => 'text'
			
		),
		
		array(
		
			'id'            => 'hungry_slogan_animation_delay',
			'title'         => esc_html__( 'Delay', 'hungry' ),
			'subtitle'      => esc_html__( 'The amount of time it takes between animating each letter.', 'hungry' ),
			'desc'          => esc_html__( 'This value is in milliseconds - e.g. 1000 = 1 second', 'hungry' ),
			'type'          => 'slider',
			'min'           => '15',
			'max'           => '1000',
			'step'          => '5',
			'default'       => '45',
			'display_value' => 'text'
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_loop',
			'title'    => esc_html__( 'Loop Slogans', 'hungry' ),
			'subtitle' => esc_html__( 'This option will make the slogan rotator loop back to the first slogan, otherwise it will stop at the last one.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_on,
			'off'      => $hungry_off,
			'default'  => true
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_sync',
			'title'    => esc_html__( 'Sync Animations', 'hungry' ),
			'subtitle' => esc_html__( 'This option will make all the letters animate at the same time.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_on,
			'off'      => $hungry_off,
			'default'  => false
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_shuffle',
			'title'    => esc_html__( 'Shuffle Animations', 'hungry' ),
			'subtitle' => esc_html__( 'This option will make all the letters animate in a random order.', 'hungry' ),
			'desc'     => esc_html__( 'Disabled if "Sync" is switched on.', 'hungry' ),
			'type'     => 'switch',
			'on'       => $hungry_on,
			'off'      => $hungry_off,
			'default'  => false
			
		)
		
	)
	
) );

/**
 *
 *  BACKGROUND SLIDER
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'      => esc_html__( 'Background Slider', 'hungry' ),
	'desc'       => esc_html__( 'This section allows you to configure your background slider settings on the homepage.', 'hungry' ),
	'icon'       => 'el el-slideshare',
	'subsection' => true,
	'submenu'    => false,
	'fields'     => array(
	
		array(
		
			'id'       => 'hungry_slider_fx',
			'title'    => esc_html__( 'Slide Effects', 'hungry' ),
			'subtitle' => esc_html__( 'Choose an effect to use for the transition of each slide.', 'hungry' ),
			'desc'     => '',
			'type'     => 'select',
			'options'  => array(
			
				'fade'       => esc_html__( 'Fade', 'hungry' ),
				'scrollHorz' => esc_html__( 'Scroll', 'hungry' )
			
			),
			'default'  => 'fade'
			
		),
		
		array(
		
			'id'            => 'hungry_slider_speed',
			'title'         => esc_html__( 'Transition Speed', 'hungry' ),
			'subtitle'      => esc_html__( 'The time it takes for the transition animation to complete.', 'hungry' ),
			'desc'          => esc_html__( 'This value is in milliseconds - e.g. 1000 = 1 second', 'hungry' ),
			'type'          => 'slider',
			'min'           => '100',
			'max'           => '5000',
			'step'          => '100',
			'default'       => '1200',
			'display_value' => 'text'
			
		),
		
		array(
		
			'id'            => 'hungry_slider_timeout',
			'title'         => esc_html__( 'Delay (Timeout)', 'hungry' ),
			'subtitle'      => esc_html__( 'The time each slide remains on screen before transitioning to the next slide.', 'hungry' ),
			'desc'          => esc_html__( 'This value is in milliseconds - e.g. 1000 = 1 second', 'hungry' ),
			'type'          => 'slider',
			'min'           => '0',
			'max'           => '20000',
			'step'          => '500',
			'default'       => '16000',
			'display_value' => 'text',
			'hint'          => array(
			
				'title'   => esc_html__( 'Tip!', 'hungry' ),
				'content' => esc_html__( 'Setting this value to zero will disable auto-sliding.', 'hungry' ),
			
			)
			
		),
	
		array(
		
			'id'       => 'hungry_slider_controls',
			'title'    => esc_html__( 'Enable Slider Controls', 'hungry' ),
			'subtitle' => esc_html__( 'This option will enable the user to use the "previous" and "next" controls for the slider.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => true
			
		),
	
		array(
		
			'id'       => 'hungry_slider_images',
			'title'    => esc_html__( 'Slider Images', 'hungry' ),
			'subtitle' => esc_html__( 'Use the WordPress media manager to add, delete and re-order your images for the slider.', 'hungry' ),
			'desc'     => esc_html__( 'Recommended image size is 1920 x 1000 pixels.', 'hungry' ),
			'type'     => 'gallery'
			
		)
	
	)
	
) );

/**
 *
 *  SOCIAL ICONS
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'      => esc_html__( 'Social Icons', 'hungry' ),
	'desc'       => wp_kses_post( __( 'Configure your social icons and URLs here. A maximum of six icons are allowed to be displayed. This theme uses the Elusive Icon set, which is a free set of font icons. You can learn more about this <a href="https://press.codes/downloads/elusive-icons-webfont/" target="_blank">here</a>.', 'hungry' ) ),
	'icon'       => 'el el-facebook',
	'subsection' => true,
	'fields'     => array(

		
		array(
		
			'id'       => 'hungry_social_target',
			'title'    => esc_html__( 'Link Target', 'hungry' ),
			'subtitle' => esc_html__( 'This option will open the links in a new window.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => false
			
		),
	
		array(
		
			'id'       => 'hungry_social_icon_01',
			'title'    => esc_html__( 'Icon 01 - Icon', 'hungry' ),
			'subtitle' => esc_html__( 'Select an Icon from the list.', 'hungry' ),
			'desc'     => '',
			'type'     => 'select',
			'data'     => 'elusive-icons',
			'default'  => 'el el-facebook'
			
		),		
				
		array(
		
			'id'       => 'hungry_social_link_01',
			'title'    => esc_html__( 'Icon 01 - Link', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a URL for this icon.', 'hungry' ),
			'desc'     => esc_html__( 'Must be a valid URL!', 'hungry' ),
			'type'     => 'text',
			'required' => array( 'hungry_social_icon_01', 'not', '' ),
			'validate' => 'url',
			'default'  => 'http://www.example.com'
			
		),
		
		array(
		
			'id'       => 'hungry_social_tooltip_01',
			'title'    => esc_html__( 'Icon 01 - Tooltip Text', 'hungry' ),
			'subtitle' => esc_html__( 'Text to be displayed when the user hovers over it.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML allowed here!', 'hungry' ),
			'type'     => 'text',
			'required' => array( 'hungry_social_icon_01', 'not', '' ),
			'validate' => 'no_html',
			'default'  => 'Follow us on Facebook!'
			
		),
		
		array(
		
			'id'       => 'hungry_social_icon_02',
			'title'    => esc_html__( 'Icon 02 - Icon', 'hungry' ),
			'subtitle' => esc_html__( 'Select an Icon from the list.', 'hungry' ),
			'desc'     => '',
			'type'     => 'select',
			'data'     => 'elusive-icons',
			'default'  => 'el el-twitter'
			
		),
		
		array(
		
			'id'       => 'hungry_social_link_02',
			'title'    => esc_html__( 'Icon 02 - Link', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a URL for this icon.', 'hungry' ),
			'desc'     => esc_html__( 'Must be a valid URL!', 'hungry' ),
			'type'     => 'text',
			'required' => array( 'hungry_social_icon_02', 'not', '' ),
			'validate' => 'url',
			'default'  => 'http://www.example.com'
			
		),
		
		array(
		
			'id'       => 'hungry_social_tooltip_02',
			'title'    => esc_html__( 'Icon 02 - Tooltip Text', 'hungry' ),
			'subtitle' => esc_html__( 'Text to be displayed when the user hovers over it.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML allowed here!', 'hungry' ),
			'type'     => 'text',
			'required' => array( 'hungry_social_icon_02', 'not', '' ),
			'validate' => 'no_html',
			'default'  => 'Find us on Twitter!'
			
		),
		
		array(
		
			'id'       => 'hungry_social_icon_03',
			'title'    => esc_html__( 'Icon 03 - Icon', 'hungry' ),
			'subtitle' => esc_html__( 'Select an Icon from the list.', 'hungry' ),
			'desc'     => '',
			'type'     => 'select',
			'data'     => 'elusive-icons',
			'default'  => 'el el-digg'
			
		),
		
		array(
		
			'id'       => 'hungry_social_link_03',
			'title'    => esc_html__( 'Icon 03 - Link', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a URL for this icon.', 'hungry' ),
			'desc'     => esc_html__( 'Must be a valid URL!', 'hungry' ),
			'type'     => 'text',
			'required' => array( 'hungry_social_icon_03', 'not', '' ),
			'validate' => 'url',
			'default'  => 'http://www.example.com'
			
		),
		
		array(
		
			'id'       => 'hungry_social_tooltip_03',
			'title'    => esc_html__( 'Icon 03 - Tooltip Text', 'hungry' ),
			'subtitle' => esc_html__( 'Text to be displayed when the user hovers over it.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML allowed here!', 'hungry' ),
			'type'     => 'text',
			'required' => array( 'hungry_social_icon_03', 'not', '' ),
			'validate' => 'no_html',
			'default'  => 'Do you Digg us?'
			
		),
		
		array(
		
			'id'       => 'hungry_social_icon_04',
			'title'    => esc_html__( 'Icon 04 - Icon', 'hungry' ),
			'subtitle' => esc_html__( 'Select an Icon from the list.', 'hungry' ),
			'desc'     => '',
			'type'     => 'select',
			'data'     => 'elusive-icons',
			'default'  => 'el el-vimeo'
			
		),
		
		array(
		
			'id'       => 'hungry_social_link_04',
			'title'    => esc_html__( 'Icon 04 - Link', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a URL for this icon.', 'hungry' ),
			'desc'     => esc_html__( 'Must be a valid URL!', 'hungry' ),
			'type'     => 'text',
			'required' => array( 'hungry_social_icon_04', 'not', '' ),
			'validate' => 'url',
			'default'  => 'http://www.example.com'
			
		),
		
		array(
		
			'id'       => 'hungry_social_tooltip_04',
			'title'    => esc_html__( 'Icon 04 - Tooltip Text', 'hungry' ),
			'subtitle' => esc_html__( 'Text to be displayed when the user hovers over it.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML allowed here!', 'hungry' ),
			'type'     => 'text',
			'required' => array( 'hungry_social_icon_04', 'not', '' ),
			'validate' => 'no_html',
			'default'  => 'See us on Vimeo!'
			
		),
		
		array(
		
			'id'       => 'hungry_social_icon_05',
			'title'    => esc_html__( 'Icon 05 - Icon', 'hungry' ),
			'subtitle' => esc_html__( 'Select an Icon from the list.', 'hungry' ),
			'desc'     => '',
			'type'     => 'select',
			'data'     => 'elusive-icons',
			'default'  => 'el el-icon-group'
			
		),
		
		array(
		
			'id'       => 'hungry_social_link_05',
			'title'    => esc_html__( 'Icon 05 - Link', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a URL for this icon.', 'hungry' ),
			'desc'     => esc_html__( 'Must be a valid URL!', 'hungry' ),
			'type'     => 'text',
			'required' => array( 'hungry_social_icon_05', 'not', '' ),
			'validate' => 'url',
			'default'  => 'http://www.example.com'
			
		),
		
		array(
		
			'id'       => 'hungry_social_tooltip_05',
			'title'    => esc_html__( 'Icon 05 - Tooltip Text', 'hungry' ),
			'subtitle' => esc_html__( 'Text to be displayed when the user hovers over it.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML allowed here!', 'hungry' ),
			'type'     => 'text',
			'required' => array( 'hungry_social_icon_05', 'not', '' ),
			'validate' => 'no_html',
			'default'  => 'We\'re on OpenTable!'
			
		),
		
		array(
		
			'id'       => 'hungry_social_icon_06',
			'title'    => esc_html__( 'Icon 06 - Icon', 'hungry' ),
			'subtitle' => esc_html__( 'Select an Icon from the list.', 'hungry' ),
			'desc'     => '',
			'type'     => 'select',
			'data'     => 'elusive-icons',
			'default'  => ''
			
		),
		
		array(
		
			'id'       => 'hungry_social_link_06',
			'title'    => esc_html__( 'Icon 06 - Link', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a URL for this icon.', 'hungry' ),
			'desc'     => esc_html__( 'Must be a valid URL!', 'hungry' ),
			'type'     => 'text',
			'required' => array( 'hungry_social_icon_06', 'not', '' ),
			'validate' => 'url',
			'default'  => ''
			
		),
		
		array(
		
			'id'       => 'hungry_social_tooltip_06',
			'title'    => esc_html__( 'Icon 06 - Tooltip Text', 'hungry' ),
			'subtitle' => esc_html__( 'Text to be displayed when the user hovers over it.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML allowed here!', 'hungry' ),
			'type'     => 'text',
			'required' => array( 'hungry_social_icon_06', 'not', '' ),
			'validate' => 'no_html',
			'default'  => ''
			
		)
	
	)
	
) );

Redux::setSection( $opt_name, array( 
	
	'title'   => esc_html__( 'Divide', 'hungry' ),
	'id'      => 'presentation-divide',
	'type'    => 'divide',
	'submenu' => false
	
) );

/**
 *
 *  SECTION - About Us
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'   => esc_html__( 'Section - About Us', 'hungry' ),
	'desc'    => esc_html__( 'This section is ideal for displaying a little info about your restaurant or cafe.', 'hungry' ),
	'icon'    => 'el el-info-circle',
	'submenu' => false,
	'fields'  => array(

		array(
		
			'id'       => 'hungry_about_us_padding',
			'title'    => esc_html__( 'Section Padding', 'hungry' ),
			'subtitle' => esc_html__( 'Create space (padding) at the top and bottom of this section by adjusting these values.', 'hungry' ),
			'desc'     => '',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'units'    => array( 'px', 'em' ),
			'left'     => false,
			'right'    => false,
			'default'  => array(
			
				'padding-top'    => '140px',
				'padding-bottom' => '120px',
				'units'          => 'px'
			
			)
			
		),
	
		array(
		
			'id'       => 'hungry_about_us_title',
			'title'    => esc_html__( 'Section Heading Title', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a name for this section\'s title.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'About Us',
			'validate' => 'no_html',
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'You can leave this field empty if you don\'t require it!', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_about_us_subtitle',
			'title'    => esc_html__( 'Section Heading Subtitle', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a name for this section\'s subtitle. Appears directly underneath the main title.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'Whats our Story?',
			'validate' => 'no_html',
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'You can leave this field empty if you don\'t require it!', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_about_us_slug',
			'title'    => esc_html__( 'This Section\'s Slug Name', 'hungry' ),
			'subtitle' => esc_html__( 'This is used as the section\'s ID. Can be used in WordPress Custom Menus for single page navigation.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'hungry-about-us',
			'validate' => 'str_replace',
			'str'      => array(
			
				'search'      => ' ',
				'replacement' => '-'
			
			),
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'Use lowercase letters and hyphens.', 'hungry' )
			
			)
			
		),
		
		array(
		
			'id'   => 'hungry_about_us_divider_01',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_about_us_main_image',
			'title'    => esc_html__( 'Main Image', 'hungry' ),
			'subtitle' => esc_html__( 'Upload an image to use for this section\'s main image.', 'hungry' ),
			'desc'     => esc_html__( 'For best results, use a square image. The circular effect will be added automatically!', 'hungry' ),
			'type'     => 'media',
			'url'      => true,
			'default'  => array(
			
				'url' => get_template_directory_uri() . '/images/defaults/about-main.jpg'
				
			)
			
		),
		
		array(
		
			'id'       => 'hungry_about_us_inset_image',
			'title'    => esc_html__( 'Inset Image', 'hungry' ),
			'subtitle' => esc_html__( 'Upload an image to use for this section\'s inset image. This will appear within the main image at the top left.', 'hungry' ),
			'desc'     => esc_html__( 'For best results, use a square image that is smaller than the main image. The circular effect will be added automatically!', 'hungry' ),
			'type'     => 'media',
			'url'      => true,
			'default'  => array(
			
				'url' => get_template_directory_uri() . '/images/defaults/about-inset.jpg'
				
			)
			
		),
		
		array(
		
			'id'       => 'hungry_about_us_image_style',
			'title'    => esc_html__( 'Image Styling', 'hungry' ),
			'subtitle' => esc_html__( 'Use this option to enable or remove the circular effect for the images.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => true
			
		),
		
		array(
		
			'id'           => 'hungry_about_us_content',
			'title'        => esc_html__( 'Main Content', 'hungry' ),
			'subtitle'     => esc_html__( 'Content for this section. Use the WordPress TinyMCE editor to add your content.', 'hungry' ),
			'desc'         => '',
			'type'         => 'editor',
			'validate'     => 'html_custom',
			'allowed_html' => $allowed_html,
			'args'         => array(
			
				'textarea_rows' => '20'
			
			),
			'default'      => '<h4 class="header-divider">It Started, Quite Simply, Like This...</h4><p><strong>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</strong></p><p>Aenean commodo ligula eget dolor aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt.</p><a class="hungry-button" href="#">Learn More</a><a class="hungry-button dark" href="#hungry-menu">See the Menu!</a>'
			
		)
			
	)
	
) );

/**
 *
 *  SECTION - Testimonials
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'   => esc_html__( 'Section - Testimonials', 'hungry' ),
	'desc'    => esc_html__( 'You can use this section to show visitors what some of your previous customers are saying about your restaurant or food. You can have up to six testimonials.', 'hungry' ),
	'icon'    => 'el el-smiley-alt',
	'submenu' => false,
	'fields'  => array(

		array(
		
			'id'       => 'hungry_testimonials_padding',
			'title'    => esc_html__( 'Section Padding', 'hungry' ),
			'subtitle' => esc_html__( 'Create space (padding) at the top and bottom of this section by adjusting these values.', 'hungry' ),
			'desc'     => '',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'units'    => array( 'px', 'em' ),
			'left'     => false,
			'right'    => false,
			'default'  => array(
			
				'padding-top'    => '140px',
				'padding-bottom' => '140px',
				'units'          => 'px'
			
			)
			
		),
											
		array(
		
			'id'       => 'hungry_testimonial_background',
			'title'    => esc_html__( 'Section Background', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload an image to use as this section\'s background, or if you prefer to keep things simple, you can have a background colour. You can even have both if you want to be creative!', 'hungry' ),
			'desc'     => esc_html__( 'It is recommended that you use an image that is 1920 pixels wide and quite high. This will make sure it looks good on screens with wide displays.', 'hungry' ),
			'type'     => 'background',
			'default'  => array(
			
				'background-color'      => '#252525',
				'background-image'      => get_template_directory_uri() . '/images/defaults/parallax-01.jpg',
				'background-attachment' => 'fixed',
				'background-repeat'     => 'repeat',
				'background-size'       => 'inherit',
				'background-position'   => 'center center'
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_testimonial_parallax',
			'title'    => esc_html__( 'Parallax Effect', 'hungry' ),
			'subtitle' => esc_html__( 'Use this option to enable a parallax scrolling effect to this section\'s background image. For this effect to work well, it is recommended that you have the background-attachment set to fixed in the above option.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => true
			
		),
		
		array(
		
			'id'       => 'hungry_testimonials_layout',
			'title'    => esc_html__( 'Column Layout', 'hungry' ),
			'subtitle' => esc_html__( 'Choose a column layout for this section.', 'hungry' ),
			'desc'     => '',
			'type'     => 'button_set',
			'options'  => array(
			
				'prefix-30 grid-40 suffix-30 tablet-prefix-20 tablet-grid-60 tablet-suffix-20 mobile-grid-100' => esc_html__( 'One Column', 'hungry' ),
				'prefix-10 grid-30 suffix-10 tablet-grid-50 mobile-grid-100'                                   => esc_html__( 'Two Columns', 'hungry' ),
			
			),
			'default'  => 'prefix-10 grid-30 suffix-10 tablet-grid-50 mobile-grid-100'
			
		),
		
		array(
		
			'id'           => 'hungry_testimonials_heading',
			'title'        => esc_html__( 'Section Heading', 'hungry' ),
			'subtitle'     => esc_html__( 'Enter a title for this section\'s heading.', 'hungry' ),
			'desc'         => wp_kses_data( __( 'Use <code>&lt;span&gt;</code> tags to use the theme\'s accent colour.', 'hungry' ) ),
			'type'         => 'text',
			'validate'     => 'html_custom',
			'allowed_html' => array( 'span' => array() ),
			'default'      => 'What our Customers Say<span>&hellip;</span>'
			
		),
		
		array(
		
			'id'       => 'hungry_testimonials_slug',
			'title'    => esc_html__( 'This Section\'s Slug Name', 'hungry' ),
			'subtitle' => esc_html__( 'This is used as the section\'s ID. Can be used in WordPress Custom Menus for single page navigation.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'hungry-testimonials',
			'validate' => 'str_replace',
			'str'      => array(
			
				'search'      => ' ',
				'replacement' => '-'
			
			),
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'Use lowercase letters and hyphens.', 'hungry' )
			
			)
			
		),
		
		array(
		
			'id'   => 'hungry_testimonials_divider_01',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'           => 'hungry_testimonial_quote_01',
			'title'        => esc_html__( 'Testimonial 01 - Quote', 'hungry' ),
			'subtitle'     => esc_html__( 'Enter the text to be used as the quote.', 'hungry' ),
			'desc'         => wp_kses_data( __( 'You can use <code>&lt;br /&gt;</code> tags here for line breaks.', 'hungry' ) ),
			'type'         => 'textarea',
			'rows'         => 4,
			'validate'     => 'html_custom',
			'allowed_html' => array( 'br' => array() ),
			'default'      => '&quot;I strongly urge you to try the Chef\'s<br /> Special, You\'ll love it!&quot;'
			
		),
		
		array(
		
			'id'           => 'hungry_testimonial_cite_01',
			'title'        => esc_html__( 'Testimonial 01 - Cite Text', 'hungry' ),
			'subtitle'     => esc_html__( 'Enter some cite text for this testimonial.', 'hungry' ),
			'desc'         => wp_kses_post( __( 'Links are allowed here using the <code>&lt;a&gt;</code> tag.<br /><br /><strong>Important note</strong> - Use single quotes when entering link attributes. Double quotes will result in the text being stripped.', 'hungry' ) ),
			'type'         => 'text',
			'required'     => array( 'hungry_testimonial_quote_01', 'not', '' ),
			'validate'     => 'html_custom',
			'allowed_html' => array( 'a' => array( 'href' => array(), 'target' => array(), 'title' => array() ) ),
			'default'      => 'Christina from <a href=\'#\'>Stockton, Cleveland</a>'
			
		),
		
		array(
		
			'id'       => 'hungry_testimonial_thumbnail_01',
			'title'    => esc_html__( 'Testimonial 01 - Thumbnail Image', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload a small thumbnail image of the author (Optional).', 'hungry' ),
			'desc'     => esc_html__( 'For best reults, use a small square image approximately 80 x 80 pixels in size.', 'hungry' ),
			'type'     => 'media',
			'required' => array( 'hungry_testimonial_quote_01', 'not', '' ),
			'url'      => true,
			'default'  => array(
			
				'url' => get_template_directory_uri() . '/images/defaults/testimonial-thumbnail-01.jpg'
				
			)
			
		),
		
		array(
		
			'id'   => 'hungry_testimonials_divider_02',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'           => 'hungry_testimonial_quote_02',
			'title'        => esc_html__( 'Testimonial 02 - Quote', 'hungry' ),
			'subtitle'     => esc_html__( 'Enter the text to be used as the quote.', 'hungry' ),
			'desc'         => wp_kses_data( __( 'You can use <code>&lt;br /&gt;</code> tags here for line breaks.', 'hungry' ) ),
			'type'         => 'textarea',
			'rows'         => 4,
			'validate'     => 'html_custom',
			'allowed_html' => array( 'br' => array() ),
			'default'      => '&quot;Great Food. Great Staff.<br />Great Service. Good Times!&quot;'
			
		),
		
		array(
		
			'id'           => 'hungry_testimonial_cite_02',
			'title'        => esc_html__( 'Testimonial 02 - Cite Text', 'hungry' ),
			'subtitle'     => esc_html__( 'Enter some cite text for this testimonial.', 'hungry' ),
			'desc'         => wp_kses_post( __( 'Links are allowed here using the <code>&lt;a&gt;</code> tag.<br /><br /><strong>Important note</strong> - Use single quotes when entering link attributes. Double quotes will result in the text being stripped.', 'hungry' ) ),
			'type'         => 'text',
			'required'     => array( 'hungry_testimonial_quote_02', 'not', '' ),
			'validate'     => 'html_custom',
			'allowed_html' => array( 'a' => array( 'href' => array(), 'target' => array(), 'title' => array() ) ),
			'default'      => 'John from <a href=\'#\'>Red Falls, Colorado</a>'
			
		),
		
		array(
		
			'id'       => 'hungry_testimonial_thumbnail_02',
			'title'    => esc_html__( 'Testimonial 02 - Thumbnail Image', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload a small thumbnail image of the author (Optional).', 'hungry' ),
			'desc'     => esc_html__( 'For best reults, use a small square image approximately 80 x 80 pixels in size.', 'hungry' ),
			'type'     => 'media',
			'required' => array( 'hungry_testimonial_quote_02', 'not', '' ),
			'url'      => true,
			'default'  => array(
			
				'url' => get_template_directory_uri() . '/images/defaults/testimonial-thumbnail-02.jpg'
				
			)
			
		),
		
		array(
		
			'id'   => 'hungry_testimonials_divider_03',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'           => 'hungry_testimonial_quote_03',
			'title'        => esc_html__( 'Testimonial 03 - Quote', 'hungry' ),
			'subtitle'     => esc_html__( 'Enter the text to be used as the quote.', 'hungry' ),
			'desc'         => wp_kses_data( __( 'You can use <code>&lt;br /&gt;</code> tags here for line breaks.', 'hungry' ) ),
			'type'         => 'textarea',
			'rows'         => 4,
			'validate'     => 'html_custom',
			'allowed_html' => array( 'br' => array() ),
			'default'      => '&quot;The Entertainment was<br />Top Notch!&quot;'
			
		),
		
		array(
		
			'id'           => 'hungry_testimonial_cite_03',
			'title'        => esc_html__( 'Testimonial 03 - Cite Text', 'hungry' ),
			'subtitle'     => esc_html__( 'Enter some cite text for this testimonial.', 'hungry' ),
			'desc'         => wp_kses_post( __( 'Links are allowed here using the <code>&lt;a&gt;</code> tag.<br /><br /><strong>Important note</strong> - Use single quotes when entering link attributes. Double quotes will result in the text being stripped.', 'hungry' ) ),
			'type'         => 'text',
			'required'     => array( 'hungry_testimonial_quote_03', 'not', '' ),
			'validate'     => 'html_custom',
			'allowed_html' => array( 'a' => array( 'href' => array(), 'target' => array(), 'title' => array() ) ),
			'default'      => 'Leonard from <a href=\'#\'>Phoenix, Arizona</a>'
			
		),
		
		array(
		
			'id'       => 'hungry_testimonial_thumbnail_03',
			'title'    => esc_html__( 'Testimonial 03 - Thumbnail Image', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload a small thumbnail image of the author (Optional).', 'hungry' ),
			'desc'     => esc_html__( 'For best reults, use a small square image approximately 80 x 80 pixels in size.', 'hungry' ),
			'type'     => 'media',
			'required' => array( 'hungry_testimonial_quote_03', 'not', '' ),
			'url'      => true,
			'default'  => array(
			
				'url' => get_template_directory_uri() . '/images/defaults/testimonial-thumbnail-03.jpg'
				
			)
			
		),
		
		array(
		
			'id'   => 'hungry_testimonials_divider_04',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'           => 'hungry_testimonial_quote_04',
			'title'        => esc_html__( 'Testimonial 04 - Quote', 'hungry' ),
			'subtitle'     => esc_html__( 'Enter the text to be used as the quote.', 'hungry' ),
			'desc'         => wp_kses_data( __( 'You can use <code>&lt;br /&gt;</code> tags here for line breaks.', 'hungry' ) ),
			'type'         => 'textarea',
			'rows'         => 4,
			'validate'     => 'html_custom',
			'allowed_html' => array( 'br' => array() ),
			'default'      => '&quot;Excellent food.<br />Highly Recommended!&quot;'
			
		),
		
		array(
		
			'id'           => 'hungry_testimonial_cite_04',
			'title'        => esc_html__( 'Testimonial 04 - Cite Text', 'hungry' ),
			'subtitle'     => esc_html__( 'Enter some cite text for this testimonial.', 'hungry' ),
			'desc'         => wp_kses_post( __( 'Links are allowed here using the <code>&lt;a&gt;</code> tag.<br /><br /><strong>Important note</strong> - Use single quotes when entering link attributes. Double quotes will result in the text being stripped.', 'hungry' ) ),
			'type'         => 'text',
			'required'     => array( 'hungry_testimonial_quote_04', 'not', '' ),
			'validate'     => 'html_custom',
			'allowed_html' => array( 'a' => array( 'href' => array(), 'target' => array(), 'title' => array() ) ),
			'default'      => 'Theresa from <a href=\'#\'>Bellflower, Oregon</a>'
			
		),
		
		array(
		
			'id'       => 'hungry_testimonial_thumbnail_04',
			'title'    => esc_html__( 'Testimonial 04 - Thumbnail Image', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload a small thumbnail image of the author (Optional).', 'hungry' ),
			'desc'     => esc_html__( 'For best reults, use a small square image approximately 80 x 80 pixels in size.', 'hungry' ),
			'type'     => 'media',
			'required' => array( 'hungry_testimonial_quote_04', 'not', '' ),
			'url'      => true,
			'default'  => array(
			
				'url' => get_template_directory_uri() . '/images/defaults/testimonial-thumbnail-04.jpg'
				
			)
			
		)
		
	)

) );

/**
 *
 *  SECTION - Food Menu
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'   => esc_html__( 'Section - Food Menu', 'hungry' ),
	'desc'    => wp_kses_data( __( 'Populate this section with your menus. Select food menus from the dropdown lists. You can add recipes to a menu by editing the recipe and selecting a <strong>menu</strong> to add it to.', 'hungry' ) ),
	'icon'    => 'el-icon-website-alt',
	'submenu' => false,
	'fields'  => array(

		array(
		
			'id'       => 'hungry_food_padding',
			'title'    => esc_html__( 'Section Padding', 'hungry' ),
			'subtitle' => esc_html__( 'Create space (padding) at the top and bottom of this section by adjusting these values.', 'hungry' ),
			'desc'     => '',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'units'    => array( 'px', 'em' ),
			'left'     => false,
			'right'    => false,
			'default'  => array(
			
				'padding-top'    => '140px',
				'padding-bottom' => '50px',
				'units'          => 'px'
			
			)
			
		),
	
		array(
		
			'id'       => 'hungry_food_title',
			'title'    => esc_html__( 'Section Heading Title', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a name for this section\'s title.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'Our Menu',
			'validate' => 'no_html',
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'You can leave this field empty if you don\'t require it!', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_food_subtitle',
			'title'    => esc_html__( 'Section Heading Subtitle', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a name for this section\'s subtitle. Appears directly underneath the main title.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'Feeling Peckish?',
			'validate' => 'no_html',
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'You can leave this field empty if you don\'t require it!', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_food_slug',
			'title'    => esc_html__( 'This Section\'s Slug Name', 'hungry' ),
			'subtitle' => esc_html__( 'This is used as the section\'s ID. Can be used in WordPress Custom Menus for single page navigation.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'hungry-menu',
			'validate' => 'str_replace',
			'str'      => array(
			
				'search'      => ' ',
				'replacement' => '-'
			
			),
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'Use lowercase letters and hyphens.', 'hungry' )
			
			)
			
		),
		
		array(
		
			'id'   => 'hungry_menus_divider_01',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_menu_order_by',
			'title'    => esc_html__( 'Order Recipes by...', 'hungry' ),
			'subtitle' => esc_html__( 'WordPress offers different ways you can sort your posts, please select one from the dropdown menu.', 'hungry' ),
			'desc'     => wp_kses_data( __( 'Note: The <strong>Menu Order</strong> attribute can be changed when editing the post.', 'hungry' ) ),
			'type'     => 'select',
			'options'  => $post_order_options,
			'default'  => 'none'
			
		),
		
		array(
		
			'id'       => 'hungry_menu_order',
			'title'    => esc_html__( 'Order Type', 'hungry' ),
			'subtitle' => esc_html__( 'With an option selected above, you can either display them in Ascending or Descending order.', 'hungry' ),
			'desc'     => '',
			'type'     => 'select',
			'options'  => array(
			
				'DESC' => esc_html( _x( 'Descending Order', 'Post order', 'hungry' ) ),
				'ASC'  => esc_html( _x( 'Ascending Order', 'Post order', 'hungry' ) )
			
			),
			'default'  => 'DESC'
			
		),
		
		array(
		
			'id'   => 'hungry_menus_divider_02',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'          => 'hungry_food_col_01',
			'title'       => esc_html__( 'First Column', 'hungry' ),
			'subtitle'    => esc_html__( 'Populate the first column with menus from the dropdown list. This will show on all layouts.', 'hungry' ),
			'desc'        => esc_html__( 'If a menu is empty, it will not be shown in the list.', 'hungry' ),
			'type'        => 'select',
			'multi'       => true,
			'sortable'    => true,
			'placeholder' => esc_html__( 'Select a menu', 'hungry' ),
			'data'        => 'terms',
			'args'        => array( 
			
				'taxonomies' => 'food_menu',
				'args'       => array()
				
			),
			'hint'        => array(
			
				'title'   => esc_html__( 'Tip!', 'hungry' ),
				'content' => esc_html__( 'You can re-order your menu items by dragging them.', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'          => 'hungry_food_col_02',
			'title'       => esc_html__( 'Second Column', 'hungry' ),
			'subtitle'    => esc_html__( 'Populate the second column with menus from the dropdown list. This will NOT show if the one column layout is selected, use the first column instead :)', 'hungry' ),
			'desc'        => esc_html__( 'If a menu is empty, it will not be shown in the list.', 'hungry' ),
			'type'        => 'select',
			'multi'       => true,
			'sortable'    => true,
			'placeholder' => esc_html__( 'Select a menu', 'hungry' ),
			'data'        => 'terms',
			'args'        => array( 
			
				'taxonomies' => 'food_menu',
				'args'       => array()
				
			),
			'hint'        => array(
			
				'title'   => esc_html__( 'Tip!', 'hungry' ),
				'content' => esc_html__( 'You can re-order your menu items by dragging them.', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'          => 'hungry_food_col_03',
			'title'       => esc_html__( 'Third Column', 'hungry' ),
			'subtitle'    => esc_html__( 'Populate the Third column with menus from the dropdown list. This will NOT show if the one or two column layout is selected, use the first and second columns instead :)', 'hungry' ),
			'desc'        => esc_html__( 'If a menu is empty, it will not be shown in the list.', 'hungry' ),
			'type'        => 'select',
			'multi'       => true,
			'sortable'    => true,
			'placeholder' => esc_html__( 'Select a menu', 'hungry' ),
			'data'        => 'terms',
			'args'        => array( 
			
				'taxonomies' => 'food_menu',
				'args'       => array()
				
			),
			'hint'        => array(
			
				'title'   => esc_html__( 'Tip!', 'hungry' ),
				'content' => esc_html__( 'You can re-order your menu items by dragging them.', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'   => 'hungry_menus_divider_03',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_food_layout',
			'title'    => esc_html__( 'Layout', 'hungry' ),
			'subtitle' => esc_html__( 'Choose a layout for this section.', 'hungry' ),
			'desc'     => '',
			'type'     => 'button_set',
			'options'  => array(
			
				'one'   => esc_html__( 'Single Column', 'hungry' ),
				'two'   => esc_html__( 'Two Columns', 'hungry' ),
				'three' => esc_html__( 'Three Columns', 'hungry' )
			
			),
			'default'  => 'two'
									
		)
		
	)
	
) );

/**
 *
 *  SECTION - Slogan 01
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'   => esc_html__( 'Section - Slogan 01', 'hungry' ),
	'desc'    => esc_html__( 'Use this section as a way to break up your content. Think of it as a divider. Use it as an attention-grabber or a call-to-action.', 'hungry' ),
	'icon'    => 'el-icon-quote-alt',
	'submenu' => false,
	'fields'  => array(

		array(
		
			'id'       => 'hungry_slogan_01_padding',
			'title'    => esc_html__( 'Section Padding', 'hungry' ),
			'subtitle' => esc_html__( 'Create space (padding) at the top and bottom of this section by adjusting these values.', 'hungry' ),
			'desc'     => '',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'units'    => array( 'px', 'em' ),
			'left'     => false,
			'right'    => false,
			'default'  => array(
			
				'padding-top'    => '140px',
				'padding-bottom' => '140px',
				'units'          => 'px'
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_01_background',
			'title'    => esc_html__( 'Section Background', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload an image to use as this section\'s background, or if you prefer to keep things simple, you can have a background colour. You can even have both if you want to be creative!', 'hungry' ),
			'desc'     => esc_html__( 'It is recommended that you use an image that is 1920 pixels wide and quite high. This will make sure it looks good on screens with wide displays.', 'hungry' ),
			'type'     => 'background',
			'default'  => array(
			
				'background-color'      => '#252525',
				'background-image'      => get_template_directory_uri() . '/images/defaults/parallax-02.jpg',
				'background-attachment' => 'fixed',
				'background-repeat'     => 'repeat',
				'background-size'       => 'inherit',
				'background-position'   => 'center center'
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_01_parallax',
			'title'    => esc_html__( 'Parallax Effect', 'hungry' ),
			'subtitle' => esc_html__( 'Use this option to enable a parallax scrolling effect to this section\'s background image. For this effect to work well, it is recommended that you have the background-attachment set to fixed in the above option.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => true
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_01_slug',
			'title'    => esc_html__( 'This Section\'s Slug Name', 'hungry' ),
			'subtitle' => esc_html__( 'This is used as the section\'s ID. Can be used in WordPress Custom Menus for single page navigation.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'hungry-slogan-01',
			'validate' => 'str_replace',
			'str'      => array(
			
				'search'      => ' ',
				'replacement' => '-'
			
			),
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'Use lowercase letters and hyphens.', 'hungry' )
			
			)
			
		),
		
		array(
		
			'id'   => 'hungry_slogan_01_divider_01',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'           => 'hungry_slogan_01_text',
			'title'        => esc_html__( 'Slogan Text', 'hungry' ),
			'subtitle'     => esc_html__( 'Enter some text to be displayed here. Make it something catchy!', 'hungry' ),
			'desc'         => wp_kses_data( __( 'You can use <code>&lt;br /&gt;</code>, <code>&lt;em&gt;</code> and <code>&lt;span&gt;</code> tags here.', 'hungry' ) ),
			'type'         => 'textarea',
			'rows'         => '3',
			'validate'     => 'html_custom',
			'allowed_html' => array(
			
				'br'   => array(),
				'em'   => array(),
				'span' => array()
			
			),
			'default'      => 'I cook with Wine<br />Sometimes I even <em>add</em> it to the food!'
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_01_link',
			'title'    => esc_html__( 'Slogan Link', 'hungry' ),
			'subtitle' => esc_html__( 'The entire slogan can be wrapped in a link and be used as a call-to-action. If you don\'t require this, then leave this field empty.', 'hungry' ),
			'desc'     => esc_html__( 'Only valid URLs are allowed!', 'hungry' ),
			'type'     => 'text',
			'validate' => 'url',
			'default'  => ''
			
		),
		
		array(
		
			'id'   => 'hungry_slogan_01_divider_02',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_01_video_url',
			'title'    => esc_html__( 'Video Background', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload a video to be used as the background instead of an image. This option will override any images that have been set above.', 'hungry' ),
			'desc'     => wp_kses( __( 'Upload a Video. Accepted formats are <code>.mp4</code>, <code>.webm</code> and <code>.ogv</code> files.', 'hungry' ), array( 'code' => array() ) ),
			'type'     => 'media',
			'url'      => true,
			'mode'     => 'video'
			
		)
	
	)

) );

/**
 *
 *  SECTION - Slogan 02
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'   => esc_html__( 'Section - Slogan 02', 'hungry' ),
	'desc'    => esc_html__( 'Use this section as a way to break up your content. Think of it as a divider. Use it as an attention-grabber or a call-to-action.', 'hungry' ),
	'icon'    => 'el-icon-quote-alt',
	'submenu' => false,
	'fields'  => array(

		array(
		
			'id'       => 'hungry_slogan_02_padding',
			'title'    => esc_html__( 'Section Padding', 'hungry' ),
			'subtitle' => esc_html__( 'Create space (padding) at the top and bottom of this section by adjusting these values.', 'hungry' ),
			'desc'     => '',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'units'    => array( 'px', 'em' ),
			'left'     => false,
			'right'    => false,
			'default'  => array(
			
				'padding-top'    => '140px',
				'padding-bottom' => '140px',
				'units'          => 'px'
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_02_background',
			'title'    => esc_html__( 'Section Background', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload an image to use as this section\'s background, or if you prefer to keep things simple, you can have a background colour. You can even have both if you want to be creative!', 'hungry' ),
			'desc'     => esc_html__( 'It is recommended that you use an image that is 1920 pixels wide and quite high. This will make sure it looks good on screens with wide displays.', 'hungry' ),
			'type'     => 'background',
			'default'  => array(
			
				'background-color'      => '#252525',
				'background-image'      => get_template_directory_uri() . '/images/defaults/parallax-03.jpg',
				'background-attachment' => 'fixed',
				'background-repeat'     => 'repeat',
				'background-size'       => 'inherit',
				'background-position'   => 'center center'
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_02_parallax',
			'title'    => esc_html__( 'Parallax Effect', 'hungry' ),
			'subtitle' => esc_html__( 'Use this option to enable a parallax scrolling effect to this section\'s background image. For this effect to work well, it is recommended that you have the background-attachment set to fixed in the above option.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => true
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_02_slug',
			'title'    => esc_html__( 'This Section\'s Slug Name', 'hungry' ),
			'subtitle' => esc_html__( 'This is used as the section\'s ID. Can be used in WordPress Custom Menus for single page navigation.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'hungry-slogan-02',
			'validate' => 'str_replace',
			'str'      => array(
			
				'search'      => ' ',
				'replacement' => '-'
			
			),
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'Use lowercase letters and hyphens.', 'hungry' )
			
			)
			
		),
		
		array(
		
			'id'   => 'hungry_slogan_02_divider_02',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'           => 'hungry_slogan_02_text',
			'title'        => esc_html__( 'Slogan Text', 'hungry' ),
			'subtitle'     => esc_html__( 'Enter some text to be displayed here. Make it something catchy!', 'hungry' ),
			'desc'         => wp_kses_data( __( 'You can use <code>&lt;br /&gt;</code>, <code>&lt;em&gt;</code> and <code>&lt;span&gt;</code> tags here.', 'hungry' ) ),
			'type'         => 'textarea',
			'rows'         => '3',
			'validate'     => 'html_custom',
			'allowed_html' => array(
			
				'br'   => array(),
				'em'   => array(),
				'span' => array()
			
			),
			'default'      => 'Looky Here! This Slogan is <em>Clickable</em><br /><span>Great for a <em>Call-to-Action</em>!</span>'
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_02_link',
			'title'    => esc_html__( 'Slogan Link', 'hungry' ),
			'subtitle' => esc_html__( 'The entire slogan can be wrapped in a link and be used as a call-to-action. If you don\'t require this, then leave this field empty.', 'hungry' ),
			'desc'     => esc_html__( 'Only valid URLs are allowed!', 'hungry' ),
			'type'     => 'text',
			'validate' => 'url',
			'default'  => 'http://www.example.com'
			
		),
		
		array(
		
			'id'   => 'hungry_slogan_02_divider_02',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_02_video_url',
			'title'    => esc_html__( 'Video Background', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload a video to be used as the background instead of an image. This option will override any images that have been set above.', 'hungry' ),
			'desc'     => wp_kses( __( 'Upload a Video. Accepted formats are <code>.mp4</code>, <code>.webm</code> and <code>.ogv</code> files.', 'hungry' ), array( 'code' => array() ) ),
			'type'     => 'media',
			'url'      => true,
			'mode'     => 'video'
			
		)
	
	)

) );

/**
 *
 *  SECTION - Slogan 03
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'   => esc_html__( 'Section - Slogan 03', 'hungry' ),
	'desc'    => esc_html__( 'Use this section as a way to break up your content. Think of it as a divider. Use it as an attention-grabber or a call-to-action.', 'hungry' ),
	'icon'    => 'el-icon-quote-alt',
	'submenu' => false,
	'fields'  => array(

		array(
		
			'id'       => 'hungry_slogan_03_padding',
			'title'    => esc_html__( 'Section Padding', 'hungry' ),
			'subtitle' => esc_html__( 'Create space (padding) at the top and bottom of this section by adjusting these values.', 'hungry' ),
			'desc'     => '',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'units'    => array( 'px', 'em' ),
			'left'     => false,
			'right'    => false,
			'default'  => array(
			
				'padding-top'    => '140px',
				'padding-bottom' => '140px',
				'units'          => 'px'
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_03_background',
			'title'    => esc_html__( 'Section Background', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload an image to use as this section\'s background, or if you prefer to keep things simple, you can have a background colour. You can even have both if you want to be creative!', 'hungry' ),
			'desc'     => esc_html__( 'It is recommended that you use an image that is 1920 pixels wide and quite high. This will make sure it looks good on screens with wide displays.', 'hungry' ),
			'type'     => 'background',
			'default'  => array(
			
				'background-color'      => '#252525',
				'background-image'      => get_template_directory_uri() . '/images/defaults/parallax-03.jpg',
				'background-attachment' => 'fixed',
				'background-repeat'     => 'repeat',
				'background-size'       => 'inherit',
				'background-position'   => 'center center'
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_03_parallax',
			'title'    => esc_html__( 'Parallax Effect', 'hungry' ),
			'subtitle' => esc_html__( 'Use this option to enable a parallax scrolling effect to this section\'s background image. For this effect to work well, it is recommended that you have the background-attachment set to fixed in the above option.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => true
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_03_slug',
			'title'    => esc_html__( 'This Section\'s Slug Name', 'hungry' ),
			'subtitle' => esc_html__( 'This is used as the section\'s ID. Can be used in WordPress Custom Menus for single page navigation.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'hungry-slogan-03',
			'validate' => 'str_replace',
			'str'      => array(
			
				'search'      => ' ',
				'replacement' => '-'
			
			),
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'Use lowercase letters and hyphens.', 'hungry' )
			
			)
			
		),
		
		array(
		
			'id'   => 'hungry_slogan_03_divider_02',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'           => 'hungry_slogan_03_text',
			'title'        => esc_html__( 'Slogan Text', 'hungry' ),
			'subtitle'     => esc_html__( 'Enter some text to be displayed here. Make it something catchy!', 'hungry' ),
			'desc'         => wp_kses_data( __( 'You can use <code>&lt;br /&gt;</code>, <code>&lt;em&gt;</code> and <code>&lt;span&gt;</code> tags here.', 'hungry' ) ),
			'type'         => 'textarea',
			'rows'         => '3',
			'validate'     => 'html_custom',
			'allowed_html' => array(
			
				'br'   => array(),
				'em'   => array(),
				'span' => array()
			
			),
			'default'      => 'A <em>Third</em> Slogan<br /><span>Just For Your <em>Viewing</em> Pleasure!</span>'
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_03_link',
			'title'    => esc_html__( 'Slogan Link', 'hungry' ),
			'subtitle' => esc_html__( 'The entire slogan can be wrapped in a link and be used as a call-to-action. If you don\'t require this, then leave this field empty.', 'hungry' ),
			'desc'     => esc_html__( 'Only valid URLs are allowed!', 'hungry' ),
			'type'     => 'text',
			'validate' => 'url',
			'default'  => ''
			
		),
		
		array(
		
			'id'   => 'hungry_slogan_03_divider_02',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_03_video_url',
			'title'    => esc_html__( 'Video Background', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload a video to be used as the background instead of an image. This option will override any images that have been set above.', 'hungry' ),
			'desc'     => wp_kses( __( 'Upload a Video. Accepted formats are <code>.mp4</code>, <code>.webm</code> and <code>.ogv</code> files.', 'hungry' ), array( 'code' => array() ) ),
			'type'     => 'media',
			'url'      => true,
			'mode'     => 'video'
			
		)
	
	)

) );

/**
 *
 *  SECTION - Slogan 04
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'   => esc_html__( 'Section - Slogan 04', 'hungry' ),
	'desc'    => esc_html__( 'Use this section as a way to break up your content. Think of it as a divider. Use it as an attention-grabber or a call-to-action.', 'hungry' ),
	'icon'    => 'el-icon-quote-alt',
	'submenu' => false,
	'fields'  => array(

		array(
		
			'id'       => 'hungry_slogan_04_padding',
			'title'    => esc_html__( 'Section Padding', 'hungry' ),
			'subtitle' => esc_html__( 'Create space (padding) at the top and bottom of this section by adjusting these values.', 'hungry' ),
			'desc'     => '',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'units'    => array( 'px', 'em' ),
			'left'     => false,
			'right'    => false,
			'default'  => array(
			
				'padding-top'    => '140px',
				'padding-bottom' => '140px',
				'units'          => 'px'
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_04_background',
			'title'    => esc_html__( 'Section Background', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload an image to use as this section\'s background, or if you prefer to keep things simple, you can have a background colour. You can even have both if you want to be creative!', 'hungry' ),
			'desc'     => esc_html__( 'It is recommended that you use an image that is 1920 pixels wide and quite high. This will make sure it looks good on screens with wide displays.', 'hungry' ),
			'type'     => 'background',
			'default'  => array(
			
				'background-color'      => '#252525',
				'background-image'      => get_template_directory_uri() . '/images/defaults/parallax-02.jpg',
				'background-attachment' => 'fixed',
				'background-repeat'     => 'repeat',
				'background-size'       => 'inherit',
				'background-position'   => 'center center'
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_04_parallax',
			'title'    => esc_html__( 'Parallax Effect', 'hungry' ),
			'subtitle' => esc_html__( 'Use this option to enable a parallax scrolling effect to this section\'s background image. For this effect to work well, it is recommended that you have the background-attachment set to fixed in the above option.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => true
			
		),
		array(
		
			'id'       => 'hungry_slogan_04_slug',
			'title'    => esc_html__( 'This Section\'s Slug Name', 'hungry' ),
			'subtitle' => esc_html__( 'This is used as the section\'s ID. Can be used in WordPress Custom Menus for single page navigation.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'hungry-slogan-04',
			'validate' => 'str_replace',
			'str'      => array(
			
				'search'      => ' ',
				'replacement' => '-'
			
			),
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'Use lowercase letters and hyphens.', 'hungry' )
			
			)
			
		),
		
		array(
		
			'id'   => 'hungry_slogan_04_divider_02',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'           => 'hungry_slogan_04_text',
			'title'        => esc_html__( 'Slogan Text', 'hungry' ),
			'subtitle'     => esc_html__( 'Enter some text to be displayed here. Make it something catchy!', 'hungry' ),
			'desc'         => wp_kses_data( __( 'You can use <code>&lt;br /&gt;</code>, <code>&lt;em&gt;</code> and <code>&lt;span&gt;</code> tags here.', 'hungry' ) ),
			'type'         => 'textarea',
			'rows'         => '3',
			'validate'     => 'html_custom',
			'allowed_html' => array(
			
				'br'   => array(),
				'em'   => array(),
				'span' => array()
			
			),
			'default'      => 'Three Not Enough?<br />Well How About A <em>Fourth</em>?'
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_04_link',
			'title'    => esc_html__( 'Slogan Link', 'hungry' ),
			'subtitle' => esc_html__( 'The entire slogan can be wrapped in a link and be used as a call-to-action. If you don\'t require this, then leave this field empty.', 'hungry' ),
			'desc'     => esc_html__( 'Only valid URLs are allowed!', 'hungry' ),
			'type'     => 'text',
			'validate' => 'url',
			'default'  => ''
			
		),
		
		array(
		
			'id'   => 'hungry_slogan_04_divider_02',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_slogan_04_video_url',
			'title'    => esc_html__( 'Video Background', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload a video to be used as the background instead of an image. This option will override any images that have been set above.', 'hungry' ),
			'desc'     => wp_kses( __( 'Upload a Video. Accepted formats are <code>.mp4</code>, <code>.webm</code> and <code>.ogv</code> files.', 'hungry' ), array( 'code' => array() ) ),
			'type'     => 'media',
			'url'      => true,
			'mode'     => 'video'
			
		)
	
	)

) );

/**
 *
 *  SECTION - Meet the Staff
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'   => esc_html__( 'Section - Meet the Staff', 'hungry' ),
	'desc'    => esc_html__( 'Use this section to display information about the key players in your business. You can upload photos, add a short bio, and even configure social media icons for up to three people.', 'hungry' ),
	'icon'    => 'el-icon-group-alt',
	'submenu' => false,
	'fields'  => array(

		array(
		
			'id'       => 'hungry_team_padding',
			'title'    => esc_html__( 'Section Padding', 'hungry' ),
			'subtitle' => esc_html__( 'Create space (padding) at the top and bottom of this section by adjusting these values.', 'hungry' ),
			'desc'     => '',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'units'    => array( 'px', 'em' ),
			'left'     => false,
			'right'    => false,
			'default'  => array(
			
				'padding-top'    => '140px',
				'padding-bottom' => '140px',
				'units'          => 'px'
			
			)
			
		),
	
		array(
		
			'id'       => 'hungry_team_title',
			'title'    => esc_html__( 'Section Heading Title', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a name for this section\'s title.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'Our Staff',
			'validate' => 'no_html',
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'You can leave this field empty if you don\'t require it!', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_team_subtitle',
			'title'    => esc_html__( 'Section Heading Subtitle', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a name for this section\'s subtitle. Appears directly underneath the main title.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'The Friendliest People',
			'validate' => 'no_html',
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'You can leave this field empty if you don\'t require it!', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_team_slug',
			'title'    => esc_html__( 'This Section\'s Slug Name', 'hungry' ),
			'subtitle' => esc_html__( 'This is used as the section\'s ID. Can be used in WordPress Custom Menus for single page navigation.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'hungry-staff',
			'validate' => 'str_replace',
			'str'      => array(
			
				'search'      => ' ',
				'replacement' => '-'
			
			),
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'Use lowercase letters and hyphens.', 'hungry' )
			
			)
			
		),
		
		array(
		
			'id'   => 'hungry_staff_divider_01',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_team_01_name',
			'title'    => esc_html__( 'Staff Member 01 - Name', 'hungry' ),
			'subtitle' => esc_html__( 'Enter this staff member\'s name.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'John Doggett'
			
		),
		
		array(
		
			'id'       => 'hungry_team_01_role',
			'title'    => esc_html__( 'Staff Member 01 - Role', 'hungry' ),
			'subtitle' => esc_html__( 'Enter this staff member\'s job title (or equivalent).', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'Head Chef'
			
		),
		
		array(
		
			'id'       => 'hungry_team_01_thumbnail',
			'title'    => esc_html__( 'Staff Member 01 - Thumbnail Image', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload a medium sized thumbnail image for this staff member.', 'hungry' ),
			'desc'     => esc_html__( 'For best results, use a square image approximately 280 x 280 pixels in size.', 'hungry' ),
			'type'     => 'media',
			'url'      => true,
			'default'  => array(
			
				'url' => get_template_directory_uri() . '/images/defaults/staff-01.jpg'
				
			)
			
		),
		
		array(
		
			'id'           => 'hungry_team_01_desc',
			'title'        => esc_html__( 'Staff Member 01 - Description', 'hungry' ),
			'subtitle'     => esc_html__( 'Write a small paragraph about this staff member.', 'hungry' ),
			'desc'         => esc_html__( 'Some HTML is allowed in this field!', 'hungry' ),
			'type'         => 'textarea',
			'rows'         => '3',
			'validate'     => 'html_custom',
			'allowed_html' => array(
			
				'strong' => array(),
				'em'     => array(),
				'p'      => array(),
				'a'      => array(
				
					'href'   => array(),
					'target' => array(),
					'title'  => array()
				
				)
			
			),
			'default'      => '<p>Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Aenean commodo ligula.</p>'
			
		),
		
		array(
		
			'id'       => 'hungry_team_01_icon_01_icon',
			'title'    => esc_html__( 'Staff Member 01 - Icon glyphs', 'hungry' ),
			'subtitle' => esc_html__( 'Choose the glyphs to use for this staff member\'s social icons.', 'hungry' ),
			'desc'     => '',
			'type'     => 'select',
			'data'     => 'elusive-icons',
			'default'  => 'el-icon-facebook'
			
		),
		
		array(
		
			'id'      => 'hungry_team_01_icon_02_icon',
			'type'    => 'select',
			'data'    => 'elusive-icons',
			'default' => 'el-icon-twitter'
			
		),
		
		array(
		
			'id'      => 'hungry_team_01_icon_03_icon',
			'type'    => 'select',
			'data'    => 'elusive-icons',
			'default' => 'el-icon-instagram'
			
		),
		
		array(
		
			'id'       => 'hungry_team_01_icon_01_url',
			'title'    => esc_html__( 'Staff Member 01 - Icon URLs', 'hungry' ),
			'subtitle' => esc_html__( 'Enter the corresponding URLs for the above icons.', 'hungry' ),
			'desc'     => '',
			'type'     => 'text',
			'validate' => 'url',
			'default'  => 'http://www.example.com'
			
		),
		
		array(
		
			'id'       => 'hungry_team_01_icon_02_url',
			'type'     => 'text',
			'validate' => 'url',
			'default'  => 'http://www.example.com'
			
		),
		
		array(
		
			'id'       => 'hungry_team_01_icon_03_url',
			'type'     => 'text',
			'validate' => 'url',
			'default'  => 'http://www.example.com'
			
		),
		
		array(
		
			'id'       => 'hungry_team_01_icon_01_tooltip',
			'title'    => esc_html__( 'Staff Member 01 - Icon Tooltips', 'hungry' ),
			'subtitle' => esc_html__( 'Enter some optional tooltip texts for the icons.', 'hungry' ),
			'desc'     => '',
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'Like John!'
			
		),
		
		array(
		
			'id'       => 'hungry_team_01_icon_02_tooltip',
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'Tweet John!'
			
		),
		
		array(
		
			'id'       => 'hungry_team_01_icon_03_tooltip',
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'See John!'
			
		),
		
		array(
		
			'id'   => 'hungry_staff_divider_02',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_team_02_name',
			'title'    => esc_html__( 'Staff Member 02 - Name', 'hungry' ),
			'subtitle' => esc_html__( 'Enter this staff member\'s name.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'Jeffrey Spender'
			
		),
		
		array(
		
			'id'       => 'hungry_team_02_role',
			'title'    => esc_html__( 'Staff Member 02 - Role', 'hungry' ),
			'subtitle' => esc_html__( 'Enter this staff member\'s job title (or equivalent).', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'Head Barman'
			
		),
		
		array(
		
			'id'       => 'hungry_team_02_thumbnail',
			'title'    => esc_html__( 'Staff Member 02 - Thumbnail Image', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload a medium sized thumbnail image for this staff member.', 'hungry' ),
			'desc'     => esc_html__( 'For best results, use a square image approximately 280 x 280 pixels in size.', 'hungry' ),
			'type'     => 'media',
			'url'      => true,
			'default'  => array(
			
				'url' => get_template_directory_uri() . '/images/defaults/staff-02.jpg'
				
			)
			
		),
		
		array(
		
			'id'           => 'hungry_team_02_desc',
			'title'        => esc_html__( 'Staff Member 02 - Description', 'hungry' ),
			'subtitle'     => esc_html__( 'Write a small paragraph about this staff member.', 'hungry' ),
			'desc'         => esc_html__( 'Some HTML is allowed in this field!', 'hungry' ),
			'type'         => 'textarea',
			'rows'         => '3',
			'validate'     => 'html_custom',
			'allowed_html' => array(
			
				'strong' => array(),
				'em'     => array(),
				'p'      => array(),
				'a'      => array(
				
					'href'   => array(),
					'target' => array(),
					'title'  => array()
				
				)
			
			),
			'default'      => '<p>Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Aenean commodo ligula.</p>'
			
		),
		
		array(
		
			'id'       => 'hungry_team_02_icon_01_icon',
			'title'    => esc_html__( 'Staff Member 02 - Icon glyphs', 'hungry' ),
			'subtitle' => esc_html__( 'Choose the glyphs to use for this staff member\'s social icons.', 'hungry' ),
			'desc'     => '',
			'type'     => 'select',
			'data'     => 'elusive-icons',
			'default'  => 'el-icon-facebook'
			
		),
		
		array(
		
			'id'      => 'hungry_team_02_icon_02_icon',
			'type'    => 'select',
			'data'    => 'elusive-icons',
			'default' => 'el-icon-twitter'
			
		),
		
		array(
		
			'id'   => 'hungry_team_02_icon_03_icon',
			'type' => 'select',
			'data' => 'elusive-icons'
			
		),
		
		array(
		
			'id'       => 'hungry_team_02_icon_01_url',
			'title'    => esc_html__( 'Staff Member 02 - Icon URLs', 'hungry' ),
			'subtitle' => esc_html__( 'Enter the corresponding URLs for the above icons.', 'hungry' ),
			'desc'     => '',
			'type'     => 'text',
			'validate' => 'url',
			'default'  => 'http://www.example.com'
			
		),
		
		array(
		
			'id'       => 'hungry_team_02_icon_02_url',
			'type'     => 'text',
			'validate' => 'url',
			'default'  => 'http://www.example.com'
			
		),
		
		array(
		
			'id'       => 'hungry_team_02_icon_03_url',
			'type'     => 'text',
			'validate' => 'url'
			
		),
		
		array(
		
			'id'       => 'hungry_team_02_icon_01_tooltip',
			'title'    => esc_html__( 'Staff Member 02 - Icon Tooltips', 'hungry' ),
			'subtitle' => esc_html__( 'Enter some optional tooltip texts for the icons.', 'hungry' ),
			'desc'     => '',
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'Like Jeffrey!'
			
		),
		
		array(
		
			'id'       => 'hungry_team_02_icon_02_tooltip',
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'Tweet Jeffrey!'
			
		),
		
		array(
		
			'id'       => 'hungry_team_02_icon_03_tooltip',
			'type'     => 'text',
			'validate' => 'no_html'
			
		),
		
		array(
		
			'id'   => 'hungry_staff_divider_03',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_team_03_name',
			'title'    => esc_html__( 'Staff Member 03 - Name', 'hungry' ),
			'subtitle' => esc_html__( 'Enter this staff member\'s name.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'Monica Reyes'
			
		),
		
		array(
		
			'id'       => 'hungry_team_03_role',
			'title'    => esc_html__( 'Staff Member 03 - Role', 'hungry' ),
			'subtitle' => esc_html__( 'Enter this staff member\'s job title (or equivalent).', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'Waitress'
			
		),
		
		array(
		
			'id'       => 'hungry_team_03_thumbnail',
			'title'    => esc_html__( 'Staff Member 03 - Thumbnail Image', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload a medium sized thumbnail image for this staff member.', 'hungry' ),
			'desc'     => esc_html__( 'For best results, use a square image approximately 280 x 280 pixels in size.', 'hungry' ),
			'type'     => 'media',
			'url'      => true,
			'default'  => array(
			
				'url' => get_template_directory_uri() . '/images/defaults/staff-03.jpg'
				
			)
			
		),
		
		array(
		
			'id'           => 'hungry_team_03_desc',
			'title'        => esc_html__( 'Staff Member 03 - Description', 'hungry' ),
			'subtitle'     => esc_html__( 'Write a small paragraph about this staff member.', 'hungry' ),
			'desc'         => esc_html__( 'Some HTML is allowed in this field!', 'hungry' ),
			'type'         => 'textarea',
			'rows'         => '3',
			'validate'     => 'html_custom',
			'allowed_html' => array(
			
				'strong' => array(),
				'em'     => array(),
				'p'      => array(),
				'a'      => array(
				
					'href'   => array(),
					'target' => array(),
					'title'  => array()
				
				)
			
			),
			'default'      => '<p>Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Aenean commodo ligula.</p>'
			
		),
		
		array(
		
			'id'       => 'hungry_team_03_icon_01_icon',
			'title'    => esc_html__( 'Staff Member 03 - Icon glyphs', 'hungry' ),
			'subtitle' => esc_html__( 'Choose the glyphs to use for this staff member\'s social icons.', 'hungry' ),
			'desc'     => '',
			'type'     => 'select',
			'data'     => 'elusive-icons',
			'default'  => 'el-icon-twitter'
			
		),
		
		array(
		
			'id'   => 'hungry_team_03_icon_02_icon',
			'type' => 'select',
			'data' => 'elusive-icons'
			
		),
		
		array(
		
			'id'   => 'hungry_team_03_icon_03_icon',
			'type' => 'select',
			'data' => 'elusive-icons'
			
		),
		
		array(
		
			'id'       => 'hungry_team_03_icon_01_url',
			'title'    => esc_html__( 'Staff Member 03 - Icon URLs', 'hungry' ),
			'subtitle' => esc_html__( 'Enter the corresponding URLs for the above icons.', 'hungry' ),
			'desc'     => '',
			'type'     => 'text',
			'validate' => 'url',
			'default'  => 'http://www.example.com'
			
		),
		
		array(
		
			'id'       => 'hungry_team_03_icon_02_url',
			'type'     => 'text',
			'validate' => 'url'
			
		),
		
		array(
		
			'id'       => 'hungry_team_03_icon_03_url',
			'type'     => 'text',
			'validate' => 'url'
			
		),
		
		array(
		
			'id'       => 'hungry_team_03_icon_01_tooltip',
			'title'    => esc_html__( 'Staff Member 02 - Icon Tooltips', 'hungry' ),
			'subtitle' => esc_html__( 'Enter some optional tooltip texts for the icons.', 'hungry' ),
			'desc'     => '',
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'Follow Monica!'
			
		),
		
		array(
		
			'id'       => 'hungry_team_03_icon_02_tooltip',
			'type'     => 'text',
			'validate' => 'no_html'
			
		),
		
		array(
		
			'id'       => 'hungry_team_03_icon_03_tooltip',
			'type'     => 'text',
			'validate' => 'no_html'
			
		)
		
	)
	
) );

/**
 *
 *  SECTION - Gallery
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'   => esc_html__( 'Section - Gallery', 'hungry' ),
	'desc'    => wp_kses_post( __( 'This is the part where you get to show off some cool images of your restaurant or cafe. You can use almost any size image you want, but if you want a similar effect seen in the demo site, the sizes used there are:<br /><br /><strong>560 x 460 pixles</strong><br /><strong>1160 x 460 pixels</strong> with the "wide" class added. View the docs for more info on this.', 'hungry' ) ),
	'icon'    => 'el-icon-photo-alt',
	'submenu' => false,
	'fields'  => array(

		array(
		
			'id'       => 'hungry_gallery_padding',
			'title'    => esc_html__( 'Section Padding', 'hungry' ),
			'subtitle' => esc_html__( 'Create space (padding) at the top and bottom of this section by adjusting these values.', 'hungry' ),
			'desc'     => '',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'units'    => array( 'px', 'em' ),
			'left'     => false,
			'right'    => false,
			'default'  => array(
			
				'padding-top'    => '140px',
				'padding-bottom' => '120px',
				'units'          => 'px'
			
			)
			
		),
	
		array(
		
			'id'       => 'hungry_gallery_title',
			'title'    => esc_html__( 'Section Heading Title', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a name for this section\'s title.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'The Gallery',
			'validate' => 'no_html',
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'You can leave this field empty if you don\'t require it!', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_gallery_subtitle',
			'title'    => esc_html__( 'Section Heading Subtitle', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a name for this section\'s subtitle. Appears directly underneath the main title.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'Take a Look Inside!',
			'validate' => 'no_html',
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'You can leave this field empty if you don\'t require it!', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_gallery_slug',
			'title'    => esc_html__( 'This Section\'s Slug Name', 'hungry' ),
			'subtitle' => esc_html__( 'This is used as the section\'s ID. Can be used in WordPress Custom Menus for single page navigation.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'hungry-gallery',
			'validate' => 'str_replace',
			'str'      => array(
			
				'search'      => ' ',
				'replacement' => '-'
			
			),
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'Use lowercase letters and hyphens.', 'hungry' )
			
			)
			
		),
		
		array(
		
			'id'   => 'hungry_gallery_divider_01',
			'type' => 'divide'
			
		),
						
		array(
		
			'id'       => 'hungry_gallery_images',
			'title'    => esc_html__( 'Gallery Images', 'hungry' ),
			'subtitle' => esc_html__( 'Use the WordPress media manager to add, delete and re-order your images for the gallery.', 'hungry' ),
			'desc'     => '',
			'type'     => 'gallery'
			
		)
	
	)
	
) );

/**
 *
 *  SECTION - Blog
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'   => esc_html__( 'Section - Blog', 'hungry' ),
	'desc'    => esc_html__( 'This section will display your latest blog posts in a grid layout.', 'hungry' ),
	'icon'    => 'el-icon-file-edit-alt',
	'submenu' => false,
	'fields'  => array(

		array(
		
			'id'       => 'hungry_blog_padding',
			'title'    => esc_html__( 'Section Padding', 'hungry' ),
			'subtitle' => esc_html__( 'Create space (padding) at the top and bottom of this section by adjusting these values.', 'hungry' ),
			'desc'     => '',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'units'    => array( 'px', 'em' ),
			'left'     => false,
			'right'    => false,
			'default'  => array(
			
				'padding-top'    => '140px',
				'padding-bottom' => '140px',
				'units'          => 'px'
			
			)
			
		),
	
		array(
		
			'id'       => 'hungry_blog_title',
			'title'    => esc_html__( 'Section Heading Title', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a name for this section\'s title.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'Our Blog',
			'validate' => 'no_html',
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'You can leave this field empty if you don\'t require it!', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_blog_subtitle',
			'title'    => esc_html__( 'Section Heading Subtitle', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a name for this section\'s subtitle. Appears directly underneath the main title.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'Stay up to Date!',
			'validate' => 'no_html',
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'You can leave this field empty if you don\'t require it!', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_blog_background',
			'title'    => esc_html__( 'Section Background', 'hungry' ),
			'subtitle' => esc_html__( 'You can upload an image to use as this section\'s background, or if you prefer to keep things simple, you can have a background colour. You can even have both if you want to be creative!', 'hungry' ),
			'desc'     => esc_html__( 'It is recommended that you use an image that is 1920 pixels wide and quite high. This will make sure it looks good on screens with wide displays.', 'hungry' ),
			'type'     => 'background',
			'default'  => array(
			
				'background-color'      => '#252525',
				'background-image'      => get_template_directory_uri() . '/images/defaults/parallax-04.jpg',
				'background-attachment' => 'fixed',
				'background-repeat'     => 'repeat',
				'background-size'       => 'inherit',
				'background-position'   => 'center center'
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_blog_parallax',
			'title'    => esc_html__( 'Parallax Effect', 'hungry' ),
			'subtitle' => esc_html__( 'Use this option to enable a parallax scrolling effect to this section\'s background image. For this effect to work well, it is recommended that you have the background-attachment set to fixed in the above option.', 'hungry' ),
			'desc'     => '',
			'type'     => 'switch',
			'on'       => $hungry_enabled,
			'off'      => $hungry_disabled,
			'default'  => true
			
		),
		
		array(
		
			'id'       => 'hungry_blog_slug',
			'title'    => esc_html__( 'This Section\'s Slug Name', 'hungry' ),
			'subtitle' => esc_html__( 'This is used as the section\'s ID. Can be used in WordPress Custom Menus for single page navigation.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'hungry-blog',
			'validate' => 'str_replace',
			'str'      => array(
			
				'search'      => ' ',
				'replacement' => '-'
			
			),
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'Use lowercase letters and hyphens.', 'hungry' )
			
			)
			
		),
		
		array(
		
			'id'   => 'hungry_blog_divider_01',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'       => 'hungry_blog_amount',
			'title'    => esc_html__( 'Number of Posts', 'hungry' ),
			'subtitle' => esc_html__( 'Select the number of posts to show in this section.', 'hungry' ),
			'desc'     => '',
			'type'     => 'slider',
			'min'      => '0',
			'max'      => '20',
			'step'     => '1',
			'default'  => '4'
			
		),
		
		array(
		
			'id'       => 'hungry_blog_button_text',
			'title'    => esc_html__( 'Button Text', 'hungry' ),
			'subtitle' => esc_html__( 'Enter the text for the "View Blog" button.', 'hungry' ),
			'desc'     => esc_html__( 'To remove this button, leave this field empty.', 'hungry' ),
			'type'     => 'text',
			'validate' => 'no_html',
			'default'  => 'View the Blog'
			
		),
		
		array(
		
			'id'       => 'hungry_blog_button_url',
			'title'    => esc_html__( 'Button URL', 'hungry' ),
			'subtitle' => esc_html__( 'Select a page for the button to link to. Choose from a list of your current WordPress pages.', 'hungry' ),
			'desc'     => '',
			'type'     => 'select',
			'data'     => 'pages'
			
		)
		
	)
	
) );

/**
 *
 *  SECTION - Reservations
 *  ---------------------------------------------------------------
 *
 */
Redux::setSection( $opt_name, array(

	'title'   => esc_html__( 'Section - Reservations', 'hungry' ),
	'desc'    => esc_html__( 'This section is ideal for showing contact details or a contact form. If you need to use a reservation booking plugin, we recommend the Restaurant Reservations plugin as theme has been styled around it.', 'hungry' ),
	'icon'    => 'el-icon-calendar-sign',
	'submenu' => false,
	'fields'  => array(

		array(
		
			'id'       => 'hungry_reservations_padding',
			'title'    => esc_html__( 'Section Padding', 'hungry' ),
			'subtitle' => esc_html__( 'Create space (padding) at the top and bottom of this section by adjusting these values.', 'hungry' ),
			'desc'     => '',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'units'    => array( 'px', 'em' ),
			'left'     => false,
			'right'    => false,
			'default'  => array(
			
				'padding-top'    => '140px',
				'padding-bottom' => '140px',
				'units'          => 'px'
			
			)
			
		),
	
		array(
		
			'id'       => 'hungry_reservations_title',
			'title'    => esc_html__( 'Section Heading Title', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a name for this section\'s title.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'Reservations',
			'validate' => 'no_html',
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'You can leave this field empty if you don\'t require it!', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_reservations_subtitle',
			'title'    => esc_html__( 'Section Heading Subtitle', 'hungry' ),
			'subtitle' => esc_html__( 'Enter a name for this section\'s subtitle. Appears directly underneath the main title.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'Book Your Meal Today!',
			'validate' => 'no_html',
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'You can leave this field empty if you don\'t require it!', 'hungry' ),
			
			)
			
		),
		
		array(
		
			'id'       => 'hungry_reservations_slug',
			'title'    => esc_html__( 'This Section\'s Slug Name', 'hungry' ),
			'subtitle' => esc_html__( 'This is used as the section\'s ID. Can be used in WordPress Custom Menus for single page navigation.', 'hungry' ),
			'desc'     => esc_html__( 'No HTML is allowed in this field!', 'hungry' ),
			'type'     => 'text',
			'default'  => 'hungry-reservations',
			'validate' => 'str_replace',
			'str'      => array(
			
				'search'      => ' ',
				'replacement' => '-'
			
			),
			'hint'     => array(
			
				'title'   => esc_html__( 'Tip', 'hungry' ),
				'content' => esc_html__( 'Use lowercase letters and hyphens.', 'hungry' )
			
			)
			
		),
		
		array(
		
			'id'   => 'hungry_reservations_divider_01',
			'type' => 'divide'
			
		),
		
		array(
		
			'id'           => 'hungry_reservations_content',
			'title'        => esc_html__( 'Main Content', 'hungry' ),
			'subtitle'     => esc_html__( 'Content for this section. Use the WordPress TinyMCE editor to add your content. If you are using a Restaurant Booking plugin, you can put the shortcode here.', 'hungry' ),
			'desc'         => '',
			'type'         => 'editor',
			'validate'     => 'html_custom',
			'allowed_html' => $allowed_html,
			'args'         => array(
			
				'textarea_rows' => '20'
			
			),
			'default'      => '<p style="text-align: center;"><strong>' . __( 'This is some example content. You can put anything you like. Why not use a shortcode for your reservation form plugin? If you\'d like more information on how to do this, please see the documentation. You can access the docs through the theme options panel.', 'hungry' ) . '</strong></p>'
			
		)
		
	)
	
) );

Redux::setSection( $opt_name, array( 
	
	'title'   => esc_html__( 'Divide', 'hungry' ),
	'id'      => 'presentation-divide-02',
	'type'    => 'divide',
	'submenu' => false
	
) );