<?php
/**
 * File with setting and control in 'Slider' section
 *
 * @package wpg_photo
 * @since 1.0.0
 */
	
	// ==============================================
	//  = Section									=
	//  =============================================  	
	$wp_customize->add_section(  $section_customizer[1], array(
		'priority'   		=> '2',
		'capability' 		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'      		=> __( 'Slider', 'wpg_theme' ),
	    'panel' 			=> $theme_panel_id,
	));	
	
	// ==============================================
	//  = Show/Hidde 							=
	//  =============================================  
	$wp_customize->add_setting('wpg_slider_active', array(
		'default'        => false,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control(
		        new WPG_Customize_Control_Switch($wp_customize, 'wpg_slider_active', array(

		                'settings' 	=> 'wpg_slider_active',
		                'section'  	=> $section_customizer[1],
		                'label'    	=> __('Show section', 'wpg_theme'),
		                'type'		=> 'switch'
		            )
		        )
	);	
	
	// ==============================================
	//  = Show/Hidde Description						=
	//  =============================================  
	$wp_customize->add_setting('wpg_slider_desc', array(
		'default'        => false,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control(
		        new WPG_Customize_Control_Switch($wp_customize, 'wpg_slider_desc', array(

		                'settings' 	=> 'wpg_slider_desc',
		                'section'  	=> $section_customizer[1],
		                'label'    	=> __('Show description', 'wpg_theme'),
		                'type'		=> 'switch'
		            )
		        )
	);		
	
 	// ==============================================
    //  = Number Slides							=
    //  =============================================
	$wp_customize->add_setting( 'wpg_slider_number',
		array(
			'default'           => 1,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wpg_sanitize_number_range',
			)
	);
	$wp_customize->add_control( 'wpg_slider_number',
		array(
			'label'           	=> __( 'No of items', 'wpg_theme' ),
			'description'     	=> sprintf(__('Enter number between %1s and %2s .Save and refresh the page if No of Blocks is changed.','wpg_theme'),'1','10' ),
			'section'         	=> $section_customizer[1],
			'type'            	=> 'number',
			'priority'        	=> 100,
			'input_attrs'     	=> array( 'min' => 1, 'max' => 10, 'step' => 1, 'style' => 'width: 55px;' )
			)
	);


    // ======================================
    //  = Chose Slides =
    //  =====================================
    
    
	$slides_number = absint( get_theme_mod( 'wpg_slider_number', '1') );
	
	if ( $slides_number > 0 ) {
		for ( $i = 1; $i <= $slides_number; $i++ ) {
			$wp_customize->add_setting( "wpg_slide_$i",
				array(
					'default'           => 0,
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'wpg_intval',
					)
			);
		$wp_customize->add_control(
				new WPG_Custom_Dropdown( $wp_customize, "wpg_slide_$i", array(
					'label'           	=> __( 'Slide', 'wpg_theme' ) . ' #' . $i,
					'section'         	=> $section_customizer[1],
					'type'            	=> 'wpg_custom_dropdown',
					'post_type'			=>	'slides',
					'priority'        	=> 100
					)
				)
			);		
		}
	}
	          	 
?>