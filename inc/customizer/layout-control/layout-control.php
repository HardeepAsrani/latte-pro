<?php

function latte_add_customizer_custom_layout_controls( $wp_customize ) {
	class Latte_Layout_Control extends WP_Customize_Control {

		public $type = 'latte-layout-control';

		public function enqueue() {
			wp_enqueue_style( 'latte_layout_control_css', get_template_directory_uri() . '/inc/customizer/layout-control/layout-control.css', NULL, NULL, 'all' );
		}

		public function render_content() {
		?>
			<label>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php endif; ?>
				<div id="input_<?php echo esc_attr( $this->id ); ?>" class="image">
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" name="_customize-radio-<?php echo esc_attr( $this->id ); ?>" id="<?php echo esc_attr( $this->id ); ?><?php echo esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
						<label for="<?php echo esc_attr( $this->id ); echo esc_attr( $value ); ?>">
							<img src="<?php echo esc_attr( $label ); ?>">
							<span class="image-clickable"></span>
						</label>
					</input>
				<?php endforeach; ?>
				</div>
			</label>
		<?php }
	}
}
add_action( 'customize_register', 'latte_add_customizer_custom_layout_controls' );
?>