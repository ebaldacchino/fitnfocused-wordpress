<?php 
function memberships_post_type() {
  register_post_type('membership',
    array(
        'rewrite' => array('slug' => 'memberships'),
        'labels' => array(
            'name' => 'Memberships',
            'singular_name' => 'Membership',
            'add_new_item' => 'Add New Membership',
            'edit_item' => 'Edit Membership'
        ), 
        'show_in_graphql' => true,
        'hierarchical' => true,
        'graphql_single_name' => 'membership',
        'graphql_plural_name' => 'memberships',
        'menu_icon' => 'dashicons-money-alt',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title'
        ),
        'register_meta_box_cb' => 'membership_add_meta_boxes',
        'show_in_rest' => true,
    //  'show_in_graphql' => true,
    ),
      );
}

add_action('init', 'memberships_post_type');
 
function membership_add_meta_boxes( $post ){
	add_meta_box( 'membership_meta_box', __( 'Membership Info', 'sitepoint' ), 'membership_build_meta_box', 'membership', 'normal', 'low' ); 
}

add_action( 'add_meta_boxes_membership', 'membership_add_meta_boxes' );

function membership_build_meta_box( $post ) {
   // Add a nonce field so we can check for it later.
    wp_nonce_field( 'membership_meta_box_nonce', 'membership_meta_box_nonce' );

    $current_price = get_post_meta( $post->ID, '_membership_price', true );

    $current_payment_frequency = get_post_meta( $post->ID, '_membership_payment_frequency', true );

    $payment_options = ['per session', 'per week', 'per term', 'upfront'];
 
    $current_is_featured = get_post_meta( $post->ID, '_membership_is_featured', true);

    $current_point_1 = get_post_meta( $post->ID, '_membership_point_1', true );
    
    $current_point_2 = get_post_meta( $post->ID, '_membership_point_2', true );

    $current_point_3 = get_post_meta( $post->ID, '_membership_point_3', true );

    $current_point_4 = get_post_meta( $post->ID, '_membership_point_4', true );

    $current_point_5 = get_post_meta( $post->ID, '_membership_point_5', true );

?>
    
    <style> 
      .w100 {
        width: 100%;
      }
      .postbox-container label {
        font-size: 1rem;
        font-weight: 600;
        text-transform: capitalize;
      }
      input, select {
        margin-bottom: 0.5rem;
      }
      input, select {
        margin-top: 0.25rem;
      }
      select, option {
        text-transform: capitalize;
      } 
      textarea#excerpt {
          min-height: 50vh;
          height: 20rem;
          max-height: 70vh;
      } 
    </style>
  
    <div class="inside">

       <label for="price">price ($)</label>
      <input class="w100" type="number" id="price" name="price" min=1 value="<?php echo $current_price; ?>" />

      <label for="payment_frequency">payment frequency</label>
      <select class="w100" name="payment_frequency" id="payment_frequency" required>  
         <option value="" <?php echo !$current_payment_frequency ? 'selected' : ''; ?>></option>  
    <?php  
          foreach ($payment_options as $option) {
              $selected = $option === $current_payment_frequency ? 'selected' : '';  
            echo '<option value="' . $option. '"' . $selected . '>' . $option. '</option>';
          } 
    ?>
      </select>

      <div>
        <input type="checkbox" id="is_featured" name="is_featured" <?php 
        if ($current_is_featured == true) {
          ?> checked='checked' <?php
        } ?> /> 
        <label for="is_featured">Featured</label>
            
      </div>
      
      <h3>Top 5 Selling Points</h3>

      <label for="point_1">1.</label>
      <input class="w100" type="text" name="point_1" value="<?php echo $current_point_1; ?>" />

      <label for="point_2">2.</label>
      <input class="w100" type="text" name="point_2" value="<?php echo $current_point_2; ?>" />

      <label for="point_3">3.</label>
      <input class="w100" type="text" name="point_3" value="<?php echo $current_point_3; ?>" />

      <label for="point_4">4.</label>
      <input class="w100" type="text" name="point_4" value="<?php echo $current_point_4; ?>" />

      <label for="point_5">5.</label>
      <input class="w100" type="text" name="point_5" value="<?php echo $current_point_5; ?>" />

    </div>
<?php

}

function membership_save_meta_boxes_data( $post_id ){
	// verify taxonomies meta box nonce
	// if ( !isset( $_POST['membership_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['membership_meta_box_nonce'], basename( __FILE__ ) ) ){
	// 	return;
	// }

	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}

	// // Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}

	// store custom fields values 
	if ( isset( $_REQUEST['price'] ) ) {
		update_post_meta( $post_id, '_membership_price', sanitize_text_field( $_POST['price'] ) );
	}
	
	if ( isset( $_REQUEST['payment_frequency'] ) ) {
		update_post_meta( $post_id, '_membership_payment_frequency', sanitize_text_field( $_POST['payment_frequency'] ) );
	}
	 
  if ( isset( $_REQUEST['is_featured'] ) ) {
   update_post_meta($post_id, '_membership_is_featured', TRUE);
 } else {
   update_post_meta($post_id, '_membership_is_featured', FALSE);
 }

  if ( isset( $_REQUEST['point_1'] ) ) {
		update_post_meta( $post_id, '_membership_point_1', sanitize_text_field( $_POST['point_1'] ) );
	}
  
  if ( isset( $_REQUEST['point_2'] ) ) {
		update_post_meta( $post_id, '_membership_point_2', sanitize_text_field( $_POST['point_2'] ) );
	}

  if ( isset( $_REQUEST['point_3'] ) ) {
		update_post_meta( $post_id, '_membership_point_3', sanitize_text_field( $_POST['point_3'] ) );
	}

  if ( isset( $_REQUEST['point_4'] ) ) {
		update_post_meta( $post_id, '_membership_point_4', sanitize_text_field( $_POST['point_4'] ) );
	}

  if ( isset( $_REQUEST['point_5'] ) ) {
		update_post_meta( $post_id, '_membership_point_5', sanitize_text_field( $_POST['point_5'] ) );
	}

}
add_action( 'save_post_membership', 'membership_save_meta_boxes_data', 10, 2 );
?>