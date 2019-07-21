<?php
/**
 * The template for displaying all single posts and attachments
 *
 */
get_header(); ?>
<section class="section-content">
    <div class="container">
        <main role="main">
            <?php if ( is_home() || is_front_page() ) : ?> 
            <div class="banner-wrapper">
                <div class="first-banner" id="first-banner" role="banner">
                    <?php dynamic_sidebar( 'content-area-first' ); ?> 
                </div>
                <div class="second-banner" role="banner">
                    <?php dynamic_sidebar( 'content-area-second' ); ?>
                </div>
            </div>
            <?php endif; ?>
        <?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>
           <div class="content-wrapper">
                <div class="content">
                 <?php get_template_part( 'content', get_post_format() ); ?>
               </div>
                   <?php get_sidebar(); ?>
            </div>
        <?php endwhile; ?>    
        </main>
    </div>
</section>    
<?php get_footer(); ?>