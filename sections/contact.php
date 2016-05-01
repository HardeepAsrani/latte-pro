<?php
	$latte_contact_title = get_theme_mod('latte_contact_title',__( 'Contact', 'latte' ));
	$latte_contact_subtitle = get_theme_mod('latte_contact_subtitle',__( 'Let\'s talk.', 'latte' ));
	$latte_contact_code = get_theme_mod('latte_contact_code');
?>

		<section class="contact" id="contact">
			<div class="container">
				<div class="row">
				<?php if(!empty($latte_contact_title) || !empty($latte_contact_subtitle) || is_customize_preview()) : ?>
					<header data-sr="ease-in-out wait 0.25s" class="contact-header">
					<?php if(!empty($latte_contact_title) || is_customize_preview()) : ?>
						<h2><?php echo esc_html($latte_contact_title); ?></h2>
					<?php endif; ?>
					<?php if(!empty($latte_contact_subtitle) || is_customize_preview()) : ?>
						<h3><?php echo esc_html($latte_contact_subtitle); ?></h3>
					<?php endif; ?>
					</header>
				<?php endif; ?>
					<div class="col-md-12">
					<?php if(!empty($latte_contact_code)) : echo do_shortcode(''.wp_kses_post($latte_contact_code).''); endif; ?>
					</div>
				</div>
			</div>
		</section>
