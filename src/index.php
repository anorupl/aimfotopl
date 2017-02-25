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

/* ===============================
 * Display Only in front page    *
 * ==============================*/
if (is_front_page() && !is_paged()) {



	/* ====================
	 * Section - stage   *
	 * ===================*/
	if (get_theme_mod('wpg_stages_active', false) === true) {
		get_template_part('components/features/stages/stages', 'content' );
	}	
	
	/* ====================
	 * Section - last work   *
	 * ===================*/	
	if (get_theme_mod('wpg_lastwork_active', false) === true) {
		get_template_part('components/features/last_work/loop', 'last_work' );
	}
	/* ====================
	 * Section - featured page   *
	 * ===================*/
	if (get_theme_mod('wpg_pagefeatured_active', false) === true) {
		get_template_part('components/features/featured_pages/featured', 'content' );
	}	
	/* ====================
	 * Section - Client   *
	 * ===================*/	
	if (get_theme_mod('wpg_client_active', false) === true) {
		get_template_part('components/features/client/loop', 'client' );
	}	
	
	/* =================================
	 * Section contact - social links  *
	 * ================================*/
	social_net_link('<section class="section-social find-us-on color-light bg text-center clear-both"><header class="header-center entry-header-section "><h2>%1$s</h2><span class="border"></span></header>%2$s</section>');
}
?>

<?php
/* =================================
 * Section - Main loop  		   *
 * ================================*/
?>
<section class="col-full-no content-area hentry-multi clear-both">
	<div id="main">
		<div class="site-main">
		<div class="entry-header-section header-center text-center">
			<span class="header-span">
				<h2>
					<?php
					if ( is_front_page() && is_home() ) {
						// Default homepage			 
						echo esc_html(get_theme_mod('wpg_blog_title',__('Last post', 'wpg_theme')));
						if ( $paged > 1 ) {
							_e(' - page: ', 'wpg_theme');
							echo $paged;
						}			
					} else {
						//everything else	 
						the_archive_title();
					}
					?>					
				</h2>
				<span class="border"></span>
			</span>
		</div>
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
			
			if (is_archive()):
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'wpg_theme' ),
					'next_text'          => __( 'Next page', 'wpg_theme' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wpg_theme' ) . ' </span>',
				));				
			endif;
			
		else :
			get_template_part( 'components/content_multi/content', 'none' );
		endif; ?>	
			
		</div><!-- .site-main -->
	</div><!-- #main -->
</section><!--.content-area -->
<?php get_footer(); ?>