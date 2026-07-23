<?php
/**
 * Projects & Engagements Template Part
 *
 * @package Urban Charrette
 */

$title = get_theme_mod( 'urban_charrette_projects_title', 'Projects & Engagements' );
$view_all_text = get_theme_mod( 'urban_charrette_projects_view_all_text', 'View All Projects' );
$view_all_url = get_theme_mod( 'urban_charrette_projects_view_all_url', '#' );

// Projects data
$projects = array(
	array(
		'image' => get_theme_mod( 'urban_charrette_projects_project_1_image', '' ),
		'title' => get_theme_mod( 'urban_charrette_projects_project_1_title', 'ECO.lution' ),
		'description' => get_theme_mod( 'urban_charrette_projects_project_1_description', 'ECO.lution is an annual series of community focused interactive events designed to encourage Tampa to make sustainable choices.' ),
		'link_text' => get_theme_mod( 'urban_charrette_projects_project_1_link_text', 'View project' ),
		'link_url' => get_theme_mod( 'urban_charrette_projects_project_1_link_url', '#' ),
	),
	array(
		'image' => get_theme_mod( 'urban_charrette_projects_project_2_image', '' ),
		'title' => get_theme_mod( 'urban_charrette_projects_project_2_title', 'Water Taxi Charrette' ),
		'description' => get_theme_mod( 'urban_charrette_projects_project_2_description', 'The Tampa Downtown Partnership retained the services of the Urban Charrette to plan and facilitate a design charrette focused on the potential for a water taxi service in the downtown Tampa area.' ),
		'link_text' => get_theme_mod( 'urban_charrette_projects_project_2_link_text', 'View project' ),
		'link_url' => get_theme_mod( 'urban_charrette_projects_project_2_link_url', '#' ),
	),
	array(
		'image' => get_theme_mod( 'urban_charrette_projects_project_3_image', '' ),
		'title' => get_theme_mod( 'urban_charrette_projects_project_3_title', 'SDAT Tampa' ),
		'description' => get_theme_mod( 'urban_charrette_projects_project_3_description', 'In 2008, The Urban Charrette, applied for and received a Sustainable Design Assessment Team (SDAT) grant from the American Institute of Architects Center for Communities by Design.' ),
		'link_text' => get_theme_mod( 'urban_charrette_projects_project_3_link_text', 'View project' ),
		'link_url' => get_theme_mod( 'urban_charrette_projects_project_3_link_url', '#' ),
	),
);
?>

<section class="projects">
	<!-- Top Wave -->
	<svg class="projects__wave-top" width="1440" height="99" viewBox="0 0 1440 99" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
		<rect width="1440" height="99" fill="white"/>
		<path d="M832.525 92.5001C799.984 95.0001 758.372 92.1001 723.816 87.2002C689.835 82.3003 621.73 63.7006 579.11 51.5009C469.969 19.3014 386.601 7.00166 301.794 1.80175C267.813 -0.298218 231.673 -1.69819 152.913 4.3017C74.1525 10.3016 0 29.9012 0 29.9012V99L1440 99V68.7005C1440 68.7005 1336.33 36.1011 1211.93 38.2011C1155.48 38.9011 1078.31 44.901 1018.99 60.6007C988.461 68.7005 943.826 78.8004 904.23 84.8003C865.065 91.1001 847.355 91.5001 832.525 92.5001Z" fill="#EE4525"/>
	</svg>

	<div class="projects__container">
		<div class="projects__header">
			<h2 class="projects__title"><?php echo esc_html( $title ); ?></h2>
		</div>

		<div class="projects__grid">
			<?php foreach ( $projects as $project ) : ?>
				<div class="projects__card">
					<?php if ( ! empty( $project['image'] ) ) : ?>
						<img src="<?php echo esc_url( $project['image'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>" class="projects__card-image">
					<?php else : ?>
						<div style="width: 100%; height: 240px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #999;">
							<span><?php esc_html_e( 'Upload image', 'urban-charrette' ); ?></span>
						</div>
					<?php endif; ?>

					<div class="projects__card-content">
						<h3 class="projects__card-title"><?php echo esc_html( $project['title'] ); ?></h3>
						<p class="projects__card-text"><?php echo esc_html( $project['description'] ); ?></p>
						
						<?php if ( ! empty( $project['link_text'] ) && ! empty( $project['link_url'] ) ) : ?>
							<a href="<?php echo esc_url( $project['link_url'] ); ?>" class="projects__card-link">
								<?php echo esc_html( $project['link_text'] ); ?>
								<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
									<path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</a>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="projects__footer">
			<?php if ( ! empty( $view_all_text ) && ! empty( $view_all_url ) ) : ?>
				<a href="<?php echo esc_url( $view_all_url ); ?>" class="projects__view-all">
					<?php echo esc_html( $view_all_text ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>

	<!-- Bottom Wave -->
	<svg class="projects__wave-bottom" width="1440" height="78" viewBox="0 0 1440 78" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
		<g clip-path="url(#clip0_2_1713)">
			<rect width="1440" height="78" fill="white"/>
			<path d="M1440 3.3538V0H0V3.3538C1.296 18.0169 182.448 77.3713 720 77.9952C1257.55 78.6192 1440 17.7049 1440 3.3538Z" fill="#EE4525"/>
		</g>
		<defs>
			<clipPath id="clip0_2_1713">
				<rect width="1440" height="78" fill="white"/>
			</clipPath>
		</defs>
	</svg>
</section>
