<?php
/**
 *  
 *  Theme:		Hungry
 *  Author:		Subatomic Themes
 *  Author URI:	http://themeforest.net/user/SubatomicThemes
 *  Version:	1.0.2
 *  ---------------------------------------------------------------------------
 *
 *  Custom widgets for Hungry.
 *
 *  1.0.1 - Added more output sanitization.
 *          Added option to remove links in the Recent Recipes widget.
 *
 */

/**
 *  A simple widget that provides contact details inlcuding an email address,
 *  postal address, and telephone number with some intro text at the top.
 *  ---------------------------------------------------------------------------
 */
class Hungry_Contact_Widget extends WP_Widget {

	/*
	 *  A list of allowed HTML tags in the "intro" section.
	 *  Add more if needed.
	 */
	private $intro_allowed_tags = array(
	
		'br'     => array(),
		'strong' => array(),
		'em'     => array(),
		'a'      => array(
		
			'href'   => array(),
			'target' => array(),
			'class'  => array()
		
		)
	
	);

	/*
	 *  Contructor.
	 */
	public function __construct() {
	
		parent::__construct( 'widget_hungry_contact_details', esc_html__( 'Hungry - Contact Details', 'hungry' ), array(
		
			'classname'   => 'widget-hungry-contact-details',
			'description' => esc_html__( 'Use this widget to display contact details for you or your business.', 'hungry' )
			
		) );
		
	}
	
	/*
	 *  Output the HTML for the widget.
	 */
	public function widget( $args, $instance ) {
	
		$title      = empty( $instance['title'] )      ? '' : strip_tags( $instance['title'] );
		$intro      = empty( $instance['intro'] )      ? '' : $instance['intro'];
		$tel_url    = empty( $instance['tel_url'] )    ? '' : strip_tags( $instance['tel_url'] );
		$tel        = empty( $instance['tel'] )        ? '' : strip_tags( $instance['tel'] );
		$email      = empty( $instance['email'] )      ? '' : strip_tags( $instance['email'] );
		$email_text = empty( $instance['email_text'] ) ? '' : strip_tags( $instance['email_text'] );
		$address    = empty( $instance['address'] )    ? '' : $instance['address'];
		
		echo $args['before_widget'];
		echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		
		?>
		<div class="contact-details">
			<p><?php echo wp_kses( $intro, $this->intro_allowed_tags ); ?></p>
			
			<?php if( $tel ) : ?>
			<div class="contact-phone">
				<i class="fa fa-phone-square"></i>
				<?php if( $tel_url ) : ?> 
				<a class="phone-number-link" href="<?php echo esc_url( $tel_url ); ?>"><?php echo esc_html( $tel ); ?></a>
				<?php else : ?>
				<span class="phone-number-text"><?php echo esc_html( $tel ); ?></span>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			
			<?php if( $email_text ) : ?>
			<div class="contact-email">
				<i class="fa fa-envelope-square"></i>
				<?php if( $email ) : ?>
				<a class="email-link" href="<?php echo esc_url( $email ); ?>"><?php echo esc_html( $email_text ); ?></a>
				<?php else : ?>
				<span class="email-text"><?php echo esc_html( $email_text ); ?></span>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			
			<?php if( $address ) : ?>
			<div class="contact-address">
				<i class="fa fa-caret-square-o-down"></i>
				<address>
					<?php echo wp_kses( $address, array( 'br' => array() ) ); ?>
				</address>
			</div>
			<?php endif; ?>
			
		</div>
		<?php
		
		echo $args['after_widget'];
	
	}
	
	/*
	 *  Update settings.
	 */
	function update( $new_instance, $instance ) {

		$instance['title']      = strip_tags( $new_instance['title'] );
		$instance['intro']      = wp_kses( $new_instance['intro'], $this->intro_allowed_tags );
		$instance['tel_url']    = esc_url( $new_instance['tel_url'] );
		$instance['tel']        = strip_tags( $new_instance['tel'] );
		$instance['email']      = sanitize_email( $new_instance['email'] );
		$instance['email_text'] = sanitize_text_field( $new_instance['email_text'] );
		$instance['address']    = wp_kses( $new_instance['address'], array( 'br' => array() ) );
		
		return $instance;
	
	}
	
	/*
	 *  Widget admin settings.
	 */
	function form( $instance ) {
	
		$title      = empty( $instance['title'] )      ? '' : $instance['title'];
		$intro      = empty( $instance['intro'] )      ? '' : wp_kses( $instance['intro'], $this->intro_allowed_tags );
		$tel_url    = empty( $instance['tel_url'] )    ? '' : $instance['tel_url'];
		$tel        = empty( $instance['tel'] )        ? '' : $instance['tel'];
		$email      = empty( $instance['email'] )      ? '' : $instance['email'];
		$email_text = empty( $instance['email_text'] ) ? '' : $instance['email_text'];
		$address    = empty( $instance['address'] )    ? '' : $instance['address'];
				
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'intro' ) ); ?>"><?php esc_html_e( 'Intro Text:', 'hungry' ); ?></label>
			<textarea id="<?php echo esc_attr( $this->get_field_id( 'intro' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'intro' ) ); ?>"><?php echo esc_attr( $intro ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tel_url' ) ); ?>"><?php esc_html_e( 'Telephone Number URL:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'tel_url' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'tel_url' ) ); ?>" type="text" value="<?php echo esc_attr( $tel_url ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tel' ) ); ?>"><?php esc_html_e( 'Telephone Number:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'tel' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'tel' ) ); ?>" type="text" value="<?php echo esc_attr( $tel ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_html_e( 'Email Address:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="email" value="<?php echo esc_attr( $email ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email_text' ) ); ?>"><?php esc_html_e( 'Email Text:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'email_text' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'email_text' ) ); ?>" type="email" value="<?php echo esc_attr( $email_text ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php _e( 'Address (br tags allowed):', 'hungry' ); ?></label>
			<textarea id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>"><?php echo wp_kses( $address, array( 'br' => array() ) ); ?></textarea>
		</p>
		<?php
	
	}
	
}

/**
 *  Use this widget to display the opening times of your business.
 *  ---------------------------------------------------------------------------
 */
class Hungry_Opening_Times_Widget extends WP_Widget {

	/*
	 *  A list of allowed HTML tags in the "intro" section.
	 *  Add more if needed.
	 */
	private $intro_allowed_tags = array(
	
		'br'     => array(),
		'strong' => array(),
		'em'     => array(),
		'a'      => array(
		
			'href'   => array(),
			'target' => array(),
			'class'  => array()
		
		)
	
	);

	/*
	 *  Contructor.
	 */
	public function __construct() {
	
		parent::__construct( 'widget_opening_times_widget', esc_html__( 'Hungry - Opening Times', 'hungry' ), array(
		
			'classname'   => 'widget-hungry-opening-times',
			'description' => esc_html__( 'Use this widget to display the opening times of your business. Wrap your times in &lt;span&gt; tags.', 'hungry' )
			
		) );
		
	}
	
	/*
	 *  Output the HTML for the widget.
	 */
	public function widget( $args, $instance ) {
	
		$title = empty( $instance['title'] ) ? '' : strip_tags( $instance['title'] );
		$intro = empty( $instance['intro'] ) ? '' : $instance['intro'];
		$mon   = empty( $instance['mon'] )   ? '' : $instance['mon'];
		$tue   = empty( $instance['tue'] )   ? '' : $instance['tue'];
		$wed   = empty( $instance['wed'] )   ? '' : $instance['wed'];
		$thu   = empty( $instance['thu'] )   ? '' : $instance['thu'];
		$fri   = empty( $instance['fri'] )   ? '' : $instance['fri'];
		$sat   = empty( $instance['sat'] )   ? '' : $instance['sat'];
		$sun   = empty( $instance['sun'] )   ? '' : $instance['sun'];
		
		echo $args['before_widget'];
		echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		
		if( $intro ) :
		
			?>
			<p><?php echo wp_kses( $intro, $this->intro_allowed_tags ); ?></p>
			<?php

		endif; 
		
		// Dont print an empty <ul> if there are no fields set.
		if( $mon || $tue || $wed || $thu || $fri || $sat || $sun ) :
		
			?>
			<ul class="opening-times">
				<?php if( $mon ) : ?><li><?php echo wp_kses( $mon, array( 'span' => array( 'class' => array() ) ) ); ?></li><?php endif; ?>
				<?php if( $tue ) : ?><li><?php echo wp_kses( $tue, array( 'span' => array( 'class' => array() ) ) ); ?></li><?php endif; ?>
				<?php if( $wed ) : ?><li><?php echo wp_kses( $wed, array( 'span' => array( 'class' => array() ) ) ); ?></li><?php endif; ?>
				<?php if( $thu ) : ?><li><?php echo wp_kses( $thu, array( 'span' => array( 'class' => array() ) ) ); ?></li><?php endif; ?>
				<?php if( $fri ) : ?><li><?php echo wp_kses( $fri, array( 'span' => array( 'class' => array() ) ) ); ?></li><?php endif; ?>
				<?php if( $sat ) : ?><li><?php echo wp_kses( $sat, array( 'span' => array( 'class' => array() ) ) ); ?></li><?php endif; ?>
				<?php if( $sun ) : ?><li><?php echo wp_kses( $sun, array( 'span' => array( 'class' => array() ) ) ); ?></li><?php endif; ?>
			</ul>
			<?php
		
		endif;
		
		echo $args['after_widget'];
	
	}
	
	/*
	 *  Update settings.
	 */
	function update( $new_instance, $instance ) {

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['intro'] = wp_kses( $new_instance['intro'], $this->intro_allowed_tags );
		$instance['mon']   = wp_kses( $new_instance['mon'], array( 'span' => array( 'class' => array() ) ) );
		$instance['tue']   = wp_kses( $new_instance['tue'], array( 'span' => array( 'class' => array() ) ) );
		$instance['wed']   = wp_kses( $new_instance['wed'], array( 'span' => array( 'class' => array() ) ) );
		$instance['thu']   = wp_kses( $new_instance['thu'], array( 'span' => array( 'class' => array() ) ) );
		$instance['fri']   = wp_kses( $new_instance['fri'], array( 'span' => array( 'class' => array() ) ) );
		$instance['sat']   = wp_kses( $new_instance['sat'], array( 'span' => array( 'class' => array() ) ) );
		$instance['sun']   = wp_kses( $new_instance['sun'], array( 'span' => array( 'class' => array() ) ) );
		
		return $instance;
	
	}
	
	/*
	 *  Widget admin settings.
	 */
	function form( $instance ) {
	
		$title = empty( $instance['title'] ) ? '' : esc_attr( $instance['title'] );
		$intro = empty( $instance['intro'] ) ? '' : $instance['intro'];
		$mon   = empty( $instance['mon'] )   ? '' : wp_kses( $instance['mon'], array( 'span' => array( 'class' => array() ) ) );
		$tue   = empty( $instance['tue'] )   ? '' : wp_kses( $instance['tue'], array( 'span' => array( 'class' => array() ) ) );
		$wed   = empty( $instance['wed'] )   ? '' : wp_kses( $instance['wed'], array( 'span' => array( 'class' => array() ) ) );
		$thu   = empty( $instance['thu'] )   ? '' : wp_kses( $instance['thu'], array( 'span' => array( 'class' => array() ) ) );
		$fri   = empty( $instance['fri'] )   ? '' : wp_kses( $instance['fri'], array( 'span' => array( 'class' => array() ) ) );
		$sat   = empty( $instance['sat'] )   ? '' : wp_kses( $instance['sat'], array( 'span' => array( 'class' => array() ) ) );
		$sun   = empty( $instance['sun'] )   ? '' : wp_kses( $instance['sun'], array( 'span' => array( 'class' => array() ) ) );
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'intro' ) ); ?>"><?php esc_html_e( 'Intro Text (Optional):', 'hungry' ); ?></label>
			<textarea id="<?php echo esc_attr( $this->get_field_id( 'intro' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'intro' ) ); ?>"><?php echo wp_kses( $intro, $this->intro_allowed_tags ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'mon' ) ); ?>"><?php esc_html_e( 'Monday:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'mon' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'mon' ) ); ?>" type="text" value="<?php echo esc_attr( $mon ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tue' ) ); ?>"><?php esc_html_e( 'Tuesday:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'tue' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'tue' ) ); ?>" type="text" value="<?php echo esc_attr( $tue ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'wed' ) ); ?>"><?php esc_html_e( 'Wednesday:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'wed' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'wed' ) ); ?>" type="text" value="<?php echo esc_attr( $wed ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'thu' ) ); ?>"><?php esc_html_e( 'Thursday:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'thu' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'thu' ) ); ?>" type="text" value="<?php echo esc_attr( $thu ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'fri' ) ); ?>"><?php esc_html_e( 'Friday:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'fri' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'fri' ) ); ?>" type="text" value="<?php echo esc_attr( $fri ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'sat' ) ); ?>"><?php esc_html_e( 'Saturday:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'sat' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'sat' ) ); ?>" type="text" value="<?php echo esc_attr( $sat ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'sun' ) ); ?>"><?php esc_html_e( 'Sunday:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'sun' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'sun' ) ); ?>" type="text" value="<?php echo esc_attr( $sun ); ?>">
		</p>
		<?php
	
	}
	
}

/**
 *  A Widget to display the latest posts in the "hungry_recipes" post type.
 *  ---------------------------------------------------------------------------
 */
class Hungry_Recipes_Widget extends WP_Widget {

	/*
	 *  Contructor.
	 */
	public function __construct() {
	
		parent::__construct( 'widget_hungry_latest_recipes', esc_html__( 'Hungry - Latest Recipes', 'hungry' ), array(
		
			'classname'   => 'widget-hungry-latest-recipes',
			'description' => esc_html__( 'Use this widget to display a list of your latest recipes!', 'hungry' )
			
		) );
		
	}
	
	/*
	 *  Output the HTML for the widget.
	 */
	public function widget( $args, $instance ) {
	
		$title = empty( $instance['title'] ) ? '' : strip_tags( $instance['title'] );
		$num   = empty( $instance['num'] )   ? 2  : $instance['num'];
		$links = isset( $instance['links'] ) ? $instance['links'] : false;
		
		echo $args['before_widget'];
		echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		
		if( post_type_exists( 'hungry_recipe' ) ) :
		
			$menu_args = array(
			
				'post_type'      => 'hungry_recipe',
				'posts_per_page' => absint( $num )
			
			);
		
			$menu = new WP_Query( $menu_args );
		
			if( $menu->have_posts() ) :
		
				?>
				<ul class="latest-recipes">
				
					<?php 
						
						while( $menu->have_posts() ) : 
						
							$menu->the_post();
							$small_excerpt = strip_tags( get_post_meta( get_the_ID(), '_hungry_recipe_small_excerpt', true ) );
						
						?>
					
						<li class="recipe">
							<?php if( $links ) : ?>
								<a href="<?php the_permalink(); ?>">
							<?php endif; ?>
								<div class="recipe-thumbnail">
									<?php the_post_thumbnail( 'thumbnail' ); ?>
								</div>
							<?php if( $links ) : ?>
								</a>
							<?php endif; ?>
							<h6 class="recipe-title">
								<?php if( $links ) : ?>
									<a href="<?php the_permalink(); ?>">
								<?php endif; ?>
								<?php the_title(); ?>
								<?php if( $links ) : ?>
									</a>
								<?php endif; ?>
							</h6>
							<?php if( $small_excerpt ) : ?>
							<p class="recipe-description">
								<?php echo esc_html( $small_excerpt ); ?>
							</p>
							<?php endif; ?>
						</li>
						
						<?php 
					
						endwhile;
						wp_reset_postdata();
						
					?>
					
				</ul>
				<?php
			
			endif;
		
		endif; // post_type_exists()
		
		echo $args['after_widget'];
	
	}
	
	/*
	 *  Update settings.
	 */
	function update( $new_instance, $instance ) {

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num']   = empty( $new_instance['num'] ) ? 2 : strip_tags( absint( $new_instance['num'] ) );
		$instance['links'] = isset( $new_instance['links'] ) ? (bool) $new_instance['links'] : false;
		
		return $instance;
	
	}
	
	/*
	 *  Widget admin settings.
	 */
	function form( $instance ) {
	
		$title = empty( $instance['title'] ) ? '' : strip_tags( $instance['title'] );
		$num   = empty( $instance['num'] )   ? 2  : $instance['num'];
		$links = isset( $instance['links'] ) ? (bool) $instance['links'] : false;
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'num' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'hungry' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'num' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'num' ) ); ?>" type="text" value="<?php echo esc_attr( absint( $num ) ); ?>">
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $links ); ?> id="<?php echo esc_attr( $this->get_field_id( 'links' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'links' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'links' ) ); ?>"><?php esc_html_e( 'Enable Links?', 'hungry' ); ?></label>
		</p>
		<?php
	
	}
	
}