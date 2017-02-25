<?php 
/**
 * Template part for displaying contact info in footer.
 * 
 * @package wpg_photo
 * @since 1.0.0
 *
 */  
 ?>
		<?php if (get_theme_mod('wpg_telephone', '') !== '') : ?>
			<div class="contact-item phone-contact col-4">
				<i class="big icon-phone_android"></i> <?php _e('Call us ', 'wpg_theme'); printf(' <a href="tel:%1s">%1$s</a>', esc_attr(get_theme_mod('wpg_telephone'))); ?>
			</div>
		<? endif; ?>
		<?php if (get_theme_mod('wpg_address', '') !== '') :?>
			<div class="contact-item adress-contact col-4">
				<i class="big icon-map-marker"></i>
				<!--<span><?php _e('Address', 'wpg_theme'); ?></span> -->
				<?php echo esc_html(get_theme_mod('wpg_address')); ?>
			</div>
		<? endif; ?>
		<?php if (get_theme_mod('wpg_email', '') !== '') : ?>
			<div class="contact-item email-contact col-4">
				<i class="big icon-envelope"></i>
				<!-- <span><?php _e('E-mail', 'wpg_theme'); ?></span> -->
				<?php printf('<a href="mailto:%1s">%1$s</a>', antispambot(get_theme_mod('wpg_email'))); ?>
			</div>
		<? endif; ?>	