<?php
 /**
  * File with setting and control in 'Blog' section
  *
 * @package wpg_photo
 * @since 1.0.0
  */

      $wp_customize->add_section( $section_customizer[6], array(
		'priority'   		=> '9',
		'capability' 		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'      		=> __('Last post', 'wpg_theme'),
	    'panel' 			=> $theme_panel_id,
	));	
		
	// ==============================================
    //  = Section title								=
    //  =============================================
 	$wp_customize->add_setting('wpg_blog_title', array(
		'default'        => __('Last post', 'wpg_theme'),
   		'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'

	));

	$wp_customize->add_control( 'wpg_blog_title', array(
		'settings' => 'wpg_blog_title',
		'label'   => __('Title section', 'wpg_theme'),
		'section'  => $section_customizer[6],
		'type'    => 'text'
	));	
	// ==============================================
    //  = Number of post						=
    //  =============================================
	$wp_customize->add_setting( 'wpg_post_number',
		array(
			'default'           => 2,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wpg_sanitize_number_range',
			)
	);
	$wp_customize->add_control( 'wpg_post_number',
		array(
			'label'           => __( 'No of items', 'wpg_theme' ),
			'description'     => sprintf(__('Enter number between %1s and %2s .','wpg_theme'),'1','10' ),
			'section'         => $section_customizer[6],
			'type'            => 'number',
			'priority'        => 100,
			'input_attrs'     => array( 'min' => 2, 'max' => 8, 'step' => 1, 'style' => 'width: 55px;' ),
			)
	);      
	
	// ==============================================
    //  = Select category					=
    //  =============================================
	$wp_customize->add_setting(
		'wpg_blog_category',
		array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'wpg_intval'
			)
	);
	$wp_customize->add_control( 
		'wpg_blog_category', 
		array(
			'type'	=>	'select',
			'label' => __('Select Category','wpg_theme'),
			'description' => __('Select category to show in Section.','wpg_theme'),
			'section' => $section_customizer[6],
			'choices' => wpg_category_lists(),
			)
	);
?>