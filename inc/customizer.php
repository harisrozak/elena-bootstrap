<?php
/*
 * Elena customizer functionality.
 *
 * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/
 *
 * @package WordPress
 * @subpackage Elena
 */

add_action('customize_register', 'elena_customize_register');
function elena_customize_register($wp_customize) 
{
	$theme_name = wp_get_theme();

  	/**
	 * Header
	 */
	$wp_customize->add_section( 'elena_header', array(
		'title' => 'Bootstrap Header',
		'priority' => 140,
	) );
	
	// Header Type
	$wp_customize->add_setting( 'elena_header_type', array(
		'default' => 'navbar-static-top'
	));	 
	$wp_customize->add_control(
		'elena_header_type',
		array(
			'type' => 'radio',
			'label' => esc_html__( 'Header Type', 'elena' ),
			'section' => 'elena_header',
			'choices' => array(
				'navbar-type-default' => esc_html__( 'Default', 'elena' ),
				'navbar-static-top' => esc_html__( 'Static Top', 'elena' ),
				'navbar-fixed-top' => esc_html__( 'Fixed Top', 'elena' )				
			),
		)
	);	

	// Header Color
	$wp_customize->add_setting( 'elena_header_color', array(
		'default' 		=> 'navbar-default'
	));	 
	$wp_customize->add_control(
		'elena_header_color',
		array(
			'type' => 'radio',
			'label' => esc_html__( 'Header Color', 'elena' ),
			'section' => 'elena_header',
			'choices' => array(
				'navbar-default' => esc_html__( 'Default', 'elena' ),
				'navbar-inverse' => esc_html__( 'Inverse', 'elena' )
			),
		)
	);

	// Header Logo
	$wp_customize->add_setting( 'elena_header_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'elena_header_logo', array(
        'label' => __( 'Header Logo', 'elena' ),
        'description' => __( 'Working only on header type <b>Default</b>', 'elena' ),
        'section' => 'elena_header',
        'settings' => 'elena_header_logo',
    )));
}