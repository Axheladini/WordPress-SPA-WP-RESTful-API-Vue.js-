<?php
/**
 * Tweek parent Beans theme 
 *
 * @author Agon Xheladini
 * @link   http://www.agonxheladini.com
 */


/*Remove Beans sidebar on index page*/
add_action( 'widgets_init', 'ax_at_beans_deregister_uikit_components' );
function ax_at_beans_deregister_uikit_components() {
    
    beans_uikit_enqueue_components( array('grid'),'add-ons');
    beans_deregister_widget_area( 'sidebar_primary' );
}

// Removing the site branding and the primary menu from the header
beans_remove_action( 'beans_primary_menu' );
beans_modify_action( 'beans_header_partial_template', 'beans_site_prepend_markup', 'add_custom_header' );
function add_custom_header() {

    // construct your header here
    $bees_header = '<header class="custom-header"><div class="logo"><a href="#">
    <img src="'.site_url().'/wp-content/themes/ax-at-bees/assets/logo.svg"></div></a></header>';

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

?>