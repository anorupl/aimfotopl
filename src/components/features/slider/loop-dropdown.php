<?php 
/**
 * Template part for displaying slider on front page.
 * 
 * @package wpg_photo
 * @since 1.0.0
 *
 */  
 ?>
<div id="header-slider" class="col-full-no fixed-margin" >
	<div id="slider" class="slick-full header-resize">
	<?php
		
		$slider_number = absint( get_theme_mod('wpg_slider_number', 0 ) );
		
		for ( $i = 1; $i <= $slider_number; $i++ ) {
				
			$id = get_theme_mod( 'wpg_slide_' . $i );
			
			if ( ! empty( $id ) ) {
				$ids[] = absint( $id );
			}
		}
		
		if ( !empty( $ids ) ) {
			
			$query_slajd = new WP_Query(
									array(
										'posts_per_page' => $slider_number,
										'no_found_rows'  => true,
										'orderby'        => 'post__in',
										'post_type'      => 'slides',
										'post__in'       => $ids,
									));		
			
			if(isset($query_slajd) && $query_slajd->have_posts()) :
				while($query_slajd ->have_posts()) : $query_slajd ->the_post();
					
					//check post_thumbnail
					if (has_post_thumbnail() == true) {
						$image_thumb = wp_get_attachment_url(get_post_thumbnail_id());
					} else {
						$image_thumb = get_template_directory_uri() . '/img/default/no_image.jpg';
					} ?>
					<div class="slides" style="background-image:url('<?php echo $image_thumb; ?>');">
						<img src="<?php echo $image_thumb; ?>" style="display: none;" />
						<?php if (get_theme_mod('wpg_slider_desc', false) === true) : ?>
							<div class="slides-caption slide-dark text-center">
								<h2><?php the_title(); ?></h2>
								<?php the_excerpt(); ?>
								<?php if( get_post_meta(get_the_ID(), 'wpg_url_slide', true) ) : ?>
									<a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'wpg_url_slide', true)); ?>" class="btn-slider"><?php _e('See more', 'wpg_theme'); ?></a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						
					</div>		
				<?php endwhile; /* Restore original Post Data */ wp_reset_postdata(); else : ?>
					<li style="background-image:url('<?php echo get_template_directory_uri() . '/img/default/slide.jpg'; ?>');"></li>
			<?php endif; 
		} //empty( $ids ) 
		?>		
	</div>
</div>		