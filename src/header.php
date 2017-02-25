<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpg_photo
 * @since 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>

</head>
<body <?php body_class('preload'); ?>>
<div class="container">		
	<header id="site-header" class="col-full-no" 
		<?php if(!is_front_page()) : ?>
		style="background-image:url('<?php echo esc_url(get_theme_mod('wpg_slider_img', get_template_directory_uri() . '/img/default/no_image.jpg')); ?>');"
		<?php endif; ?>
	>
		<div class="header contact col-4 hidde-tablet">
			<?php get_template_part( 'components/site/site', 'adress' ); ?>
		</div>			
		<?php if ( is_front_page() ) : ?>
		<div class="title-area text-center col-4" itemscope itemtype="http://schema.org/Organization">
			<h1 class="site-title">
				<?php the_custom_logo(); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="show-tablet" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</h1>
		</div>
		<?php else : ?>
		<div class="title-area text-center col-4">
			<span class="class-h1">
				<?php the_custom_logo(); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="show-tablet" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</span>
		</div>
		<?php endif; ?>
		<div class="header find-us-on text-right col-4 hidde-tablet">
					<?php social_net_link('<span class="screen-reader-text">%1$s</span>%2$s'); ?>
		</div>	
		<?php if ( has_nav_menu( 'header' ) ) : ?>
				<button class="icon-button-small-menu right-button show-tablet" aria-expanded="false" aria-controls="header-menu"><?php _e('Menu', 'wpg_theme'); ?></button>
		<?php
			wp_nav_menu(array(
				'container'       	=> false,
				'theme_location' 	=> 'header',
				'menu_id' 			=> 'header-menu',
				'items_wrap'      => '<nav id="%1$s" class="horizontal arrow hidde show-tablet wp-nav" data-class="horizontal arrow hidde show-tablet wp-nav"><ul class="%2$s">%3$s</ul></nav>'
				));
		endif; ?>
</header>	
<?php 
if (is_front_page() && !is_paged()) {
	/* ====================
	 * Section - Slider   *
	 * ===================*/
	if (get_theme_mod('wpg_slider_active', false) === true) {
		get_template_part('components/features/slider/loop', 'dropdown' );
	} else {
	 	get_template_part('components/features/slider/image', 'background' );
	}	
}	

wp_nav_menu(array(
	'container'       	=> false,
	'theme_location' 	=> 'header',
	'menu_id' 			=> 'menu-two',
	'items_wrap'      => '<div class="text-center fixed-element col-full-no hidde-tablet"><nav id="%1$s" class="horizontal simple wp-nav"><ul class="%2$s">%3$s</ul></nav></div>'
	));
?>