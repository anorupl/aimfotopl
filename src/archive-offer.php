<?php
/**
 * The archive offer template file
 *
 * @package wpg_photo
 * @since 1.0.0
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

  get_header(); 
?>
<div id="content" class="site-content col-full-no fixed-margin">
	<div class="content-area hentry-multi col-full-margin">
		<main id="main" class="site-main ">
		<div class="entry-header-section header-center text-center">
				<h2><?php post_type_archive_title(); ?></h2>
				<span class="border"></span>
		</div><!-- entry-header-section -->	
		<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();
			
					get_template_part( 'components/content_single/content', 'offer' );
			
				endwhile;
			endif; 
		?>						
		</main><!-- .site-main -->
	</div><!-- .content-area -->
</div><!-- #content -->
<?php get_footer(); ?>