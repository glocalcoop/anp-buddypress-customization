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
 * Register our sidebars and widgetized areas.
 *
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

?>
