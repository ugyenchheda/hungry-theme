<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Comments Template.
 *
 *  1.0.1 - Added more output sanitization.
 *
 */
 
if ( post_password_required() ) {

	return;
	
}
?>
			<!-- START Comments Area -->
			<div class="comments-area">
			
				<?php if( have_comments() ) : ?>
				
					<h2 class="comments-title">
					<?php
					
						printf( 
						
							_nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'hungry' ),
							number_format_i18n( get_comments_number() ), 
							get_the_title() 
							
						);
						
					?>
					</h2>
					
					<!-- START Comments List -->
					<ol class="comments-list">
					
						<?php
						
							wp_list_comments( array(
							
								'style'       => 'ol',
								'short_ping'  => true,
								'avatar_size' => 70,
								'callback'    => 'hungry_comment'
								
							) );
							
						?>
						
					</ol>
					<!-- END Comments List -->
					
					<?php hungry_comment_nav(); ?>
			 
				<?php endif; // End have_comments() ?>
			 
			</div>
			<!-- END Comments Area -->
			 
			<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :	?>
			
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'hungry' ); ?></p>
				
			<?php endif; ?>

			<!-- START Comment Reply Form -->
			<?php
			
				$comment_form_args = array(
				
					'title_reply'          => esc_html__( 'Leave a Comment', 'hungry' ),
					'label_submit'         => esc_html__( 'Submit Comment', 'hungry' )
					
				);
			
				comment_form( $comment_form_args ); 
			
			?>
			<!-- END Comment Reply Form -->