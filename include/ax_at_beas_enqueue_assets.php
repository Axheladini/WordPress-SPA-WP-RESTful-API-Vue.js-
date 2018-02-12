<?php
/**
 * Enqueu child theme assets
 *
 * @author Agon Xheladini
 * @link   http://www.agonxheladini.com
 */
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
