<?php 


$clients = new CPT('Client', array(
	'supports' => array('title')
));


$clients->menu_icon("welcome-view-site"); // Add 
$clients->set_textdomain('dashicons-cart'); //Set text domain for Client CPT

?>