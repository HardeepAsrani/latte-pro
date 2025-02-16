<?php get_header(); ?>

		<header class="archive-header">
			<div class="cover-container row">
				<div class="inner cover col-md-12">
					<h1 class="cover-heading"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="lead"><?php bloginfo( 'description' ); ?></p>
				</div>
			</div>
		</header>

		<div class="container blog">
			<div class="row">
			<?php
				$theme_layout = get_post_meta( get_the_ID(), '_latte_layout', TRUE );
				if ($theme_layout=="left") :
					get_sidebar();
				endif;
			?>
			<?php if ($theme_layout=="left" || $theme_layout=="right") : ?>
				<div class="col-lg-8 col-md-8">
			<?php else: ?>
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<?php endif; ?>
				<?php if ( have_posts() ) : ?> 
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'portfolio' ); ?>
					<?php endwhile; ?>=
				<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
				</div>
				<?php
				if ($theme_layout=="right") :
					get_sidebar();
				endif;
				?>
			</div>
		</div>

<?php get_footer(); ?>