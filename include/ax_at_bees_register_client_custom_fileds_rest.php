<?php 
/**
 * Add Client custom fields to REST API responses for read write and write  
 *
 * @author Agon Xheladini
 * @link   http://www.agonxheladini.com
 */

add_action( 'rest_api_init', 'ax_at_bees_register_custom_fields' );
function ax_at_bees_register_custom_fields() {
    register_rest_field( 'client',
        'cl_gender',
        array(
            'get_callback'    => 'ax_at_bees_get_custom_fields',
            'update_callback' => 'ax_at_bees_get_update_fields',
            'schema'          => null,
        )
    );
     register_rest_field( 'client',
        'cl_phone',
        array(
            'get_callback'    => 'ax_at_bees_get_custom_fields',
            'update_callback' => 'ax_at_bees_get_update_fields',
            'schema'          => null,
        )
    );

     register_rest_field( 'client',
        'cl_email',
        array(
            'get_callback'    => 'ax_at_bees_get_custom_fields',
            'update_callback' => 'ax_at_bees_get_update_fields',
            'schema'          => null,
        )
    );

     register_rest_field( 'client',
        'cl_address',
        array(
            'get_callback'    => 'ax_at_bees_get_custom_fields',
            'update_callback' => 'ax_at_bees_get_update_fields',
            'schema'          => null,
        )
    );

     register_rest_field( 'client',
        'cl_nationality',
        array(
            'get_callback'    => 'ax_at_bees_get_custom_fields',
            'update_callback' => 'ax_at_bees_get_update_fields',
            'schema'          => null,
        )
    );

     register_rest_field( 'client',
        'cl_date_of_birth',
        array(
            'get_callback'    => 'ax_at_bees_get_custom_fields',
            'update_callback' => 'ax_at_bees_get_update_fields',
            'schema'          => null,
        )
    );

     register_rest_field( 'client',
        'cl_education',
        array(
            'get_callback'    => 'ax_at_bees_get_custom_fields',
            'update_callback' => 'ax_at_bees_get_update_fields',
            'schema'          => null,
        )
    );


     register_rest_field( 'client',
        'cl_contact_mode',
        array(
            'get_callback'    => 'ax_at_bees_get_custom_fields',
            'update_callback' => 'ax_at_bees_get_update_fields',
            'schema'          => null,
        )
    );
}
function ax_at_bees_get_custom_fields( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name );
}

function ax_at_bees_get_update_fields( $value, $object, $field_name ) {
    if ( ! $value || ! is_string( $value ) ) {
        return;
    }

    return update_post_meta( $object->ID, $field_name, strip_tags( $value ) );
}
?>