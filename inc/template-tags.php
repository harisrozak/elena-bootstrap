<?php
/**
 * Custom template tags for Elena Theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Elena
 */

Class elena_template_tags
{
	/**
	 * Display post thumbnail
	 */
	static function post_thumbnail() 
	{
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
		?>

		<div class="post-thumbnail">
			<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?>
		</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
				the_post_thumbnail('large', array(
					'alt' => get_the_title(),
					'class' => 'img-responsive'
				));
			?>
		</a>

		<?php endif; // End is_singular()
	}

	/**
	 * Prints HTML with meta information for the date, author, and comments.
	 */
	static function entry_header_meta()
	{
		if(in_array(get_post_type(), array('post','attachment'))) 
		{
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				get_the_date(),
				esc_attr( get_the_modified_date( 'c' ) ),
				get_the_modified_date()
			);

			printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Posted on', 'Used before publish date.', 'elena' ),
				$time_string
			);

			printf( '<span class="byline"><span class="author vcard"><span> %1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',
				_x( 'By', 'Used before post author name.', 'elena' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		if(is_attachment() && wp_attachment_is_image())
		{
			// Retrieve attachment metadata.
			$metadata = wp_get_attachment_metadata();

			printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
				_x( 'Full size', 'Used before full size attachment link.', 'elena' ),
				esc_url( wp_get_attachment_url() ),
				$metadata['width'],
				$metadata['height']
			);
		}

		if(! is_page() && ! post_password_required() && (comments_open() || get_comments_number()))
		{
			echo '<span class="comments-link">';
			echo '<span class="comments-link-divider">&ndash;</span>';
			/* translators: %s: post title */
			comments_popup_link( 
				__( 'Leave a Comment', 'elena' ), 
				__( '1 Comment', 'elena' ), 
				__( '% Comments', 'elena' ) 
			);
			echo '</span>';
		}
	}

	/**
	 * Prints HTML with meta information for the categories, tags.
	 */
	static function entry_footer_meta()
	{
		if ( 'post' != get_post_type() ) return;

		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'elena' ) );
		if ( $categories_list && self::categorized_blog() ) {
			printf( '<span class="cat-links"><span>%1$s </span>%2$s</span>',
				_x( 'Filled Under: ', 'Used before category names.', 'elena' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'elena' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span>%1$s </span>%2$s</span>',
				_x( 'Tagged With: ', 'Used before tag names.', 'elena' ),
				$tags_list
			);
		}
	}

	/**
	 * Determine whether blog/site has more than one category.
	 */
	static function categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'elena_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,

				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'elena_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so categorized_blog should return false.
			return false;
		}
	}

	/** 
	 * Print the dynamic widget 
	 */
	static function print_widget($widget_name, $class_name = '') {
		
		if(is_active_sidebar($widget_name))
		{
			printf('<div id="%1$s" class="%2$s">',
				$widget_name, 'widget-area ' . $class_name);

			dynamic_sidebar($widget_name);

			print('</div>');
		}
	}

	/**
	 * Custom output of links to the previous and next pages of posts.
	 */
	static function posts_pagination() {	
		if(function_exists('wp_pagenavi')) { 
			wp_pagenavi(); 		
		} else { 
			// pagination arguments
			// @link https://developer.wordpress.org/themes/functionality/pagination/#numerical-pagination
			the_posts_pagination( array(
				'prev_text'          => __( '&#x2190;', 'elena' ),
				'next_text'          => __( '&#x2192;', 'elena' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text sr-only">' . __( 'Page', 'elena' ) . ' </span>'
			));
		}		
	}

	/**
	 * Customize header navbar classes by option
	 */
	static function header_navbar_class() {
		$type = get_theme_mod('elena_header_type','navbar-type-default');
		$color = get_theme_mod('elena_header_color','navbar-default');

		printf('%1$s %2$s', $type, $color);
	}

	/**
	 * Display navigation to next/previous comments when applicable.
	 */
	static function comment_nav() {
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'elena' ); ?></h2>
			<div class="nav-links">
				<?php
					if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'elena' ) ) ) :
						printf( '<div class="nav-previous">%s</div>', $prev_link );
					endif;

					if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'elena' ) ) ) :
						printf( '<div class="nav-next">%s</div>', $next_link );
					endif;
				?>
			</div><!-- .nav-links -->
		</nav><!-- .comment-navigation -->
		<?php
		endif;
	}

	/* end class */
}