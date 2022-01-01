<?php 
function trainers_post_type() {
  register_post_type('trainer',
    array(
      'rewrite' => array('slug' => 'trainers'),
      'labels' => array(
        'name' => 'Trainers',
        'singular_name' => 'Trainer',
        'add_new_item' => 'Add New Trainer',
        'edit_item' => 'Edit Trainer'
      ),
      'show_in_graphql' => true,
      'hierarchical' => true,
      'graphql_single_name' => 'trainer',
      'graphql_plural_name' => 'trainers',
      'menu_icon' => 'dashicons-universal-access',
      'public' => true,
      'has_archive' => true,
      'supports' => array(
        'title', 'thumbnail', 'excerpt'
      ),
      'register_meta_box_cb' => 'trainer_add_meta_boxes',
      'show_in_rest'  => true, 
    )
      );
}

add_action('init', 'trainers_post_type');
 
function trainer_add_meta_boxes( $post ){
	add_meta_box( 'trainer_meta_box', __( 'Trainer Links', 'sitepoint' ), 'trainer_build_meta_box', 'trainer', 'normal', 'low' ); 
}

add_action( 'add_meta_boxes_trainer', 'trainer_add_meta_boxes' );

function trainer_build_meta_box( $post ) {
   // Add a nonce field so we can check for it later.
    wp_nonce_field( 'trainer_meta_box_nonce', 'trainer_meta_box_nonce' );

    $current_position = get_post_meta( $post->ID, '_trainer_position', true );

    $current_phone = get_post_meta( $post->ID, '_trainer_phone', true );

    $current_email = get_post_meta( $post->ID, '_trainer_email', true );

    $current_instagram = get_post_meta( $post->ID, '_trainer_instagram', true );
    
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
      input {
        margin-bottom: 0.5rem;
      }
      input {
        margin-top: 0.25rem;
      } 
      textarea#excerpt {
          min-height: 50vh;
          height: 20rem;
          max-height: 70vh;
      } 
    </style>
  
    <div class="inside">

      <label for="position">position description</label>
      <input class="w100" type="text" id="position" name="position" value="<?php echo $current_position; ?>" required/>
      
      <label for="phone">phone</label>
      <input class="w100" type="tel" id="phone" name="phone" value="<?php echo $current_phone; ?>" required/>

      <label for="email">email</label>
      <input class="w100" type="email" id="email" name="email" value="<?php echo $current_email; ?>" required/>

       <label for="instagram">instagram</label>
      <input class="w100" type="url" id="instagram" name="instagram" value="<?php echo $current_instagram; ?>" required/>
      
    </div>
<?php

}

function trainer_save_meta_boxes_data( $post_id ){
	// verify taxonomies meta box nonce
	// if ( !isset( $_POST['trainer_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['trainer_meta_box_nonce'], basename( __FILE__ ) ) ){
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
	if ( isset( $_REQUEST['position'] ) ) {
		update_post_meta( $post_id, '_trainer_position', sanitize_text_field( $_POST['position'] ) );
	}
  
  if ( isset( $_REQUEST['phone'] ) ) {
		update_post_meta( $post_id, '_trainer_phone', sanitize_text_field( $_POST['phone'] ) );
	}
	
	if ( isset( $_REQUEST['email'] ) ) {
		update_post_meta( $post_id, '_trainer_email', sanitize_text_field( $_POST['email'] ) );
	}
	
  if ( isset( $_REQUEST['instagram'] ) ) {
		update_post_meta( $post_id, '_trainer_instagram', sanitize_text_field( $_POST['instagram'] ) );
	}
}
add_action( 'save_post_trainer', 'trainer_save_meta_boxes_data', 10, 2 );


?>