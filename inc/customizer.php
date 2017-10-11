<?php
/**
 * Travel Blog Theme Customizer
 *
 * @package Travel_Blog
 */


 function travel_blog_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'travel_blog_logo_section' , array(
		'title'       => __( 'Logo', 'travel_blog' ),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name and description in the header',
	) );
	$wp_customize->add_setting( 'travel_blog_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'travel_blog_logo', array(
		'label'    => __( 'Logo', 'travel_blog' ),
		'section'  => 'travel_blog_logo_section',
		'settings' => 'travel_blog_logo',
	) ) );
}
add_action( 'customize_register', 'travel_blog_theme_customizer' );


function travel_blog_theme_custom_bg( $wp_customize ) {
   $wp_customize->add_section( 'travel_blog_bg_section' , array(
		'title'       => __( 'bg', 'travel_blog' ),
		'priority'    => 10,
		'description' => 'Upload a bg to replace the default site name and description in the header',
	) );
	$wp_customize->add_setting( 'travel_blog_bg' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'travel_blog_bg', array(
		'label'    => __( 'bg', 'travel_blog' ),
		'section'  => 'travel_blog_bg_section',
		'settings' => 'travel_blog_bg',
	) ) );
}
add_action( 'customize_register', 'travel_blog_theme_custom_bg' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function travel_blog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'travel_blog_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function travel_blog_customize_preview_js() {
	wp_enqueue_script( 'travel_blog_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'travel_blog_customize_preview_js' );
