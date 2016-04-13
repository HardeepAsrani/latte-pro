<?php
$latte = wp_get_theme( 'latte-pro' );

?>
<div class="col one-col" style="overflow: hidden;">
	<div class="col">
		<div class="boxed enrich">
			<h1 class="latte-title"><?php echo '<strong>' . esc_attr( $latte['Name'] ) . '</strong> <sup class="version">' . esc_attr( $latte['Version'] ) . '</sup>'; ?></h1>
			<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/Latte.png'; ?>" alt="<?php esc_html_e( 'Latte', 'latte' ); ?>" class="image-latte" />
			<p><?php echo esc_html( $latte['Description'] ); ?></p>
			<p>
				<a href="<?php echo esc_url( self_admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e('Visit Customizer', 'latte' ); ?></a>
				<a href="http://www.hardeepasrani.com/portfolio/latte/" class="button button-primary" target="_blank"><?php esc_html_e( 'More Info', 'latte' ); ?></a>
			</p>
		</div>
	</div>
</div>

<div class="col two-col" style="overflow: hidden;">
	<div class="col">
		<div class="boxed whatsnew">
			<h2><?php printf( esc_html__( 'What\'s new in %s?', 'latte' ), esc_attr( $latte['Version'] ) ); ?></h2>
			<p><?php printf( esc_html__( 'Take a look at everything that\'s new in the latest version:', 'latte' ) ); ?></p>
			<ul>
				<li><?php printf( __('<strong>Customizer Improvements:</strong> Preview your changes without refreshing Customizer.', 'latte') ); ?></li>
				<li><?php printf( __('<strong>Welcome Panel:</strong> This version adds a Welcome Panel to the theme which tells you everything that you need to know about the theme.', 'latte') ); ?></li>
			</ul>
		</div>
	</div>
	<div class="col">
		<div class="boxed extension">
			<h2><?php esc_html_e( 'Author\'s Note', 'latte' ); ?></h2>
			<p><?php printf( __( 'WordPress 4.5 update broke some little things so we had to push this update as soon as possible. Originally we were planning to add more features but this update is out way before it was supposed to be. Hope you like the new features. :)', 'latte' ) ); ?></p>
		</div>
	</div>
</div>
