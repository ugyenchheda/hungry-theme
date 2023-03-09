<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Custom template tags used throughout the theme.
 *
 *  1.0.1 - Added more sanitization on blog and recipe meta.
 *
 */

if( ! function_exists( 'hungry_post_meta' ) ) :
/**
 *  Display the post meta on blog posts.
 *  ---------------------------------------------------------------------------
 */
function hungry_post_meta() {

	if( 'post' == get_post_type() ) {
	
		// Post Author
		printf(
		
			'<span class="post-author"><i class="fa fa-user"></i><a href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		
		);
	
		// Post Date
		if( ! has_post_thumbnail() ) {		
		
			$time_string = '<span class="post-date"><i class="fa fa-clock-o"></i><a href="%1$s"><time datetime="%4$s">%5$s</time></a></span>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			
				$time_string = '<span class="post-date"><i class="fa fa-clock-o"></i><a href="%1$s" class="special-tooltip" title="%2$s %3$s"><time datetime="%4$s">%5$s</time></a></span>';

			}
			
			printf(
			
				$time_string,
				esc_url( get_permalink() ),
				esc_attr( _x( 'Modified on', 'Used before modified date', 'hungry' ) ),
				esc_attr( get_the_modified_date() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			
			);
			
		} // End has_post_thumbnail()
		
		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'hungry' ) );
		if ( $categories_list && hungry_categorized_blog() ) {
		
			printf( 
			
				'<span class="post-categories"><i class="fa fa-folder"></i>%s</span>',
				$categories_list
				
			);
			
		}
		
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		
			echo '<span class="post-comments"><i class="fa fa-comment"></i>';
			comments_popup_link( __( 'Leave a comment', 'hungry' ), __( '1 Comment', 'hungry' ), __( '% Comments', 'hungry' ) );
			echo '</span>';
			
		}
	
	}

}
endif;

if( ! function_exists( 'hungry_post_tags' ) ) :
/**
 *  Used to display the tags at the bottom of each post.
 *  ---------------------------------------------------------------------------
 */
function hungry_post_tags() {

	if( 'post' == get_post_type() ) {
	
		$tags_list = get_the_tag_list();
		if ( $tags_list ) {
		
			printf( '<span class="post-tags-title">%1$s</span> %2$s',
				_x( 'Tagged:', 'Used before tag names.', 'hungry' ),
				$tags_list
			);
			
		}
	
	}

}
endif;

if( ! function_exists( 'hungry_post_date' ) ) :
/**
 *  Display the post date in the featured image.
 *  ---------------------------------------------------------------------------
 */
function hungry_post_date() {

	$time_string = '<time datetime="%1$s">%4$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
	
		$time_string = '<time datetime="%1$s" class="special-tooltip" title="%2$s %3$s">%4$s</time>';
	
	}
	
	printf(
	
		$time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_attr( _x( 'Modified on', 'Used before modified date', 'hungry' ) ),
		esc_attr( get_the_modified_date() ),
		esc_html( get_the_date() )
	
	);

}
endif;

if( ! function_exists( 'hungry_post_thumbnail' ) ) :
/**
 *  Display the Featured Image (Post Thumbnail). Modified from Twenty Fifteen.
 *  ---------------------------------------------------------------------------
 */
function hungry_post_thumbnail() {

	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
	
		return;
		
	}
	
	global $post;
	$image_atts    = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$image_url     = $image_atts[0];
	$image_caption = empty( get_post( get_post_thumbnail_id() )->post_excerpt ) ? '' : get_post( get_post_thumbnail_id() )->post_excerpt;
	$image_desc    = empty( get_post( get_post_thumbnail_id() )->post_content ) ? '' : get_post( get_post_thumbnail_id() )->post_content;
	
	/*
	 *  Featured images for single blog posts and recipe pages.
	 */
	if ( 'page' == get_post_type() || is_singular( 'post' ) || is_singular( 'hungry_recipe' ) ) : ?>

		<a class="image-hover lightbox" href="<?php echo esc_url( $image_url ); ?>"<?php if( $image_caption ) : ?> title="<?php echo esc_attr( $image_caption ); ?>"<?php endif; ?>>
			<?php 
			
				if( post_type_exists( 'hungry_recipe' ) && 'hungry_recipe' == get_post_type() && is_singular( 'hungry_recipe' ) ) :
			
					the_post_thumbnail( 'hungry-recipe' );
								
				else :
				
					the_post_thumbnail();
				
				endif;
			
			?>
			<div class="image-hover-overlay">
				<i class="fa fa-search-plus"></i>
			</div>
		</a>

	
	<?php 
	
	/*
	 *  Featured images for recipes on menus.
	 */
	elseif( post_type_exists( 'hungry_recipe' ) && 'hungry_recipe' == get_post_type() ) : ?>
		
		<a href="<?php echo esc_url( $image_url ); ?>" class="lightbox hungry-thumbnail-link" <?php if( $image_caption ) : ?> title="<?php echo esc_attr( $image_caption ); ?>"<?php endif; ?>>
			<div class="hungry-menu-item-thumbnail">
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			</div>
			<div class="hungry-thumbnail-overlay">
				<i class="fa fa-search-plus"></i>
			</div>
		</a>
		
	<?php 
	
	/*
	 *  Featured images for blog overview pages.
	 */
	else : ?>

		<a class="image-hover" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail(); ?>
			<div class="image-hover-overlay">
				<i class="fa fa-link"></i>
			</div>
		</a>

	<?php endif;

}
endif;

if( ! function_exists( 'hungry_archive_title' ) ) :
/**
 *  Strips "Menu:" from menu titles (looks tacky).
 *  ---------------------------------------------------------------------------
 */
function hungry_menu_title() {

	$archive_title = get_the_archive_title();
	$archive_title = trim( str_replace( 'Menu:', '', $archive_title ) );
	
	echo esc_html( $archive_title );

}
endif;

/**
 *  Check to see if its a categorized blog. Lifted from Twenty Fifteen.
 *  ---------------------------------------------------------------------------
 */
function hungry_categorized_blog() {

	if ( false === ( $all_the_cool_cats = get_transient( 'hungry_categories' ) ) ) {
	
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
		
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2
			
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'hungry_categories', $all_the_cool_cats );
		
	}

	if ( $all_the_cool_cats > 1 ) {
	
		return true;
		
	} else {
	
		return false;
		
	}
	
}

/**
 *  Remove transients set by the categorized blog. Lifted from Twenty Fifteen.
 *  ---------------------------------------------------------------------------
 */
function hungry_category_transient_flusher() {

	delete_transient( 'hungry_categories' );
	
}
add_action( 'edit_category', 'hungry_category_transient_flusher' );
add_action( 'save_post',     'hungry_category_transient_flusher' );

/**
 *  Custom comment template. Lifted and modified from the example in the Codex.
 *  ---------------------------------------------------------------------------
 */
function hungry_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	extract( $args, EXTR_SKIP );

	if ( 'div' == $args['style'] ) {
	
		$tag       = 'div';
		$add_below = 'comment';
		
	} else {
	
		$tag       = 'li';
		$add_below = 'div-comment';
		
	}
	
	?>
	<<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID(); ?>">
	
		<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID(); ?>" class="comment">
		<?php endif; ?>
		
		<?php if( get_option( 'show_avatars' ) ) : ?>
			<div class="comment-author-avatar">
				<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</div>
		<?php endif; ?>
		
		<div class="comment-container">
			<header class="comment-meta">
				<?php 
				
					printf(
					
						__( '<h5 class="comment-author-name">%s<span class="comment-author-says">Says&hellip;</span></h5>' ),
						get_comment_author_link() 
						
					); 
				
				?>
				<span class="replied-on">
				<?php
				
					printf(
					
						__( 'Replied on %1$s %2$s %3$s', 'hungry' ),
						'<time datetime="' . esc_attr( get_comment_date( 'c' ) ) . '">' . esc_html( get_comment_date() ),
						esc_html( _x( 'at', 'Used between comment date and time', 'hungry' ) ),
						esc_html( get_comment_time() ) . '</time>'
					
					);
					
					edit_comment_link( _x( '(Edit)', 'Used after comment metadata', 'hungry' ), '', '' );
					
				?>
				</span>
				
			</header>
			<div class="comment-content">
				<?php comment_text(); ?>
			</div>
			<footer>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => '<i class="fa fa-reply"></i>' . __( 'Reply', 'hungry' ), 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</footer>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif;

}

if( ! function_exists( 'hungry_comment_nav' ) ) :
/**
 *  Comments Navigation.
 *  ---------------------------------------------------------------------------
 */
function hungry_comment_nav() {

	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<div class="nav-previous">
				<?php previous_comments_link( '<i class="fa fa-angle-double-left"></i>' . __( 'Older Comments', 'hungry' ) ); ?>
			</div>
			<div class="nav-next">
				<?php next_comments_link( __( 'Newer Comments', 'hungry' ) . '<i class="fa fa-angle-double-right"></i>' ); ?>
			</div>
		</nav>
		<?php
	
	endif;

}
endif;

if( ! function_exists( 'hungry_footer_widgets_layout' ) ) :
/**
 *  Layout the footer widgets based on how many sidebars are active.
 *  ---------------------------------------------------------------------------
 */
function hungry_footer_widgets_layout() {

	$columns          = 0;
	$grid             = '';
	$layout           = '';
	$sidebar_01_added = false;
	$sidebar_02_added = false;
	$sidebar_03_added = false;
	$sidebar_04_added = false;

	/*
	 *  Check how many sidebars are active.
	 */
	if( is_active_sidebar( 'sidebar-footer-01' ) ) $columns ++;
	if( is_active_sidebar( 'sidebar-footer-02' ) ) $columns ++;
	if( is_active_sidebar( 'sidebar-footer-03' ) ) $columns ++;
	if( is_active_sidebar( 'sidebar-footer-04' ) ) $columns ++;
	
	switch( $columns ) :
	
		case 1 : 
		
		?>
		
			<!-- START Widget Column 01 -->
			<div class="widget-column widget-column-01 grid-100 tablet-grid-100 mobile-grid-100">
				<?php hungry_get_sidebars(); ?>
			</div>
			<!-- END Widget Column 01 -->
		
		<?php
		
		break;
		
		case 2 : 
		
		?>
		
			<!-- START Widget Column 01 -->
			<div class="widget-column widget-column-01 grid-50 tablet-grid-50 mobile-grid-100">
				<?php hungry_get_sidebars(); ?>
			</div>
			<!-- END Widget Column 01 -->
			
			<!-- START Widget Column 02 -->
			<div class="widget-column widget-column-02 grid-50 tablet-grid-50 mobile-grid-100">
				<?php hungry_get_sidebars(); ?>
			</div>
			<!-- END Widget Column 02 -->
		
		<?php
		
		break;
		
		case 3 : 
		
		?>
		
			<!-- START Widget Column 01 -->
			<div class="widget-column widget-column-01 grid-33 tablet-grid-33 mobile-grid-100">
				<?php hungry_get_sidebars(); ?>
			</div>
			<!-- END Widget Column 01 -->
			
			<!-- START Widget Column 02 -->
			<div class="widget-column widget-column-02 grid-33 tablet-grid-33 mobile-grid-100">
				<?php hungry_get_sidebars(); ?>
			</div>
			<!-- END Widget Column 02 -->
			
			<!-- START Widget Column 03 -->
			<div class="widget-column widget-column-03 grid-33 tablet-grid-33 mobile-grid-100">
				<?php hungry_get_sidebars(); ?>
			</div>
			<!-- END Widget Column 03 -->
		
		<?php
		
		break;
		
		case 4 : 
		
		?>
		
			<!-- START Widget Column 01 -->
			<div class="widget-column widget-column-01 grid-25 tablet-grid-25 mobile-grid-100">
				<?php hungry_get_sidebars(); ?>
			</div>
			<!-- END Widget Column 01 -->
			
			<!-- START Widget Column 02 -->
			<div class="widget-column widget-column-02 grid-25 tablet-grid-25 mobile-grid-100">
				<?php hungry_get_sidebars(); ?>
			</div>
			<!-- END Widget Column 02 -->
			
			<!-- START Widget Column 03 -->
			<div class="widget-column widget-column-03 grid-25 tablet-grid-25 mobile-grid-100">
				<?php hungry_get_sidebars(); ?>
			</div>
			<!-- END Widget Column 03 -->
			
			<!-- START Widget Column 04 -->
			<div class="widget-column widget-column-04 grid-25 tablet-grid-25 mobile-grid-100">
				<?php hungry_get_sidebars(); ?>
			</div>
			<!-- END Widget Column 04 -->
		
		<?php
		
		break;
		
	endswitch;
	
}
endif;

if( ! function_exists( 'hungry_get_sidebars' ) ) :
/**
 *  Function to get sidebars and show them in the footer.
 *  ---------------------------------------------------------------------------
 */
function hungry_get_sidebars() {

	global $sidebar_01_added;
	global $sidebar_02_added;
	global $sidebar_03_added;
	global $sidebar_04_added;

	if( is_active_sidebar( 'sidebar-footer-01' ) && ! $sidebar_01_added ) :
	
		get_sidebar( 'footer-01' );
		$sidebar_01_added = true;
		
	elseif( is_active_sidebar( 'sidebar-footer-02' ) && ! $sidebar_02_added ) :
	
		get_sidebar( 'footer-02' );
		$sidebar_02_added = true;
		
	elseif( is_active_sidebar( 'sidebar-footer-03' ) && ! $sidebar_03_added ) :
	
		get_sidebar( 'footer-03' );
		$sidebar_03_added = true;
		
	elseif( is_active_sidebar( 'sidebar-footer-04' ) && ! $sidebar_04_added ) :
	
		get_sidebar( 'footer-04' );
		$sidebar_04_added = true;
		
	endif;

}
endif;

if( ! function_exists( 'hungry_excerpt_length' ) ) :
/**
 *  Change the length of the excerpt.
 *  ---------------------------------------------------------------------------
 */
function hungry_excerpt_length() {

	return 25; // Number of words.

}
add_filter( 'excerpt_length', 'hungry_excerpt_length' );
endif;

if( ! function_exists( 'hungry_excerpt_more' ) ) :
/**
 *  Change the output of the excerpt's "more" link.
 *  ---------------------------------------------------------------------------
 */
function hungry_excerpt_more() {

	$more_link = sprintf(
	
		' &hellip; <a class="recipe-more-link" href="%1$s">%2$s</a>',
		get_permalink( get_the_ID() ),
		esc_html__( 'View Recipe', 'hungry' )
	
	);
	
	return $more_link;

}
add_filter( 'excerpt_more', 'hungry_excerpt_more' );
endif;

/**
 *  A helper function to get the glyph for the current currency symbol.
 *  ---------------------------------------------------------------------------
 */
function get_hungry_currency_symbol( $symbol ) {

	if( ! $symbol ) {
	
		return;
	
	}
	$glyph = '';

	switch( $symbol ) {
	
		case 'pnd' : 
			$glyph = '&pound;'; 
		break;
		
		case 'eur' : 
			$glyph = '&euro;'; 
		break;
	
		case 'yen' : 
			$glyph = '&yen;'; 
		break;
	
		case 'fra' : 
			$glyph = '&#8355;'; 
		break;
		
		case 'lir' : 
			$glyph = '&#8356;'; 
		break;
	
		case 'dol' :
		default :
			$glyph = '$';
	
	}
	
	return $glyph;

}