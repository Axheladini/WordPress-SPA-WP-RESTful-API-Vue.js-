<?php

// Include Beans. Do not remove the line below.
require_once( get_template_directory() . '/lib/init.php' );


// Remove this action and callback function if you are not adding CSS in the style.css file.
add_action( 'wp_enqueue_scripts', 'beans_child_enqueue_assets' );

function beans_child_enqueue_assets() 
{
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );
  
  wp_register_script( 'vuejs', get_stylesheet_directory_uri() . '/js/vue.min.js', 'vue.js', '2.5.13',  true );
	wp_enqueue_script( 'vuejs' );

  wp_register_script( 'vue-router', get_stylesheet_directory_uri() . '/js/vue-router.js', 'vue-router', '3.0.1',  true );
  wp_enqueue_script( 'vue-router' );

  wp_register_script( 'app_vue_js', get_stylesheet_directory_uri() . '/js/app.js', 'vue.js', '1.0',  true );
	wp_enqueue_script( 'app_vue_js' );

  wp_localize_script( 'app_vue_js', 'axAtBeesSettings', array( 'root' => esc_url_raw( rest_url() ), 'nonce' => wp_create_nonce( 'wp_rest' ), 'username'=>'admin', 'passwd' => 'admin' ) );
}


/*Include custom post type class fromjjgrainger (check composer.json for more) */
include(  get_stylesheet_directory() . '/vendor/jjgrainger/wp-custom-post-type-class/src/CPT.php');
/*File for creating custom post types */
include(  get_stylesheet_directory() . '/include/ax_at_bees_create_custom_post_type.php');
/*File for creating custom post types */
include(  get_stylesheet_directory() . '/include/ax_at_bees_create_clients_custom_fields.php');
/*Register Client custom fields to REST API responses for read write and write */
include(  get_stylesheet_directory() . '/include/ax_at_bees_create_clients_custom_endpoint.php');

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

/*Remove Beans sidebar on index page*/
add_action( 'widgets_init', 'ax_at_beans_deregister_uikit_components' );
function ax_at_beans_deregister_uikit_components() {
    
    beans_uikit_enqueue_components( array('grid'),'add-ons');
    beans_deregister_widget_area( 'sidebar_primary' );
}

add_action( 'beans_uikit_enqueue_scripts', 'ax_at_beans_enqueue_uikit_components' );
function ax_at_beans_enqueue_uikit_components() {

    beans_uikit_enqueue_components( array( 'datepicker' ), 'add-ons' );
    beans_uikit_enqueue_components( array( 'grid' ), 'add-ons' );
    beans_uikit_enqueue_components( array( 'icon' ), 'add-ons' );
    beans_uikit_enqueue_components( array( 'spinner' ), 'add-ons' );

}


// Removing the site branding and the primary menu from the header
beans_remove_action( 'beans_primary_menu' );

beans_modify_action( 'beans_header_partial_template', 'beans_site_prepend_markup', 'add_custom_header' );
function add_custom_header() {

    // construct your header here
    $bees_header = '<header class="custom-header"><div class="logo"><a href="#"><img src="https://artbees.net/wp-content/themes/artbees/img/logo.svg"></div></a></header>';

    echo $bees_header;

}
// Modify defalut Beans footer
beans_modify_action_callback( 'beans_footer_content', 'beans_child_footer_content' );
function beans_child_footer_content() 
{
  $bees_footer = '<div class="uk-grid uk-container-center uk-text-small" data-uk-grid-margin>
        <div class="uk-width-large-1-1 uk-text-left">
            <p class="uk-text-muted">© 2018 - Bees All rights reserved.</p>
        </div>';
  echo $bees_footer;
}