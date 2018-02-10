<?php
/**
 * With this file we craeate the Custom Fields for Client CPT by using Beans Fields API.  
 *
 * @author Agon Xheladini
 * @link   http://www.agonxheladini.com
 */



 add_action( 'admin_init', 'register_client_custom_fields' );

function register_client_custom_fields() {

	$fields = array(
		 array(
			'id' => 'cl_gender',
			'label' => __( 'Gender', 'clients-textdomain' ),
			'type' => 'select',
			'options' => array(
				'value_1' => __( 'Male', 'clients-textdomain' ),
				'value_2' => __( 'Female', 'clients-textdomain' ),
			)
		),
		array(
			'id' => 'cl_phone',
			'label' => __( 'Phone', 'clients-textdomain' ),
			'type' => 'text',
			'default' => ''
		),
		array(
			'id' => 'cl_email',
			'label' => __( 'Email', 'clients-textdomain' ),
			'type' => 'text',
			'default' => ''
		),
		array(
			'id' => 'cl_address',
			'label' => __( 'Address', 'clients-textdomain' ),
			'type' => 'text',
			'default' => ''
		),
		array(
			'id' => 'cl_nationality',
			'label' => __( 'Nationality', 'clients-textdomain' ),
			'type' => 'text',
			'default' => ''
		),
		array(
			'id' => 'cl_date_of_birth',
			'label' => __( 'Date of Birth', 'clients-textdomain' ),
			'type' => 'text',
			'default' => ''
		),
		array(
			'id' => 'cl_education',
			'label' => __( 'Education background', 'clients-textdomain' ),
			'type' => 'select',
			'default' => 'value_1',
			'options' => array(
				'value_1' => __( 'High school', 'clients-textdomain' ),
				'value_2' => __( 'Bachelors Degrees', 'clients-textdomain' ),
				'value_3' => __( 'Masters Degrees', 'clients-textdomain' ),
				'value_4' => __( 'Doctoral Degrees', 'clients-textdomain' ),
				'value_4' => __( 'Postdoctoral', 'clients-textdomain' ),
			)
		),
		array(
			'id' => 'cl_contact_mode',
			'label' => __( 'Contact mode', 'clients-textdomain' ),
			'type' => 'select',
			'default' => 'value_1',
			'options' => array(
				'value_1' => __( 'Email', 'clients-textdomain' ),
				'value_2' => __( 'Phone', 'clients-textdomain' ),
				'value_3' => __( 'None', 'clients-textdomain' ),
			)
		),
		// ...
	);

	beans_register_post_meta( $fields, array( 'client' ), 'section_id', array( 'title' => 'Client Details' ) );

}

