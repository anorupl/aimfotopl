<?php
/**
 * File with setting and control in 'Page Featured' section
 *
 * @package wpg_photo
 * @since 1.0.0
 */

    $wp_customize->add_section(  $section_customizer[4], array(
		'priority'   		=> '4',
		'capability' 		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'      		=> __( 'Page featured', 'wpg_theme' ),
	    'panel' 			=> $theme_panel_id,
	));		
	  
	// ==============================================
	//  = Show/Hidde 							=
	//  =============================================  
	$wp_customize->add_setting('wpg_pagefeatured_active', array(
		'default'        => false,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control(
		        new WPG_Customize_Control_Switch($wp_customize, 'wpg_pagefeatured_active', array(

		                'settings' 	=> 'wpg_pagefeatured_active',
		                'section'  	=> $section_customizer[4],
		                'label'    	=> __('Show section', 'wpg_theme'),
		                'type'		=> 'switch'
		            )
		        )
	);
	// ==============================================
    //  = Section title						=
    //  =============================================
 	/*
 	$wp_customize->add_setting('wpg_pagefeatured_title', array(
		'default'        => __('Featured', 'wpg_theme'),
   		'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'

	));

	$wp_customize->add_control( 'wpg_pagefeatured_title', array(
		'settings' => 'wpg_pagefeatured_title',
		'label'   => __('Title section', 'wpg_theme'),
		'section'  => $section_customizer[4],
		'type'    => 'text'
	));	
	*/
	// ==============================================
    //  =  Section Description						=
    //  =============================================  
	/*    
	$wp_customize->add_setting('wpg_pagefeatured_desc', array(
		'default'        	=> '',
	    'sanitize_callback' => 'sanitize_text_field'
	));
		
	$wp_customize->add_control( 'wpg_pagefeatured_desc', array(
		'settings' 	=> 'wpg_pagefeatured_desc',
		'label'   	=> __('Description', 'wpg_theme'),
		'section'  	=> $section_customizer[4],
		'type'    	=> 'textarea'
	)); 
	*/

    // ======================================
    //  = Chose Slides =
    //  =====================================
	for ( $i = 1; $i <= 2; $i++ ) {
		$wp_customize->add_setting( "wpg_pagefeatured_$i",
			array(
				'default'           => isset( $default[ 'wpg_pagefeatured_' . $i ] ) ? $default[ 'wpg_pagefeatured_' . $i ] : '',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'wpg_intval',
				)
		);
		$wp_customize->add_control( "wpg_pagefeatured_$i", array(
			'label' => __( 'Page', 'wpg_theme' ) . ' #' . $i,
			'section' => $section_customizer[4],
			'type' => 'dropdown-pages',
			'allow_addition' => true,
		) );	
	}	         	 
?>