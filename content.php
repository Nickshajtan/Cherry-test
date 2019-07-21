<?php
/**
 * The content template file
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		the_post_thumbnail();
	?>
	<header class="entry-header">
        <?php
			if ( is_single() ) :
				the_title( '<h2 class="entry-title">', '</h2>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
    </header>
    <div class="entry-content">
        	<?php 
            //Content
        	the_content( sprintf(
				__( 'Continue reading %s', 'test' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'test' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'test' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
    </div>
</article>	