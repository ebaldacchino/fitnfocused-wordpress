<?php

    register_graphql_field( 'membership', 'price', [
        'type' => 'String', 
        'resolve' => function( $post ) {
          $value = get_post_meta( $post->ID, '_membership_price', true );
 
        return ! empty( $value ) ? $value : null;
    }
  ] );

      register_graphql_field( 'membership', 'paymentFrequency', [
            'type' => 'String', 
            'resolve' => function( $post ) {
              $value = get_post_meta( $post->ID, '_membership_payment_frequency', true );
    
            return ! empty( $value ) ? $value : null;
        }
      ] ); 

   register_graphql_field( 'membership', 'isFeatured', [
        'type' => 'Boolean', 
        'resolve' => function( $post ) {
          $value = get_post_meta( $post->ID, '_membership_is_featured', true );
 
        return ! empty( $value ) ? $value : false;
    }
  ] );

  register_graphql_field( 'membership', 'sellingPoint1', [
        'type' => 'String', 
        'resolve' => function( $post ) {
          $value = get_post_meta( $post->ID, '_membership_point_1', true );
 
        return ! empty( $value ) ? $value : null;
    }
  ] );

  register_graphql_field( 'membership', 'sellingPoint2', [
        'type' => 'String', 
        'resolve' => function( $post ) {
          $value = get_post_meta( $post->ID, '_membership_point_2', true );
 
        return ! empty( $value ) ? $value : null;
    }
  ] );
  
  register_graphql_field( 'membership', 'sellingPoint3', [
        'type' => 'String', 
        'resolve' => function( $post ) {
          $value = get_post_meta( $post->ID, '_membership_point_3', true );
 
        return ! empty( $value ) ? $value : null;
    }
  ] );

  register_graphql_field( 'membership', 'sellingPoint4', [
        'type' => 'String', 
        'resolve' => function( $post ) {
          $value = get_post_meta( $post->ID, '_membership_point_4', true );
 
        return ! empty( $value ) ? $value : null;
    }
  ] );

  register_graphql_field( 'membership', 'sellingPoint5', [
        'type' => 'String', 
        'resolve' => function( $post ) {
          $value = get_post_meta( $post->ID, '_membership_point_5', true );
 
        return ! empty( $value ) ? $value : null;
    }
  ] );

?>