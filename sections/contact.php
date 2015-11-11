<?php
	$latte_contact_title = get_theme_mod('latte_contact_title',__( 'Contact', 'latte' ));
	$latte_contact_subtitle = get_theme_mod('latte_contact_subtitle',__( 'Let\'s talk.', 'latte' ));
	$latte_contact_code = get_theme_mod('latte_contact_code');
?>

		<section class="contact" id="contact">
			<div class="row">
			<?php if(!empty($latte_contact_title) || !empty($latte_contact_subtitle)) : ?>
				<header data-sr="ease-in-out wait 0.25s" class="contact-header">
				<?php if(!empty($latte_contact_title)) : ?>
					<h2><?php echo $latte_contact_title; ?></h2>
				<?php endif; ?>
				<?php if(!empty($latte_contact_subtitle)) : ?>
					<h3><?php echo $latte_contact_subtitle; ?></h3>
				<?php endif; ?>
				</header>
			<?php endif; ?>
				<div class="col-md-12">
				<?php if(!empty($latte_contact_code)) : echo do_shortcode(''.$latte_contact_code.''); endif; ?>
				</div>
			</div>
		</section>
