<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpg_photo
 * @since 1.0.0
 */

get_header(); 
/* =================================
 * Section - Main loop  		   *
 * ================================*/
?>
<div id="content" class="site-content col-full-no fixed-margin">
	<div id="primary" class="content-area hentry-multi clear-both">
		<main id="main">
			<header class="entry-header-section header-center text-center">
				<h1><?php echo single_cat_title( '', false ); ?></h1>
				<span class="border"></span>
			</header>
			<?php
				if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'components/content_multi/content-excerpt', get_post_format() );

				endwhile;
			
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'wpg_theme' ),
					'next_text'          => __( 'Next page', 'wpg_theme' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wpg_theme' ) . ' </span>',
				) );
				endif; ?>
		</main><!-- .site-main -->	
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- #content -->
<?php get_footer(); ?>