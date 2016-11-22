<?php
/**
 * BuddyPress Group Home Upcoming Events Module
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.3
 * @package   ANP_BuddyPress_Customization
 * @subpackage  ANP_BuddyPress_Customization\Public\Views\Modules
 */
?>

<ul id="upcoming-events">
    <?php foreach( $events as $event ) : ?>

        <?php $meta = get_post_meta( $event->ID ); ?>

        <?php if( !eo_is_all_day( $event->ID ) ) {
            $date = date( get_option( 'date_format' ), strtotime( $meta['_eventorganiser_schedule_start_start'][0] ) );
        } else {
            $date = date( $format, strtotime( $meta['_eventorganiser_schedule_start_start'][0] ) ) . __( ' to ', 'anp-bp-custom' ) . date( $format, strtotime( $meta['_eventorganiser_schedule_start_finish'][0] ) );
        } ?>

        <li><a href="<?php echo get_permalink( $event->ID ); ?>"><?php echo $event->post_title; ?></a> <span class="post-date"><?php echo $date; ?></span></li>

    <?php endforeach; ?>
</ul>
