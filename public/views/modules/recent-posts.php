<?php
/**
 * BuddyPress Group Home Recent Posts Module
 *
 * @author    Pea, Glocal
 * @license   GPL-2.0+
 * @link      http://glocal.coop
 * @since     1.0.3
 * @package   ANP_BuddyPress_Customization
 * @subpackage  ANP_BuddyPress_Customization\Public\Views\Modules
 */
?>

<ul id="recent-posts">
    <?php foreach( $posts as $post ) : ?>

        <li><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo $post->post_title; ?></a> <span class="post-date"><?php echo date( get_option( 'date_format' ), strtotime( $post->post_date ) ); ?></span></li>

    <?php endforeach; ?>
</ul>
