<?php 
/**
 * Template part for displaying contact info in header site.
 * 
 * @package wpg_photo
 * @since 1.0.0
 *
 */  
 ?>
<?php if (get_theme_mod('wpg_telephone', '') !== '') : ?>
	<div class="contact-item"><i class="icon-phone_android"></i><?php _e('Call us ', 'wpg_theme'); printf(' <a href="tel:%1s">%1$s</a>',esc_attr(get_theme_mod('wpg_telephone'))); ?></div>
<? endif; ?>
<?php if (get_theme_mod('wpg_address', '') !== '') :?>
	<div class="contact-item"><i class="icon-map-marker"></i><?php echo esc_html(get_theme_mod('wpg_address')); ?></div>
<? endif; ?>
<?php if (get_theme_mod('wpg_email', '') !== '') : ?>
	<div class="contact-item"><i class="icon-envelope"></i><?php printf('<a href="mailto:%1s">%1$s</a>', antispambot(get_theme_mod('wpg_email'))); ?></div>
<? endif; ?>	