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



?>