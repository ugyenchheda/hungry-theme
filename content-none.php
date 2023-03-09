<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Used to display a message when no posts can be found.
 *
 *  1.0.1 - Added more output sanitization.
 *
 */
?>
		<section class="no-results not-found">
		
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( wp_kses_data( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'hungry' ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'hungry' ); ?></p>
				<?php get_search_form(); ?>
			
			<?php else : ?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'hungry' ); ?></p>
				<?php get_search_form(); ?>
			
			<?php endif; ?>
		
		</section>