<?php 
/**
 * Template part for displaying offer in singular page.
 * 
 * @package wpg_photo
 * @since 1.0.0
 *
 */  
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="offer-header clear-both text-center">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>	
		<div class="entry-social-offer">
			<?php wpg_share(); ?>
		</div>
	</div>
	<?php if (function_exists('wpg_breadcrumbs') && is_single()) wpg_breadcrumbs(); ?>	
	<div class="entry-content col-7" style="float:right;">
		<?php 
			
				$content = get_the_content();

				strip_shortcode_gallery($content, 'gallery');

				wp_link_pages( array(
					'before'      => '<nav class="page-links pagination-inside" role="navigation"><span class="page-links-title">' . __( 'Pages:', 'wpg_theme' ) . '</span>',
					'after'       => '</nav>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'wpg_theme' ) . ' </span>',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
		?>		
		<hr>
		<?php if( get_post_meta( get_the_ID(), 'wpg_gallery_offer', true ) ) : $gallery_offer = get_post_meta( get_the_ID(), 'wpg_gallery_offer', true ); ?>
			<div class="col-6">
				<a href="<?php echo esc_url(get_term_link(intval($gallery_offer),'gallery' )); ?>" class="relation-link"><?php _e('Show Gallery','wpg_theme'); ?></a>							
			</div>
		<?php endif; //wpg_gallery_offer ?>
			
		<?php if (get_theme_mod('wpg_telephone', '') !== '') : ?>
				<div class="col-6">
					<?php printf('<a href="tel:%2s" class="phone-box"><i class="item-icon icon-phone_android"></i> %1$s %2$s</a>',
									__('Call us ', 'wpg_theme'), 
									esc_attr(get_theme_mod('wpg_telephone'))); 
					?>
				</div>
		<? endif; ?>			
	</div>
	<?php if ( has_post_thumbnail() ) { ?>
		<figure class="entry-image post-thumbnail col-5">
				<?php the_post_thumbnail( 'medium', array( 'alt' => get_the_title() ) ); ?>
		</figure><!-- .entry-image -->
	<?php } else {
		wpg_no_thumbnail();
	}	
	?>	
	<span class="clear"><br></span>
		<?php if (is_single()) : ?>
		<div class="entry-gallery col-full-no"><?php $galleries = get_post_galleries( $post ); if ( ! empty( $galleries ) ) {	foreach ( $galleries as $gallery ) {echo $gallery;}} ?></div><!-- .entry-gallery -->	
		<?php endif;//is_single() ?>
</article>