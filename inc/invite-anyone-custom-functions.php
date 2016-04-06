<?php

/**
 * ANP Invite Anyone Customization Functions
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.0
 * @package   ANP_BuddyPress_Customization
 */


if( !function_exists( 'anp_rename_invite_anyone' ) ) {

    function anp_rename_invite_anyone( $post_type_args ) {

        $post_type_labels = array(
            'name'          => _x( 'Invitations', 'post type general name', 'anp-buddypress-customization' ),
            'singular_name'     => _x( 'Invitation', 'post type singular name', 'anp-buddypress-customization' ),
            'add_new'       => _x( 'Add New', 'add new', 'anp-buddypress-customization' ),
            'add_new_item'      => __( 'Add New Invitation', 'anp-buddypress-customization' ),
            'edit_item'         => __( 'Edit Invitation', 'anp-buddypress-customization' ),
            'new_item'      => __( 'New Invitation', 'anp-buddypress-customization' ),
            'view_item'         => __( 'View Invitation', 'anp-buddypress-customization' ),
            'search_items'      => __( 'Search Invitation', 'anp-buddypress-customization' ),
            'not_found'         =>  __( 'No Invitations found', 'anp-buddypress-customization' ),
            'not_found_in_trash'    => __( 'No Invitations found in Trash', 'anp-buddypress-customization' ),
            'parent_item_colon'     => ''
        );

        $post_type_args = array(
            'label'     => __( 'Invitations', 'anp-buddypress-customization' ),
            'labels'    => $post_type_labels,
            'public'    => false,
            '_builtin'  => false,
            'show_ui'   => true,
            'hierarchical'  => false,
            'menu_icon' => 'dashicons-email-alt',
            'supports'  => array( 'title', 'editor', 'custom-fields', 'author' )
        );

        return $post_type_args;

    }

add_filter( 'invite_anyone_post_type_args', 'anp_rename_invite_anyone' );

}





?>
