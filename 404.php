<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  404 template (not found).
 *
 *  1.0.1 - Added more output sanitization.
 *
 */
get_header(); ?>
<div class="site-content grid-container">

	<!-- START 404 -->
	<main role="main">
		<div class="prefix-20 grid-60 suffix-20 tablet-grid-100 mobile-grid-100">
			
			<section class="error-404 not-found">
				<h2 class="not-found-title"><?php esc_html_e( '404', 'hungry' ); ?></h2>
				<h3 class="not-found-subtitle tilt-left"><?php esc_html_e( 'Page Not Found!', 'hungry' ); ?></h3>
				<div class="not-found-content">
					<p><?php esc_html_e( 'It seems that what you were looking for can no longer be found.', 'hungry' ); ?></p>
					<p><?php esc_html_e( 'Why not try a search instead?', 'hungry' ); ?></p>
				</div>
				<?php get_search_form(); ?>
			</section>
			
		</div>
	</main>
	<!-- END 404 -->
	
</div>
<?php get_footer(); ?>