<?php

/*
	==================================================
		Add custom metaboxes to posts.
	==================================================	
 */

/**
 * Register meta box(es).
 */
 
if ( ! function_exists( 'zthefutureisnow_add_meta_box' ) ) {
	function zthefutureisnow_add_meta_box() {
		add_meta_box( 'additional-page-metabox-options', esc_html__( 'Extra Attributes', 'zthefutureisnow' ), 'zthefutureisnow_metabox_controls', 'post', 'normal', 'low' );
	}
}

if ( ! function_exists( 'zthefutureisnow_metabox_controls' ) ) {
	/**
	 * Meta box render function
	 *
	 * @param  object $post Post object.
	 * @since  1.0.0
	 */
	function zthefutureisnow_metabox_controls( $post ) {
		$meta = get_post_meta( $post->ID );
		$zthefutureisnow_by_line = ( isset( $meta['zthefutureisnow_by_line'][0] ) 
										&& '' !== $meta['zthefutureisnow_by_line'][0] ) 
										? $meta['zthefutureisnow_by_line'][0] : '';
		$zthefutureisnow_radio_value = ( isset( $meta['zthefutureisnow_radio_value'][0] ) 
										&& '' !== $meta['zthefutureisnow_radio_value'][0] ) 
										? $meta['zthefutureisnow_radio_value'][0] : '';
		$zthefutureisnow_breaking_news = ( isset( $meta['zthefutureisnow_breaking_news'][0] ) 
										&&  '1' === $meta['zthefutureisnow_breaking_news'][0] ) 
										? 1 : 0;
		$zthefutureisnow_exclude_ads = ( isset( $meta['zthefutureisnow_exclude_ads'][0] ) 
										&&  '1' === $meta['zthefutureisnow_exclude_ads'][0] ) 
										? 1 : 0;
		wp_nonce_field( 'zthefutureisnow_control_meta_box', 'zthefutureisnow_control_meta_box_nonce' ); // Always add nonce to your meta boxes!
		?>
		<style type="text/css">
			.post_meta_extras p{margin: 20px;}
			.post_meta_extras label{display:block; margin-bottom: 10px;}
		</style>
		<div class="post_meta_extras">
			<p>
				<label><?php esc_attr_e( 'By Line', 'zthefutureisnow' ); ?>
				<input type="text" name="zthefutureisnow_by_line" value="<?php echo esc_attr( $zthefutureisnow_by_line ); ?>"></label>
			</p>
			<!--
			<p>
				<label>
					<input type="radio" name="zthefutureisnow_radio_value" value="value_1" <?php checked( $zthefutureisnow_radio_value, 'value_1' ); ?>>
					<?php esc_attr_e( 'Radio value 1', 'zthefutureisnow' ); ?>
				</label>
				<label>
					<input type="radio" name="zthefutureisnow_radio_value" value="value_2" <?php checked( $zthefutureisnow_radio_value, 'value_2' ); ?>>
					<?php esc_attr_e( 'Radio value 2', 'zthefutureisnow' ); ?>
				</label>
				<label>
					<input type="radio" name="zthefutureisnow_radio_value" value="value_3" <?php checked( $zthefutureisnow_radio_value, 'value_3' ); ?>>
					<?php esc_attr_e( 'Radio value 3', 'zthefutureisnow' ); ?>
				</label>
			</p>
			-->
			<p>
				<label><input type="checkbox" 
							name="zthefutureisnow_breaking_news" value="1" <?php checked( $zthefutureisnow_breaking_news, 1 ); ?> />
							<?php esc_attr_e( 'Breaking News', 'zthefutureisnow' ); ?>
				</label>
			</p>
			<p>
				<label><input type="checkbox" 
							name="zthefutureisnow_exclude_ads" value="1" <?php checked( $zthefutureisnow_exclude_ads, 1 ); ?> />
							<?php esc_attr_e( 'Exclude Advertisement', 'zthefutureisnow' ); ?>
				</label>
			</p>				
		<?php
	}
}

if ( ! function_exists( 'zthefutureisnow_save_metaboxes' ) ) {
	/**
	 * Save controls from the meta boxes
	 *
	 * @param  int $post_id Current post id.
	 * @since 1.0.0
	 */
	function zthefutureisnow_save_metaboxes( $post_id ) {
		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times. Add as many nonces, as you
		 * have metaboxes.
		 */
		if ( ! isset( $_POST['zthefutureisnow_control_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['zthefutureisnow_control_meta_box_nonce'] ), 'zthefutureisnow_control_meta_box' ) ) { // Input var okay.
			return $post_id;
		}

		// Check the user's permissions.
		if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) { // Input var okay.
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}

		/*
		 * If this is an autosave, our form has not been submitted,
		 * so we don't want to do anything.
		 */
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		/* Ok to save */

		if ( isset( $_POST['zthefutureisnow_by_line'] ) ) { // Input var okay.
			update_post_meta( $post_id, 'zthefutureisnow_by_line', sanitize_text_field( wp_unslash( $_POST['zthefutureisnow_by_line'] ) ) ); // Input var okay.
		}

		if ( isset( $_POST['zthefutureisnow_radio_value'] ) ) { // Input var okay.
			update_post_meta( $post_id, 'zthefutureisnow_radio_value', sanitize_text_field( wp_unslash( $_POST['zthefutureisnow_radio_value'] ) ) ); // Input var okay.
		}

		$zthefutureisnow_breaking_news = ( isset( $_POST['zthefutureisnow_breaking_news'] ) && '1' === $_POST['zthefutureisnow_breaking_news'] ) ? 1 : 0; // Input var okay.
		update_post_meta( $post_id, 'zthefutureisnow_breaking_news', esc_attr( $zthefutureisnow_breaking_news ) );

		$zthefutureisnow_exclude_ads = ( isset( $_POST['zthefutureisnow_exclude_ads'] ) && '1' === $_POST['zthefutureisnow_exclude_ads'] ) ? 1 : 0; // Input var okay.
		update_post_meta( $post_id, 'zthefutureisnow_exclude_ads', esc_attr( $zthefutureisnow_exclude_ads ) );	 
	}
}

add_action( 'add_meta_boxes', 'zthefutureisnow_add_meta_box' );
add_action( 'save_post', 'zthefutureisnow_save_metaboxes' ); 
?>