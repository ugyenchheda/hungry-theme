<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  The theme's search form. Taken and slightly modified from the example in
 *  the WordPress Codex.
 *
 */
?>
<form role="search" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<input type="search" name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Search the Site&hellip;', 'Placeholder text', 'hungry' ); ?>" title="<?php echo esc_attr_x( 'Search for:', 'Label', 'hungry' ); ?>" />
	<input type="submit" name="search-submit" id="search-submit" value="&#xf002;" />
</form>