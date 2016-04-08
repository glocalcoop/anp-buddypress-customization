<?php

/**
 * ANP Group Blog Customization Functions
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.0
 * @package   ANP_BuddyPress_Customization
 */

/**
 * Change Nav Text
 * Replace Blog with Website in BuddyPress nav tabs
 */
add_filter( 'bp_groupblog_subnav_item_name', function( $name ) { 
    return $name = __( 'Website', 'anp-buddypress-customization' );
} );

/**
 * Change Slug
 * Replace blog with site slug
 */
add_filter( 'bp_groupblog_subnav_item_slug', function( $slug ) { 
    return $slug = __( 'site', 'anp-buddypress-customization' );
} );

/**
 * Change Blog and Blog text
 * Replace Blog and Blogs with Website and Websites respectively
 * @link {https://bbpress.org/forums/topic/group-forum-tab/}
 */
if ( ! function_exists( 'anp_change_blogs_text' ) ) {

    function anp_change_blogs_text( $translated_text ) {
        if ( 'Blog' == $translated_text || 'Group Blog' == $translated_text ) :
            $translated_text = 'Website';
        elseif ( 'Blogs' == $translated_text ) :
            $translated_text = 'Websites';
        elseif ( 'Blog Title:' ==  $translated_text ) :
            $translated_text = 'Website Title';
        elseif ( 'Blog Address:' ==  $translated_text ) :
            $translated_text = 'Website Address';
        elseif ( 'Enable group blog' ==  $translated_text ) :
            $translated_text = 'Enable group website';
        elseif ( 'Enable member blog posting' ==  $translated_text ) :
            $translated_text = 'Enable member website posting';
        elseif ( 'Enable blog posting to allow adding of group members to the blog with the roles set below.' ==  $translated_text ) :
            $translated_text = 'Enable website posting to allow adding of group members to the website with the roles set below. ';
        endif;
        return $translated_text;
    }

add_filter( 'gettext', 'anp_change_blogs_text', 20 );
}

?>
