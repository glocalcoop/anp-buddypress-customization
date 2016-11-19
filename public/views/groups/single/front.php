<div class="anp-buddypress-home">
    <div class="buddypress-home-modules">
        <?php if ( bp_is_active( 'xprofile' ) ) : ?>
            <div class="buddypress-module xprofile intro">Intro</div>
        <?php endif; ?>
        <?php if ( bp_is_active( 'activity' ) ) : ?>
            <div class="buddypress-module activity">Activity</div>
        <?php endif; ?>
        <?php if ( bp_is_active( 'forums' ) ) : ?>
            <div class="buddypress-module forums replies">Replies</div>
            <div class="buddypress-module forums topics">Topics</div>
        <?php endif; ?>
        <?php if ( bp_is_active( 'blogs' ) ) : ?>
            <div class="buddypress-module blogs">Blogs</div>
        <?php endif; ?>
        <?php if ( bp_is_active( 'events' ) ) : ?>
            <div class="buddypress-module events">Events</div>
        <?php endif; ?>
        <?php if ( bp_is_active( 'bp_docs' ) ) : ?>
            <div class="buddypress-module docs">Docs</div>
        <?php endif; ?>
        <?php if ( bp_is_active( 'members' ) ) : ?>
            <div class="buddypress-module members">Members</div>
        <?php endif; ?>
    </div>
    <?php if( is_active_sidebar( 'anp-buddypress-home' ) ) : ?>
        <div class="buddypress-home-widgets">
            <?php dynamic_sidebar( 'anp-buddypress-home' ); ?>
        </div>
    <?php endif; ?>

    <?php global $bp; ?>

    <?php $group_meta = groups_get_groupmeta( $bp->groups->current_group->id ); ?>
    <?php $forum = maybe_unserialize( $group_meta['forum_id'][0] ); ?>
    <?php $forum_id = $forum[0]; ?>
    <?php  ?>

    <?php the_widget( 'BBP_Topics_Widget', array(
        'parent_forum' => $forum_id,
        'order_by' => 'freshness',
        'title' => __( 'Group Topics', 'anp-bp-custom' ) ) ); ?>

    <?php the_widget( 'BBP_Replies_Widget', array(
        'title' => __( 'Group Replies', 'anp-bp-custom' ),
        'parent_forum' => $forum_id
    ) ); ?>

    <?php the_widget( 'BPEO_Group_Widget', array(
        'group_id' => $bp->groups->current_group->id,
        'title' => __( 'Group Events', 'anp-bp-custom' ) ) ); ?>


    <?php global $wp_widget_factory; ?>

    <?php
    echo '<pre>';
    var_dump( $bp );
    //var_dump( $wp_widget_factory->widgets );
    // var_dump( $bp->groups->current_group->id );
    echo '</pre>';
    ?>
</div>
