<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Archive page to display all Recipes. This is displayed in the same layout
 *  as the menus.
 *
 *  1.0.1 - Added more output sanitization.
 *
 */
get_header();

global $hungry_options;
$currency_symbol = isset( $hungry_options['hungry_currency_symbol'] ) ? $hungry_options['hungry_currency_symbol'] : 'dol';

?>
<div class="site-content grid-container">

	<!-- START Main Content -->
	<main role="main">
		
		<!-- START Recipe Archive -->
		<div class="prefix-20 grid-60 suffix-20 tablet-prefix-10 tablet-grid-80 tablet-suffix-10 mobile-grid-100">
			<div class="hungry-menu">
				
					<?php
					
						$args = array(
						
							'post_type'      => 'hungry_recipe',
							'posts_per_page' => -1							
						);
						
						$food_menu = new WP_Query( $args );
					
						if( $food_menu->have_posts() ) :
					
							?>
							<ol class="hungry-menu-list">
							<?php
					
							while( $food_menu->have_posts() ) : $food_menu->the_post();
						
								$recipe_price   = strip_tags( get_post_meta( get_the_ID(), '_hungry_recipe_price', true ) );
								$recipe_special = strip_tags( get_post_meta( get_the_ID(), '_hungry_recipe_special', true ) );
								$recipe_link    = strip_tags( get_post_meta( get_the_ID(), '_hungry_recipe_link', true ) );
								$recipe_tooltip = strip_tags( get_post_meta( get_the_ID(), '_hungry_recipe_tooltip', true ) );
								$recipe_warning = strip_tags( get_post_meta( get_the_ID(), '_hungry_recipe_warning', true ) );
								$special_class  = '';
								$tooltip_class  = '';
							
								if( $recipe_special ) :
								
									$special_class = ' special';
								
								endif;
								
								if( $recipe_tooltip ) :
								
									$tooltip_class = ' special-tooltip';
								
								endif;
								
							?>
				
							<!-- START Menu Item -->
							<li class="hungry-menu-item<?php echo esc_attr( $special_class ); ?>">
								<?php hungry_post_thumbnail(); ?>
								<div class="hungry-menu-item-container">
								<?php if( $recipe_link ) : ?>
									<a href="<?php the_permalink(); ?>" class="hungry-menu-item-header">
								<?php else : ?>
									<div class="hungry-menu-item-header">
								<?php endif; ?>
										<h3 class="hungry-menu-item-title"><?php the_title(); ?></h3>
										<h4 class="hungry-menu-item-price<?php echo esc_attr( $tooltip_class ); ?>"
											<?php if( $recipe_tooltip ) : ?>
												title="<?php echo esc_attr( $recipe_tooltip ); ?>"
											<?php endif; ?>>
											<span class="currency-symbol"><?php echo get_hungry_currency_symbol( strip_tags( $currency_symbol ) ); ?></span>
											<?php echo esc_html( $recipe_price ); ?>
										</h4>
								<?php if( $recipe_link ) : ?>
									</a>
								<?php else : ?>
									</div>
								<?php endif; ?>
									<div class="hungry-menu-item-excerpt">
										<?php the_excerpt(); ?>
										<?php
										
											if( $recipe_warning ) :
										
												printf(
									
													'<span class="menu-info"><i class="fa fa-exclamation-circle"></i>%s</span>',
													esc_html( $recipe_warning )
									
												);
										
											endif;
										
										?>
									</div>
								</div>
							</li>
							<!-- END Menu Item -->
						
						<?php endwhile; ?>
						
					</ol>
				
				<?php endif; ?>
			</div>
		</div>
		<!-- END Recipe -->
		
	</main>
	<!-- END Main Content -->
	
</div>
<?php get_footer(); ?>