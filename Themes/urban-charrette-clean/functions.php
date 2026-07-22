<?php

function urban_charrette_theme_setup() {

	add_theme_support(
		'custom-logo',
		array(
			'height' => 65,
			'width' => 65,
			'flex-height' => true,
			'flex-width' => true,
		)
	);

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu', 'urban-charrette' ),
			'quick-links' => __( 'Quick Links', 'urban-charrette' ),
			'get-involved' => __( 'Get Involved', 'urban-charrette' ),
			'social-links' => __( 'Social Links', 'urban-charrette' ),
		)
	);
}

add_action( 'after_setup_theme', 'urban_charrette_theme_setup' );


function urban_charrette_enqueue_assets() {

	wp_enqueue_style(
		'urban-charrette-fonts',
		'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'urban-charrette-style',
		get_stylesheet_uri(),
		array( 'urban-charrette-fonts' ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style(
		'urban-charrette-hero',
		get_template_directory_uri() . '/assets/css/hero.css',
		array( 'urban-charrette-fonts' ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script(
		'urban-charrette-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}

add_action( 'wp_enqueue_scripts', 'urban_charrette_enqueue_assets' );


// Hero and Footer Customizer Settings
function urban_charrette_add_customizer_settings( $wp_customize ) {
	
	// Hero Section
	$wp_customize->add_section( 'urban_charrette_hero', array(
		'title' => __( 'Hero Section', 'urban-charrette' ),
		'priority' => 119,
	) );

	// Hero Background Image
	$wp_customize->add_setting( 'urban_charrette_hero_background', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'urban_charrette_hero_background', array(
		'label' => __( 'Hero Background Image', 'urban-charrette' ),
		'section' => 'urban_charrette_hero',
		'settings' => 'urban_charrette_hero_background',
	) ) );

	// Hero Heading
	$wp_customize->add_setting( 'urban_charrette_hero_heading', array(
		'default' => 'Char-rette • [shuh-ret] • noun',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_hero_heading', array(
		'label' => __( 'Hero Heading', 'urban-charrette' ),
		'section' => 'urban_charrette_hero',
		'type' => 'textarea',
	) );

	// Hero Definition
	$wp_customize->add_setting( 'urban_charrette_hero_definition', array(
		'default' => '– an intense, collaborative design process.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_hero_definition', array(
		'label' => __( 'Hero Definition', 'urban-charrette' ),
		'section' => 'urban_charrette_hero',
		'type' => 'textarea',
	) );

	// Card 1 (Learn)
	$wp_customize->add_setting( 'urban_charrette_hero_card_1_title', array(
		'default' => 'Learn',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_hero_card_1_title', array(
		'label' => __( 'Card 1 Title', 'urban-charrette' ),
		'section' => 'urban_charrette_hero',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_hero_card_1_subtitle', array(
		'default' => 'our mission',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_hero_card_1_subtitle', array(
		'label' => __( 'Card 1 Subtitle', 'urban-charrette' ),
		'section' => 'urban_charrette_hero',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_hero_card_1_link', array(
		'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_hero_card_1_link', array(
		'label' => __( 'Card 1 Link URL', 'urban-charrette' ),
		'section' => 'urban_charrette_hero',
		'type' => 'text',
	) );

	// Card 2 (Donate)
	$wp_customize->add_setting( 'urban_charrette_hero_card_2_title', array(
		'default' => 'Donate',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_hero_card_2_title', array(
		'label' => __( 'Card 2 Title', 'urban-charrette' ),
		'section' => 'urban_charrette_hero',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_hero_card_2_subtitle', array(
		'default' => 'to the cause',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_hero_card_2_subtitle', array(
		'label' => __( 'Card 2 Subtitle', 'urban-charrette' ),
		'section' => 'urban_charrette_hero',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_hero_card_2_link', array(
		'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_hero_card_2_link', array(
		'label' => __( 'Card 2 Link URL', 'urban-charrette' ),
		'section' => 'urban_charrette_hero',
		'type' => 'text',
	) );

	// Card 3 (Attend)
	$wp_customize->add_setting( 'urban_charrette_hero_card_3_title', array(
		'default' => 'Attend',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_hero_card_3_title', array(
		'label' => __( 'Card 3 Title', 'urban-charrette' ),
		'section' => 'urban_charrette_hero',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_hero_card_3_subtitle', array(
		'default' => 'local events',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_hero_card_3_subtitle', array(
		'label' => __( 'Card 3 Subtitle', 'urban-charrette' ),
		'section' => 'urban_charrette_hero',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_hero_card_3_link', array(
		'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_hero_card_3_link', array(
		'label' => __( 'Card 3 Link URL', 'urban-charrette' ),
		'section' => 'urban_charrette_hero',
		'type' => 'text',
	) );

	// Footer Section
	$wp_customize->add_section( 'urban_charrette_footer', array(
		'title' => __( 'Footer Settings', 'urban-charrette' ),
		'priority' => 120,
	) );

	// Tagline
	$wp_customize->add_setting( 'urban_charrette_footer_tagline', array(
		'default' => 'Subscribe to stay up to date on news and events.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_footer_tagline', array(
		'label' => __( 'Subscription Tagline', 'urban-charrette' ),
		'description' => __( 'Allows HTML tags: &lt;strong&gt; &lt;em&gt; &lt;a&gt; &lt;br&gt;', 'urban-charrette' ),
		'section' => 'urban_charrette_footer',
		'type' => 'textarea',
	) );

	// Consent Text
	$wp_customize->add_setting( 'urban_charrette_footer_consent', array(
		'default' => 'By subscribing you agree to with our Privacy Policy and provide consent to receive updates from our company.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_footer_consent', array(
		'label' => __( 'Consent Text', 'urban-charrette' ),
		'description' => __( 'Allows HTML tags: &lt;strong&gt; &lt;em&gt; &lt;a&gt; &lt;br&gt;', 'urban-charrette' ),
		'section' => 'urban_charrette_footer',
		'type' => 'textarea',
	) );

	// CTA Section
	$wp_customize->add_section( 'urban_charrette_cta', array(
		'title' => __( 'CTA Settings', 'urban-charrette' ),
		'priority' => 121,
	) );

	// CTA Title
	$wp_customize->add_setting( 'urban_charrette_cta_title', array(
		'default' => 'Committed to the community through creative interventions.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_cta_title', array(
		'label' => __( 'CTA Title', 'urban-charrette' ),
		'section' => 'urban_charrette_cta',
		'type' => 'textarea',
	) );

	// CTA Subtitle
	$wp_customize->add_setting( 'urban_charrette_cta_subtitle', array(
		'default' => 'Learn how you can get involved with the Urban Charrette and help shape our community.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_cta_subtitle', array(
		'label' => __( 'CTA Subtitle', 'urban-charrette' ),
		'section' => 'urban_charrette_cta',
		'type' => 'textarea',
	) );

	// CTA Background Image
	$wp_customize->add_setting( 'urban_charrette_cta_background', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'urban_charrette_cta_background', array(
		'label' => __( 'CTA Background Image', 'urban-charrette' ),
		'section' => 'urban_charrette_cta',
		'settings' => 'urban_charrette_cta_background',
	) ) );
}

add_action( 'customize_register', 'urban_charrette_add_customizer_settings' );
