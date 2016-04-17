<?php
/**
 * Single Post Template
 * This template is used when a single post page is shown.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Elena
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 content-area">
            <main id="main" class="site-main" role="main">

            <?php if ( have_posts() ) : ?>

                <?php if ( is_home() && ! is_front_page() ) : ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                <?php endif; ?>

                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'content', get_post_format() );

                // End the loop.
                endwhile;

                // Author bio.
                if ( get_the_author_meta( 'description' ) ) :
                    get_template_part( 'author-bio' );
                endif;

                // Load the comment template if comments are open or there is at least one comment.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            // If no content, include the "No posts found" template.
            else :
                get_template_part('content', 'none');
            endif;
            ?>

            </main><!-- .site-main -->
        </div><!-- .content-area -->
        
        <?php get_sidebar() ?>

    </div><!-- .row -->
</div><!-- .content-area -->

<?php get_footer(); ?>
