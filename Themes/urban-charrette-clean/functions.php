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

	wp_enqueue_style(
		'urban-charrette-projects',
		get_template_directory_uri() . '/assets/css/projects.css',
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


// All Customizer Settings
function urban_charrette_add_customizer_settings( $wp_customize ) {
	
	// Hero Section
	$wp_customize->add_section( 'urban_charrette_hero', array(
		'title' => __( 'Hero Section', 'urban-charrette' ),
		'priority' => 119,
	) );

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

	for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "urban_charrette_hero_card_{$i}_title", array(
			'default' => $i === 1 ? 'Learn' : ( $i === 2 ? 'Donate' : 'Attend' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_hero_card_{$i}_title", array(
			'label' => __( "Card {$i} Title", 'urban-charrette' ),
			'section' => 'urban_charrette_hero',
			'type' => 'text',
		) );

		$wp_customize->add_setting( "urban_charrette_hero_card_{$i}_subtitle", array(
			'default' => $i === 1 ? 'our mission' : ( $i === 2 ? 'to the cause' : 'local events' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_hero_card_{$i}_subtitle", array(
			'label' => __( "Card {$i} Subtitle", 'urban-charrette' ),
			'section' => 'urban_charrette_hero',
			'type' => 'text',
		) );

		$wp_customize->add_setting( "urban_charrette_hero_card_{$i}_link", array(
			'default' => '#',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_hero_card_{$i}_link", array(
			'label' => __( "Card {$i} Link URL", 'urban-charrette' ),
			'section' => 'urban_charrette_hero',
			'type' => 'text',
		) );
	}

	// What We Do Section
	$wp_customize->add_section( 'urban_charrette_what_we_do', array(
		'title' => __( 'What We Do Section', 'urban-charrette' ),
		'priority' => 119,
	) );

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

	$what_we_do_titles = array( 'Community', 'Facilitation', 'Education' );
	for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "urban_charrette_what_we_do_card_{$i}_image", array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "urban_charrette_what_we_do_card_{$i}_image", array(
			'label' => __( "Card {$i} Image ({$what_we_do_titles[$i-1]})", 'urban-charrette' ),
			'section' => 'urban_charrette_what_we_do',
			'settings' => "urban_charrette_what_we_do_card_{$i}_image",
		) ) );

		$wp_customize->add_setting( "urban_charrette_what_we_do_card_{$i}_title", array(
			'default' => $what_we_do_titles[$i-1],
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_what_we_do_card_{$i}_title", array(
			'label' => __( "Card {$i} Title", 'urban-charrette' ),
			'section' => 'urban_charrette_what_we_do',
			'type' => 'text',
		) );

		$wp_customize->add_setting( "urban_charrette_what_we_do_card_{$i}_description", array(
			'default' => '',
			'sanitize_callback' => 'wp_kses_post',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_what_we_do_card_{$i}_description", array(
			'label' => __( "Card {$i} Description", 'urban-charrette' ),
			'section' => 'urban_charrette_what_we_do',
			'type' => 'textarea',
		) );

		$wp_customize->add_setting( "urban_charrette_what_we_do_card_{$i}_link", array(
			'default' => '#',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_what_we_do_card_{$i}_link", array(
			'label' => __( "Card {$i} Link URL", 'urban-charrette' ),
			'section' => 'urban_charrette_what_we_do',
			'type' => 'text',
		) );

		$wp_customize->add_setting( "urban_charrette_what_we_do_card_{$i}_link_text", array(
			'default' => 'Learn More',
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_what_we_do_card_{$i}_link_text", array(
			'label' => __( "Card {$i} Link Text", 'urban-charrette' ),
			'section' => 'urban_charrette_what_we_do',
			'type' => 'text',
		) );
	}

	// About Section
	$wp_customize->add_section( 'urban_charrette_about', array(
		'title' => __( 'About Section', 'urban-charrette' ),
		'priority' => 119,
	) );

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

	for ( $i = 1; $i <= 2; $i++ ) {
		$label = $i === 1 ? 'Learn More' : 'Get Involved';
		$wp_customize->add_setting( "urban_charrette_about_button_{$i}_text", array(
			'default' => $label,
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_about_button_{$i}_text", array(
			'label' => __( "Button {$i} Text", 'urban-charrette' ),
			'section' => 'urban_charrette_about',
			'type' => 'text',
		) );

		$wp_customize->add_setting( "urban_charrette_about_button_{$i}_url", array(
			'default' => '#',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_about_button_{$i}_url", array(
			'label' => __( "Button {$i} URL", 'urban-charrette' ),
			'section' => 'urban_charrette_about',
			'type' => 'text',
		) );
	}

	// Projects & Engagements Section
	$wp_customize->add_section( 'urban_charrette_projects', array(
		'title' => __( 'Projects & Engagements Section', 'urban-charrette' ),
		'priority' => 119,
	) );

	$wp_customize->add_setting( 'urban_charrette_projects_title', array(
		'default' => 'Projects & Engagements',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_projects_title', array(
		'label' => __( 'Section Title', 'urban-charrette' ),
		'section' => 'urban_charrette_projects',
		'type' => 'text',
	) );

	$project_titles = array( 'ECO.lution', 'Water Taxi Charrette', 'SDAT Tampa' );
	for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "urban_charrette_projects_project_{$i}_image", array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "urban_charrette_projects_project_{$i}_image", array(
			'label' => __( "Project {$i} Image", 'urban-charrette' ),
			'section' => 'urban_charrette_projects',
			'settings' => "urban_charrette_projects_project_{$i}_image",
		) ) );

		$wp_customize->add_setting( "urban_charrette_projects_project_{$i}_title", array(
			'default' => $project_titles[$i-1],
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_projects_project_{$i}_title", array(
			'label' => __( "Project {$i} Title", 'urban-charrette' ),
			'section' => 'urban_charrette_projects',
			'type' => 'text',
		) );

		$wp_customize->add_setting( "urban_charrette_projects_project_{$i}_description", array(
			'default' => '',
			'sanitize_callback' => 'wp_kses_post',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_projects_project_{$i}_description", array(
			'label' => __( "Project {$i} Description", 'urban-charrette' ),
			'section' => 'urban_charrette_projects',
			'type' => 'textarea',
		) );

		$wp_customize->add_setting( "urban_charrette_projects_project_{$i}_link_text", array(
			'default' => 'View project',
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_projects_project_{$i}_link_text", array(
			'label' => __( "Project {$i} Link Text", 'urban-charrette' ),
			'section' => 'urban_charrette_projects',
			'type' => 'text',
		) );

		$wp_customize->add_setting( "urban_charrette_projects_project_{$i}_link_url", array(
			'default' => '#',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_projects_project_{$i}_link_url", array(
			'label' => __( "Project {$i} Link URL", 'urban-charrette' ),
			'section' => 'urban_charrette_projects',
			'type' => 'text',
		) );
	}

	$wp_customize->add_setting( 'urban_charrette_projects_view_all_text', array(
		'default' => 'View All Projects',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_projects_view_all_text', array(
		'label' => __( 'View All Button Text', 'urban-charrette' ),
		'section' => 'urban_charrette_projects',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_projects_view_all_url', array(
		'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_projects_view_all_url', array(
		'label' => __( 'View All Button URL', 'urban-charrette' ),
		'section' => 'urban_charrette_projects',
		'type' => 'text',
	) );

	// Footer Section
	$wp_customize->add_section( 'urban_charrette_footer', array(
		'title' => __( 'Footer Settings', 'urban-charrette' ),
		'priority' => 120,
	) );

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
