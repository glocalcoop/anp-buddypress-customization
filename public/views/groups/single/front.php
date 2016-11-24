<?php
/**
 * BuddyPress Group Home Template
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.3
 * @package   ANP_BuddyPress_Customization
 * @subpackage  ANP_BuddyPress_Customization\Public\Views\Groups\Single
 */
global $bp;
$group_id = bp_get_group_id();
$group_meta = groups_get_groupmeta( $group_id );
$forum_data = maybe_unserialize( $group_meta['forum_id'][0] );
$forum_id = $forum_data[0];
$blog_id = ( array_key_exists( 'groupblog_blog_id', $group_meta ) ) ? (int) $group_meta['groupblog_blog_id'][0] : false;
//echo '<pre>';
//var_dump( $bp );
//echo '</pre>';
?>

<div class="anp-buddypress-home">
    <div class="buddypress-home-modules">
        <?php if ( bp_is_active( 'xprofile' ) ) : ?>
            <div class="buddypress-module xprofile intro">
                <h2 class="widgettitle"><?php _e( 'Intro', 'anp-bp-custom' ); ?></h2>
                If there were an `intro` field added, we could display it here.
            </div>
        <?php endif; ?>
        <?php if ( bp_is_active( 'activity' ) ) : ?>
            <div class="buddypress-module activity">
                <h2 class="widgettitle"><?php _e( 'Timeline', 'anp-bp-custom' ); ?></h2>
                <?php bp_group_home_recent_activity( $group_id, 3 ) ?>
            </div>
        <?php endif; ?>
        <?php if ( bp_is_active( 'forums' ) ) : ?>
            <div class="buddypress-module forums search">
                <h2 class="widgettitle"><?php _e( 'Search Discussions', 'anp-bp-custom' ); ?></h2>
            </div>
            <div class="buddypress-module forums replies">
                <h2 class="widgettitle"><?php _e( 'Recent Replies', 'anp-bp-custom' ); ?></h2>
            </div>
            <div class="buddypress-module forums topics">
                <h2 class="widgettitle"><?php _e( 'Recent Topics', 'anp-bp-custom' ); ?></h2>
            </div>
        <?php endif; ?>
        <?php if ( bp_is_active( 'blogs' ) ) : ?>
            <div class="buddypress-module blogs">
                <h2 class="widgettitle"><?php _e( 'Recent Posts', 'anp-bp-custom' ); ?></h2>
                <?php bp_group_home_recent_posts( $group_id, 3 ); ?>
            </div>
        <?php endif; ?>
        <?php if ( bp_is_active( 'bpeo' ) ) : ?>
            <div class="buddypress-module events">
                <?php the_widget( 'BPEO_Group_Widget', array(
                    'group_id' => $group_id,
                    'title' => __( 'Upcoming Events', 'anp-bp-custom' ) ) ); ?>
            </div>
        <?php endif; ?>
        <?php if ( bp_is_active( 'bp_docs' ) ) : ?>
            <div class="buddypress-module docs">
                <?php if( class_exists( 'BP_Docs_Widget_Recent_Docs' ) ) : ?>
                    <?php the_widget( 'BP_Docs_Widget_Recent_Docs', array(
                        'group_id' => $group_id,
                        'title' => __( 'Recent Documents', 'anp-bp-custom' ),
                        'posts_per_page' => 3,
                        'show_date'      => true
                    ) ); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if ( bp_is_active( 'members' ) ) : ?>
            <div class="buddypress-module members">
                <h2 class="widgettitle"><?php _e( 'Recent Members', 'anp-bp-custom' ); ?></h2>
                <?php bp_group_home_recent_members( $group_id, 3 ) ?>
            </div>
        <?php endif; ?>

        <h1>Components Not Returning as Active</h1>
        <?php if( !bp_is_active( 'blogs' ) ) : ?>
            <div class="buddypress-module blogs">
                <!-- <pre>bp_is_active( 'blogs' )</pre> -->
                <h2 class="widgettitle"><?php _e( 'Recent Posts', 'anp-bp-custom' ); ?></h2>
                <?php bp_group_home_recent_posts( $group_id, 3 ); ?>
            </div>
        <?php endif; ?>

        <?php if( !bp_is_active( 'bpeo' ) ) : ?>
            <div class="buddypress-module events">
                <!-- <pre>bp_is_active( 'bpeo' )</pre> -->
                <h2 class="widgettitle"><?php _e( 'Upcoming Events', 'anp-bp-custom' ); ?></h2>
                <?php bp_group_home_upcoming_events( $group_id );  ?>
            </div>
        <?php endif; ?>

        <?php if( !bp_is_active( 'forums' ) ) : ?>
            <div class="buddypress-module forums search">
                <!-- <pre>bp_is_active( 'forums' )</pre> -->
                <?php if( class_exists( 'BBP_Search_Widget' ) ) : ?>
                    <?php the_widget( 'BBP_Search_Widget', array(
                        'group_id' => $group_id,
                        'title' => __( 'Search Discussions', 'anp-bp-custom' ) ) ); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if( !bp_is_active( 'forums' ) ) : ?>
            <div class="buddypress-module forums topics">
                <!-- <pre>bp_is_active( 'forums' )</pre> -->
                <?php if( class_exists( 'BBP_Topics_Widget' ) ) : ?>
                    <?php the_widget( 'BBP_Topics_Widget', array(
                        'parent_forum' => $forum_id,
                        'order_by' => 'freshness',
                    'title' => __( 'Recent Topics', 'anp-bp-custom' ) ) ); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if( !bp_is_active( 'forums' ) ) : ?>
            <div class="buddypress-module forums replies">
                <!-- <pre>bp_is_active( 'forums' )</pre> -->
                <?php if( class_exists( 'BBP_Replies_Widget' ) ) : ?>
                    <?php the_widget( 'BBP_Replies_Widget', array(
                        'title' => __( 'Recent Replies', 'anp-bp-custom' ),
                        'parent_forum' => $forum_id
                    ) ); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if( is_active_sidebar( 'anp-buddypress-home' ) ) : ?>
        <div class="buddypress-home-widgets">
            <?php dynamic_sidebar( 'anp-buddypress-home' ); ?>
        </div>
    <?php endif; ?>

    <?php
    $widgets = array_keys( $GLOBALS['wp_widget_factory']->widgets );
   print '<pre>$widgets = ' . esc_html( var_export( $widgets, TRUE ) ) . '</pre>';
    ?>

</div>
