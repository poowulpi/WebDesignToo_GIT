<?php
/**
 * Board of Directors Template Part
 *
 * @package Urban Charrette
 */

$title = get_theme_mod( 'urban_charrette_board_title', 'Board of Directors' );
$background_color = get_theme_mod( 'urban_charrette_board_background', '#EE4525' );

// Board members data - up to 12 members
$board_members = array();
for ( $i = 1; $i <= 12; $i++ ) {
	$image = get_theme_mod( "urban_charrette_board_member_{$i}_image", '' );
	$name = get_theme_mod( "urban_charrette_board_member_{$i}_name", '' );
	$title_member = get_theme_mod( "urban_charrette_board_member_{$i}_title", '' );
	$education = get_theme_mod( "urban_charrette_board_member_{$i}_education", '' );
	$favorite_place = get_theme_mod( "urban_charrette_board_member_{$i}_favorite_place", '' );
	
	// Only add if member has a name (required field)
	if ( ! empty( $name ) ) {
		$board_members[] = array(
			'image' => $image,
			'name' => $name,
			'title' => $title_member,
			'education' => $education,
			'favorite_place' => $favorite_place,
		);
	}
}
?>

<section class="board-of-directors" style="background-color: <?php echo esc_attr( $background_color ); ?>;">
	<!-- Top Wave -->
	<svg class="projects__wave-top" width="1440" height="99" viewBox="0 0 1440 99" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
		<rect width="1440" height="99" fill="white"/>
		<path d="M832.525 92.5001C799.984 95.0001 758.372 92.1001 723.816 87.2002C689.835 82.3003 621.73 63.7006 579.11 51.5009C469.969 19.3014 386.601 7.00166 301.794 1.80175C267.813 -0.298218 231.673 -1.69819 152.913 4.3017C74.1525 10.3016 0 29.9012 0 29.9012V99L1440 99V68.7005C1440 68.7005 1336.33 36.1011 1211.93 38.2011C1155.48 38.9011 1078.31 44.901 1018.99 60.6007C988.461 68.7005 943.826 78.8004 904.23 84.8003C865.065 91.1001 847.355 91.5001 832.525 92.5001Z" fill="#EE4525"/>
	</svg>

<section class="projects">
	<!-- Top Wave -->
	<svg class="projects__wave-top" width="1440" height="99" viewBox="0 0 1440 99" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
		<rect width="1440" height="99" fill="white"/>
		<path d="M832.525 92.5001C799.984 95.0001 758.372 92.1001 723.816 87.2002C689.835 82.3003 621.73 63.7006 579.11 51.5009C469.969 19.3014 386.601 7.00166 301.794 1.80175C267.813 -0.298218 231.673 -1.69819 152.913 4.3017C74.1525 10.3016 0 29.9012 0 29.9012V99L1440 99V68.7005C1440 68.7005 1336.33 36.1011 1211.93 38.2011C1155.48 38.9011 1078.31 44.901 1018.99 60.6007C988.461 68.7005 943.826 78.8004 904.23 84.8003C865.065 91.1001 847.355 91.5001 832.525 92.5001Z" fill="#EE4525"/>
	</svg>

	<div class="board-of-directors__container">
		<h2 class="board-of-directors__title"><?php echo esc_html( $title ); ?></h2>

		<?php if ( ! empty( $board_members ) ) : ?>
			<div class="board-of-directors__grid">
				<?php foreach ( $board_members as $member ) : ?>
					<div class="board-of-directors__card">
						<?php if ( ! empty( $member['image'] ) ) : ?>
							<img src="<?php echo esc_url( $member['image'] ); ?>" alt="<?php echo esc_attr( $member['name'] ); ?>" class="board-of-directors__image">
						<?php else : ?>
							<div style="width: 100%; height: 240px; background: #d0d0d0; display: flex; align-items: center; justify-content: center; color: #999;">
								<span><?php esc_html_e( 'No image', 'urban-charrette' ); ?></span>
							</div>
						<?php endif; ?>

						<div class="board-of-directors__content">
							<h3 class="board-of-directors__name"><?php echo esc_html( $member['name'] ); ?></h3>
							
							<?php if ( ! empty( $member['title'] ) ) : ?>
								<p class="board-of-directors__position"><?php echo esc_html( $member['title'] ); ?></p>
							<?php endif; ?>

							<?php if ( ! empty( $member['education'] ) ) : ?>
								<p class="board-of-directors__bio">
									<strong><?php esc_html_e( 'Education:', 'urban-charrette' ); ?></strong> 
									<?php echo esc_html( $member['education'] ); ?>
								</p>
							<?php endif; ?>

							<?php if ( ! empty( $member['favorite_place'] ) ) : ?>
								<p class="board-of-directors__bio">
									<strong><?php esc_html_e( 'Favorite Place in Tampa:', 'urban-charrette' ); ?></strong> 
									<?php echo esc_html( $member['favorite_place'] ); ?>
								</p>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<p style="text-align: center; color: white; padding: 40px 20px;">
				<?php esc_html_e( 'No board members added yet.', 'urban-charrette' ); ?>
			</p>
		<?php endif; ?>
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
