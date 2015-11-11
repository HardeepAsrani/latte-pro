<?php
/**
 * Adds a box to the main column on the Post add/edit screens.
 */
function latte_add_meta_box() {
		$screens = get_post_types( array( 'public' => true ) );
		foreach ( $screens as $screen ) {
			add_meta_box( 'latte_sectionid', __( 'Layout', 'latte' ), 'latte_theme_layout_callback', $screen );
		}
}

add_action( 'add_meta_boxes', 'latte_add_meta_box' );

function latte_theme_layout_callback( $post ) {

		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'latte_meta_box', 'latte_meta_box_nonce' );

		/*
		 * Use get_post_meta() to retrieve an existing value
		 * from the database and use the value for the form.
		 */
		$value = get_post_meta( $post->ID, '_latte_layout', true );

		?>
		<input type="radio" name="lattelayout" value="full" <?php checked( $value, 'full' ); ?> ><?php _e( "Full Width", 'latte' ); ?><br>
		<input type="radio" name="lattelayout" value="left" <?php checked( $value, 'left' ); ?> ><?php _e( "Left Sidebar", 'latte' ); ?><br>
		<input type="radio" name="lattelayout" value="right" <?php checked( $value, 'right' ); ?> ><?php _e( "Right Sidebar", 'latte' ); ?><br>

		<?php

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function latte_save_theme_layout_data( $post_id ) {

		/*
		 * We need to verify this came from our screen and with proper authorization,
		 * because the save_post action can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( !isset( $_POST['latte_meta_box_nonce'] ) ) {
				return;
		}

		// Verify that the nonce is valid.
		if ( !wp_verify_nonce( $_POST['latte_meta_box_nonce'], 'latte_meta_box' ) ) {
				return;
		}

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
		}

		// Check the user's permissions.
		if ( !current_user_can( 'edit_post', $post_id ) ) {
				return;
		}


		// Sanitize user input.
		if ( isset( $_POST['lattelayout'] ) ) {
			$new_meta_value = sanitize_html_class( $_POST['lattelayout'] );
		} else {
			$new_meta_value = 'full';
		}

		// Update the meta field in the database.
		update_post_meta( $post_id, '_latte_layout', $new_meta_value );
}

add_action( 'save_post', 'latte_save_theme_layout_data' );
?>