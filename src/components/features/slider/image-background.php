<?php 
/**
 * Template part for displaying image background in header.
 * 
 * @package wpg_photo
 * @since 1.0.0
 *
 */  
 ?>
<div id="header-slider" class="col-full-no fixed-margin">
<div id="image-bg" class="header-resize">
	<div class="slides" style="background-image:url('<?php echo esc_url(get_theme_mod('wpg_slider_img', get_template_directory_uri() . '/img/default/no_image.jpg')); ?>');">
	<?php if (get_theme_mod('wpg_slide_heading', '') !== '') : ?>
		<div class="slides-caption text-center slide-dark">
			<h2><?php echo esc_html(get_theme_mod('wpg_slide_heading', '')); ?></h2>
			<p><?php echo esc_html(get_theme_mod('wpg_slide_desc', '')); ?></p>
			<a href="<?php echo esc_url(get_theme_mod('wpg_slide_url', '')); ?>" class="btn-slider"><?php _e('See more', 'wpg_theme'); ?></a>
		</div>
	<?php endif; ?>		
	</div>
</div>
</div>	