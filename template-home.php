<?php 
/**
 * Template Name: Homepage Template
 */
	get_header();

	$latte_intro_display = get_theme_mod('latte_intro_display');
	$latte_about_display = get_theme_mod('latte_about_display');
	$latte_social_display = get_theme_mod('latte_social_display');
	$latte_services_display = get_theme_mod('latte_services_display');
	$latte_separator_display = get_theme_mod('latte_separator_display');
	$latte_skills_display = get_theme_mod('latte_skills_display');
	$latte_portfolio_display = get_theme_mod('latte_portfolio_display', 1);
	$latte_subscribe_display = get_theme_mod('latte_subscribe_display', 1);
	$latte_pricing_display = get_theme_mod('latte_pricing_display');
	$latte_testimonials_display = get_theme_mod('latte_testimonials_display');
	$latte_blogposts_display = get_theme_mod('latte_blogposts_display');
	$latte_map_display = get_theme_mod('latte_map_display');
	$latte_contact_display = get_theme_mod('latte_contact_display', 1);

	if( isset($latte_intro_display) && $latte_intro_display != 1 ):
		get_template_part( 'sections/intro' );
	endif;

	if( isset($latte_about_display) && $latte_about_display != 1 ):
		get_template_part( 'sections/about' );
	endif;

	if( isset($latte_social_display) && $latte_social_display != 1 ):
		get_template_part( 'sections/social' );
	endif;

	if( isset($latte_services_display) && $latte_services_display != 1 ):
		get_template_part( 'sections/services' );
	endif;

	if( isset($latte_separator_display) && $latte_separator_display != 1 ):
		get_template_part( 'sections/separator' );
	endif;

	if( isset($latte_skills_display) && $latte_skills_display != 1 ):
		get_template_part( 'sections/skills' );
	endif;

	if( isset($latte_portfolio_display) && $latte_portfolio_display != 1 ):
		get_template_part( 'sections/portfolio' );
	endif;

	if( isset($latte_subscribe_display) && $latte_subscribe_display != 1 ):
		get_template_part( 'sections/subscribe' );
	endif;

	if( isset($latte_pricing_display) && $latte_pricing_display != 1 ):
		get_template_part( 'sections/pricing' );
	endif;

	if( isset($latte_testimonials_display) && $latte_testimonials_display != 1 ):
		get_template_part( 'sections/testimonials' );
	endif;

	if( isset($latte_blogposts_display) && $latte_blogposts_display != 1 ):
		get_template_part( 'sections/blogposts' );
	endif;

	if( isset($latte_map_display) && $latte_map_display != 1 ):
		get_template_part( 'sections/map' );
	endif;

	if( isset($latte_contact_display) && $latte_contact_display != 1 ):
		get_template_part( 'sections/contact' );
	endif;

	get_footer();

?>