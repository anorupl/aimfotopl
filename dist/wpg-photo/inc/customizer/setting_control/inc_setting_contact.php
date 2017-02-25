<?php
 /**
  * File with setting and control in footer contact section
  *
 * @package wpg_photo
 * @since 1.0.0
  */

  
    $wp_customize->add_section( $section_customizer[7], array(
		'priority'   		=> '10',
		'capability' 		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'      		=> __( 'Contact', 'wpg_theme' ),
	    'panel' 			=> $theme_panel_id,
	));	
	  
 	// ==============================================
    //  = Address								=
    //  =============================================  
 	$wp_customize->add_setting('wpg_address', array(
		'default'        => '',
        'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control( 'wpg_address', array(
		'settings' => 'wpg_address',
		'label'   => __('Address', 'wpg_theme'),
		'section'  => $section_customizer[7],
		'type'    => 'text'
	)); 
  
 	// ==============================================
    //  = Phone (text) 									=
    //  =============================================   
 	$wp_customize->add_setting('wpg_telephone', array(
		'default'        => '',
        'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control( 'wpg_telephone', array(
		'settings' => 'wpg_telephone',
		'label'   => __('Telephone number', 'wpg_theme'),
		'section'  => $section_customizer[7],
		'type'    => 'text'
	));   
 	// ==============================================
    //  = E-mail 	(text)							=
    //  =============================================  
 	$wp_customize->add_setting('wpg_email', array(
		'default'        => '',
        'sanitize_callback' => 'sanitize_email'
	));

	$wp_customize->add_control( 'wpg_email', array(
		'settings' => 'wpg_email',
		'label'   => __('E-mail', 'wpg_theme'),
		'section'  => $section_customizer[7],
		'type'    => 'email'
	));   
 	// ==============================================
    //  = Google map 								=
    //  =============================================  
	 	// ==============================================
	    //  = Show Google map							=
	    //  =============================================  
		$wp_customize->add_setting('wpg_contact_maps', array(
			'default'        => false,
			'capability' => 'edit_theme_options',
		));
	
		$wp_customize->add_control( 'wpg_contact_maps', array(
			'settings' => 'wpg_contact_maps',
			'label'   => __('Show google map in contact', 'wpg_theme'),
			'section'  => $section_customizer[7],
			'type'		=> 'checkbox',
			
		));
	 	// ==============================================
	    //  = Drag/drop marker Google map				=
	    //  =============================================	      
	 	$wp_customize->add_setting( 'wpg_contact_map_latlong', array(

			            'default'           => '54.248997, 20.804780',
			            //'sanitize_callback'	=> 'validateGeolocation'
			        )
		);

		$wp_customize->add_control(
		        new WPG_Customize_Control_Google_MAP($wp_customize, 'wpg_contact_map_latlong', array(

		                'settings' => 'wpg_contact_map_latlong',
		                'section'  => $section_customizer[7],
		                'label'    => __( 'Select a location on map', 'wpg_theme' )


		            )
		        )
		);  
 
?>