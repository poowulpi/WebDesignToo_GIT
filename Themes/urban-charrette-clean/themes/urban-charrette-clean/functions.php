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


// Register sidebars/widget areas
function urban_charrette_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Events Section', 'urban-charrette' ),
			'id'            => 'urban-charrette-events',
			'description'   => __( 'Widgets in this area will be shown in the Events section', 'urban-charrette' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'urban_charrette_widgets_init' );


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
		'urban-charrette-page-header',
		get_template_directory_uri() . '/assets/css/page-header.css',
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

	wp_enqueue_style(
		'urban-charrette-events',
		get_template_directory_uri() . '/assets/css/events.css',
		array( 'urban-charrette-fonts' ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style(
		'urban-charrette-text-left-image-right',
		get_template_directory_uri() . '/assets/css/text-left-image-right.css',
		array( 'urban-charrette-fonts' ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style(
		'urban-charrette-text-left-text-right',
		get_template_directory_uri() . '/assets/css/text-left-text-right.css',
		array( 'urban-charrette-fonts' ),
		wp_get_theme()->get( 'Version' )
	);


	wp_enqueue_style(
		'urban-charrette-board-of-directors',
		get_template_directory_uri() . '/assets/css/board-of-directors.css',
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

	// Events Section
	$wp_customize->add_section( 'urban_charrette_events', array(
		'title' => __( 'Events Section', 'urban-charrette' ),
		'priority' => 119,
	) );

	$wp_customize->add_setting( 'urban_charrette_events_title', array(
		'default' => 'Events',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_events_title', array(
		'label' => __( 'Section Title', 'urban-charrette' ),
		'section' => 'urban_charrette_events',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_events_description', array(
		'default' => 'Stay updated with our upcoming events and programs.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_events_description', array(
		'label' => __( 'Section Description', 'urban-charrette' ),
		'section' => 'urban_charrette_events',
		'type' => 'textarea',
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


// Page Header Meta Box (per-page customization)
function urban_charrette_add_page_header_meta_box() {
	add_meta_box(
		'urban_charrette_page_header',
		__( 'Page Header Settings', 'urban-charrette' ),
		'urban_charrette_render_page_header_meta_box',
		array( 'page', 'post' ),
		'normal',
		'high'
	);
}

add_action( 'add_meta_boxes', 'urban_charrette_add_page_header_meta_box' );


function urban_charrette_render_page_header_meta_box( $post ) {
	wp_nonce_field( 'urban_charrette_page_header_nonce', 'urban_charrette_page_header_nonce' );
	
	$enabled = get_post_meta( $post->ID, 'page_header_enabled', true );
	$title = get_post_meta( $post->ID, 'page_header_title', true );
	$subtitle = get_post_meta( $post->ID, 'page_header_subtitle', true );
	$background = get_post_meta( $post->ID, 'page_header_background', true );
	$button_text = get_post_meta( $post->ID, 'page_header_button_text', true );
	$button_url = get_post_meta( $post->ID, 'page_header_button_url', true );
	?>

	<div style="margin-bottom: 20px;">
		<label style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
			<input type="checkbox" name="page_header_enabled" value="1" <?php checked( $enabled, '1' ); ?> />
			<strong><?php _e( 'Enable Custom Page Header', 'urban-charrette' ); ?></strong>
		</label>
		<small><?php _e( 'When unchecked, falls back to global CTA settings from Customizer.', 'urban-charrette' ); ?></small>
	</div>

	<hr />

	<div style="margin-bottom: 15px;">
		<label for="page_header_title"><strong><?php _e( 'Title', 'urban-charrette' ); ?></strong></label>
		<input type="text" id="page_header_title" name="page_header_title" value="<?php echo esc_attr( $title ); ?>" style="width: 100%; padding: 10px; font-size: 14px;" />
	</div>

	<div style="margin-bottom: 15px;">
		<label for="page_header_subtitle"><strong><?php _e( 'Subtitle / Description', 'urban-charrette' ); ?></strong></label>
		<textarea id="page_header_subtitle" name="page_header_subtitle" style="width: 100%; height: 100px; padding: 10px; font-size: 14px;"><?php echo esc_textarea( $subtitle ); ?></textarea>
	</div>

	<div style="margin-bottom: 15px;">
		<label for="page_header_background"><strong><?php _e( 'Background Image', 'urban-charrette' ); ?></strong></label>
		<div id="page_header_background_preview" style="margin-bottom: 10px; max-width: 300px;">
			<?php if ( $background ) : ?>
				<img src="<?php echo esc_url( $background ); ?>" style="max-width: 100%; border-radius: 4px;" />
			<?php endif; ?>
		</div>
		<input type="hidden" id="page_header_background" name="page_header_background" value="<?php echo esc_attr( $background ); ?>" />
		<button type="button" class="button button-primary" id="page_header_background_button"><?php _e( 'Select Image', 'urban-charrette' ); ?></button>
		<?php if ( $background ) : ?>
			<button type="button" class="button" id="page_header_background_remove" style="margin-left: 5px;"><?php _e( 'Remove', 'urban-charrette' ); ?></button>
		<?php endif; ?>
	</div>

	<hr />

	<div style="margin-bottom: 15px;">
		<label for="page_header_button_text"><strong><?php _e( 'Button Text (Optional)', 'urban-charrette' ); ?></strong></label>
		<input type="text" id="page_header_button_text" name="page_header_button_text" value="<?php echo esc_attr( $button_text ); ?>" style="width: 100%; padding: 10px; font-size: 14px;" placeholder="e.g., Learn More" />
	</div>

	<div style="margin-bottom: 15px;">
		<label for="page_header_button_url"><strong><?php _e( 'Button URL (Optional)', 'urban-charrette' ); ?></strong></label>
		<input type="text" id="page_header_button_url" name="page_header_button_url" value="<?php echo esc_url( $button_url ); ?>" style="width: 100%; padding: 10px; font-size: 14px;" placeholder="e.g., https://example.com" />
	</div>

	<script>
		(function() {
			let frame;

			document.getElementById('page_header_background_button').addEventListener('click', function(e) {
				e.preventDefault();
				if (frame) {
					frame.open();
					return;
				}

				frame = wp.media({
					title: '<?php _e( 'Select Background Image', 'urban-charrette' ); ?>',
					multiple: false,
					library: { type: 'image' },
				});

				frame.on('select', function() {
					const attachment = frame.state().get('selection').first().toJSON();
					document.getElementById('page_header_background').value = attachment.url;
					document.getElementById('page_header_background_preview').innerHTML = '<img src="' + attachment.url + '" style="max-width: 100%; border-radius: 4px;" />';

					const removeBtn = document.getElementById('page_header_background_remove');
					if (!removeBtn) {
						const newBtn = document.createElement('button');
						newBtn.type = 'button';
						newBtn.className = 'button';
						newBtn.id = 'page_header_background_remove';
						newBtn.style.marginLeft = '5px';
						newBtn.textContent = '<?php _e( 'Remove', 'urban-charrette' ); ?>';
						document.getElementById('page_header_background_button').parentNode.insertBefore(newBtn, document.getElementById('page_header_background_button').nextSibling);
						newBtn.addEventListener('click', removeImage);
					}
				});

				frame.open();
			});

			function removeImage(e) {
				e.preventDefault();
				document.getElementById('page_header_background').value = '';
				document.getElementById('page_header_background_preview').innerHTML = '';
				const btn = document.getElementById('page_header_background_remove');
				if (btn) btn.remove();
			}

			const removeBtn = document.getElementById('page_header_background_remove');
			if (removeBtn) {
				removeBtn.addEventListener('click', removeImage);
			}
		})();
	</script>
	<?php
}


function urban_charrette_save_page_header_meta( $post_id ) {
	if ( ! isset( $_POST['urban_charrette_page_header_nonce'] ) || 
		 ! wp_verify_nonce( $_POST['urban_charrette_page_header_nonce'], 'urban_charrette_page_header_nonce' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'page_header_enabled',
		'page_header_title',
		'page_header_subtitle',
		'page_header_background',
		'page_header_button_text',
		'page_header_button_url',
	);

	foreach ( $fields as $field ) {
		if ( $field === 'page_header_enabled' ) {
			$value = isset( $_POST[ $field ] ) ? '1' : '';
		} elseif ( $field === 'page_header_background' ) {
			$value = isset( $_POST[ $field ] ) ? esc_url_raw( $_POST[ $field ] ) : '';
		} elseif ( $field === 'page_header_button_url' ) {
			$value = isset( $_POST[ $field ] ) ? esc_url_raw( $_POST[ $field ] ) : '';
		} else {
			$value = isset( $_POST[ $field ] ) ? sanitize_text_field( $_POST[ $field ] ) : '';
		}

		if ( $value ) {
			update_post_meta( $post_id, $field, $value );
		} else {
			delete_post_meta( $post_id, $field );
		}
	}
}

add_action( 'save_post', 'urban_charrette_save_page_header_meta' );


// Text Left Image Right Meta Box (per-page customization)
function urban_charrette_add_text_left_image_right_meta_box() {
	add_meta_box(
		'urban_charrette_text_left_image_right',
		__( 'Text Left Image Right Settings', 'urban-charrette' ),
		'urban_charrette_render_text_left_image_right_meta_box',
		array( 'page', 'post' ),
		'normal',
		'high'
	);
}

add_action( 'add_meta_boxes', 'urban_charrette_add_text_left_image_right_meta_box' );


function urban_charrette_render_text_left_image_right_meta_box( $post ) {
	wp_nonce_field( 'urban_charrette_text_left_image_right_nonce', 'urban_charrette_text_left_image_right_nonce' );

	$enabled = get_post_meta( $post->ID, 'text_left_image_right_enabled', true );
	$title = get_post_meta( $post->ID, 'text_left_image_right_title', true );
	$text = get_post_meta( $post->ID, 'text_left_image_right_text', true );
	$image = get_post_meta( $post->ID, 'text_left_image_right_image', true );
	$button_1_text = get_post_meta( $post->ID, 'text_left_image_right_button_1_text', true );
	$button_1_url = get_post_meta( $post->ID, 'text_left_image_right_button_1_url', true );
	$button_2_text = get_post_meta( $post->ID, 'text_left_image_right_button_2_text', true );
	$button_2_url = get_post_meta( $post->ID, 'text_left_image_right_button_2_url', true );
	?>

	<div style="margin-bottom: 20px;">
		<label style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
			<input type="checkbox" name="text_left_image_right_enabled" value="1" <?php checked( $enabled, '1' ); ?> />
			<strong><?php _e( 'Enable Custom Text Left Image Right Section', 'urban-charrette' ); ?></strong>
		</label>
		<small><?php _e( 'When unchecked, falls back to global About settings from Customizer.', 'urban-charrette' ); ?></small>
	</div>

	<hr />

	<div style="margin-bottom: 15px;">
		<label for="text_left_image_right_title"><strong><?php _e( 'Title', 'urban-charrette' ); ?></strong></label>
		<input type="text" id="text_left_image_right_title" name="text_left_image_right_title" value="<?php echo esc_attr( $title ); ?>" style="width: 100%; padding: 10px; font-size: 14px;" />
	</div>

	<div style="margin-bottom: 15px;">
		<label for="text_left_image_right_text"><strong><?php _e( 'Content', 'urban-charrette' ); ?></strong></label>
		<textarea id="text_left_image_right_text" name="text_left_image_right_text" style="width: 100%; height: 150px; padding: 10px; font-size: 14px;"><?php echo esc_textarea( $text ); ?></textarea>
	</div>

	<div style="margin-bottom: 15px;">
		<label for="text_left_image_right_image"><strong><?php _e( 'Image', 'urban-charrette' ); ?></strong></label>
		<div id="text_left_image_right_image_preview" style="margin-bottom: 10px; max-width: 300px;">
			<?php if ( $image ) : ?>
				<img src="<?php echo esc_url( $image ); ?>" style="max-width: 100%; border-radius: 4px;" />
			<?php endif; ?>
		</div>
		<input type="hidden" id="text_left_image_right_image" name="text_left_image_right_image" value="<?php echo esc_attr( $image ); ?>" />
		<button type="button" class="button button-primary" id="text_left_image_right_image_button"><?php _e( 'Select Image', 'urban-charrette' ); ?></button>
		<?php if ( $image ) : ?>
			<button type="button" class="button" id="text_left_image_right_image_remove" style="margin-left: 5px;"><?php _e( 'Remove', 'urban-charrette' ); ?></button>
		<?php endif; ?>
	</div>

	<hr />

	<div style="margin-bottom: 15px;">
		<label for="text_left_image_right_button_1_text"><strong><?php _e( 'Button 1 Text', 'urban-charrette' ); ?></strong></label>
		<input type="text" id="text_left_image_right_button_1_text" name="text_left_image_right_button_1_text" value="<?php echo esc_attr( $button_1_text ); ?>" style="width: 100%; padding: 10px; font-size: 14px;" />
	</div>

	<div style="margin-bottom: 15px;">
		<label for="text_left_image_right_button_1_url"><strong><?php _e( 'Button 1 URL', 'urban-charrette' ); ?></strong></label>
		<input type="text" id="text_left_image_right_button_1_url" name="text_left_image_right_button_1_url" value="<?php echo esc_url( $button_1_url ); ?>" style="width: 100%; padding: 10px; font-size: 14px;" />
	</div>

	<div style="margin-bottom: 15px;">
		<label for="text_left_image_right_button_2_text"><strong><?php _e( 'Button 2 Text', 'urban-charrette' ); ?></strong></label>
		<input type="text" id="text_left_image_right_button_2_text" name="text_left_image_right_button_2_text" value="<?php echo esc_attr( $button_2_text ); ?>" style="width: 100%; padding: 10px; font-size: 14px;" />
	</div>

	<div style="margin-bottom: 15px;">
		<label for="text_left_image_right_button_2_url"><strong><?php _e( 'Button 2 URL', 'urban-charrette' ); ?></strong></label>
		<input type="text" id="text_left_image_right_button_2_url" name="text_left_image_right_button_2_url" value="<?php echo esc_url( $button_2_url ); ?>" style="width: 100%; padding: 10px; font-size: 14px;" />
	</div>

	<script>
		(function() {
			let frame;

			document.getElementById('text_left_image_right_image_button').addEventListener('click', function(e) {
				e.preventDefault();
				if (frame) {
					frame.open();
					return;
				}

				frame = wp.media({
					title: '<?php _e( 'Select Image', 'urban-charrette' ); ?>',
					multiple: false,
					library: { type: 'image' },
				});

				frame.on('select', function() {
					const attachment = frame.state().get('selection').first().toJSON();
					document.getElementById('text_left_image_right_image').value = attachment.url;
					document.getElementById('text_left_image_right_image_preview').innerHTML = '<img src="' + attachment.url + '" style="max-width: 100%; border-radius: 4px;" />';

					const removeBtn = document.getElementById('text_left_image_right_image_remove');
					if (!removeBtn) {
						const newBtn = document.createElement('button');
						newBtn.type = 'button';
						newBtn.className = 'button';
						newBtn.id = 'text_left_image_right_image_remove';
						newBtn.style.marginLeft = '5px';
						newBtn.textContent = '<?php _e( 'Remove', 'urban-charrette' ); ?>';
						document.getElementById('text_left_image_right_image_button').parentNode.insertBefore(newBtn, document.getElementById('text_left_image_right_image_button').nextSibling);
						newBtn.addEventListener('click', removeImage);
					}
				});

				frame.open();
			});

			function removeImage(e) {
				e.preventDefault();
				document.getElementById('text_left_image_right_image').value = '';
				document.getElementById('text_left_image_right_image_preview').innerHTML = '';
				const btn = document.getElementById('text_left_image_right_image_remove');
				if (btn) btn.remove();
			}

			const removeBtn = document.getElementById('text_left_image_right_image_remove');
			if (removeBtn) {
				removeBtn.addEventListener('click', removeImage);
			}
		})();
	</script>
	<?php
}


function urban_charrette_save_text_left_image_right_meta( $post_id ) {
	if ( ! isset( $_POST['urban_charrette_text_left_image_right_nonce'] ) || 
		 ! wp_verify_nonce( $_POST['urban_charrette_text_left_image_right_nonce'], 'urban_charrette_text_left_image_right_nonce' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'text_left_image_right_enabled',
		'text_left_image_right_title',
		'text_left_image_right_text',
		'text_left_image_right_image',
		'text_left_image_right_button_1_text',
		'text_left_image_right_button_1_url',
		'text_left_image_right_button_2_text',
		'text_left_image_right_button_2_url',
	);

	foreach ( $fields as $field ) {
		if ( $field === 'text_left_image_right_enabled' ) {
			$value = isset( $_POST[ $field ] ) ? '1' : '';
		} elseif ( $field === 'text_left_image_right_image' ) {
			$value = isset( $_POST[ $field ] ) ? esc_url_raw( $_POST[ $field ] ) : '';
		} elseif ( strpos( $field, '_url' ) !== false ) {
			$value = isset( $_POST[ $field ] ) ? esc_url_raw( $_POST[ $field ] ) : '';
		} elseif ( $field === 'text_left_image_right_text' ) {
			$value = isset( $_POST[ $field ] ) ? wp_kses_post( $_POST[ $field ] ) : '';
		} else {
			$value = isset( $_POST[ $field ] ) ? sanitize_text_field( $_POST[ $field ] ) : '';
		}

		if ( $value ) {
			update_post_meta( $post_id, $field, $value );
		} else {
			delete_post_meta( $post_id, $field );
		}
	}
}

add_action( 'save_post', 'urban_charrette_save_text_left_image_right_meta' );


// Text Left Text Right Meta Box
function urban_charrette_add_text_left_text_right_meta_box() {
	add_meta_box(
		'urban_charrette_text_left_text_right',
		__( 'Text Left Text Right Settings', 'urban-charrette' ),
		'urban_charrette_render_text_left_text_right_meta_box',
		array( 'page', 'post' ),
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'urban_charrette_add_text_left_text_right_meta_box' );

function urban_charrette_render_text_left_text_right_meta_box( $post ) {
	wp_nonce_field( 'urban_charrette_text_left_text_right_nonce', 'urban_charrette_text_left_text_right_nonce' );
	$enabled = get_post_meta( $post->ID, 'text_left_text_right_enabled', true );
	$title = get_post_meta( $post->ID, 'text_left_text_right_title', true );
	$text_left = get_post_meta( $post->ID, 'text_left_text_right_left', true );
	$text_right = get_post_meta( $post->ID, 'text_left_text_right_right', true );
	?>
	<div style="margin-bottom: 20px;">
		<label style="display: flex; align-items: center; gap: 10px;">
			<input type="checkbox" name="text_left_text_right_enabled" value="1" <?php checked( $enabled, '1' ); ?> />
			<strong><?php _e( 'Enable Custom Section', 'urban-charrette' ); ?></strong>
		</label>
	</div>
	<hr />
	<div style="margin-bottom: 15px;">
		<label for="text_left_text_right_title"><strong><?php _e( 'Title', 'urban-charrette' ); ?></strong></label>
		<input type="text" id="text_left_text_right_title" name="text_left_text_right_title" value="<?php echo esc_attr( $title ); ?>" style="width: 100%; padding: 10px;" />
	</div>
	<div style="margin-bottom: 15px;">
		<label for="text_left_text_right_left"><strong><?php _e( 'Left Column', 'urban-charrette' ); ?></strong></label>
		<textarea id="text_left_text_right_left" name="text_left_text_right_left" style="width: 100%; height: 150px; padding: 10px; font-family: monospace;"><?php echo esc_textarea( $text_left ); ?></textarea>
	</div>
	<div style="margin-bottom: 15px;">
		<label for="text_left_text_right_right"><strong><?php _e( 'Right Column', 'urban-charrette' ); ?></strong></label>
		<textarea id="text_left_text_right_right" name="text_left_text_right_right" style="width: 100%; height: 150px; padding: 10px; font-family: monospace;"><?php echo esc_textarea( $text_right ); ?></textarea>
	</div>
	<?php
}

function urban_charrette_save_text_left_text_right_meta( $post_id ) {
	if ( ! isset( $_POST['urban_charrette_text_left_text_right_nonce'] ) || ! wp_verify_nonce( $_POST['urban_charrette_text_left_text_right_nonce'], 'urban_charrette_text_left_text_right_nonce' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$fields = array( 'text_left_text_right_enabled', 'text_left_text_right_title', 'text_left_text_right_left', 'text_left_text_right_right' );
	foreach ( $fields as $field ) {
		if ( $field === 'text_left_text_right_enabled' ) {
			$value = isset( $_POST[ $field ] ) ? '1' : '';
		} elseif ( strpos( $field, 'text_left' ) !== false || strpos( $field, 'text_right' ) !== false ) {
			$value = isset( $_POST[ $field ] ) ? wp_kses_post( $_POST[ $field ] ) : '';
		} else {
			$value = isset( $_POST[ $field ] ) ? sanitize_text_field( $_POST[ $field ] ) : '';
		}
		if ( $value ) {
			update_post_meta( $post_id, $field, $value );
		} else {
			delete_post_meta( $post_id, $field );
		}
	}
}
add_action( 'save_post', 'urban_charrette_save_text_left_text_right_meta' );


// Board of Directors Customizer Settings
function urban_charrette_add_board_customizer_settings( $wp_customize ) {
	$wp_customize->add_section( 'urban_charrette_board', array(
		'title' => __( 'Board of Directors', 'urban-charrette' ),
		'priority' => 119,
	) );

	$wp_customize->add_setting( 'urban_charrette_board_title', array(
		'default' => 'Board of Directors',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'urban_charrette_board_title', array(
		'label' => __( 'Section Title', 'urban-charrette' ),
		'section' => 'urban_charrette_board',
		'type' => 'text',
	) );

	$wp_customize->add_setting( 'urban_charrette_board_background', array(
		'default' => '#EE4525',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'urban_charrette_board_background', array(
		'label' => __( 'Background Color', 'urban-charrette' ),
		'section' => 'urban_charrette_board',
		'settings' => 'urban_charrette_board_background',
	) ) );

	// Add 12 board members
	for ( $i = 1; $i <= 12; $i++ ) {
		$wp_customize->add_setting( "urban_charrette_board_member_{$i}_image", array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "urban_charrette_board_member_{$i}_image", array(
			'label' => __( "Member {$i} Image", 'urban-charrette' ),
			'section' => 'urban_charrette_board',
			'settings' => "urban_charrette_board_member_{$i}_image",
		) ) );

		$wp_customize->add_setting( "urban_charrette_board_member_{$i}_name", array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_board_member_{$i}_name", array(
			'label' => __( "Member {$i} Name", 'urban-charrette' ),
			'section' => 'urban_charrette_board',
			'type' => 'text',
		) );

		$wp_customize->add_setting( "urban_charrette_board_member_{$i}_title", array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_board_member_{$i}_title", array(
			'label' => __( "Member {$i} Position", 'urban-charrette' ),
			'section' => 'urban_charrette_board',
			'type' => 'text',
		) );

		$wp_customize->add_setting( "urban_charrette_board_member_{$i}_education", array(
			'default' => '',
			'sanitize_callback' => 'wp_kses_post',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_board_member_{$i}_education", array(
			'label' => __( "Member {$i} Education", 'urban-charrette' ),
			'section' => 'urban_charrette_board',
			'type' => 'textarea',
		) );

		$wp_customize->add_setting( "urban_charrette_board_member_{$i}_favorite_place", array(
			'default' => '',
			'sanitize_callback' => 'wp_kses_post',
			'transport' => 'refresh',
		) );

		$wp_customize->add_control( "urban_charrette_board_member_{$i}_favorite_place", array(
			'label' => __( "Member {$i} Favorite Place in Tampa", 'urban-charrette' ),
			'section' => 'urban_charrette_board',
			'type' => 'textarea',
		) );
	}
}

add_action( 'customize_register', 'urban_charrette_add_board_customizer_settings' );
