<?php 

      register_graphql_field( 'trainer', 'position', [
          'type' => 'String', 
          'resolve' => function( $post ) {
            $value = get_post_meta( $post->ID, '_trainer_position', true );
  
          return ! empty( $value ) ? $value : null;
        }
      ] );
      
      register_graphql_field( 'trainer', 'phone', [
          'type' => 'String', 
          'resolve' => function( $post ) {
            $value = get_post_meta( $post->ID, '_trainer_phone', true );
  
          return ! empty( $value ) ? $value : null;
        }
      ] );

      register_graphql_field( 'trainer', 'email', [
            'type' => 'String', 
            'resolve' => function( $post ) {
              $value = get_post_meta( $post->ID, '_trainer_email', true );
    
            return ! empty( $value ) ? $value : null;
        }
      ] );

      register_graphql_field( 'trainer', 'instagram', [
        'type' => 'String', 
        'resolve' => function( $post ) {
          $value = get_post_meta( $post->ID, '_trainer_instagram', true );
 
        return ! empty( $value ) ? $value : null;
    }
  ] );

?>