<?php

// Include Beans. Do not remove the line below.
require_once( get_template_directory() . '/lib/init.php' );

/*
 * Remove this action and callback function if you do not whish to use LESS to style your site or overwrite UIkit variables.
 * If you are using LESS, make sure to enable development mode via the Admin->Appearance->Settings option. LESS will then be processed on the fly.
 */
add_action( 'beans_uikit_enqueue_scripts', 'beans_child_enqueue_uikit_assets' );

function beans_child_enqueue_uikit_assets() {

	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/style.less', 'less' );

}

// Remove this action and callback function if you are not adding CSS in the style.css file.
add_action( 'wp_enqueue_scripts', 'beans_child_enqueue_assets' );

function beans_child_enqueue_assets() {

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );

}


/*Include custom post type class fromjjgrainger (check composer.json for more) */
include(  get_stylesheet_directory() . '/vendor/jjgrainger/wp-custom-post-type-class/src/CPT.php');

/*File for creating custom post types */
include(  get_stylesheet_directory() . '/include/ax_at_bees_create_custom_post_type.php');

/*File for creating custom post types */
include(  get_stylesheet_directory() . '/include/ax_at_bees_create_clients_custom_fields.php');