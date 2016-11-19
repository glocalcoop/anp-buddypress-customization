<?php

/**
 * ANP BuddyPress Customization
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.3
 * @package   ANP_BuddyPress_Customization
 */

/*
Plugin Name: Activist Network BuddyPress Customization
Description: Customization for BuddyPress and associated plugins.
Author: Pea, Glocal
Author URI: http://glocal.coop
Version: 1.0.2
License: GPLv3
Text Domain: anp-bp-custom
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Constants
 */
if ( !defined( 'ANP_BP_CUSTOM_PLUGIN_DIR' ) ) {
    define( 'ANP_BP_CUSTOM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
if ( !defined( 'ANP_BP_CUSTOM_PLUGIN_URL' ) ) {
    define( 'ANP_BP_CUSTOM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

/**
 * Required Files
 * Only load code that needs BuddyPress to run once BP is loaded and initialized.
 * @uses bp_include
 * @link https://codex.buddypress.org/plugindev/checking-buddypress-is-active/
 */
function anp_buddypress_customization_init() {
    include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/inc/classes/class-gamajo-template-loader.php' );
    include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/inc/classes/class-anpbc-template-loader.php' );
    include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/admin/admin-settings.php' );
    include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/public/buddypress-group-home.php' );

    include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/inc/buddypress-custom-functions.php' );
    include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/inc/buddypress-docs-custom-functions.php' );
    include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/inc/bp-groupblog-custom-functions.php' );
    include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/inc/invite-anyone-custom-functions.php' );
    include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/inc/group-subscriptions-custom-functions.php' );
    include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/inc/friendship-custom-functions.php' );
}
add_action( 'bp_include', 'anp_buddypress_customization_init' );
