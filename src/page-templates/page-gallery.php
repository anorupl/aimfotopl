<?php
/**
 * Template Name: Kategorie Galerii
 *
 * Displays the contact Template.
 *
 * @package wpg_photo
 * @since 1.0.0
 */
get_header(); 
?>

<div class="col-full-no feturad-box fixed-margin">
	<main id="main" class="site-main" role="main">
		<header class="entry-header-section header-center text-center">
			<?php the_title( '<h1>', '</h1>' ); ?>
			<span class="border"></span>
		</header>
		<?php 
			
			$categories = get_terms( array(
			    'taxonomy' => 'gallery',
			    'hide_empty' => false,

			) );			
			foreach ( $categories as $category ) { 	?>
			<div class="col-4">
				<div class="feturad-image">
					<a href="<?php echo esc_url(get_term_link($category)); ?>">
						<?php echo the_term_thumbnail($category->term_id, 'full'); ?>
						<div class="text-title-overlay"><h3><?php echo $category->name; ?></h3></div>
					</a>
				</div>
			</div>			
			<?php } ?>		
	</main><!-- .site-main -->
</div>
<?php get_footer(); ?>