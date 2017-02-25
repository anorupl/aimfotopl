<?php
/**
 * Theme Customizer
 *
 * @package wpg_photo
 * @since 1.0.0
 *
 * @global object $wp_customize WP_Customize instance.
 *
 */

global $wp_customize;

/* Load necessary files with additional elements
 ************************************************/
require get_template_directory() . '/inc/customizer/helpers/inc_front_css.php';
require get_template_directory() . '/inc/customizer/helpers/inc_helpers.php';
require get_template_directory() . '/inc/customizer/helpers/inc_scripts_and_style.php';


if(isset($wp_customize)) {
	
	
	/* Load necessary files with additional elements only if custumizer on
	 ************************************************/
	require get_template_directory() . '/inc/customizer/helpers/inc_context.php';
	require get_template_directory() . '/inc/customizer/helpers/inc_sanitization.php';


	/* Load extends class WP_Customize_Control
	 ************************************************/

	// Control for google fonts 			- Class "Fonts_Dropdown_Google" - Custom control fonts field.
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_field_fonts.php';

	// Control for Checkbox (niezbędne)		- Class "WPG_Customize_Control_Checkbox_Multiple" - Custom control with mutli checbox.
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_multi_checbox.php';
	
	// Control for Checkbox with Sort  		- Class "WPG_Customize_Control_Checkbox_Multiple_Sort"
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_multisort_checbox.php';
	
	// Custom control for dropdown 			- Class "WPG_Customize_Control_Custom_Dropdown" - Custom control with custom dropdown.
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_custom_dropdown.php';
	
	// Customize control for Google maps 	- Class "WPG_Customize_Control_Google_MAP".
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_google_map.php';
	
	// Customize control for field switch 	- Class "WPG_Customize_Control_Switch"
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_switch.php';
		
}

/**
 * Add customizations for this theme
 *
 * @since 1.0.0
 *
 * @param object $wp_customize WP_Customize instance
 * @return void
 */
function wpg_customizer_general($wp_customize) {


	// Modify existing controls and settings
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';

	// Add panel - Theme Settings
	$theme_panel_id = 'wpg_general';

	$wp_customize->add_panel( $theme_panel_id, array(
	   	'priority' 			=> '10',
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports' 	=> '',
	    'title' 			=> __( 'Theme Settings', 'wpg_theme' )
	) );



	 /* Section ID
	 ************************************************/
	$section_customizer = array(
		'wpg_typography_stc',
		'wpg_slider_stc',
		'wpg_image_header',
		'wpg_lastwork_stc',				
		'wpg_pagefeatured_stc',
		'wpg_social_stc',		
		'wpg_blog_stc',
		'wpg_contact_stc',
	);

		
	/* Add Section - to panel [Theme Settings]
	 * 1.Typography			- priority 1 
	 * 2.Slider				- priority 2 *plugin
	 * 3.Image header		- priority 3
 	 * 4.Last work			- priority 4 *plugin
	 * 5.Featured page		- priority 5 
	 * 6.Social link		- priority 6
	 * 7.Blog				- priority 7
	 * 8.Contact			- priority 8

	 ************************************************/

	// 1. Typography
		require get_template_directory() . '/inc/customizer/setting_control/inc_setting_fonts.php';
	
	// 2.Slider *plugin
	
	// 3.Image header
		require get_template_directory() . '/inc/customizer/setting_control/slider/inc_setting_image_header.php';
	
	// 4.Last work *plugin
	
	// 5. Featured page	(v.Dropdown select)
		require get_template_directory() . '/inc/customizer/setting_control/featured/inc_setting_featured_page_dropdown.php';
	// 6.Social networks link	
		require get_template_directory() . '/inc/customizer/setting_control/inc_setting_social_net.php';
	// 7. Blog
		require get_template_directory() . '/inc/customizer/setting_control/inc_setting_blog.php';
	// 8. Contact
		require get_template_directory() . '/inc/customizer/setting_control/inc_setting_contact.php';
	// 6.Social networks link	
		require get_template_directory() . '/inc/customizer/setting_control/inc_setting_social_net.php';
	

	/* Only if plugin on
	 * 
	 * 2.Slider				- priority 2 *plugin
 	 * 4.Last work			- priority 4 *plugin		

	 ************************************************/	 	
	 if ( class_exists('helper')) {
		
		// 2.Slider				- priority 2 *plugin
		require get_template_directory() . '/inc/customizer/setting_control/slider/inc_setting_slider_dropdown.php';

		// 4.Last work			- priority 4 *plugin	
		require get_template_directory() . '/inc/customizer/setting_control/inc_setting_lastwork.php';
	
	}			   
} 								
	

add_action( 'customize_register', 'wpg_customizer_general' );
?>