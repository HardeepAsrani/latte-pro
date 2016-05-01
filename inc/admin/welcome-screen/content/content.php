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

<div class="col one-col" style="overflow: hidden;">
	<div class="col">
		<div class="boxed whatsnew">
			<h2><?php printf( esc_html__( 'What\'s new in %s?', 'latte' ), esc_attr( $latte['Version'] ) ); ?></h2>
			<p><?php printf( esc_html__( 'Take a look at everything that\'s new in the latest version:', 'latte' ) ); ?></p>
			<ul>
				<li><?php printf( __('<strong>More Social Icons:</strong> Now add social icons just by putting its URL and theme will select the icons automatically. Is your favorite icon missing? Feel free to contact via my website.', 'latte') ); ?></li>
				<li><?php printf( __('<strong>Single Background:</strong> Don\'t want so many images? You can now set a single image for the parallax background from Intro settings.', 'latte') ); ?></li>
			</ul>
		</div>
	</div>
</div>
