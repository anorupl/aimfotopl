<?php
/**
 * The taxonomy gallery template file
 * @package wpg_photo
 * @since 1.0.0
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<div class="col-full-no feturad-box fixed-margin">
	<main id="main" class="site-main" role="main">
		<header class="header-center entry-header-section text-center">
			<span class="header-span">
			<h2><?php echo single_cat_title( '', false ); ?></h2>
				<span class="border"></span>			
			</span>
			<p><?php echo term_description(); ?></p>
		</header>	
		<div class="gird-masonry">
		<?php if ( have_posts() ) : 
		
			/* Start the Loop */

			while ( have_posts() ) : the_post(); ?>
			<div class="gird-item">
				<div class="feturad-image">
					<a href="<?php the_permalink(); ?>">
						<?php
	
						if ( has_post_thumbnail() ) :
	
							the_post_thumbnail( 'full', array( 'alt' => get_the_title() ) );
	
							else : wpg_no_thumbnail('image');
	
						endif;
						?>
						<div class="text-title-overlay"><h3><?php the_title(); ?></h3></div>
					</a>
				</div>
			</div>
			<?php endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'wpg_theme' ),
				'next_text'          => __( 'Next page', 'wpg_theme' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wpg_theme' ) . ' </span>',
			) );
	endif; ?>
	</div><!-- .gird-masonry -->
	</main>
</div>
<?php get_footer(); ?>