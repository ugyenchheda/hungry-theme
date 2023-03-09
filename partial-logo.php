<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Template part used to display the site logo in the navbar.
 *
 */

global $hungry_options;
$logo     = empty( $hungry_options['hungry_logo'] )     ? '' : $hungry_options['hungry_logo'];
$logo_alt = empty( $hungry_options['hungry_logo_alt'] ) ? '' : $hungry_options['hungry_logo_alt'];

?>
			<!-- START Site Logo -->
			<div class="grid-20 tablet-grid-50 mobile-grid-50">
				<a href="<?php echo esc_url( home_url( '/') ); ?>">
					<?php if( $logo['url'] ) : ?>
						<img class="site-logo" src="<?php echo esc_url( $logo['url'] ); ?>"<?php if( $logo_alt ) : ?> alt="<?php echo esc_attr( $logo_alt ); ?>"<?php endif; ?> />
					<?php else : ?>
						<h1 class="site-title"><?php bloginfo( 'title' ) ?></h1>
					<?php endif; ?>
				</a>
			</div>
			<!-- END Site Logo -->