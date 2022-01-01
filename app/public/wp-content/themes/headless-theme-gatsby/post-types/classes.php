<?php 
function classes_post_type() {
  register_post_type('class',
    array(
        'show_ui' => true,
        'rewrite' => array('slug' => 'classes'),
        'labels' => array(
            'name' => 'Classes',
            'singular_name' => 'Class',
            'add_new_item' => 'Add New Class',
            'edit_item' => 'Edit Class'
        ),
        'show_in_graphql' => true,
        'hierarchical' => true,
        'graphql_single_name' => 'class',
        'graphql_plural_name' => 'classes',
        'menu_icon' => 'dashicons-welcome-learn-more',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'excerpt', 'thumbnail' 
        ), 
        'show_in_rest'  => true,
        )
      );
}

add_action('init', 'classes_post_type');
 
?>