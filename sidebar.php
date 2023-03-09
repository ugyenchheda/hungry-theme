<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Sidebar for the main blog page and standard pages.
 *
 */

if( is_active_sidebar( 'sidebar-blog' ) ) :
?>
	<!-- START Sidebar Content -->
	<div id="secondary" role="complementary">
	
		<?php if( is_page_template( 'page-templates/template-left-sidebar.php' ) ) : ?>
		<div class="grid-25 suffix-5 pull-70 tablet-grid-100 mobile-grid-100">
		<?php else : ?>
		<div class="grid-25 tablet-grid-100 mobile-grid-100">
		<?php endif; ?>
		
			<?php dynamic_sidebar( 'sidebar-blog' ); ?>
		
		</div>
	</div>
	<!-- END Sidebar Content -->

<?php endif; ?>