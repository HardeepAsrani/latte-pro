<?php
	$latte_pricing_title = get_theme_mod('latte_pricing_title',__( 'Pricing', 'latte' ));
	$latte_pricing_subtitle = get_theme_mod('latte_pricing_subtitle',__( 'Order before it\'s too late!', 'latte' ));
?>

		<section class="pricing" id="pricing">
			<div class="row">
			<?php if(!empty($latte_pricing_title) || !empty($latte_pricing_subtitle)) : ?>
				<header data-sr="ease-in-out wait 0.25s" class="pricing-header">
				<?php if(!empty($latte_pricing_title)) : ?>
					<h2><?php echo $latte_pricing_title; ?></h2>
				<?php endif; ?>
				<?php if(!empty($latte_pricing_subtitle)) : ?>
					<h3><?php echo $latte_pricing_subtitle; ?></h3>
				<?php endif; ?>
				</header>
			<?php endif; ?>
				<div class="col-md-12 pricing-plans">
				<?php
					if ( is_active_sidebar( 'pricing-widgets' ) ) :
						dynamic_sidebar( 'pricing-widgets' );
					else:
						$args = array(
							'before_widget' => '', 
							'after_widget' => '',
						);
						the_widget( 'latte_pricing_widget', array(
							'title' => __('Package One', 'latte'),
							'subtitle' => __('Package Subtitle.', 'latte'),
							'price' => '$0.00',
							'optionsAr' =>  array(__('Options 1', 'latte'), __('Options 2', 'latte'), __('Options 3', 'latte'), __('Options 4', 'latte'), __('Options 5', 'latte'),),
							'buttontext' => 'Buy',
							'buttonlink' => '#'
						), $args );
						the_widget( 'latte_pricing_widget', array(
							'title' => __('Package Two', 'latte'),
							'subtitle' => __('Package Subtitle.', 'latte'),
							'price' => '$9.99',
							'optionsAr' =>  array(__('Options 1', 'latte'), __('Options 2', 'latte'), __('Options 3', 'latte'), __('Options 4', 'latte'), __('Options 5', 'latte'),),
							'buttontext' => 'Buy',
							'buttonlink' => '#'
						), $args );
						the_widget( 'latte_pricing_widget', array(
							'title' => __('Package Three', 'latte'),
							'subtitle' => __('Package Subtitle.', 'latte'),
							'price' => '$19.99',
							'optionsAr' =>  array(__('Options 1', 'latte'), __('Options 2', 'latte'), __('Options 3', 'latte'), __('Options 4', 'latte'), __('Options 5', 'latte'),),
							'buttontext' => 'Buy',
							'buttonlink' => '#'
						), $args );
					endif;
				?>
				</div>
			</div>
		</section>
