<?php
/**
 * BuddyPress Group Home Template Tags
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.3
 * @package   ANP_BuddyPress_Customization
 * @subpackage  ANP_BuddyPress_Customization\Public
 */

/**
 * Get Group Recent Posts
 *
 * @since 1.0.3
 *
 * @param int $group_id
 * @param int $limit
 * @return void
 */
function bp_group_home_recent_posts( $group_id = null, $limit = null ) {
    $group_id = ( $group_id ) ? (int) $group_id : bp_get_group_id();
    $limit = ( $limit ) ? (int) $limit : 3 ;

    $group_meta = groups_get_groupmeta( $group_id );
    $blog_id = ( array_key_exists( 'groupblog_blog_id', $group_meta ) ) ? (int) $group_meta['groupblog_blog_id'][0] : false;

    if( $blog_id ) {
        switch_to_blog( $blog_id );

        $posts = get_posts( array( 'posts_per_page' => 3, 'post_type' => 'post' ) );

        if( !empty( $posts )  ) {

            $template = apply_filters( 'bp_group_home_recent_posts', ANP_BP_CUSTOM_PLUGIN_DIR . 'public/views/modules/recent-posts.php' );

            include_once( $template );

        }

        restore_current_blog();
    }

    return;
}

/**
 * Get Upcoming Events
 *
 * @since 1.0.3
 *
 * @param int $group_id
 * @param int $limit
 * @return void
 */
function bp_group_home_upcoming_events( $group_id = null, $limit = null ) {
    $group_id = ( $group_id ) ? (int) $group_id : bp_get_group_id();
    $limit = ( $limit ) ? (int) $limit : 3 ;
    $args = array(
        'group_id'  => $group_id,
        'per_page'  => $limit,
        'post_type' => 'event'
    );

    if( function_exists( 'bpeo_get_group_events' ) ) {
        $post_ids = bpeo_get_group_events( $group_id );

        if( !empty( $post_ids ) ) {
            $event_args = array(
                'post__in'   => $post_ids,
                'post_type'  => 'event'
            );

            $events = get_posts( $event_args );

            $format = get_option( 'date_format' ) . ', ' . get_option( 'time_format' );

            $template = apply_filters( 'bp_group_home_upcoming_events', ANP_BP_CUSTOM_PLUGIN_DIR . 'public/views/modules/upcoming-events.php' );

            include_once( $template );

        }

    }
    return;
}

/**
 * Get Recent Member
 *
 * @since 1.0.3
 *
 * @param int $group_id
 * @param int $limit
 * @return void
 */
function bp_group_home_recent_members( $group_id = null, $limit = null ) {
    $group_id = ( $group_id ) ? (int) $group_id : bp_get_group_id();
    $limit = ( $limit ) ? (int) $limit : 3 ;
    $args = array(
        'group_id'  => $group_id,
        'per_page'  => $limit
    );

    if( function_exists( 'bp_group_has_members' ) ) {
        if ( bp_group_has_members( $args ) ) {

            $template = apply_filters( 'bp_group_home_recent_members', ANP_BP_CUSTOM_PLUGIN_DIR . 'public/views/modules/recent-members.php' );

            include_once( $template );

        }
    }
}

/**
 * Get Recent Activity
 *
 * @since 1.0.3
 *
 * @param int $group_id
 * @param int $limit
 * @return void
 */
function bp_group_home_recent_activity( $group_id = null, $limit = null ) {
    $group_id = ( $group_id ) ? (int) $group_id : bp_get_group_id();
    $limit = ( $limit ) ? (int) $limit : 3 ;

    if( function_exists( 'bp_group_has_members' ) ) {
        if( bp_has_activities( array( 'max' => $limit ) ) ) {
            
            $template = apply_filters( 'bp_group_home_recent_activity', ANP_BP_CUSTOM_PLUGIN_DIR . 'public/views/modules/recent-activity.php' );

            include_once( $template );
        }
    }

}
