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
				<li><?php printf( __('<strong>New Layout:</strong> About section now has two layouts to choose from. Want different layouts for other sections? Let us know!', 'latte') ); ?></li>
				<li><?php printf( __('<strong>Image Options in Services Widget:</strong> In addition to icons, Services widgets now allow you to display images.', 'latte') ); ?></li>
				<li><?php printf( __('<strong>Skills Color Picker:</strong> Choosing colors can be hard so we added a color picker to the Skills widget to make it easier.', 'latte') ); ?></li>
				<li><?php printf( __('<strong>More Icons:</strong> Added more icons to the theme, which were requested by users.', 'latte') ); ?></li>
				<li><?php printf( __('<strong>Bug Fixes:</strong> We fixed tons of bugs in this update. Don\'t forget to let us know if you see any.', 'latte') ); ?></li>
			</ul>
		</div>
		<div class="boxed hire">
			<h2><?php printf( esc_html__( 'Need help with customization?', 'latte' ) ); ?></h2>
			<p><?php printf( __( 'If you want to hire someone to customize the theme for you then <a target="_blank" href="http://www.hardeepasrani.com/contact/">click here</a>.', 'latte' ) ); ?></p>
		</div>
	</div>
</div>
