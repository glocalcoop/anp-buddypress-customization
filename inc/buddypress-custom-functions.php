<?php

/**
 * ANP BuddyPress Core Customization Functions
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.2
 * @package   ANP_BuddyPress_Customization
 */

/**
 * Register BuddyPress Sidebar
 *
 * @since 1.0.2
 *
 * @uses register_sidebar()
 */
function anp_buddypress_widgets_init() {

     register_sidebar( array(
         'name'          => __( 'Community Widgets', 'anp-bp-custom' ),
         'id'            => 'buddypress',
         'description'   => __( 'Widget area for your Community pages. Note: It must be added to your theme in order for the widgets to appear.', 'anp-bp-custom' ),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
         )
     );

}
add_action( 'widgets_init', 'anp_buddypress_widgets_init' );

/**
 * Modify Body Class
 * Modify body classes if on BuddyPress page and BuddyPress sidebar is active
 * Added to `wp_enqueue_scripts` action because needs to fire after theme adds classes
 *
 * @since 1.0.2.1
 *
 * @uses is_buddypress()
 * @uses is_active_sidebar()
 *
 * @param array $classes
 * @return array $classes
 */
function anp_buddypress_class( $classes ) {
    add_filter( 'body_class', function( $classes ) {
        if ( is_buddypress()  && is_active_sidebar( 'buddypress' ) ) {
            var_dump( $classes );

            if ( isset( $classes['no-sidebar'] ) ) {
                unset( $classes['no-sidebar'] );
            }
            if( isset( $classes['no-active-sidebar'] ) ) {
                unset( $classes['no-active-sidebar'] );
            }
        }
        return $classes;
    } );
}
add_action( 'wp_print_scripts', 'anp_buddypress_class' );