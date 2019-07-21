<?php
/**
 * The pages template file
 *
 */
get_header(); ?>
<section class="section-content">
    <div class="container">
        <main role="main">
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
                 <?php get_template_part( 'content' ); ?>
               </div>
                   <?php get_sidebar(); ?>
            </div>
        <?php endwhile; ?> 
        <?php
            else : 
                    echo "error 404: Page not found";
            endif; ?>   
        </main>
    </div>
</section>    
<?php get_footer(); ?>