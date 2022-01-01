<?php 

    register_graphql_field( 'challenge', 'featured', [
            'type' => 'Boolean', 
            'resolve' => function( $post ) {
              $value = get_post_meta( $post->ID, '_challenge_featured', true );
    
            return ! empty( $value ) ? $value : false;
        }
      ] );

    register_graphql_field( 'challenge', 'start_date', [
            'type' => 'String', 
            'resolve' => function( $post ) {
              $value = get_post_meta( $post->ID, '_challenge_start_date', true );
    
            return ! empty( $value ) ? $value : null;
        }
      ] );

?>