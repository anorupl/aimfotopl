<?php
 /**
  * File with setting and control link in section Social networks.
  *
 * @package wpg_photo
 * @since 1.0.0
  */

    $wp_customize->add_section(  $section_customizer[5], array(
		'priority'   		=> '8',
		'capability' 		=> 'edit_theme_options',
		'theme_supports'	=> '',
		'title'      		=> __( 'Social networks', 'wpg_theme' ),
	    'panel' 			=> $theme_panel_id,
	));	
	
 	// ==============================================
    //  = Social networks link 						=
    //  =============================================

 	
	$social = array('facebook','google','twitter','youtube','vimeo','instagram','deviantart','github','linkedin','pinterest');
	
		foreach ($social as $value) {
			
		$key = 'wpg_sn_'.$value;
				
			$wp_customize->add_setting($key, array(
		    				'default' => '',
		    				'capability' => 'edit_theme_options', 
		    				'sanitize_callback' => 'esc_url_raw'
		    				)
			);
			$wp_customize->add_control( $key, array(
					'label'		=> sprintf(__( 'Link to  %1$s', 'wpg_theme' ), $value ),
					'section'	=> $section_customizer[5],
					'settings'	=> $key,
					'type'		=> 'url'
					)
			);		
		}
?>