<?php

/**
 * ANP BBPress Customization Functions
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.0
 * @package   ANP_BuddyPress_Customization
 */

/**
 * Change the labels registered for bbPress forum post type
 * Note: This only affects the dashboard and native bbPress, not display in BuddyPress
 */
if( !function_exists( 'anp_rename_forums' ) ) {

    function anp_rename_forums( $defaults ) {

        $args = array(
            'name'               => __( 'Discussion', 'anp-buddypress-customization' ),
            'menu_name'          => __( 'Discussions', 'anp-buddypress-customization' ),
            'singular_name'      => __( 'Discussion', 'anp-buddypress-customization' ),
            'all_items'          => __( 'All Discussions', 'anp-buddypress-customization' ),
            'add_new'            => __( 'New Discussion', 'anp-buddypress-customization' ),
            'add_new_item'       => __( 'Create New Discussion', 'anp-buddypress-customization' ),
            'edit_item'          => __( 'Edit Discussion', 'anp-buddypress-customization' ),
            'new_item'           => __( 'New Discussion', 'anp-buddypress-customization' ),
            'view'               => __( 'View Discussion', 'anp-buddypress-customization' ),
            'view_item'          => __( 'View Discussion', 'anp-buddypress-customization' ),
            'search_items'       => __( 'Search Discussions', 'anp-buddypress-customization' ),
            'not_found'          => __( 'No discussion found', 'anp-buddypress-customization' ),
            'not_found_in_trash' => __( 'No discussions found in Trash', 'anp-buddypress-customization' ),
            'parent_item_colon'  => __( 'Parent Discussion:', 'anp-buddypress-customization' )
        );

        $args = wp_parse_args( $args, $defaults );

        return $args;

    }

add_filter( 'bbp_get_forum_post_type_labels', 'anp_rename_forums' );

}

/**
 * Change Forum and Forums text
 * Replace Forum and Forums with Discussion and Discussions respectively
 * @link {https://bbpress.org/forums/topic/group-forum-tab/}
 */
if ( ! function_exists( 'anp_change_forums_text' ) ) {

    function anp_change_forums_text( $translated_text ) {
        if ( $translated_text == 'Forum' ) {
            $translated_text = 'Discussion';
        } elseif( $translated_text == 'Forums' ) {
            $translated_text = 'Discussions';
        }
        return $translated_text;
    }

add_filter( 'gettext', 'anp_change_forums_text', 20 );
}


/**
 * Hide Topic Menu
 * Hide the Topics menu in the dashboard
 */
if( !function_exists( 'anp_hide_topic_admin_menu' ) ) {

    function anp_hide_topic_admin_menu( $defaults ) {

        $args = array(
            'show_in_menu'        => false
        );

        $args = wp_parse_args( $args, $defaults );

        return $args;

    }

add_filter( 'bbp_register_topic_post_type', 'anp_hide_topic_admin_menu' );

}

/**
 * Hide Reply Menu
 * Hide the Replies menu in the dashboard
 */
if( !function_exists( 'anp_hide_reply_admin_menu' ) ) {

    function anp_hide_reply_admin_menu( $defaults ) {

        $args = array(
            'show_in_menu'        => false,
        );

        $args = wp_parse_args( $args, $defaults );

        return $args;

    }

add_filter( 'bbp_register_reply_post_type', 'anp_hide_reply_admin_menu' );

}

/**
 * Add Topics and Replies as Submenus of Discussions
 * Show the menu items under the Discussions menu
 */
if ( ! function_exists( 'anp_add_subitems_to_forums' ) ) {

    function anp_add_subitems_to_forums() { 

        //edit.php?post_type=forum

        add_submenu_page(
            'edit.php?post_type=forum', 
            __( 'All Topics', 'anp-buddypress-customization' ), 
            __( 'All Topics', 'anp-buddypress-customization' ), 
            'manage_options', 
            'edit.php?post_type=topic'
        ); 

        add_submenu_page(
            'edit.php?post_type=forum', 
            __( 'New Topic', 'anp-buddypress-customization' ), 
            __( 'New Topic', 'anp-buddypress-customization' ), 
            'manage_options', 
            'post-new.php?post_type=topic'
        ); 

        add_submenu_page(
            'edit.php?post_type=forum', 
            __( 'All Replies', 'anp-buddypress-customization' ), 
            __( 'All Replies', 'anp-buddypress-customization' ), 
            'manage_options', 
            'edit.php?post_type=reply'
        ); 

        add_submenu_page(
            'edit.php?post_type=forum', 
            __( 'New Reply', 'anp-buddypress-customization' ), 
            __( 'New Reply', 'anp-buddypress-customization' ), 
            'manage_options', 
            'post-new.php?post_type=reply'
        ); 

    }

    add_action( 'admin_menu', 'anp_add_subitems_to_forums' ); 

}

/**
 * Set Root Slug
 * Set the root slug
 */
update_option( '_bbp_root_slug', 'discussions' );

/**
 * Set Root Slug
 * Set the root slug
 */
update_option( '_bbp_show_on_root', 'discussions' );


/**
 * Set Forum Slug
 * Set the forum slug
 */
update_option( '_bbp_forum_slug', 'discussion' );


?>
