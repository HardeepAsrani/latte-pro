<?php
	$latte_testimonials_title = get_theme_mod('latte_testimonials_title',__( 'Testimonials', 'latte' ));
	$latte_testimonials_subtitle = get_theme_mod('latte_testimonials_subtitle',__( 'Here\'s what the clients have to say.', 'latte' ));
?>

		<section class="testimonials" id="testimonials">
			<div class="container">
				<div class="row">
					<?php if(!empty($latte_testimonials_title) || !empty($latte_testimonials_subtitle)) : ?>
						<header data-sr="ease-in-out wait 0.25s" class="testimonials-header">
						<?php if(!empty($latte_testimonials_title)) : ?>
							<h2><?php echo esc_html($latte_testimonials_title); ?></h2>
						<?php endif; ?>
						<?php if(!empty($latte_testimonials_subtitle)) : ?>
							<h3><?php echo esc_html($latte_testimonials_subtitle); ?></h3>
						<?php endif; ?>
						</header>
					<?php endif; ?>
					<div class="col-md-12">
						<div data-sr="ease-in-out wait 0.25s" class="swiper-container testimonials-container">
							<div class="swiper-wrapper testimonials-wrapper">
							<?php
								if ( is_active_sidebar( 'testimonials-widgets' ) ) :
									dynamic_sidebar( 'testimonials-widgets' );
								else:
									$args = array(
										'before_widget' => '', 
										'after_widget' => '',
									);
									the_widget( 'latte_testimonials_widget', array(
										'testimonial' => esc_html__('"Design is not just what it looks like and feels like. Design is how it works."', 'latte'),
										'name' => esc_html__('Steve Jobs', 'latte'),
										'company' => esc_html__('Apple', 'latte'),
									), $args );
									the_widget( 'latte_testimonials_widget', array(
										'testimonial' => esc_html__('"Your most unhappy customers are your greatest source of learning."', 'latte'),
										'name' => esc_html__('Bill Gates', 'latte'),
										'company' => esc_html__('Microsoft', 'latte'),
									), $args );
									the_widget( 'latte_testimonials_widget', array(
										'testimonial' => esc_html__('"I\'ve actually not read any books on time management."', 'latte'),
										'name' => esc_html__('Elon Musk', 'latte'),
										'company' => esc_html__('Tesla Motors', 'latte'),
									), $args );	
							endif;
							?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
