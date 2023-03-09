<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Main header for the theme.
 *
 *  1.0.1 - Added more output sanitization.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<!-- START Meta -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<!-- END Meta -->
	
	<?php wp_head(); ?>
	
</head>
<?php if( is_page_template( 'page-templates/template-one-page.php' ) ) : ?>
<body id="hungry-top" itemscope itemtype="http://schema.org/WebPage" <?php body_class( 'home' ); ?>>
<?php else : ?>
<body itemscope itemtype="http://schema.org/WebPage" <?php body_class(); ?>>
<?php endif; ?>

<!-- START Site Preloader -->
<div id="hungry-preloader-container">
	<div class="hungry-preloader">
		<span class="bubble-01"></span>
		<span class="bubble-02"></span>
		<span class="bubble-03"></span>
	</div>
</div>
<!-- END Site Preloader -->

<!-- START Site Header -->
<?php if( is_page_template( 'page-templates/template-one-page.php' ) ) : ?>

	<header id="single-page-header">

<?php else : ?>

	<header id="subpage-header">
	
<?php endif; ?>
	<div class="site-navbar">
		<div class="grid-container">
<div class="tell">
	<li><i class="fa fa-envelope" aria-hidden="true"></i> myrachathai@gmail.com</li> 
<li> <i class="fa fa-phone" aria-hidden="true"></i> (757) 549-9989</li>
</div>
			<?php get_template_part( 'partial', 'logo' ); ?>
			<?php if ( has_nav_menu( 'primary' ) && wp_nav_menu( array( 'theme_location' => 'primary', 'echo' => false ) ) !== false ) : ?>
		
				<!-- START Navigation -->

				<div class="nav-container grid-80 tablet-grid-50 mobile-grid-50">
				
					<!-- Mobile Nav Icon (Hamburger) -->
					<div class="mobile-nav">
						<i class="fa fa-bars"></i>
					</div>
				
					<nav class="main-navigation" role="navigation">
						
						<!-- Mobile Menu Header -->
						<div class="mobile-header hide-on-desktop">
							<h2><?php esc_html_e( 'Navigation', 'hungry' ); ?></h2>
							<div class="mobile-close">
								<i class="fa fa-times"></i>
							</div>
						</div>
					
						<!-- Main Navigation -->
						<?php
						
							wp_nav_menu( array(
							
								'theme_location' => 'primary',
								'menu_class'     => 'sf-menu'
							
							) );
						
						?>
						
					</nav>
				</div>
				<!-- END Navigation -->
			
			<?php else : ?>
			
				<?php if( is_user_logged_in() && current_user_can( 'edit_pages' ) ) : ?>
			
					<div class="nav-container grid-80 tablet-grid-50 mobile-grid-50">
						<p class="add-menu-text">
							<?php
							
								printf(
								
									esc_html__( 'There are no menus assigned to this location. Why not %s', 'hungry' ),
									sprintf(
									
										'<a href="%1$s">%2$s</a>',
										esc_url( admin_url( 'nav-menus.php' ) ),
										esc_html__( 'add some?', 'hungry' )
									
									)
								
								);
							
							?>
						</p>

					</div>
				
				<?php endif; ?>
			
			<?php endif; // End check for menu. ?>
		</div>
	</div>
	
	<?php
	
		/*
		 *  Load the correct page header depending on the page template.
		 */
		if( is_page_template( 'page-templates/template-one-page.php' ) ) :
		
			get_template_part( 'intro', 'home' );
			
		else :
		
			get_template_part( 'intro' );
			
		endif;
			
	?>
	
</header>
<!-- END Site Header -->