<?php 
/**
 * With this file we craeate the CPT 'Client' by using 'jjgrainger' CPT class. 
 * Check composer.json for more details about jjgrainger' CPT class.
 *
 * @author Agon Xheladini
 * @link   http://www.agonxheladini.com
 */

$clients = new CPT('Client', array(
	'supports' => array('title')
));


$clients->menu_icon("dashicons-universal-access-alt"); // Add icon to Client Custom Post Type
$clients->set_textdomain('clients-textdomain'); //Set text domain for Client CPT

/**
* Add REST API support to 'Client' CPT
*/
  add_action( 'init', 'ax_at_bees_client_cpt_rest_support', 25 );
  function ax_at_bees_client_cpt_rest_support() {
  	global $wp_post_types;
  
  	//be sure to set this to the name of your post type!
  	$post_type_name = 'client';
  	if( isset( $wp_post_types[ $post_type_name ] ) ) {
  		$wp_post_types[$post_type_name]->show_in_rest = true;
  		$wp_post_types[$post_type_name]->rest_base = $post_type_name;
  		$wp_post_types[$post_type_name]->rest_controller_class = 'WP_REST_Posts_Controller';
  	}
  
  }

?>