<?php
/**
 * Testimonials Widget - Latte
 */

class latte_testimonials_widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'latte_testimonials_widget',
			__( 'Latte - Testimonials Widget', 'latte' ),
			array( 'description' => __( 'Testimonials widget for Latte theme\'s Testimonials section.', 'latte' ), )
		);

	}



	function form($instance) {
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('testimonial') ); ?>"><?php esc_html_e('Testimonial', 'latte'); ?></label> 
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('testimonial') ); ?>" name="<?php echo esc_attr( $this->get_field_name('testimonial') ); ?>"><?php if( !empty($instance['testimonial']) ): echo wp_kses_post( force_balance_tags( $instance['testimonial'] ) ); endif; ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('name') ); ?>"><?php esc_html_e('Name', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('name') ); ?>" name="<?php echo esc_attr( $this->get_field_name('name') ); ?>" type="text" value="<?php if( !empty($instance['name']) ): echo esc_html($instance['name']); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('company') ); ?>"><?php esc_html_e('Position/Company', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('company') ); ?>" name="<?php echo esc_attr( $this->get_field_name('company') ); ?>" type="text" value="<?php if( !empty($instance['company']) ): echo esc_html($instance['company']); endif; ?>" />
		</p>
		<?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['testimonial'] = wp_kses_post( force_balance_tags( $new_instance['testimonial'] ) );
		$instance['name'] = esc_html($new_instance['name']);
		$instance['company'] = esc_html($new_instance['company']);
		return $instance;
	}
 
	function widget($args, $instance) {
		extract( $args );
		?>
			<?php echo $before_widget; ?>
							<div class="swiper-slide testimonials-slide">
							<?php if( !empty($instance['testimonial']) ): ?>
								<blockquote><?php echo wp_kses_post( force_balance_tags( $instance['testimonial'] ) ); ?></blockquote>
							<?php endif; ?>
							<?php if( !empty($instance['name']) ): ?>
								<span><?php echo esc_html($instance['name']); ?><?php if( !empty($instance['company']) ): ?>, <i><?php echo esc_html($instance['company']); ?></i><?php endif; ?></span>
							<?php endif; ?>
							</div>
			<?php echo $after_widget; ?>
		<?php
	}

}

add_action('widgets_init', create_function('', 'return register_widget("latte_testimonials_widget");'));
?>
