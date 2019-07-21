<?php
/**
 * The main template file
 *
 */
get_header(); ?> 
<section class="section-content all-wrapper">
    <div class="container">
        <main role="main" class="all-wrapper">
          <?php if ( have_posts() ) : ?>
           <div class="about" id="panel">
                        <?php dynamic_sidebar( 'content-area-about' ); ?>
                    </div>
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
            
            <?php 
                else : 
                    echo "error 404: Page not found";
            endif; ?>
        
            <!-- My custom post type loop-->
            <?php get_template_part( 'content-kolba', get_post_format() ); ?>
        </main>
    </div>
</section>    
<?php get_footer(); ?>