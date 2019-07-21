<?php
/**
 * Display koba posts
 *
 */
?>
<div class="kolba-wrapper">
    <div class="kolba-content">
            <?php 
                global $post;
                $args = array('post_type'   => 'kolba');
                $myposts = get_posts( $args );
                foreach( $myposts as $post ){ 
                    setup_postdata($post);?>
                    <div id="kolba-main">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div>
                        <?php the_post_thumbnail('kolba-img'); ?>
                        <p><?php the_content(); ?></p>
                    </div>
                    <div>
                        <p><?php echo get_post_meta($post->ID, 'myfield_25', true);  ?></p>
                    </div>
                    </div>
                    <?php }
                wp_reset_postdata(); ?>
    </div>            
</div>