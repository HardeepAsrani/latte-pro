<?php
/**
 * Pricing Widget - Latte
 */

class latte_pricing_widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'latte_pricing_widget',
			__( 'Latte - Pricing Widget', 'latte' ),
			array( 'description' => __( 'Pricing widget for Latte theme\'s Pricing section.', 'latte' ), )
		);

	}



	function form($instance) {
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php if( !empty($instance['title']) ): echo esc_html( $instance['title'] ); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('subtitle') ); ?>"><?php esc_html_e('Subtitle', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('subtitle') ); ?>" name="<?php echo esc_attr( $this->get_field_name('subtitle') ); ?>" type="text" value="<?php if( !empty($instance['subtitle']) ): echo esc_html( $instance['subtitle'] ); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('price') ); ?>"><?php esc_html_e('Price (Amount/Time)', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('price') ); ?>" name="<?php echo esc_attr( $this->get_field_name('price') ); ?>" type="text" value="<?php if( !empty($instance['price']) ): echo esc_html( $instance['price'] ); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('options') ); ?>"><?php esc_html_e('Options (One per line)', 'latte'); ?></label> 
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('options') ); ?>" name="<?php echo esc_attr( $this->get_field_name('options') ); ?>"><?php if( !empty($instance['options']) ): echo esc_html( $instance['options'] ); endif; ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('buttontext') ); ?>"><?php esc_html_e('Button Text', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('buttontext') ); ?>" name="<?php echo esc_attr( $this->get_field_name('buttontext') ); ?>" type="text" value="<?php if( !empty($instance['buttontext']) ): echo esc_html( $instance['buttontext'] ); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('buttonlink') ); ?>"><?php esc_html_e('Button Link', 'latte'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('buttonlink') ); ?>" name="<?php echo esc_attr( $this->get_field_name('buttonlink') ); ?>" type="url" value="<?php if( !empty($instance['buttonlink']) ): echo esc_url( $instance['buttonlink'] ); endif; ?>" />
		</p>
		<?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = esc_html($new_instance['title']);
		$instance['subtitle'] = esc_html($new_instance['subtitle']);
		$instance['price'] = esc_html($new_instance['price']);
		$instance['options'] = trim($new_instance['options']);
		$instance['optionsAr'] = explode("\n", str_replace("\r", "", wp_kses_post( force_balance_tags( $instance['options'] ))));
		$instance['buttontext'] = esc_html($new_instance['buttontext']);
		$instance['buttonlink'] = esc_url($new_instance['buttonlink']);
		return $instance;
	}
 
	function widget($args, $instance) {
		extract( $args );
		?>
			<?php echo $before_widget; ?>
					<div data-sr="ease-in-out wait 0.25s" class="pricing-plan col-md-4 col-sm-6 col-xs-12">
						<ul class="pricing-container">
						<?php if(!empty($instance['title']) || !empty($instance['subtitle'])) : ?>
							<li class="title">
							<?php if( !empty($instance['title']) ): ?>
								<h2><?php echo esc_html($instance['title']); ?></h2>
							<?php endif; ?>
							<?php if( !empty($instance['subtitle']) ): ?>
								<h3><?php echo esc_html($instance['subtitle']); ?></h3>
							<?php endif; ?>
							</li>
						<?php endif; ?>
						<?php if( !empty($instance['price']) ): ?>
							<li class="price"><p><?php echo esc_html($instance['price']); ?></p></li>
						<?php endif; ?>
						<?php if( !empty($instance['optionsAr']) ): ?>
							<li>
								<ul class="options">
								<?php foreach ($instance['optionsAr'] as $line) : ?>
									<li><?php if( !empty($line) ): echo wp_kses_post( force_balance_tags( $line ) ); endif; ?></li>
								<?php endforeach; ?>
								</ul>
							</li>
						<?php endif; ?>
						<?php if( !empty($instance['buttontext']) ): ?>
							<li class="button"><a href="<?php if( !empty($instance['buttonlink']) ): echo esc_html($instance['buttonlink']); endif; ?>"><?php if( !empty($instance['buttontext']) ): echo esc_html($instance['buttontext']); endif; ?></a></li>
						<?php endif; ?>
						</ul>
					</div>
			<?php echo $after_widget; ?>
		<?php
	}

}

add_action('widgets_init', create_function('', 'return register_widget("latte_pricing_widget");'));
?>
