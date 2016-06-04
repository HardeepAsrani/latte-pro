<?php
	$latte_portfolio_title = get_theme_mod('latte_portfolio_title',__( 'Portfolio', 'latte' ));
	$latte_portfolio_subtitle = get_theme_mod('latte_portfolio_subtitle',__( 'Some of my recent work.', 'latte' ));
	$latte_portfolio_items = get_theme_mod('latte_portfolio_items', 6);
?>

		<section class="portfolio-grid" id="portfolio">
			<div class="container">
				<div class="row">
				<?php if(!empty($latte_portfolio_title) || !empty($latte_portfolio_subtitle) || is_customize_preview()) : ?>
					<header data-sr="ease-in-out wait 0.25s" class="portfolio-header">
					<?php if(!empty($latte_portfolio_title) || is_customize_preview()) : ?>
						<h2><?php echo esc_html($latte_portfolio_title); ?></h2>
					<?php endif; ?>
					<?php if(!empty($latte_portfolio_subtitle) || is_customize_preview()) : ?>
						<h3><?php echo esc_html($latte_portfolio_subtitle); ?></h3>
					<?php endif; ?>
					</header>
				<?php endif; ?>
					<div class="col-md-12">
					<?php if(!empty($latte_portfolio_items)) : ?>
						<?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => intval($latte_portfolio_items) ) ); ?>
					<?php else: ?>
						<?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => -1 ) ); ?>
					<?php endif; ?>
					<?php if ( $loop->have_posts() ) : ?>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div data-sr="ease-in-out wait 0.25s" class="col-md-4 col-sm-6 portfolio-item clearfix">
							<a href="<?php esc_url( the_permalink() ); ?>" class="portfolio-link" >
								<div class="portfolio-hover">
									<div class="portfolio-hover-content">
										<i class="fa fa-plus fa-3x"></i>
									</div>
								</div>
								<?php if ( has_post_thumbnail($post->ID) ) : ?>
									<?php echo get_the_post_thumbnail($post->ID, 'latte-portfolio', array( 'class' => "img-responsive")); ?>
								<?php else: ?>
									<img src="<?php echo get_template_directory_uri().'/assets/images/300x217.png'; ?>" class="img-responsive"/>
								<?php endif; ?>
							</a>
							<div class="portfolio-caption">
								<a href="<?php esc_url( the_permalink() ); ?>"><h4><?php the_title(); ?></h4></a>
								<?php $latte_categories = get_the_terms( $post->ID , 'portfolio_category' ); ?>
								<?php if (!empty( $latte_categories )) : ?>
										<h5><?php echo esc_html($latte_categories[0]->name); ?></h5>
								<?php endif; ?>
							</div>
						</div>
						<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
