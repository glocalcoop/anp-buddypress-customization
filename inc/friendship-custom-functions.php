<?php

/**
 * ANP Friends Customization Functions
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.0
 * @package   ANP_BuddyPress_Customization
 */


/**
 * Change the text for friend button
 * 
 */
if( !function_exists( 'anp_friends_button_text' ) ) {

    function anp_friends_button_text( $translated_text ) {
        if ( $translated_text == 'Cancel Friendship Request' ) {
            $translated_text = 'Cancel Request';
        } 
        return $translated_text;
    }

    add_filter( 'gettext', 'anp_friends_button_text', 20 );

}


?>
