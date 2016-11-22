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

<ul id="recent-members">
    <?php while ( bp_group_members() ) : bp_group_the_member(); ?>
    <li>
        <span class="member-image"><?php bp_group_member_avatar() ?></span>
        <?php bp_group_member_link() ?>
        <span class="post-date"><?php bp_group_member_joined_since() ?></span>
    </li>
    <?php endwhile; ?>
</ul>
