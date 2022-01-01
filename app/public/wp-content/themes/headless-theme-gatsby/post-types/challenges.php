<?php 
function challenges_post_type() {
  register_post_type('challenge',
    array(
        'show_ui' => true,
        'rewrite' => array('slug' => 'challenges'),
        'labels' => array(
            'name' => 'Challenges',
            'singular_name' => 'Challenge',
            'add_new_item' => 'Add New Challenge',
            'edit_item' => 'Edit Challenge'
        ),
        'register_meta_box_cb' => 'challenge_add_meta_boxes',
        'show_in_graphql' => true,
        'hierarchical' => true,
        'graphql_single_name' => 'challenge',
        'graphql_plural_name' => 'challenges',
        'menu_icon' => 'dashicons-calendar-alt',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'excerpt', 'thumbnail'
        ), 
        'show_in_rest'  => true,
        )
      );
}

add_action('init', 'challenges_post_type');
 
function challenge_add_meta_boxes( $post ){
	add_meta_box( 'challenge_meta_box', __( 'Challenge Info', 'sitepoint' ), 'challenge_build_meta_box', 'challenge', 'normal', 'low' ); 
}

add_action( 'add_meta_boxes_challenge', 'challenge_add_meta_boxes' );

function challenge_build_meta_box( $post ) {
   // Add a nonce field so we can check for it later.
    wp_nonce_field( 'challenge_meta_box_nonce', 'challenge_meta_box_nonce' ); 

    $current_featured = get_post_meta( $post->ID, '_challenge_featured', true);

     $current_start_date = get_post_meta( $post->ID, '_challenge_start_date', true);
    
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
        margin-top: 0.25rem;
      } 
      .checkbox__container {
        margin-bottom: 1rem;
        margin-top: 1rem;
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

      <div class="checkbox__container">
        <input 
        type="checkbox"
        id="featured" 
        name="featured" 
        <?php 
        if ($current_featured == true) {
          ?> checked='checked' <?php
        } ?> /> 
        <label 
        for="featured"
        >Advertise On Home Page</label>
            
      </div>

      <div>
        <label for="start_date">Start Date</label>
            <input class="w100" type="date" id="start_date" name="start_date" value="<?php echo $current_start_date; ?>" /> 
            <small>NOTE: Must enter an upcoming start date for advertising to work</small>
      </div>
    </div>
<?php

}

function challenge_save_meta_boxes_data( $post_id ){
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
	if ( isset( $_REQUEST['featured'] ) ) {
   update_post_meta($post_id, '_challenge_featured', TRUE);
 } else {
   update_post_meta($post_id, '_challenge_featured', FALSE);
 }
	
	if ( isset( $_POST['start_date'] ) ) {
		update_post_meta( $post_id, '_challenge_start_date', sanitize_text_field( $_POST['start_date'] ) );
	} 
  
}

add_action( 'save_post_challenge', 'challenge_save_meta_boxes_data', 10, 2 );
?>