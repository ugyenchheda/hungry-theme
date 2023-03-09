<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Hungry theme functions and definitions.
 *
 *  1.0.1 - Added more output sanitization.
 *          Refractored some functions. Removed Custom JS option (Not needed).
 *
 */

/*
 *  Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

/*
 *  Register the required plugins for this theme.
 */
function hungry_register_plugins() {
   
	$plugins = array(
        
		/*
		 *  Hungry Plugin
		 */
		array(
		
			'name'               => 'Hungry Plugin',
			'slug'               => 'hungry-plugin',
			'source'             => get_stylesheet_directory() . '/plugins/hungry-plugin.zip',
			'required'           => true,
			'version'            => '1.0.0',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => ''
		
		),

		/*
		 *  Breadcrumb Trail Plugin
		 */
		array(

			'name'      => 'Breadcrumb Trail',
			'slug'      => 'breadcrumb-trail',
			'required'  => false
		
		)

	);

	$config = array(
	
		'default_path' => '',                     
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
		'strings'      => array(
		
			'page_title'                      => __( 'Install Required Plugins', 'hungry' ),
			'menu_title'                      => __( 'Install Plugins', 'hungry' ),
			'installing'                      => __( 'Installing Plugin: %s', 'hungry' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'hungry' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'hungry' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'hungry' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'hungry' ), // %s = dashboard link.
			'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			
		)
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'hungry_register_plugins' );

/**
 *  Set the content width based on the theme's design and stylesheet.
 *  ---------------------------------------------------------------------------
 */
if ( ! isset( $content_width ) ) {

	$content_width = 820; // In Pixels
	
}

/**
 *  Hungry only works on WordPress 4.1 or later.
 *  ---------------------------------------------------------------------------
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {

	require get_template_directory() . '/inc/back-compat.php';
	
}

if( ! function_exists( 'hungry_setup' ) ) :
/**
 *  Set up the theme's defaults and register certain WordPress features.
 *  ---------------------------------------------------------------------------
 */
function hungry_setup() {

	/*
	 *  Make the theme available for translation.
	 */
	load_theme_textdomain( 'hungry', get_template_directory() . '/languages' );

	/*
	 *  Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 *  Let WordPress handle the <title> tag.
	 */
	add_theme_support( 'title-tag' );

	/*
	 *  Enable support for Post Thumbnails on posts and pages.
	 *  See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1180, 500, true );
	add_image_size( 'hungry-recipe', 400, 400, true );
	
	/*
	 *  Switch default core markup for search form, comment form, and comments
	 *  to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
	
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
		
	) );
	
	/*
	 *  Enable support for Post Formats.
	 *  See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
	
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat'
		
	) );
	
	/*
	 *  Add support for custom backgrounds.
	 */
	add_theme_support( 'custom-background', array(
	
		'default_color' => '#ffffff'
	
	) );
	
	/*
	 *  Add support for custom header images.
	 */
	add_theme_support( 'custom-header', array(
	
		'width'              => 1920,
		'height'             => 800,
		'default_image'      => get_template_directory_uri() . '/images/assets/default-header-image.jpg'
		
	) );
	
	/*
	 *  Register Navigation Menus
	 */
	register_nav_menus( array(
	
		'primary' => __( 'Main Navigation', 'hungry' )
	
	) );
	
	/*
	 *  Add a custom stylesheet to the Rich Editor
	 */
	add_editor_style( 'css/editor-style.css' );
	
	/**
	 *  Load the Redux theme options framework.
	 *  ---------------------------------------------------------------------------
	 */
	if ( ! class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/admin/ReduxCore/framework.php' ) ) {

		require_once( dirname( __FILE__ ) . '/admin/ReduxCore/framework.php' );
		
	}

	if ( ! isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/inc/theme-options.php' ) ) {

		require_once( dirname( __FILE__ ) . '/inc/theme-options.php' );
		
	}		
	
}
endif; // hungry_setup
add_action( 'after_setup_theme', 'hungry_setup' );

/**
 *  Register Widget Areas.
 *  ---------------------------------------------------------------------------
 */
function hungry_widgets_init() {

	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Hungry_Contact_Widget' );
	register_widget( 'Hungry_Opening_Times_Widget' );
	
	if( post_type_exists( 'hungry_recipe' ) ) {
	
		register_widget( 'Hungry_Recipes_Widget' );
	
	}

	/*
	 *  Blog Sidebar
	 */
	register_sidebar( array(
	
		'name'          => __( 'Blog Main Sidebar', 'hungry' ),
		'id'            => 'sidebar-blog',
		'description'   => __( 'Add Widgets here to appear in your blog page\'s main Sidebar.', 'hungry' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	
	) );
	
	/*
	 *  Footer Sidebar 01
	 */
	register_sidebar( array(
	
		'name'          => __( 'Footer - First Column', 'hungry' ),
		'id'            => 'sidebar-footer-01',
		'description'   => __( 'Add Widgets here to appear in your site footer\'s FIRST column.', 'hungry' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	
	) );
	
	/*
	 *  Footer Sidebar 02
	 */
	register_sidebar( array(
	
		'name'          => __( 'Footer - Second Column', 'hungry' ),
		'id'            => 'sidebar-footer-02',
		'description'   => __( 'Add Widgets here to appear in your site footer\'s SECOND column.', 'hungry' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	
	) );
	
	/*
	 *  Footer Sidebar 03
	 */
	register_sidebar( array(
	
		'name'          => __( 'Footer - Third Column', 'hungry' ),
		'id'            => 'sidebar-footer-03',
		'description'   => __( 'Add Widgets here to appear in your site footer\'s THIRD column.', 'hungry' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	
	) );

	/*
	 *  Footer Sidebar 04
	 */
	register_sidebar( array(
	
		'name'          => __( 'Footer - Fourth Column', 'hungry' ),
		'id'            => 'sidebar-footer-04',
		'description'   => __( 'Add Widgets here to appear in your site footer\'s FOURTH column.', 'hungry' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	
	) );
	
}
add_action( 'widgets_init', 'hungry_widgets_init' );

/**
 *  Enqueue all scripts and styles for the theme.
 *  ---------------------------------------------------------------------------
 *
 *  @TODO: All the theme options settings are getting pulled here. Maybe move
 *  it somewhere else?
 *
 */
function hungry_scripts() {

	/*
	 *  Lets grab some theme options...
	 */
	global $hungry_options;
	
	$slogan_entrance        = empty( $hungry_options['hungry_slogan_entrance'] )        ? 'flipInX'   : $hungry_options['hungry_slogan_entrance'];
	$slogan_exit            = empty( $hungry_options['hungry_slogan_exit'] )            ? 'bounceOut' : $hungry_options['hungry_slogan_exit'];
	$slogan_display_time    = empty( $hungry_options['hungry_slogan_display_time'] )    ? 6000        : $hungry_options['hungry_slogan_display_time'];
	$slogan_animation_delay = empty( $hungry_options['hungry_slogan_animation_delay'] ) ? 45          : $hungry_options['hungry_slogan_animation_delay'];

	$wow                    = checked( $hungry_options['hungry_wow'], 1, false )                  ? '1' : '';
	$slogan_loop            = checked( $hungry_options['hungry_slogan_loop'], 1, false )          ? '1' : '';
	$slogan_sync            = checked( $hungry_options['hungry_slogan_sync'], 1, false )          ? '1' : '';
	$slogan_shuffle         = checked( $hungry_options['hungry_slogan_shuffle'], 1, false )       ? '1' : '';
	$testimonial_parallax   = checked( $hungry_options['hungry_testimonial_parallax'], 1, false ) ? '1' : '';
	$slogan_01_parallax     = checked( $hungry_options['hungry_slogan_01_parallax'], 1, false )   ? '1' : '';
	$slogan_02_parallax     = checked( $hungry_options['hungry_slogan_02_parallax'], 1, false )   ? '1' : '';
	$slogan_03_parallax     = checked( $hungry_options['hungry_slogan_03_parallax'], 1, false )   ? '1' : '';
	$slogan_04_parallax     = checked( $hungry_options['hungry_slogan_04_parallax'], 1, false )   ? '1' : '';
	$blog_parallax          = checked( $hungry_options['hungry_blog_parallax'], 1, false )        ? '1' : '';
	$innerpage_parallax     = checked( $hungry_options['hungry_innerpage_parallax'], 1, false )   ? '1' : '';
	$header_size            = checked( $hungry_options['hungry_header_size'], 1, false )          ? '1' : '';
	
	$testimonials_slug      = empty( $hungry_options['hungry_testimonials_slug'] ) ? 'hungry-testimonials' : $hungry_options['hungry_testimonials_slug'];
	$slogan_01_slug         = empty( $hungry_options['hungry_slogan_01_slug'] )    ? 'hungry-slogan-01'    : $hungry_options['hungry_slogan_01_slug'];
	$slogan_02_slug         = empty( $hungry_options['hungry_slogan_02_slug'] )    ? 'hungry-slogan-02'    : $hungry_options['hungry_slogan_02_slug'];
	$slogan_03_slug         = empty( $hungry_options['hungry_slogan_03_slug'] )    ? 'hungry-slogan-03'    : $hungry_options['hungry_slogan_03_slug'];
	$slogan_04_slug         = empty( $hungry_options['hungry_slogan_04_slug'] )    ? 'hungry-slogan-04'    : $hungry_options['hungry_slogan_04_slug'];
	$blog_slug              = empty( $hungry_options['hungry_blog_slug'] )         ? 'hungry-blog'         : $hungry_options['hungry_blog_slug'];
		
	/*
	 *  Stylesheets
	 */
	wp_enqueue_style( 'hungry-formalize', get_template_directory_uri() . '/css/formalize.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'hungry-unsemantic-grid', get_template_directory_uri() . '/css/unsemantic-grid.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'hungry-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.2.0', 'all' );
	wp_enqueue_style( 'hungry-elusive-icons', get_template_directory_uri() . '/css/elusive-icons.css', array(), '2.0.0', 'all' );
	wp_enqueue_style( 'hungry-animate', get_template_directory_uri() . '/css/animate.mod.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'hungry-tooltipster', get_template_directory_uri() . '/css/tooltipster.css', array(), '3.3.0', 'all' );
	wp_enqueue_style( 'hungry-style', get_stylesheet_uri() );
	
	/*
	 *  Javascripts
	 *
	 *  "jquery-main.min.js" is a minified file that has all the scripts included. This is to reduce calls and save space.
	 *  Individual files can be found in the "js" folder.
	 */
	wp_enqueue_script( 'hungry-main', get_template_directory_uri() . '/js/jquery-main.min.js', array( 'jquery' ), '1.0.0', true );
	// wp_enqueue_script( 'hungry-vide', get_template_directory_uri() . '/js/jquery-vide.min.js', array( 'jquery' ), '0.3.3', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	
		wp_enqueue_script( 'comment-reply' );
		
	}
	
	wp_register_script( 'hungry-custom', get_template_directory_uri() . '/js/jquery-custom.js', array( 'jquery' ), '1.0.2', true );
	
	/*
	 *  Custom theme options variables to be passed into the "jquery-custom.js" file.
	 */
	$custom_options = array(
	
		'slogan_entrance'        => esc_js( $slogan_entrance ),
		'slogan_exit'            => esc_js( $slogan_exit ),
		'slogan_display_time'    => esc_js( absint( $slogan_display_time ) ),
		'slogan_animation_delay' => esc_js( absint( $slogan_animation_delay ) ),
		'slogan_loop'            => esc_js( $slogan_loop ),
		'slogan_sync'            => esc_js( $slogan_sync ),
		'slogan_shuffle'         => esc_js( $slogan_shuffle ),
		'show_wow'               => esc_js( $wow ),
		'testimonial_parallax'   => esc_js( $testimonial_parallax ),
		'header_size'            => esc_js( $header_size ),
		'slogan_01_parallax'     => esc_js( $slogan_01_parallax ),
		'slogan_02_parallax'     => esc_js( $slogan_02_parallax ),
		'slogan_03_parallax'     => esc_js( $slogan_03_parallax ),
		'slogan_04_parallax'     => esc_js( $slogan_04_parallax ),
		'blog_parallax'          => esc_js( $blog_parallax ),
		'innerpage_parallax'     => esc_js( $innerpage_parallax ),
		'testimonials_slug'      => esc_js( $testimonials_slug ),
		'slogan_01_slug'         => esc_js( $slogan_01_slug ),
		'slogan_02_slug'         => esc_js( $slogan_02_slug ),
		'slogan_03_slug'         => esc_js( $slogan_03_slug ),
		'slogan_04_slug'         => esc_js( $slogan_04_slug ),
		'blog_slug'              => esc_js( $blog_slug ),
		'template_url'           => get_template_directory_uri()
	
	);
	wp_localize_script( 'hungry-custom', 'custom', $custom_options );
	wp_enqueue_script( 'hungry-custom' );
	
}
add_action( 'wp_enqueue_scripts', 'hungry_scripts' );

/**
 *  Enqueue custom styles.
 *  ---------------------------------------------------------------------------
 */
function hungry_custom_css() {

	global $hungry_options;
	$font_body       = empty( $hungry_options['hungry_font_body'] )       ? 'Tahoma'  : $hungry_options['hungry_font_body'];
	$font_heading    = empty( $hungry_options['hungry_font_heading'] )    ? 'Georgia' : $hungry_options['hungry_font_heading'];
	$font_special    = empty( $hungry_options['hungry_font_special'] )    ? 'Tahoma'  : $hungry_options['hungry_font_special'];
	$accent_colour   = empty( $hungry_options['hungry_accent_colour'] )   ? '#ccad52' : $hungry_options['hungry_accent_colour'];
	$nav_colour      = empty( $hungry_options['hungry_nav_colour'] )      ? ''        : $hungry_options['hungry_nav_colour'];
	$nav_text_colour = empty( $hungry_options['hungry_nav_text_colour'] ) ? '#fff'    : $hungry_options['hungry_nav_text_colour'];
	$user_css        = empty( $hungry_options['hungry_user_css'] )        ? ''        : $hungry_options['hungry_user_css'];
	
	$slogan_01_video_url = empty( $hungry_options['hungry_slogan_01_video_url'] ) ? '' : $hungry_options['hungry_slogan_01_video_url'];
	$slogan_02_video_url = empty( $hungry_options['hungry_slogan_02_video_url'] ) ? '' : $hungry_options['hungry_slogan_02_video_url'];
	$slogan_03_video_url = empty( $hungry_options['hungry_slogan_03_video_url'] ) ? '' : $hungry_options['hungry_slogan_03_video_url'];
	$slogan_04_video_url = empty( $hungry_options['hungry_slogan_04_video_url'] ) ? '' : $hungry_options['hungry_slogan_04_video_url'];

	$about_us_image_style = checked( $hungry_options['hungry_about_us_image_style'], 1, false ) ? '1' : '';
	$nav_gradient         = checked( $hungry_options['hungry_nav_gradient'], 1, false )         ? '1' : '';
		
	/*
	 *  Get the slug names of each section.
	 */
	$about_us_slug     = empty( $hungry_options['hungry_about_us_slug'] )     ? 'hungry-about-us'     : $hungry_options['hungry_about_us_slug'];
	$testimonials_slug = empty( $hungry_options['hungry_testimonials_slug'] ) ? 'hungry-testimonials' : $hungry_options['hungry_testimonials_slug'];
	$food_slug         = empty( $hungry_options['hungry_food_slug'] )         ? 'hungry-menu'         : $hungry_options['hungry_food_slug'];
	$slogan_01_slug    = empty( $hungry_options['hungry_slogan_01_slug'] )    ? 'hungry-slogan-01'    : $hungry_options['hungry_slogan_01_slug'];
	$slogan_02_slug    = empty( $hungry_options['hungry_slogan_02_slug'] )    ? 'hungry-slogan-02'    : $hungry_options['hungry_slogan_02_slug'];
	$slogan_03_slug    = empty( $hungry_options['hungry_slogan_03_slug'] )    ? 'hungry-slogan-03'    : $hungry_options['hungry_slogan_03_slug'];
	$slogan_04_slug    = empty( $hungry_options['hungry_slogan_04_slug'] )    ? 'hungry-slogan-04'    : $hungry_options['hungry_slogan_04_slug'];
	$team_slug         = empty( $hungry_options['hungry_team_slug'] )         ? 'hungry-staff'        : $hungry_options['hungry_team_slug'];
	$gallery_slug      = empty( $hungry_options['hungry_gallery_slug'] )      ? 'hungry-gallery'      : $hungry_options['hungry_gallery_slug'];
	$blog_slug         = empty( $hungry_options['hungry_blog_slug'] )         ? 'hungry-blog'         : $hungry_options['hungry_blog_slug'];
	$reservations_slug = empty( $hungry_options['hungry_reservations_slug'] ) ? 'hungry-reservations' : $hungry_options['hungry_reservations_slug'];
	
	$css = '';

	/*
	 *  If the Admin bar is showing, move the navbar a bit further down.
	 */
	if( is_admin_bar_showing() ) {

		$css .= '.site-navbar { top: 32px; }';
		$css .= '@media screen and ( max-width: 1024px ) { .site-navbar { top: 0; } }';
		
	}
	
	/*
	 *  Remove the empty space if there are no avatars in the comments.
	 */
	if( get_option( 'show_avatars' ) ) {
	
		$css .= '@media screen and (min-width: 768px) { .comment-container { margin-left: 100px; }	}';
	
	}
	
	/*
	 *  Show the header image in subpages.
	 */
	$header_image       = get_post_meta( get_the_ID(), '_hungry_header_image', 1 );
	$header_image_cover = get_post_meta( get_the_ID(), '_hungry_header_image_cover', 1 );
	if( ! is_page_template( 'page-templates/template-one-page.php' ) ) {
	
		if( $header_image ) {
			
			$css .= '#subpage-header { background-image: url(' . esc_url( $header_image ) . '); }';
			
		} elseif( get_header_image() ) {
					
			$css .= '#subpage-header { background-image: url(' . get_header_image() . '); }';
			
		}
		
		if( $header_image_cover ) {
		
			$css .= '#subpage-header { background-size: cover; }';
			
		}
		
		$css .= '#subpage-header { background-repeat: no-repeat; }';
		$css .= '#subpage-header { background-attachment: fixed; }'; // Overridden on mobile!
		$css .= '#subpage-header { background-position: 50% 50%; }';
		
	}
	
	/*
	 *  Primary font.
	 */
	$css .= 'body, textarea, select, select optgroup, select optgroup option, input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="email"], input[type="month"], input[type="number"], input[type="password"], input[type="search"], input[type="tel"], input[type="text"], input[type="time"], input[type="url"], input[type="week"], .hungry-slogan-text span, .hungry-staff-member-role, .hungry-open-table .open-table-widget button.btn {';
	$css .= 'font-family: "' . esc_html( $font_body['font-family'] ) . '", ' . esc_html( $font_body['font-backup'] ) . '; }';
	$css .= 'body {';
	$css .= 'font-size: ' . esc_html( $font_body['font-size'] ) . ';';
	$css .= 'font-weight: ' . esc_html( $font_body['font-weight'] ) . ';';
	$css .= 'line-height: ' . esc_html( $font_body['line-height'] ) . ';';
	$css .= 'color: ' . esc_html( $font_body['color'] ) . ';';
	$css .= '}';
	
	/*
	 *  Secondary font.
	 */
	$css .= 'h1, h2, h3, h4, h5, h6, dt, legend, label, .widget_calendar caption, .section-heading-subtitle, .sf-menu a, .breadcrumb-trail, .breadcrumb-trail a, .post-date-fixed time, .post-navigation a, .navigation.pagination a, .navigation.comment-navigation a, .edit-link a, .comment-reply-link, .hungry-button, .hungry-testimonial cite, .hungry-blog-author, .hungry-blog-date, .hungry-open-table .open-table-widget .otw-pre-form-content, .hungry-open-table .open-table-widget .otw-post-form-content, #cboxTitle, #cboxCurrent {';
	$css .= 'font-family: "' . esc_html( $font_heading['font-family'] ) . '", ' . esc_html( $font_heading['font-backup'] ) . ';';
	$css .= '}';
	$css .= 'h1, h2, h3, h4, h5, h6 {';
	$css .= 'font-weight: ' . esc_html( $font_heading['font-weight'] ) . ';';
	$css .= 'text-transform: ' . esc_html( $font_heading['text-transform'] ) . ';';
	$css .= 'letter-spacing: ' . esc_html( $font_heading['letter-spacing'] ) . ';';
	$css .= 'color: ' . esc_html( $font_heading['color'] ) . ';';
	$css .= '}';
	
	/*
	 *  Special font
	 */
	$css .= '.hungry-dropcap, .single-page-header-text .tlt, .section-heading-title, .page-title, .not-found-title {';
	$css .= 'font-family: "' . esc_html( $font_special['font-family'] ) . '", ' . esc_html( $font_special['font-backup'] ) . ';';
	$css .= '}';
	
	/*
	 *  Accent Colour
	 */
	$css .= 'a, label span, .hungry-dropcap, .fa-ul i:before, .form-title span em, .section-heading-title, .section-heading-alt-title span, .header-text-pre-slogan em, .breadcrumb-trail a:hover, .post-meta a:hover, .post-title a:hover, .widget ul li:before, .widget ul li a:hover, .comment-author-name a:hover, .hungry-slogan-text em, .hungry-staff-member-role, .hungry-staff-member-social-icons li a:hover i:before, .hungry-blog-title a:hover, .hungry-blog-author a:hover, .widget-hungry-latest-recipes .latest-recipes a:hover, a.hungry-menu-item-header:hover .hungry-menu-item-title, .not-found-title, #site-footer .widget ul li a:hover, #site-footer .widget-hungry-latest-recipes .latest-recipes a:hover {';
	$css .= 'color: ' . sanitize_hex_color( $accent_colour ) . ';';
	$css .= '}';
	$css .= 'button:hover, input[type="reset"]:hover, input[type="submit"]:hover, input[type="button"]:hover, .widget_calendar tbody a, .mobile-close:hover, .image-hover .image-hover-overlay, .post-tags a:hover, .tagcloud a:hover, .post-navigation a:hover, .navigation.pagination a:hover, .navigation.comment-navigation a:hover, .edit-link a:hover, .post-author-tag, .post-author-tag:before, .comment-reply-link:hover, .hungry-staff-member-social-icons li a, .special .hungry-menu-item-price, .ui-datepicker .ui-datepicker-header, #btt:hover, #hungry-reservation-form input[type="submit"]:hover {';
	$css .= 'background: ' . sanitize_hex_color( $accent_colour ) . ';';
	$css .= '}';
	$css .= '.mobile-header { border-top: 3px solid #ccad52; }';
	$css .= '.bypostauthor > .comment-author-avatar, .widget-hungry-latest-recipes .latest-recipes a .recipe-thumbnail img:hover, #site-footer .widget-hungry-latest-recipes .latest-recipes a .recipe-thumbnail img:hover {';
	$css .= 'border: 3px solid ' . sanitize_hex_color( $accent_colour ) . ';';
	$css .= '}';
	$css .= '.hungry-staff-member-social-icons li a { border: 1px solid ' . sanitize_hex_color( $accent_colour ) . '; }';
	$css .= '.post-meta i:before, .widget-hungry-contact-details i:before { text-shadow: 1px 1px 0 ' . sanitize_hex_color( $accent_colour ) . '; }';
	$css .= '.sf-menu a:hover, .site-navbar.short .sf-menu a:hover  {';
	$css .= '-webkit-box-shadow: inset 0 2px 0 ' . sanitize_hex_color( $accent_colour ) . ';';
	$css .= '-moz-box-shadow: inset 0 2px 0 ' . sanitize_hex_color( $accent_colour ) . ';';
	$css .= 'box-shadow: inset 0 2px 0 ' . sanitize_hex_color( $accent_colour ) . '; }';
	$css .= 'blockquote, .sf-menu ul li a:hover, .site-navbar.short .sf-menu ul li a:hover {';
	$css .= '-webkit-box-shadow: inset 2px 0 0 ' . sanitize_hex_color( $accent_colour ) . ';';
	$css .= '-moz-box-shadow: inset 2px 0 0 ' . sanitize_hex_color( $accent_colour ) . ';';
	$css .= 'box-shadow: inset 2px 0 0 ' . sanitize_hex_color( $accent_colour ) . '; }';

	/*
	 *  Site Preloader.
	 */
	$css .= '.hungry-preloader span { background: ' . sanitize_hex_color( $accent_colour ) . '; }';
	$css .= '@-moz-keyframes bubble-anim { 0% { width: 13px; height: 13px; background-color: ' . sanitize_hex_color( $accent_colour ) . '; -moz-transform: translateY(0); }	100% { width: 30px;	height: 30px; background-color: #f1f1f1; -moz-transform: translateY(-26px); } }';
	$css .= '@-webkit-keyframes bubble-anim { 0% { width: 13px; height: 13px; background-color: ' . sanitize_hex_color( $accent_colour ) . '; -webkit-transform: translateY(0); } 100% { width: 30px; height: 30px; background-color: #f1f1f1; -webkit-transform: translateY(-26px); } }';
	$css .= '@-ms-keyframes bubble-anim { 0% { width: 13px;	height: 13px; background-color: ' . sanitize_hex_color( $accent_colour ) . ';	-ms-transform: translateY(0); }	100% { width: 30px;	height: 30px; background-color: #f1f1f1; -ms-transform: translateY(-26px); } }';
	$css .= '@-o-keyframes bubble-anim { 0% { width: 13px; height: 13px; background-color: ' . sanitize_hex_color( $accent_colour ) . '; -o-transform: translateY(0); }	100% { width: 30px; height: 30px; background-color: #f1f1f1; -o-transform: translateY(-26px); } }';
	$css .= '@keyframes bubble-anim { 0% { width: 13px;	height: 13px; background-color: ' . sanitize_hex_color( $accent_colour ) . ';	transform: translateY(0); }	100% { width: 30px;	height: 30px; background-color: #f1f1f1; transform: translateY(-26px); } }';
		
	/*
	 *  Image styling for the "About" section.
	 */
	if( ! $about_us_image_style ) {
	
		$css .= '.about-images img { border: 0; -webkit-border-radius: 0; -moz-border-radius: 0; border-radius: 0; }';
		
	}
	
	/*
	 *  Navigation background and text colour.
	 */
	if( ! $nav_gradient && $nav_colour ) {
	
		$css .= '.site-navbar, .home .site-navbar { background: ' . esc_html( $nav_colour['rgba'] ) . '; }';
		
	}
	if( $nav_text_colour ) {
	
		$css .= '.sf-menu a { color: ' . sanitize_hex_color( $nav_text_colour ) . '; }';
	
	}
	
	$css  .= '#' . esc_html( $about_us_slug ) . ' {';
	$css  .= 'padding-top: ' . esc_html( $hungry_options['hungry_about_us_padding']['padding-top'] ) . ';';
	$css  .= 'padding-bottom: ' . esc_html( $hungry_options['hungry_about_us_padding']['padding-bottom'] ) . ';';
	$css  .= '}';
	
	$css  .= '#' . esc_html( $testimonials_slug ) . ' {';
	$css  .= 'padding-top: ' . esc_html( $hungry_options['hungry_testimonials_padding']['padding-top'] ) . ';';
	$css  .= 'padding-bottom: ' . esc_html( $hungry_options['hungry_testimonials_padding']['padding-bottom'] ) . ';';
	$css  .= 'background-color: ' . esc_html( $hungry_options['hungry_testimonial_background']['background-color'] ) . ';';
	$css  .= 'background-image: url(' . esc_url( $hungry_options['hungry_testimonial_background']['background-image'] ) . ');';
	$css  .= 'background-attachment: ' . esc_html( $hungry_options['hungry_testimonial_background']['background-attachment'] ) . ';';
	$css  .= 'background-repeat: ' . esc_html( $hungry_options['hungry_testimonial_background']['background-repeat'] ) . ';';
	$css  .= 'background-size: ' . esc_html( $hungry_options['hungry_testimonial_background']['background-size'] ) . ';';
	$css  .= 'background-position: ' . esc_html( $hungry_options['hungry_testimonial_background']['background-position'] ) . ';';
	$css  .= '}';
	
	$css  .= '#' . esc_html( $food_slug ) . ' {';
	$css  .= 'padding-top: ' . esc_html( $hungry_options['hungry_food_padding']['padding-top'] ) . ';';
	$css  .= 'padding-bottom: ' . esc_html( $hungry_options['hungry_food_padding']['padding-bottom'] ) . ';';
	$css  .= '}';
	
	$css  .= '#' . esc_html( $slogan_01_slug ) . ' {';
	$css  .= 'padding-top: ' . esc_html( $hungry_options['hungry_slogan_01_padding']['padding-top'] ) . ';';
	$css  .= 'padding-bottom: ' . esc_html( $hungry_options['hungry_slogan_01_padding']['padding-bottom'] ) . ';';
	if( ! $slogan_01_video_url['url'] ) {
		
		$css  .= 'background-color: ' . esc_html( $hungry_options['hungry_slogan_01_background']['background-color'] ) . ';';
		$css  .= 'background-image: url(' . esc_url( $hungry_options['hungry_slogan_01_background']['background-image'] ) . ');';
		$css  .= 'background-attachment: ' . esc_html( $hungry_options['hungry_slogan_01_background']['background-attachment'] ) . ';';
		$css  .= 'background-repeat: ' . esc_html( $hungry_options['hungry_slogan_01_background']['background-repeat'] ) . ';';
		$css  .= 'background-size: ' . esc_html( $hungry_options['hungry_slogan_01_background']['background-size'] ) . ';';
		$css  .= 'background-position: ' . esc_html( $hungry_options['hungry_slogan_01_background']['background-position'] ) . ';';
		
	}
	$css  .= '}';

	// No video for mobile...
	$css  .= '@media screen and (max-width: 1024px) { #' . esc_html( $slogan_01_slug ) . ' {';
	$css  .= 'background-color: ' . esc_html( $hungry_options['hungry_slogan_01_background']['background-color'] ) . ';';
	$css  .= 'background-image: url(' . esc_url( $hungry_options['hungry_slogan_01_background']['background-image'] ) . ') !important;';
	$css  .= 'background-attachment: ' . esc_html( $hungry_options['hungry_slogan_01_background']['background-attachment'] ) . ';';
	$css  .= 'background-repeat: ' . esc_html( $hungry_options['hungry_slogan_01_background']['background-repeat'] ) . ';';
	$css  .= 'background-size: ' . esc_html( $hungry_options['hungry_slogan_01_background']['background-size'] ) . ';';
	$css  .= 'background-position: ' . esc_html( $hungry_options['hungry_slogan_01_background']['background-position'] ) . ';';
	$css  .= '} }';
	
	$css  .= '#' . esc_html( $slogan_02_slug ) . ' {';
	$css  .= 'padding-top: ' . esc_html( $hungry_options['hungry_slogan_02_padding']['padding-top'] ) . ';';
	$css  .= 'padding-bottom: ' . esc_html( $hungry_options['hungry_slogan_02_padding']['padding-bottom'] ) . ';';
	if( ! $slogan_02_video_url['url'] ) {
		
		$css  .= 'background-color: ' . esc_html( $hungry_options['hungry_slogan_02_background']['background-color'] ) . ';';
		$css  .= 'background-image: url(' . esc_url( $hungry_options['hungry_slogan_02_background']['background-image'] ) . ');';
		$css  .= 'background-attachment: ' . esc_html( $hungry_options['hungry_slogan_02_background']['background-attachment'] ) . ';';
		$css  .= 'background-repeat: ' . esc_html( $hungry_options['hungry_slogan_02_background']['background-repeat'] ) . ';';
		$css  .= 'background-size: ' . esc_html( $hungry_options['hungry_slogan_02_background']['background-size'] ) . ';';
		$css  .= 'background-position: ' . esc_html( $hungry_options['hungry_slogan_02_background']['background-position'] ) . ';';
		
	}
	$css  .= '}';
	
	// No video for mobile...
	$css  .= '@media screen and (max-width: 1024px) { #' . esc_html( $slogan_02_slug ) . ' {';
	$css  .= 'background-color: ' . esc_html( $hungry_options['hungry_slogan_02_background']['background-color'] ) . ';';
	$css  .= 'background-image: url(' . esc_url( $hungry_options['hungry_slogan_02_background']['background-image'] ) . ');';
	$css  .= 'background-attachment: ' . esc_html( $hungry_options['hungry_slogan_02_background']['background-attachment'] ) . ';';
	$css  .= 'background-repeat: ' . esc_html( $hungry_options['hungry_slogan_02_background']['background-repeat'] ) . ';';
	$css  .= 'background-size: ' . esc_html( $hungry_options['hungry_slogan_02_background']['background-size'] ) . ';';
	$css  .= 'background-position: ' . esc_html( $hungry_options['hungry_slogan_02_background']['background-position'] ) . ';';
	$css  .= '} }';
	
	$css  .= '#' . esc_html( $slogan_03_slug ) . ' {';
	$css  .= 'padding-top: ' . esc_html( $hungry_options['hungry_slogan_03_padding']['padding-top'] ) . ';';
	$css  .= 'padding-bottom: ' . esc_html( $hungry_options['hungry_slogan_03_padding']['padding-bottom'] ) . ';';
	if( ! $slogan_03_video_url['url'] ) {
		
		$css  .= 'background-color: ' . esc_html( $hungry_options['hungry_slogan_03_background']['background-color'] ) . ';';
		$css  .= 'background-image: url(' . esc_url( $hungry_options['hungry_slogan_03_background']['background-image'] ) . ');';
		$css  .= 'background-attachment: ' . esc_html( $hungry_options['hungry_slogan_03_background']['background-attachment'] ) . ';';
		$css  .= 'background-repeat: ' . esc_html( $hungry_options['hungry_slogan_03_background']['background-repeat'] ) . ';';
		$css  .= 'background-size: ' . esc_html( $hungry_options['hungry_slogan_03_background']['background-size'] ) . ';';
		$css  .= 'background-position: ' . esc_html( $hungry_options['hungry_slogan_03_background']['background-position'] ) . ';';
		
	}
	$css  .= '}';
	
	// No video for mobile...
	$css  .= '@media screen and (max-width: 1024px) { #' . esc_html( $slogan_03_slug ) . ' {';
	$css  .= 'background-color: ' . esc_html( $hungry_options['hungry_slogan_03_background']['background-color'] ) . ';';
	$css  .= 'background-image: url(' . esc_url( $hungry_options['hungry_slogan_03_background']['background-image'] ) . ');';
	$css  .= 'background-attachment: ' . esc_html( $hungry_options['hungry_slogan_03_background']['background-attachment'] ) . ';';
	$css  .= 'background-repeat: ' . esc_html( $hungry_options['hungry_slogan_03_background']['background-repeat'] ) . ';';
	$css  .= 'background-size: ' . esc_html( $hungry_options['hungry_slogan_03_background']['background-size'] ) . ';';
	$css  .= 'background-position: ' . esc_html( $hungry_options['hungry_slogan_03_background']['background-position'] ) . ';';
	$css  .= '} }';
	
	$css  .= '#' . esc_html( $slogan_04_slug ) . ' {';
	$css  .= 'padding-top: ' . esc_html( $hungry_options['hungry_slogan_04_padding']['padding-top'] ) . ';';
	$css  .= 'padding-bottom: ' . esc_html( $hungry_options['hungry_slogan_04_padding']['padding-bottom'] ) . ';';
	if( ! $slogan_04_video_url['url'] ) {
		
		$css  .= 'background-color: ' . esc_html( $hungry_options['hungry_slogan_04_background']['background-color'] ) . ';';
		$css  .= 'background-image: url(' . esc_url( $hungry_options['hungry_slogan_04_background']['background-image'] ) . ');';
		$css  .= 'background-attachment: ' . esc_html( $hungry_options['hungry_slogan_04_background']['background-attachment'] ) . ';';
		$css  .= 'background-repeat: ' . esc_html( $hungry_options['hungry_slogan_04_background']['background-repeat'] ) . ';';
		$css  .= 'background-size: ' . esc_html( $hungry_options['hungry_slogan_04_background']['background-size'] ) . ';';
		$css  .= 'background-position: ' . esc_html( $hungry_options['hungry_slogan_04_background']['background-position'] ) . ';';
		
	}
	$css  .= '}';
	
	// No video for mobile...
	$css  .= '@media screen and (max-width: 1024px) { #' . esc_html( $slogan_04_slug ) . ' {';
	$css  .= 'background-color: ' . esc_html( $hungry_options['hungry_slogan_04_background']['background-color'] ) . ';';
	$css  .= 'background-image: url(' . esc_url( $hungry_options['hungry_slogan_04_background']['background-image'] ) . ');';
	$css  .= 'background-attachment: ' . esc_html( $hungry_options['hungry_slogan_04_background']['background-attachment'] ) . ';';
	$css  .= 'background-repeat: ' . esc_html( $hungry_options['hungry_slogan_04_background']['background-repeat'] ) . ';';
	$css  .= 'background-size: ' . esc_html( $hungry_options['hungry_slogan_04_background']['background-size'] ) . ';';
	$css  .= 'background-position: ' . esc_html( $hungry_options['hungry_slogan_04_background']['background-position'] ) . ';';
	$css  .= '} }';
	
	$css  .= '#' . esc_html( $team_slug ) . ' {';
	$css  .= 'padding-top: ' . esc_html( $hungry_options['hungry_team_padding']['padding-top'] ) . ';';
	$css  .= 'padding-bottom: ' . esc_html( $hungry_options['hungry_team_padding']['padding-bottom'] ) . ';';
	$css  .= '}';
	
	$css  .= '#' . esc_html( $gallery_slug ) . ' {';
	$css  .= 'padding-top: ' . esc_html( $hungry_options['hungry_gallery_padding']['padding-top'] ) . ';';
	$css  .= 'padding-bottom: ' . esc_html( $hungry_options['hungry_gallery_padding']['padding-bottom'] ) . ';';
	$css  .= '}';
	
	$css  .= '#' . esc_html( $blog_slug ) . ' {';
	$css  .= 'padding-top: ' . esc_html( $hungry_options['hungry_blog_padding']['padding-top'] ) . ';';
	$css  .= 'padding-bottom: ' . esc_html( $hungry_options['hungry_blog_padding']['padding-bottom'] ) . ';';
	$css  .= 'background-color: ' . esc_html( $hungry_options['hungry_blog_background']['background-color'] ) . ';';
	$css  .= 'background-image: url(' . esc_url( $hungry_options['hungry_blog_background']['background-image'] ) . ');';
	$css  .= 'background-attachment: ' . esc_html( $hungry_options['hungry_blog_background']['background-attachment'] ) . ';';
	$css  .= 'background-repeat: ' . esc_html( $hungry_options['hungry_blog_background']['background-repeat'] ) . ';';
	$css  .= 'background-size: ' . esc_html( $hungry_options['hungry_blog_background']['background-size'] ) . ';';
	$css  .= 'background-position: ' . esc_html( $hungry_options['hungry_blog_background']['background-position'] ) . ';';
	$css  .= '}';
	
	$css  .= '#' . esc_html( $reservations_slug ) . ' {';
	$css  .= 'padding-top: ' . esc_html( $hungry_options['hungry_reservations_padding']['padding-top'] ) . ';';
	$css  .= 'padding-bottom: ' . esc_html( $hungry_options['hungry_reservations_padding']['padding-bottom'] ) . ';';
	$css  .= '}';
	
	/*
	 *  User defined CSS.
	 */
	if( $user_css ) {
	
		$css .= "\n\n/* -- Custom CSS -- */\n";
		$css .= esc_html( $user_css ) . "\n";
	
	}
	
	wp_add_inline_style( 'hungry-style', $css );

}
add_action( 'wp_enqueue_scripts', 'hungry_custom_css' );

if( ! function_exists( 'sanitize_hex_color' ) ) :
/**
 *  Sanitizes hex colour values. Built into WordPress core but is only
 *  available in the customizer(?)
 *  ---------------------------------------------------------------------------
 */
function sanitize_hex_color( $color ) {

	if ( '' === $color )
	
		return '';

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
	
		return $color;

	return null;
	
}
endif;

if( ! function_exists( 'hungry_favicons' ) ) :
/**
 *  Output favicon links in the head.
 *  ---------------------------------------------------------------------------
 */
function hungry_favicons() {

	global $hungry_options;
	$favicon_ico   = empty( $hungry_options['hungry_favicon_ico']['url'] )   ? '' : $hungry_options['hungry_favicon_ico']['url'];
	$favicon_touch = empty( $hungry_options['hungry_favicon_touch']['url'] ) ? '' : $hungry_options['hungry_favicon_touch']['url'];
	
	if( ! $favicon_ico && ! $favicon_touch ) {
	
		return;
	
	}
	
	$html = '';	
	if( $favicon_ico ) {
	
		$html .= '<link rel="icon" href="' . esc_url( $favicon_ico ) . '">' . "\n";
		
	}
	if( $favicon_touch ) {
	
		$html .= '<link rel="apple-touch-icon-precomposed" href="' . esc_url( $favicon_touch ) . '">' . "\n";
		
	}
	
	echo wp_kses( $html, array( 
	
		'link' => array(
		
			'rel'  => array(),
			'href' => array()
		
		)
		
	) );
	
}
add_action( 'wp_head', 'hungry_favicons' );
endif;

if ( ! function_exists( '_wp_render_title_tag' ) ) :
/**
 *  Backwards compatability support for the wp_title()
 *  ---------------------------------------------------------------------------
 */
function hungry_render_title() {
	
	?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
		
}
add_action( 'wp_head', 'hungry_render_title' );
endif;

/**
 *  Include all necessary files.
 *  ---------------------------------------------------------------------------
 */
require get_template_directory() . '/inc/template-tags.php';