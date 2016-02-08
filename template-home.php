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

	$section1 = get_theme_mod('section_intro_order','section_intro');
	$section2 = get_theme_mod('section_about_order','section_about');
	$section3 = get_theme_mod('section_social_order','section_social');
	$section4 = get_theme_mod('section_services_order','section_services');
	$section5 = get_theme_mod('section_separator_order','section_separator');
	$section6 = get_theme_mod('section_skills_order','section_skills');
	$section7 = get_theme_mod('section_portfolio_order','section_portfolio');
	$section8 = get_theme_mod('section_subscribe_order','section_subscribe');
	$section9 = get_theme_mod('section_pricing_order','section_pricing');
	$section10 = get_theme_mod('section_testimonials_order','section_testimonials');
	$section11 = get_theme_mod('section_blogposts_order','section_blogposts');
	$section12 = get_theme_mod('section_map_order','section_map');
	$section13 = get_theme_mod('section_contact_order','section_contact');
	
	$sections[0] = $section1;
	$sections[1] = $section2;
	$sections[2] = $section3;
	$sections[3] = $section4;
	$sections[4] = $section5;
	$sections[5] = $section6;
	$sections[6] = $section7;
	$sections[7] = $section8;
	$sections[8] = $section9;
	$sections[9] = $section10;
	$sections[10] = $section11;
	$sections[11] = $section12;
	$sections[12] = $section13;

	for ($i = 0; $i < 13; $i++):
		if( !empty($sections[$i]) ):
			switch ( $sections[$i] ) :

				case "section_intro":
					if( isset($latte_intro_display) && $latte_intro_display != 1 ):
						get_template_part( 'sections/intro' );
					endif;
				break;

				case "section_about":
					if( isset($latte_about_display) && $latte_about_display != 1 ):
						get_template_part( 'sections/about' );
					endif;
				break;

				case "section_social":
					if( isset($latte_social_display) && $latte_social_display != 1 ):
						get_template_part( 'sections/social' );
					endif;
				break;

				case "section_services":
					if( isset($latte_services_display) && $latte_services_display != 1 ):
						get_template_part( 'sections/services' );
					endif;
				break;

				case "section_separator":
					if( isset($latte_separator_display) && $latte_separator_display != 1 ):
						get_template_part( 'sections/separator' );
					endif;
				break;

				case "section_skills":
					if( isset($latte_skills_display) && $latte_skills_display != 1 ):
						get_template_part( 'sections/skills' );
					endif;
				break;

				case "section_portfolio":
					if( isset($latte_portfolio_display) && $latte_portfolio_display != 1 ):
						get_template_part( 'sections/portfolio' );
					endif;
				break;

				case "section_subscribe":
					if( isset($latte_subscribe_display) && $latte_subscribe_display != 1 ):
						get_template_part( 'sections/subscribe' );
					endif;
				break;

				case "section_pricing":
					if( isset($latte_pricing_display) && $latte_pricing_display != 1 ):
						get_template_part( 'sections/pricing' );
					endif;
				break;

				case "section_testimonials":
					if( isset($latte_testimonials_display) && $latte_testimonials_display != 1 ):
						get_template_part( 'sections/testimonials' );
					endif;
				break;

				case "section_blogposts":
					if( isset($latte_blogposts_display) && $latte_blogposts_display != 1 ):
						get_template_part( 'sections/blogposts' );
					endif;
				break;

				case "section_map":
					if( isset($latte_map_display) && $latte_map_display != 1 ):
						get_template_part( 'sections/map' );
					endif;
				break;

				case "section_contact":
					if( isset($latte_contact_display) && $latte_contact_display != 1 ):
						get_template_part( 'sections/contact' );
					endif;
				break;

			endswitch;
		endif;
	endfor;

	get_footer();

?>
