<?php
/**
 * BuddyPress Group Home Recent Members Module
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.3
 * @package   ANP_BuddyPress_Customization
 * @subpackage  ANP_BuddyPress_Customization\Public\Views\Modules
 */
?>

<ul id="recent-activity">
    <?php while ( bp_activities() ) : bp_the_activity(); ?>
        <li>
            <?php bp_activity_action(); ?>
        </li>
    <?php endwhile; ?>
</ul>
