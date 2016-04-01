<?php

/**
 * ANP Group Docs Customization Functions
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.0
 * @package   ANP_BuddyPress_Customization
 */

/**
 * Change Labels and Icon
 */
if( !function_exists( 'anp_rename_bp_docs' ) ) {

    function anp_rename_bp_docs( $defaults ) {

        $post_type_labels = array(
            'name'           => _x( 'Documents', 'post type general name', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ),
            'singular_name'      => _x( 'Documents', 'post type singular name', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ),
            'add_new'        => _x( 'New Document', 'add new', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ),
            'add_new_item'       => __( 'Add New Document', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ),
            'edit_item'          => __( 'Edit Document', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ),
            'new_item'       => __( 'New Document', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ),
            'view_item'          => __( 'View Document', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ),
            'search_items'       => __( 'Search  Documents', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ),
            'not_found'          =>  __( 'No  Documents found', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ),
            'not_found_in_trash' => __( 'No  Documents found in Trash', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ),
            'parent_item_colon'  => ''
        );

        $args = array(
            'label'        => __( 'Documents', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ),
            'labels'       => $post_type_labels,
            'menu_icon'     => 'dashicons-media-text',
        );

        $args = wp_parse_args( $args, $defaults );

        return $args;

    }

add_filter( 'bp_docs_post_type_args', 'anp_rename_bp_docs' );

}


if( !function_exists( 'anp_dequeue_docs_styles' ) ) {

    function anp_dequeue_docs_styles() {

        wp_dequeue_style( 'bp-docs-css' );

    }

}

add_action( 'wp_enqueue_scripts', 'anp_dequeue_docs_styles', 100 );


?>
