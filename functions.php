<?php

// Include Beans. Do not remove the line below.
require_once( get_template_directory() . '/lib/init.php' );


/*Enqueue child theme assets*/
include(  get_stylesheet_directory() . '/include/ax_at_beas_enqueue_assets.php');
/*Include custom post type class fromjjgrainger (check composer.json for more) */
include(  get_stylesheet_directory() . '/vendor/jjgrainger/wp-custom-post-type-class/src/CPT.php');
/*File for creating custom post types */
include(  get_stylesheet_directory() . '/include/ax_at_bees_create_custom_post_type.php');
/*File for creating custom post types */
include(  get_stylesheet_directory() . '/include/ax_at_bees_create_clients_custom_fields.php');
/*Register Client custom fields to REST API responses for read write and write */
include(  get_stylesheet_directory() . '/include/ax_at_bees_register_client_custom_fileds_rest.php');
/*Tweak parent Beans theme for improving our child theme*/
include(  get_stylesheet_directory() . '/include/ax_at_bees_tweek_parent_beans_theme.php');


/**
 * Add REST API support to an already registered post type.
 */
add_action( 'init', 'ax_at_bees_post_type_rest_support', 25 );
function ax_at_bees_post_type_rest_support() {
  global $wp_post_types;
 
  //be sure to set this to the name of your post type!
  $post_type_name = 'client';
  if( isset( $wp_post_types[ $post_type_name ] ) ) {
    $wp_post_types[$post_type_name]->show_in_rest = true;
    // Optionally customize the rest_base or controller class
    $wp_post_types[$post_type_name]->rest_base = $post_type_name;
    $wp_post_types[$post_type_name]->rest_controller_class = 'WP_REST_Posts_Controller';
  }
}






