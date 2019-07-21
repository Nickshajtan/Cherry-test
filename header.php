 <?php
/**
 * The template for displaying the header
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head> 
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
    <?php wp_head(); ?>
</head>
<body>
    <div class="global-wrapper">
        <header>
          <div id="first-header-bg"></div>
          <div id="second-header-bg">
              <hr color="#fff" size="2px">
          </div>
           <nav class="top container">
                 <div class="all-wrapper">
                  <div class="logo-wrapper">
                       <div class="logo"><?php the_custom_logo();?></div>
                       <div class="slogan">
                           <?php dynamic_sidebar( 'top-area-third' ); ?>
                       </div>
                  </div>
                  <div class="contact-wrapper">
                      <div class="description">
                              <?php dynamic_sidebar( 'top-area-second' ); ?>
                          <div class="contact">
                             <?php dynamic_sidebar( 'top-area-first' ); ?>
                          </div>
                      </div>
                   </div>
                   </div>
            </nav> 
        </header>