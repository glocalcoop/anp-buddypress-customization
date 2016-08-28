<?php

/**
 * ANP BuddyPress Customization
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.1
 * @package   ANP_BuddyPress_Customization
 */

/*
Plugin Name: Activist Network BuddyPress Customization
Description: Customization for BuddyPress and associated plugins.
Author: Pea, Glocal
Author URI: http://glocal.coop
Version: 1.0.1
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
 */
include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/inc/buddypress-docs-custom-functions.php' );
include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/inc/bp-groupblog-custom-functions.php' );
include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/inc/invite-anyone-custom-functions.php' );
include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/inc/group-subscriptions-custom-functions.php' );
include_once( ANP_BP_CUSTOM_PLUGIN_DIR . '/inc/friendship-custom-functions.php' );
