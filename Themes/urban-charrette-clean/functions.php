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

	wp_enqueue_style(
		'urban-charrette-what-we-do',
		get_template_directory_uri() . '/assets/css/what-we-do.css',
		array( 'urban-charrette-fonts' ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style(
		'urban-charrette-about',
		get_template_directory_uri() . '/assets/css/about.css',
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


// Hero, What We Do, About, and Footer Customizer Settings
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

	// What We Do Section
	$wp_customize->add_section( 'urban_charrette_what_we_do', array(
		'title' => __( 'What We Do Section', 'urban-charrette' ),
		'priority' => 119,
	) );

	// What We Do Title
	$wp_customize->add_setting( 'urban_charrette_what_we_do_title', array(
		'default' => 'What We Do',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_title', array(
		'label' => __( 'Section Title', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'text',
	) );

	// What We Do Description
	$wp_customize->add_setting( 'urban_charrette_what_we_do_description', array(
		'default' => 'The Urban Charrette facilitates connections between the community and the built environment by cultivating awareness of respectful urban design through dialogue, collaboration, and education.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_description', array(
		'label' => __( 'Section Description', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'textarea',
	) );

	// Card 1 (Community)
	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_1_image', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'urban_charrette_what_we_do_card_1_image', array(
		'label' => __( 'Card 1 Image (Community)', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'settings' => 'urban_charrette_what_we_do_card_1_image',
	) ) );

	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_1_title', array(
		'default' => 'Community',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_card_1_title', array(
		'label' => __( 'Card 1 Title', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_1_description', array(
		'default' => 'The Urban Charrette is committed to community through creative interventions. We continue to engage and educate our neighbors about the built environment and it\'s impacts towards smarter growth.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_card_1_description', array(
		'label' => __( 'Card 1 Description', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'textarea',
	) );

	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_1_link', array(
		'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_card_1_link', array(
		'label' => __( 'Card 1 Link URL', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_1_link_text', array(
		'default' => 'Learn More',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_card_1_link_text', array(
		'label' => __( 'Card 1 Link Text', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'text',
	) );

	// Card 2 (Facilitation)
	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_2_image', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'urban_charrette_what_we_do_card_2_image', array(
		'label' => __( 'Card 2 Image (Facilitation)', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'settings' => 'urban_charrette_what_we_do_card_2_image',
	) ) );

	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_2_title', array(
		'default' => 'Facilitation',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_card_2_title', array(
		'label' => __( 'Card 2 Title', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_2_description', array(
		'default' => 'Fostering partnerships between local agencies, design professionals, and engaged citizens is a core component of the Urban Charrette. We believe in bringing people together and creating consensus.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_card_2_description', array(
		'label' => __( 'Card 2 Description', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'textarea',
	) );

	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_2_link', array(
		'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_card_2_link', array(
		'label' => __( 'Card 2 Link URL', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_2_link_text', array(
		'default' => 'Learn More',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_card_2_link_text', array(
		'label' => __( 'Card 2 Link Text', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'text',
	) );

	// Card 3 (Education)
	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_3_image', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'urban_charrette_what_we_do_card_3_image', array(
		'label' => __( 'Card 3 Image (Education)', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'settings' => 'urban_charrette_what_we_do_card_3_image',
	) ) );

	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_3_title', array(
		'default' => 'Education',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_card_3_title', array(
		'label' => __( 'Card 3 Title', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_3_description', array(
		'default' => 'The Urban Charrette helps to educate the general public about the importance of urban design in the development by providing opportunities for the community to participate in open discourse.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_card_3_description', array(
		'label' => __( 'Card 3 Description', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'textarea',
	) );

	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_3_link', array(
		'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_card_3_link', array(
		'label' => __( 'Card 3 Link URL', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_what_we_do_card_3_link_text', array(
		'default' => 'Learn More',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_what_we_do_card_3_link_text', array(
		'label' => __( 'Card 3 Link Text', 'urban-charrette' ),
		'section' => 'urban_charrette_what_we_do',
		'type' => 'text',
	) );

	// About Section
	$wp_customize->add_section( 'urban_charrette_about', array(
		'title' => __( 'About Section', 'urban-charrette' ),
		'priority' => 119,
	) );

	// About Title
	$wp_customize->add_setting( 'urban_charrette_about_title', array(
		'default' => 'About the Urban Charrette',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_about_title', array(
		'label' => __( 'About Title', 'urban-charrette' ),
		'section' => 'urban_charrette_about',
		'type' => 'text',
	) );

	// About Text 1
	$wp_customize->add_setting( 'urban_charrette_about_text_1', array(
		'default' => 'The Urban Charrette facilitates connections between the community and the built environment by cultivating awareness of respectful urban design through dialogue, collaboration, and education.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_about_text_1', array(
		'label' => __( 'About Text 1', 'urban-charrette' ),
		'section' => 'urban_charrette_about',
		'type' => 'textarea',
	) );

	// About Text 2
	$wp_customize->add_setting( 'urban_charrette_about_text_2', array(
		'default' => 'We are a private, not-for-profit organization whose primary goal is to educate citizens on the importance of quality urban design in shaping more beautiful, sustainable, and authentic cities. We host educational forums and consensus building workshops incorporating meaningful and broad-based public participation. Founded in Tampa, the Urban Charrette believes in leading by example to develop a more socially, economically and sustainable local environment that addresses the needs of young professionals, children, families, and the aging.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_about_text_2', array(
		'label' => __( 'About Text 2', 'urban-charrette' ),
		'section' => 'urban_charrette_about',
		'type' => 'textarea',
	) );

	// About Image
	$wp_customize->add_setting( 'urban_charrette_about_image', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'urban_charrette_about_image', array(
		'label' => __( 'About Image', 'urban-charrette' ),
		'section' => 'urban_charrette_about',
		'settings' => 'urban_charrette_about_image',
	) ) );

	// Button 1 (Learn More)
	$wp_customize->add_setting( 'urban_charrette_about_button_1_text', array(
		'default' => 'Learn More',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_about_button_1_text', array(
		'label' => __( 'Button 1 Text (Secondary - Outlined)', 'urban-charrette' ),
		'section' => 'urban_charrette_about',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_about_button_1_url', array(
		'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_about_button_1_url', array(
		'label' => __( 'Button 1 URL', 'urban-charrette' ),
		'section' => 'urban_charrette_about',
		'type' => 'text',
	) );

	// Button 2 (Get Involved)
	$wp_customize->add_setting( 'urban_charrette_about_button_2_text', array(
		'default' => 'Get Involved',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_about_button_2_text', array(
		'label' => __( 'Button 2 Text (Primary - Filled)', 'urban-charrette' ),
		'section' => 'urban_charrette_about',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_about_button_2_url', array(
		'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_about_button_2_url', array(
		'label' => __( 'Button 2 URL', 'urban-charrette' ),
		'section' => 'urban_charrette_about',
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
