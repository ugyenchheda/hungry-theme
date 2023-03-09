<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  This template is used to display a single post for the "Recipe" post type.
 *
 *  1.0.1 - Added more output sanitization.
 *  
 */

global $hungry_options;
$currency_symbol = isset( $hungry_options['hungry_currency_symbol'] ) ? $hungry_options['hungry_currency_symbol'] : 'dol';
$recipe_price    = strip_tags( get_post_meta( get_the_ID(), '_hungry_recipe_price', true ) );
$recipe_layout   = strip_tags( get_post_meta( get_the_ID(), '_hungry_recipe_layout', true ) );

if( 'right' == $recipe_layout ) {

	$content_grid_class = 'grid-60 tablet-grid-100 mobile-grid-100';
	$sidebar_grid_class = 'grid-35 suffix-5 tablet-grid-100 mobile-grid-100';

} else {

	$content_grid_class = 'grid-60 pull-40 tablet-grid-100 mobile-grid-100';
	$sidebar_grid_class = 'prefix-5 grid-35 push-60 tablet-grid-100 mobile-grid-100';

}

?>
		<!-- START Recipe Single Entry -->
		<article class="recipe-single">
		
			<div class="<?php echo esc_attr( $sidebar_grid_class ); ?>">
			
				<!-- Recipe Featured Image -->
				<div class="recipe-featured-image">
					<?php hungry_post_thumbnail(); ?>
				</div>
				
				<!-- Recipe Meta -->
				<div class="recipe-meta">
				
					<!-- Recipe Price -->
					<div class="recipe-price">
						<div class="grid-30 tablet-grid-50 mobile-grid-40 recipe-meta-left"><?php esc_html_e( 'Price:', 'hungry' ); ?></div>
						<div class="grid-70 tablet-grid-50 mobile-grid-60 recipe-meta-right">
							<?php 
							
								echo '<span class="currency-symbol">' . get_hungry_currency_symbol( strip_tags( $currency_symbol ) ) . '</span>';
								echo esc_html( $recipe_price );
								
							?>
						</div>
					</div>
					
					<!-- Recipe Menu (Taxonomy) -->
					<div class="recipe-menu">
						<div class="grid-30 tablet-grid-50 mobile-grid-40 recipe-meta-left"><?php esc_html_e( 'Menu:', 'hungry' ); ?></div>
						<div class="grid-70 tablet-grid-50 mobile-grid-60 recipe-meta-right">
							<?php 
							
								if( taxonomy_exists( 'food_menu' ) ) :
								
									echo get_the_term_list( 
									
										$post->ID,
										'food_menu',
										'<div class="food-menu-items">',
										esc_html( _x( ', ', 'Seperate food menu items with a comma', 'hungry' ) ),
										'</div>'
										
									);
								
								endif;
							
							?>
						</div>
					</div>
					
					<!-- Recipe Author -->
					<div class="recipe-author">
						<div class="grid-30 tablet-grid-50 mobile-grid-40 recipe-meta-left"><?php esc_html_e( 'Author:', 'hungry' ); ?></div>
						<div class="grid-70 tablet-grid-50 mobile-grid-60 recipe-meta-right"><?php the_author(); ?></div>
					</div>
				
					<br class="clear" />
				</div>
			</div>
			
			<!-- Recipe Content -->
			<div class="<?php echo esc_attr( $content_grid_class ); ?>">
				<div class="recipe-content">
					
					<?php the_content(); ?>
					
				</div>
			</div>
			
			<br class="clear" />
		</article>
		<!-- END Recipe Single Entry -->