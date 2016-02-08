<?php
	$latte_separator_content = get_theme_mod('latte_separator_content',__( 'Code is poetry.', 'latte' ));
	$latte_separator_button = get_theme_mod('latte_separator_button',__( 'Join Now!', 'latte' ));
	$latte_separator_link = get_theme_mod('latte_separator_link', '#social');
?>

		<section class="separator" id="separator">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					<?php if(!empty($latte_separator_content)) : ?>
						<h2 data-sr="enter top wait 0.25s"><?php echo $latte_separator_content; ?></h2>
					<?php endif; ?>
					<?php if(!empty($latte_separator_button)) : ?>
						<?php if(!empty($latte_separator_link)) : ?>
							<a data-sr="enter bottom wait 0.25s" class="btn btn-lg btn-success" href="<?php echo $latte_separator_link; ?>"><?php echo $latte_separator_button; ?></a>
						<?php else: ?>
							<span data-sr="enter bottom wait 0.25s" class="btn btn-lg btn-success" ><?php echo $latte_separator_button; ?></span>
						<?php endif; ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
