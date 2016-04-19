<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Elena
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php elena_template_tags::post_thumbnail(); ?>

	<header class="entry-header">
		<?php
			if ( is_single() || is_page() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		
			elena_template_tags::entry_header_meta();
		?>
	</header><!-- .entry-header -->
	
	<?php if ( is_single() || is_page() ) : ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages(array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'elena' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'elena' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			));
		?>
	</div><!-- .entry-content -->
	
	<?php else : ?>
	
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	
	<?php endif; ?>

	<footer class="entry-footer">
		<?php 
			elena_template_tags::entry_footer_meta(); 
			
			printf('<span><a href="%1$s">%2$s</a></span>',
				get_edit_post_link(), _x( 'Edit Post', 'elena' )
			);
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
