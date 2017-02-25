<?php
 /**
  * File with setting and control in 'Last Work' section
  *
 * @package wpg_photo
 * @since 1.0.0
  */

    $wp_customize->add_section( $section_customizer[3], array(
		'priority'   		=> '6',
		'capability' 		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'      		=> __( 'Last work', 'wpg_theme' ),
	    'panel' 			=> $theme_panel_id,
	));	  
  	
	// ==============================================
	//  = Show 							=
	//  =============================================  
	$wp_customize->add_setting('wpg_lastwork_active', array(
		'default'        => false,
		'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control(
		        new WPG_Customize_Control_Switch($wp_customize, 'wpg_lastwork_active', array(

		                'settings' 	=> 'wpg_lastwork_active',
		                'section'  	=> $section_customizer[3],
		                'label'    	=> __('Show section', 'wpg_theme'),
		                'type'		=> 'switch'
		            )
		        )
	);	
	// ==============================================
    //  = Section title						=
    //  =============================================
 	$wp_customize->add_setting('wpg_lastwork_title', array(
		'default'        => __('Last work', 'wpg_theme'),
   		'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control( 'wpg_lastwork_title', array(
		'settings' => 'wpg_lastwork_title',
		'label'   => __('Title section', 'wpg_theme'),
		'section'  => $section_customizer[3],
		'type'    => 'text'
	));	
	// ==============================================
    //  =  Section Description						=
    //  =============================================  
	$wp_customize->add_setting('wpg_lastwork_desc', array(
		'default'        => '',
	    'sanitize_callback' => 'sanitize_text_field'
	));
		
	$wp_customize->add_control( 'wpg_lastwork_desc', array(
		'settings' => 'wpg_lastwork_desc',
		'label'   => __('Description', 'wpg_theme'),
		'section'  => $section_customizer[3],
		'type'    => 'textarea'
	)); 	
	// ==============================================
    //  = Number of item						=
    //  =============================================
	$wp_customize->add_setting( 'wpg_lastwork_number',
		array(
			'default'           => 1,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wpg_sanitize_number_range',
			)
	);
	$wp_customize->add_control( 'wpg_lastwork_number',
		array(
			'label'           => __( 'No of items', 'wpg_theme' ),
			'description'     => sprintf(__('Enter number between %1s and %2s .','wpg_theme'),'1','8' ),
			'section'         => $section_customizer[3],
			'type'            => 'number',
			'priority'        => 100,
			'input_attrs'     => array( 'min' => 1, 'max' => 8, 'step' => 1, 'style' => 'width: 55px;' ),
			)
	);  
    // ======================================
    //  = Chose Terms - =
    //  =====================================
	
	$category_arg	= array('gallery' => __('Gallery','wpg_theme'));
	$category_lists	= get_all_terms(false, true, $category_arg);
	$category_lists['gallery'][0] = __('All Categories','wpg_theme');
	
	$wp_customize->add_setting(
		'wpg_lastwork_terms',
		array(
			'default' => 0,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'wpg_intval'
			)
	);

	$wp_customize->add_control( 
		'wpg_lastwork_terms', 
		array(
			'type'	=>	'select',
			'label' => __('Select Category','wpg_theme'),
			'description' => __('Select category to show in Section.','wpg_theme'),
			'section' => $section_customizer[3],
			'choices' => $category_lists['gallery'],
			)
	);
	 

?>