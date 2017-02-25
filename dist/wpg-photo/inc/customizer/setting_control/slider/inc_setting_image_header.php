<?php
/**
 * File with setting and control in 'Slider' section
 *
 * @package wpg_photo
 * @since 1.0.0
 */


    $wp_customize->add_section(  $section_customizer[2], array(
		'priority'   		=> '3',
		'capability' 		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'      		=> __( 'Background in header', 'wpg_theme' ),
	    'panel' 			=> $theme_panel_id,
	));	
	
    // ======================================
    //  = Chose image =
    //  =====================================
	
	
	$wp_customize->add_setting(
		'wpg_slider_img',
			array(
			'default'    =>	get_template_directory_uri() . '/img/default/no_image.jpg',
			'capability' =>	'edit_theme_options'
			)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wpg_slider_img',
			array(
				'label'      		=> __( 'Upload a background', 'wpg_theme' ),
				'section'    		=> $section_customizer[2],
				'settings'   		=> 'wpg_slider_img'
				
			) )
	);	
		
	// ==============================================
    //  = Image Heading title								=
    //  =============================================
 	$wp_customize->add_setting('wpg_slide_heading', array(
		'default'        => '',
   		'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'

	));

	$wp_customize->add_control( 'wpg_slide_heading', array(
		'settings' 			=> 'wpg_slide_heading',
		'label'   			=> __('Title header', 'wpg_theme'),
		'section'  			=> $section_customizer[2],
		'type'    			=> 'text'
		
	));	
	// ==============================================
    //  =  Image Description						=
    //  =============================================  
	$wp_customize->add_setting('wpg_slide_desc', array(
		'default'        => '',
	    'sanitize_callback' => 'sanitize_text_field'
	));
		
	$wp_customize->add_control( 'wpg_slide_desc', array(
		'settings' 			=> 'wpg_slide_desc',
		'label'   			=> __('Description', 'wpg_theme'),
		'section'  			=> $section_customizer[2],
		'type'    			=> 'textarea'
		
	)); 
	
	// ==============================================
    //  = Button url								=
    //  =============================================
 	$wp_customize->add_setting('wpg_slide_url', array(
		'default'        	=> '',
   		'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'

	));

	$wp_customize->add_control( 'wpg_slide_url', array(
		'settings' 			=> 'wpg_slide_url',
		'label'   			=> __('Button url', 'wpg_theme'),
		'section'  			=> $section_customizer[2],
		'type'    			=> 'url'
		
	));		
			
	
	
	          	 
?>