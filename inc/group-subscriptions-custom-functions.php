<?php

/**
 * ANP Group Subscriptions Customization Functions
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.0
 * @package   ANP_BuddyPress_Customization
 */

/**
 * Move Subscription Action Links to #item-buttons
 * 
 */
function anp_subscription_move_links() {
   remove_action( 'bp_group_header_meta', 'ass_group_subscribe_button' ); 
   remove_action( 'bp_directory_groups_actions', 'ass_group_subscribe_button' );
}
add_action( 'bp_group_header_meta', 'anp_subscription_move_links', 1 );
add_action( 'bp_directory_groups_actions', 'anp_subscription_move_links', 1 );

/**
 * Move Subscription Action Links to #item-buttons
 * `function_exists( 'ass_get_group_subscription_status' )` is false.
 * Apparently that plugin is loaded after this plugin...
 * Using is_plugin_active to solve even though it's not recommended
 * @link https://codex.wordpress.org/Function_Reference/is_plugin_active
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if( is_plugin_active( 'buddypress-group-email-subscription/bp-activity-subscription.php' ) ) {

    function anp_group_subscribe_button() {

        global $bp, $groups_template;

        if( ! empty( $groups_template ) ) {
            $group =& $groups_template->group;
        }
        else {
            $group = groups_get_current_group();
        }

        if ( !is_user_logged_in() || !empty( $group->is_banned ) || !$group->is_member )
            return;

        // if we're looking at someone elses list of groups hide the subscription
        if ( bp_displayed_user_id() && ( bp_loggedin_user_id() != bp_displayed_user_id() ) )
            return;

        $group_status = ass_get_group_subscription_status( bp_loggedin_user_id(), $group->id );

        if ( $group_status == 'no' )
            $group_status = NULL;

        $status_desc = __( 'Subscription', ANP_BP_CUSTOM_PLUGIN_NAMESPACE );
        $link_text = __( 'Modify Subscription', ANP_BP_CUSTOM_PLUGIN_NAMESPACE );

        if ( !$group_status ) {
            $link_text = __( 'Subscribe', ANP_BP_CUSTOM_PLUGIN_NAMESPACE );
        }

        $status = ass_subscribe_translate( $group_status );
        ?>

        <div class="group-subscription-div current-status">
            <div class="group-subscription-status-desc" aria-label="Current Status"><span class="screen-reader-text"><?php echo $status_desc; ?></span></div>
            <div class="group-subscription-status status" id="gsubstat-<?php echo $group->id; ?>"><span class="screen-reader-text"><?php echo $status; ?></span></div> 
            <a class="group-subscription-options-link" data-toggle="modal" data-target="gsubopt-<?php echo $group->id; ?>" id="gsublink-<?php echo $group->id; ?>" href="#gsubopt-<?php echo $group->id; ?>" title="<?php _e( 'Subscription Status: ' . $status, ANP_BP_CUSTOM_PLUGIN_NAMESPACE );?>" aria-label="<?php _e( 'Click to Change Your Subscription Status', ANP_BP_CUSTOM_PLUGIN_NAMESPACE );?>"><?php echo $link_text; ?></a>
            <span class="ajax-loader" id="gsubajaxload-<?php echo $group->id; ?>"></span>
        </div>
        <div class="group-subscription-options modal hide fade" id="gsubopt-<?php echo $group->id; ?>" role="dialog" aria-label="<?php _e( 'Subscription Options', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ) ?>" aria-hidden="true">
            <div class="modal-dialog">
                <ul class="modal-content">
                    <li><span class="button"><a class="group-sub" id="no-<?php echo $group->id; ?>"><?php _e( 'No Email', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ) ?></a></span> <?php _e('I will read this group on the web', ANP_BP_CUSTOM_PLUGIN_NAMESPACE) ?></li>
                    <li><span class="button"><a class="group-sub" id="sum-<?php echo $group->id; ?>"> <?php _e( 'Weekly Summary', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ) ?></a></span> <?php _e( 'Summary of Topics Weekly', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ) ?> <?php echo ass_weekly_digest_week(); ?></li>
                    <li><span class="button"><a class="group-sub" id="dig-<?php echo $group->id; ?>"> <?php _e( 'Daily Digest', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ) ?></a></span> <?php _e('Get the day\'s activity bundled into one email', ANP_BP_CUSTOM_PLUGIN_NAMESPACE) ?></li>
                    <?php if ( ass_get_forum_type() ) : ?>
                    <li><span class="button"><a class="group-sub" id="sub-<?php echo $group->id; ?>"><?php _e( 'New Topics', ANP_BP_CUSTOM_PLUGIN_NAMESPACE) ?></a></span> <?php _e( 'New Topics as they Arrive (No Replies) ', ANP_BP_CUSTOM_PLUGIN_NAMESPACE) ?></li>
                    <?php endif; ?>
                    <li><span class="button"><a class="group-sub" id="supersub-<?php echo $group->id; ?>"> <?php _e( 'All Email', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ) ?></a></span> <?php _e( 'All Group Activity as it Arrives', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ) ?></li>
                    <li><span class="button"><a class="group-subscription-close close" id="gsubclose-<?php echo $group->id; ?>" class= data-dismiss="modal"><i class="icon"></i> <span class="screen-reader-text"><?php _e( 'Close', ANP_BP_CUSTOM_PLUGIN_NAMESPACE ) ?></span></a></span></li>
                </ul>
            </div>
            
        </div>


        <?php
    }

    add_action ( 'bp_group_header_actions', 'anp_group_subscribe_button' );
    add_action ( 'bp_directory_groups_actions', 'anp_group_subscribe_button' );

}


?>
