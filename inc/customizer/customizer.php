<?php
/*
 * Register settings for the Theme Customizer.
*/

require_once( trailingslashit( get_template_directory() ) . '/inc/customizer/alpha-control/alpha-control.php' );

function latte_customizer_live_preview() {
	wp_enqueue_script( 'latte_customizer_preview', get_template_directory_uri().'/inc/customizer/customizer-preview.js', array( 'jquery','customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'latte_customizer_live_preview' );

function latte_sanitize_text( $input ) {
	return $input;
}

function latte_sanitize_textbox( $textbox ) {
	return wp_kses_post( force_balance_tags( $textbox ) );
}

function latte_sanitize_checkbox( $input ) {
	if ( $input ) {
		$output = '1';
	} else {
		$output = false;
	}
	return $output;
}

function latte_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );
	
	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

function latte_sanitize_section_order( $input, $setting ) {
	global $wp_customize;

	if ( ! in_array( $input, array(
			'section_intro',
			'section_about',
			'section_social',
			'section_services',
			'section_separator',
			'section_skills',
			'section_portfolio',
			'section_subscribe',
			'section_pricing',
			'section_testimonials',
			'section_blogposts',
			'section_map',
			'section_contact'
		) ) ) {
		$input = $setting->default;
	}

	return $input;
}

function latte_customize_register($wp_customize) {

	class Latte_Portfolio_Widgets_Area extends WP_Customize_Control {
		public function render_content() {
			echo __('The main content of this section is customizable in: Portfolio > Add New, in your WordPress dashboard.','latte');
		}
	}
	class Latte_Subscribe_Widgets_Area extends WP_Customize_Control {
		public function render_content() {
			echo __('The main content of this section is customizable in: Customize > Subscribe Section > Subscribe Section. There you must add the "SendinBlue Newsletter." But first you will need to install <a href="https://wordpress.org/plugins/mailin/" target="_blank">SendinBlue plugin</a>.','latte');
			echo '<br/><br/>';
			echo __('After installing the plugin, you need to navigate to Sendinblue > Home, and configure the plugin.','latte');
			echo '<br/><br/>';
			echo __('And then you need to navigate to its Settings, and use the following in Subscription form:','latte');
			echo '<br/><br/>';
			echo '<textarea style="width:100%;height:180px;font-size:12px;" readonly="">';
			echo __('<input placeholder="Email Address" class="sib-email-area" name="email" required="required" type="email">','latte') . "\n\n";
			echo __('<input placeholder="Name" class="sib-NAME-area" name="NAME" type="text">','latte') . "\n\n";
			echo __('<input class="sib-default-btn btn btn-lg btn-success" value="Subscribe" type="submit">','latte');
			echo '</textarea>';
		}
	}
	class Latte_Blogposts_Widgets_Area extends WP_Customize_Control {
		public function render_content() {
			echo __('The main content of this section is customizable in: Posts > Add New, in your WordPress dashboard.','latte');
		}
	}
	class Latte_Contact_Shortcode_Area extends WP_Customize_Control {
		public function render_content() {
			echo __('In order to add a Contact form to your front page, you will have to install Contact form 7 plugin to your WordPress, from Plugins > Add New, in your WordPress dashboard.','latte');
			echo '<br/><br/>';
			echo __('After installing the plugin, create a new form and use the following code in it:.','latte');
	   		echo '<br/><br/>';
			echo '<textarea style="width:100%;height:180px;font-size:12px;" readonly="">';
			echo '<div data-sr="enter left wait 0.25s" class="col-sm-4">' . "\n";
			echo __('[text* name id:name class:form-control class:name placeholder "Name"]','latte') . "\n";
			echo '</div>' . "\n\n";
			echo '<div data-sr="enter left wait 0.25s" class="col-sm-4">' . "\n";
			echo __('[email* email- id:email class:form-control class:email placeholder "Email"]','latte') . "\n";
			echo '</div>' . "\n\n";
			echo '<div data-sr="enter left wait 0.25s" class="col-sm-4">' . "\n";
			echo __('[text* subject id:subject class:form-control class:subject placeholder "Subject"]','latte') . "\n";
			echo '</div>' . "\n\n";
			echo '<div data-sr="ease-in-out wait 0.25s" class="col-sm-12">' . "\n";
			echo __('[textarea* message id:message class:form-control class:message placeholder "Hi,"]','latte') . "\n";
			echo '</div>' . "\n\n";
			echo '<div data-sr="ease-in-out wait 0.25s" class="col-sm-12">' . "\n";
			echo __('[submit id:submit class:button "Send"]','latte') . "\n";
			echo '</div>';
			echo '</textarea>';
		}
	}

	$wp_customize->add_panel( 'latte_general_settings', array(
		'priority'	   => 5,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('General Settings', 'latte'),
		'description'	=> __('This section allows you to configure general settings.', 'latte')
	));

	$wp_customize->add_panel( 'latte_intro_settings', array(
		'priority'	   => 15,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Intro Section', 'latte'),
		'description'	=> __('This section allows you to configure Intro section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_about_settings', array(
		'priority'	   => 20,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('About Section', 'latte'),
		'description'	=> __('This section allows you to configure About section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_social_settings', array(
		'priority'	   => 25,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Social Section', 'latte'),
		'description'	=> __('This section allows you to configure Social section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_services_settings', array(
		'priority'	   => 30,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Services Section', 'latte'),
		'description'	=> __('This section allows you to configure Services section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_separator_settings', array(
		'priority'	   => 35,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Separator Section', 'latte'),
		'description'	=> __('This section allows you to configure Separator section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_skills_settings', array(
		'priority'	   => 40,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Skills Section', 'latte'),
		'description'	=> __('This section allows you to configure Skills section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_portfolio_settings', array(
		'priority'	   => 45,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Portfolio Section', 'latte'),
		'description'	=> __('This section allows you to configure Portfolio section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_subscribe_settings', array(
		'priority'	   => 50,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Subscribe Section', 'latte'),
		'description'	=> __('This section allows you to configure Subscribe section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_pricing_settings', array(
		'priority'	   => 55,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Pricing Section', 'latte'),
		'description'	=> __('This section allows you to configure Pricing section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_testimonials_settings', array(
		'priority'	   => 60,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Testimonials Section', 'latte'),
		'description'	=> __('This section allows you to configure Testimonials section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_blogposts_settings', array(
		'priority'	   => 65,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Blog Section', 'latte'),
		'description'	=> __('This section allows you to configure Blog section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_map_settings', array(
		'priority'	   => 70,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Map Section', 'latte'),
		'description'	=> __('This section allows you to configure Map section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_contact_settings', array(
		'priority'	   => 75,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Contact Section', 'latte'),
		'description'	=> __('This section allows you to configure Contact section.', 'latte')
	));

	$wp_customize->add_panel( 'latte_blog_settings', array(
		'priority'	   => 80,
		'capability'	 => 'edit_theme_options',
		'title'		  => __('Blog Page', 'latte'),
		'description'	=> __('This section allows you to configure Blog page.', 'latte')
	));

	$wp_customize->get_section( 'title_tagline' )->panel = 'latte_general_settings';
	
	$wp_customize->get_section( 'background_image' )->panel = 'latte_blog_settings';
	
	$wp_customize->get_section( 'background_image' )->title = __('Background', 'latte');
	
	$wp_customize->get_section( 'background_image' )->priority = 5;
	
	$wp_customize->get_section( 'header_image' )->panel = 'latte_blog_settings';
	
	$wp_customize->get_section( 'header_image' )->title = __('Header', 'latte');
	
	$wp_customize->get_section( 'header_image' )->priority = 10;

	$wp_customize->get_section( 'title_tagline' )->priority = 5;
	
	$wp_customize->get_control( 'background_color' )->section = 'background_image';

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->get_setting( 'header_image' )->transport = 'postMessage';

	$wp_customize->get_setting( 'header_image_data'  )->transport = 'postMessage';

	$wp_customize->add_section('latte_general_preloader', array(
		'priority' => 10,
		'title' => __('Preloader', 'latte'),
		'panel'  => 'latte_general_settings'
	));

	$wp_customize->add_section('latte_general_menu', array(
		'priority' => 15,
		'title' => __('Menu', 'latte'),
		'panel'  => 'latte_general_settings'
	));

	$wp_customize->add_section('latte_general_animations', array(
		'priority' => 20,
		'title' => __('Scroll Animations', 'latte'),
		'panel'  => 'latte_general_settings'
	));

	$wp_customize->add_section('latte_general_footer', array(
		'priority' => 25,
		'title' => __('Footer', 'latte'),
		'panel'  => 'latte_general_settings'
	));

	$wp_customize->add_section('latte_sections_order_settings', array(
		'priority' => 10,
		'title' => __('Sections Order', 'latte'),
		'description' => __( 'Here is where you can rearrange the homepage sections.','latte' ),
	));

	$wp_customize->add_section('latte_intro_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_intro_settings'
	));

	$wp_customize->add_section('latte_intro_content', array(
		'priority' => 10,
		'title' => __('Content', 'latte'),
		'panel'  => 'latte_intro_settings'
	));

	$wp_customize->add_section('latte_intro_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_intro_settings'
	));

	$wp_customize->add_section('latte_about_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_about_settings'
	));

	$wp_customize->add_section('latte_about_content', array(
		'priority' => 10,
		'title' => __('Content', 'latte'),
		'panel'  => 'latte_about_settings'
	));

	$wp_customize->add_section('latte_about_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_about_settings'
	));

	$wp_customize->add_section('latte_social_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_social_settings'
	));

	$wp_customize->add_section('latte_social_content', array(
		'priority' => 10,
		'title' => __('Content', 'latte'),
		'panel'  => 'latte_social_settings'
	));

	$wp_customize->add_section('latte_social_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_social_settings'
	));

	$wp_customize->add_section('latte_services_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_services_settings'
	));

	$wp_customize->add_section('latte_services_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_services_settings'
	));

	$wp_customize->add_section('latte_separator_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_separator_settings'
	));

	$wp_customize->add_section('latte_separator_content', array(
		'priority' => 10,
		'title' => __('Content', 'latte'),
		'panel'  => 'latte_separator_settings'
	));

	$wp_customize->add_section('latte_separator_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_separator_settings'
	));

	$wp_customize->add_section('latte_skills_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_skills_settings'
	));

	$wp_customize->add_section('latte_skills_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_skills_settings'
	));

	$wp_customize->add_section('latte_portfolio_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_portfolio_settings'
	));

	$wp_customize->add_section('latte_portfolio_content', array(
		'priority' => 10,
		'title' => __('Content', 'latte'),
		'panel'  => 'latte_portfolio_settings'
	));

	$wp_customize->add_section('latte_portfolio_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_portfolio_settings'
	));

	$wp_customize->add_section('latte_subscribe_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_subscribe_settings'
	));

	$wp_customize->add_section('latte_subscribe_instructions', array(
		'priority' => 10,
		'title' => __('Instructions', 'latte'),
		'panel'  => 'latte_subscribe_settings'
	));

	$wp_customize->add_section('latte_subscribe_colors', array(
		'priority' => 20,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_subscribe_settings'
	));

	$wp_customize->add_section('latte_pricing_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_pricing_settings'
	));

	$wp_customize->add_section('latte_pricing_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_pricing_settings'
	));

	$wp_customize->add_section('latte_testimonials_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_testimonials_settings'
	));

	$wp_customize->add_section('latte_testimonials_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_testimonials_settings'
	));

	$wp_customize->add_section('latte_blogposts_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_blogposts_settings'
	));

	$wp_customize->add_section('latte_blogposts_content', array(
		'priority' => 10,
		'title' => __('Content', 'latte'),
		'panel'  => 'latte_blogposts_settings'
	));

	$wp_customize->add_section('latte_blogposts_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_blogposts_settings'
	));

	$wp_customize->add_section('latte_map_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_map_settings'
	));

	$wp_customize->add_section('latte_map_content', array(
		'priority' => 10,
		'title' => __('Content', 'latte'),
		'panel'  => 'latte_map_settings'
	));

	$wp_customize->add_section('latte_map_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_map_settings'
	));

	$wp_customize->add_section('latte_contact_settings', array(
		'priority' => 5,
		'title' => __('Settings', 'latte'),
		'panel'  => 'latte_contact_settings'
	));

	$wp_customize->add_section('latte_contact_content', array(
		'priority' => 10,
		'title' => __('Content', 'latte'),
		'panel'  => 'latte_contact_settings'
	));

	$wp_customize->add_section('latte_contact_colors', array(
		'priority' => 15,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_contact_settings'
	));

	$wp_customize->add_section('latte_blog_layout', array(
		'priority' => 15,
		'title' => __('Layout', 'latte'),
		'panel'  => 'latte_blog_settings'
	));

	$wp_customize->add_section('latte_blog_colors', array(
		'priority' => 20,
		'title' => __('Colors', 'latte'),
		'panel'  => 'latte_blog_settings'
	));

	$wp_customize->add_setting( 'latte_preloader_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_preloader_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Preloader','latte'),
		'section' => 'latte_general_preloader',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_preloader_image', array(
		'default' => get_template_directory_uri().'/assets/images/loader.gif',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_preloader_image', array(
		'label' => __('Preloader Image', 'latte'),
		'section' => 'latte_general_preloader',
		'priority' => 10,
		'settings' => 'latte_preloader_image'
	)));

	$wp_customize->add_setting('latte_preloader_background', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_preloader_background', array(
		'label' => __('Preloader Background', 'latte'),
		'section' => 'latte_general_preloader',
		'priority' => 15,
		'settings' => 'latte_preloader_background'
	)));

	$wp_customize->add_setting( 'latte_menu_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_menu_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Menu','latte'),
		'section' => 'latte_general_menu',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_menu_icon_color', array(
		'default' => '#000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_menu_icon_color', array(
		'label' => __('Icon', 'latte'),
		'section' => 'latte_general_menu',
		'priority' => 10,
		'settings' => 'latte_menu_icon_color'
	)));

	$wp_customize->add_setting('latte_menu_icon_background', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_menu_icon_background', array(
		'label' => __('Icon Background', 'latte'),
		'section' => 'latte_general_menu',
		'priority' => 15,
		'settings' => 'latte_menu_icon_background'
	)));

	$wp_customize->add_setting('latte_menu_background', array(
		'default' => '#222',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_menu_background', array(
		'label' => __('Background', 'latte'),
		'section' => 'latte_general_menu',
		'priority' => 20,
		'settings' => 'latte_menu_background'
	)));

	$wp_customize->add_setting('latte_menu_header_background', array(
		'default' => '#1A1A1A',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_menu_header_background', array(
		'label' => __('Header Background', 'latte'),
		'section' => 'latte_general_menu',
		'priority' => 25,
		'settings' => 'latte_menu_header_background'
	)));

	$wp_customize->add_setting('latte_menu_text_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_menu_text_color', array(
		'label' => __('Text', 'latte'),
		'section' => 'latte_general_menu',
		'priority' => 30,
		'settings' => 'latte_menu_text_color'
	)));

	$wp_customize->add_setting( 'latte_animations_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_animations_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Scroll Animations','latte'),
		'section' => 'latte_general_animations',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_footer_content', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_textbox',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_footer_content', array(
		'label' => __('Content', 'latte'),
		'section' => 'latte_general_footer',
		'priority' => 5,
		'type' => 'textarea',
		'settings' => 'latte_footer_content'
	));

	$wp_customize->add_setting('latte_footer_background', array(
		'default' => '#272727',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_footer_background', array(
		'label' => __('Footer Background', 'latte'),
		'section' => 'latte_general_footer',
		'priority' => 10,
		'settings' => 'latte_footer_background'
	)));

	$wp_customize->add_setting('latte_footer_text', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_footer_text', array(
		'label' => __('Text', 'latte'),
		'section' => 'latte_general_footer',
		'priority' => 15,
		'settings' => 'latte_footer_text'
	)));

	$wp_customize->add_setting( 'section_intro_order', array( 
		'default' => 'section_intro',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_section_order'
	));
	 
	$wp_customize->add_control( 'section_intro_order', array(
		'type' => 'select',
		'label' => __('First Section','latte'),
		'section' => 'latte_sections_order_settings',
		'choices' => array(
			'section_intro' => __('Intro','latte'),
			'section_about' => __('About','latte'),
			'section_social' => __('Social','latte'),
			'section_services' => __('Services','latte'),
			'section_separator' => __('Separator','latte'),
			'section_skills' => __('Skills','latte'),
			'section_portfolio' => __('Portfolio','latte'),
			'section_subscribe' => __('Subscribe','latte'),
			'section_pricing' => __('Pricing','latte'),
			'section_testimonials' => __('Testimonials','latte'),
			'section_blogposts' => __('Blog','latte'),
			'section_map' => __('Map','latte'),
			'section_contact' => __('Contact','latte')
		),
		'priority' => 5,
		'settings' => 'section_intro_order'
	));

	$wp_customize->add_setting( 'section_about_order', array( 
		'default' => 'section_about',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_section_order'
	));
	 
	$wp_customize->add_control( 'section_about_order', array(
		'type' => 'select',
		'label' => __('Second Section','latte'),
		'section' => 'latte_sections_order_settings',
		'choices' => array(
			'section_intro' => __('Intro','latte'),
			'section_about' => __('About','latte'),
			'section_social' => __('Social','latte'),
			'section_services' => __('Services','latte'),
			'section_separator' => __('Separator','latte'),
			'section_skills' => __('Skills','latte'),
			'section_portfolio' => __('Portfolio','latte'),
			'section_subscribe' => __('Subscribe','latte'),
			'section_pricing' => __('Pricing','latte'),
			'section_testimonials' => __('Testimonials','latte'),
			'section_blogposts' => __('Blog','latte'),
			'section_map' => __('Map','latte'),
			'section_contact' => __('Contact','latte')
		),
		'priority' => 10,
		'settings' => 'section_about_order'
	));

	$wp_customize->add_setting( 'section_social_order', array( 
		'default' => 'section_social',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_section_order'
	));
	 
	$wp_customize->add_control( 'section_social_order', array(
		'type' => 'select',
		'label' => __('Third Section','latte'),
		'section' => 'latte_sections_order_settings',
		'choices' => array(
			'section_intro' => __('Intro','latte'),
			'section_about' => __('About','latte'),
			'section_social' => __('Social','latte'),
			'section_services' => __('Services','latte'),
			'section_separator' => __('Separator','latte'),
			'section_skills' => __('Skills','latte'),
			'section_portfolio' => __('Portfolio','latte'),
			'section_subscribe' => __('Subscribe','latte'),
			'section_pricing' => __('Pricing','latte'),
			'section_testimonials' => __('Testimonials','latte'),
			'section_blogposts' => __('Blog','latte'),
			'section_map' => __('Map','latte'),
			'section_contact' => __('Contact','latte')
		),
		'priority' => 15,
		'settings' => 'section_social_order'
	));

	$wp_customize->add_setting( 'section_services_order', array( 
		'default' => 'section_services',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_section_order'
	));
	 
	$wp_customize->add_control( 'section_services_order', array(
		'type' => 'select',
		'label' => __('Fourth Section','latte'),
		'section' => 'latte_sections_order_settings',
		'choices' => array(
			'section_intro' => __('Intro','latte'),
			'section_about' => __('About','latte'),
			'section_social' => __('Social','latte'),
			'section_services' => __('Services','latte'),
			'section_separator' => __('Separator','latte'),
			'section_skills' => __('Skills','latte'),
			'section_portfolio' => __('Portfolio','latte'),
			'section_subscribe' => __('Subscribe','latte'),
			'section_pricing' => __('Pricing','latte'),
			'section_testimonials' => __('Testimonials','latte'),
			'section_blogposts' => __('Blog','latte'),
			'section_map' => __('Map','latte'),
			'section_contact' => __('Contact','latte')
		),
		'priority' => 20,
		'settings' => 'section_services_order'
	));

	$wp_customize->add_setting( 'section_separator_order', array( 
		'default' => 'section_separator',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_section_order'
	));
	 
	$wp_customize->add_control( 'section_separator_order', array(
		'type' => 'select',
		'label' => __('Fifth Section','latte'),
		'section' => 'latte_sections_order_settings',
		'choices' => array(
			'section_intro' => __('Intro','latte'),
			'section_about' => __('About','latte'),
			'section_social' => __('Social','latte'),
			'section_services' => __('Services','latte'),
			'section_separator' => __('Separator','latte'),
			'section_skills' => __('Skills','latte'),
			'section_portfolio' => __('Portfolio','latte'),
			'section_subscribe' => __('Subscribe','latte'),
			'section_pricing' => __('Pricing','latte'),
			'section_testimonials' => __('Testimonials','latte'),
			'section_blogposts' => __('Blog','latte'),
			'section_map' => __('Map','latte'),
			'section_contact' => __('Contact','latte')
		),
		'priority' => 25,
		'settings' => 'section_separator_order'
	));

	$wp_customize->add_setting( 'section_skills_order', array( 
		'default' => 'section_skills',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_section_order'
	));
	 
	$wp_customize->add_control( 'section_skills_order', array(
		'type' => 'select',
		'label' => __('Sixth Section','latte'),
		'section' => 'latte_sections_order_settings',
		'choices' => array(
			'section_intro' => __('Intro','latte'),
			'section_about' => __('About','latte'),
			'section_social' => __('Social','latte'),
			'section_services' => __('Services','latte'),
			'section_separator' => __('Separator','latte'),
			'section_skills' => __('Skills','latte'),
			'section_portfolio' => __('Portfolio','latte'),
			'section_subscribe' => __('Subscribe','latte'),
			'section_pricing' => __('Pricing','latte'),
			'section_testimonials' => __('Testimonials','latte'),
			'section_blogposts' => __('Blog','latte'),
			'section_map' => __('Map','latte'),
			'section_contact' => __('Contact','latte')
		),
		'priority' => 30,
		'settings' => 'section_skills_order'
	));

	$wp_customize->add_setting( 'section_portfolio_order', array( 
		'default' => 'section_portfolio',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_section_order'
	));
	 
	$wp_customize->add_control( 'section_portfolio_order', array(
		'type' => 'select',
		'label' => __('Seventh Section','latte'),
		'section' => 'latte_sections_order_settings',
		'choices' => array(
			'section_intro' => __('Intro','latte'),
			'section_about' => __('About','latte'),
			'section_social' => __('Social','latte'),
			'section_services' => __('Services','latte'),
			'section_separator' => __('Separator','latte'),
			'section_skills' => __('Skills','latte'),
			'section_portfolio' => __('Portfolio','latte'),
			'section_subscribe' => __('Subscribe','latte'),
			'section_pricing' => __('Pricing','latte'),
			'section_testimonials' => __('Testimonials','latte'),
			'section_blogposts' => __('Blog','latte'),
			'section_map' => __('Map','latte'),
			'section_contact' => __('Contact','latte')
		),
		'priority' => 35,
		'settings' => 'section_portfolio_order'
	));

	$wp_customize->add_setting( 'section_subscribe_order', array( 
		'default' => 'section_subscribe',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_section_order'
	));
	 
	$wp_customize->add_control( 'section_subscribe_order', array(
		'type' => 'select',
		'label' => __('Eighth Section','latte'),
		'section' => 'latte_sections_order_settings',
		'choices' => array(
			'section_intro' => __('Intro','latte'),
			'section_about' => __('About','latte'),
			'section_social' => __('Social','latte'),
			'section_services' => __('Services','latte'),
			'section_separator' => __('Separator','latte'),
			'section_skills' => __('Skills','latte'),
			'section_portfolio' => __('Portfolio','latte'),
			'section_subscribe' => __('Subscribe','latte'),
			'section_pricing' => __('Pricing','latte'),
			'section_testimonials' => __('Testimonials','latte'),
			'section_blogposts' => __('Blog','latte'),
			'section_map' => __('Map','latte'),
			'section_contact' => __('Contact','latte')
		),
		'priority' => 40,
		'settings' => 'section_subscribe_order'
	));

	$wp_customize->add_setting( 'section_pricing_order', array( 
		'default' => 'section_pricing',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_section_order'
	));
	 
	$wp_customize->add_control( 'section_pricing_order', array(
		'type' => 'select',
		'label' => __('Ninth Section','latte'),
		'section' => 'latte_sections_order_settings',
		'choices' => array(
			'section_intro' => __('Intro','latte'),
			'section_about' => __('About','latte'),
			'section_social' => __('Social','latte'),
			'section_services' => __('Services','latte'),
			'section_separator' => __('Separator','latte'),
			'section_skills' => __('Skills','latte'),
			'section_portfolio' => __('Portfolio','latte'),
			'section_subscribe' => __('Subscribe','latte'),
			'section_pricing' => __('Pricing','latte'),
			'section_testimonials' => __('Testimonials','latte'),
			'section_blogposts' => __('Blog','latte'),
			'section_map' => __('Map','latte'),
			'section_contact' => __('Contact','latte')
		),
		'priority' => 45,
		'settings' => 'section_pricing_order'
	));

	$wp_customize->add_setting( 'section_testimonials_order', array( 
		'default' => 'section_testimonials',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_section_order'
	));
	 
	$wp_customize->add_control( 'section_testimonials_order', array(
		'type' => 'select',
		'label' => __('Tenth Section','latte'),
		'section' => 'latte_sections_order_settings',
		'choices' => array(
			'section_intro' => __('Intro','latte'),
			'section_about' => __('About','latte'),
			'section_social' => __('Social','latte'),
			'section_services' => __('Services','latte'),
			'section_separator' => __('Separator','latte'),
			'section_skills' => __('Skills','latte'),
			'section_portfolio' => __('Portfolio','latte'),
			'section_subscribe' => __('Subscribe','latte'),
			'section_pricing' => __('Pricing','latte'),
			'section_testimonials' => __('Testimonials','latte'),
			'section_blogposts' => __('Blog','latte'),
			'section_map' => __('Map','latte'),
			'section_contact' => __('Contact','latte')
		),
		'priority' => 50,
		'settings' => 'section_testimonials_order'
	));

	$wp_customize->add_setting( 'section_blogposts_order', array( 
		'default' => 'section_blogposts',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_section_order'
	));
	 
	$wp_customize->add_control( 'section_blogposts_order', array(
		'type' => 'select',
		'label' => __('Eleventh Section','latte'),
		'section' => 'latte_sections_order_settings',
		'choices' => array(
			'section_intro' => __('Intro','latte'),
			'section_about' => __('About','latte'),
			'section_social' => __('Social','latte'),
			'section_services' => __('Services','latte'),
			'section_separator' => __('Separator','latte'),
			'section_skills' => __('Skills','latte'),
			'section_portfolio' => __('Portfolio','latte'),
			'section_subscribe' => __('Subscribe','latte'),
			'section_pricing' => __('Pricing','latte'),
			'section_testimonials' => __('Testimonials','latte'),
			'section_blogposts' => __('Blog','latte'),
			'section_map' => __('Map','latte'),
			'section_contact' => __('Contact','latte')
		),
		'priority' => 55,
		'settings' => 'section_blogposts_order'
	));

	$wp_customize->add_setting( 'section_map_order', array( 
		'default' => 'section_map',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_section_order'
	));
	 
	$wp_customize->add_control( 'section_map_order', array(
		'type' => 'select',
		'label' => __('Twelfth Section','latte'),
		'section' => 'latte_sections_order_settings',
		'choices' => array(
			'section_intro' => __('Intro','latte'),
			'section_about' => __('About','latte'),
			'section_social' => __('Social','latte'),
			'section_services' => __('Services','latte'),
			'section_separator' => __('Separator','latte'),
			'section_skills' => __('Skills','latte'),
			'section_portfolio' => __('Portfolio','latte'),
			'section_subscribe' => __('Subscribe','latte'),
			'section_pricing' => __('Pricing','latte'),
			'section_testimonials' => __('Testimonials','latte'),
			'section_blogposts' => __('Blog','latte'),
			'section_map' => __('Map','latte'),
			'section_contact' => __('Contact','latte')
		),
		'priority' => 60,
		'settings' => 'section_map_order'
	));

	$wp_customize->add_setting( 'section_contact_order', array( 
		'default' => 'section_contact',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_section_order'
	));
	 
	$wp_customize->add_control( 'section_contact_order', array(
		'type' => 'select',
		'label' => __('Thirteenth Section','latte'),
		'section' => 'latte_sections_order_settings',
		'choices' => array(
			'section_intro' => __('Intro','latte'),
			'section_about' => __('About','latte'),
			'section_social' => __('Social','latte'),
			'section_services' => __('Services','latte'),
			'section_separator' => __('Separator','latte'),
			'section_skills' => __('Skills','latte'),
			'section_portfolio' => __('Portfolio','latte'),
			'section_subscribe' => __('Subscribe','latte'),
			'section_pricing' => __('Pricing','latte'),
			'section_testimonials' => __('Testimonials','latte'),
			'section_blogposts' => __('Blog','latte'),
			'section_map' => __('Map','latte'),
			'section_contact' => __('Contact','latte')
		),
		'priority' => 65,
		'settings' => 'section_contact_order'
	));

	$wp_customize->add_setting( 'latte_intro_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_intro_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Intro Section','latte'),
		'section' => 'latte_intro_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_intro_background', array(
		'default' => get_template_directory_uri().'/assets/images/intro.jpg',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_intro_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_intro_settings',
		'priority' => 10,
		'settings' => 'latte_intro_background'
	)));

	$wp_customize->add_setting('latte_intro_avatar', array(
		'default' => get_template_directory_uri().'/assets/images/avatar.jpg',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_intro_avatar', array(
		'label' => __('Avatar Image', 'latte'),
		'section' => 'latte_intro_content',
		'priority' => 5,
		'settings' => 'latte_intro_avatar'
	)));

	$wp_customize->add_setting('latte_intro_scroll', array(
		'default' => '#about',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_intro_scroll', array(
		'label' => __('Scroll Anchor', 'latte'),
		'section' => 'latte_intro_content',
		'priority' => 10,
		'settings' => 'latte_intro_scroll'
	));

	$wp_customize->add_setting('latte_intro_background_color', array(
		'default' => 'rgba(0, 0, 0, 0.7)',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_intro_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_intro_colors',
		'priority' => 5,
		'settings' => 'latte_intro_background_color'
	)));

	$wp_customize->add_setting('latte_intro_title_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_intro_title_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'latte_intro_colors',
		'priority' => 10,
		'settings' => 'latte_intro_title_color'
	)));

	$wp_customize->add_setting('latte_intro_description_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_intro_description_color', array(
		'label' => __('Description', 'latte'),
		'section' => 'latte_intro_colors',
		'priority' => 15,
		'settings' => 'latte_intro_description_color'
	)));

	$wp_customize->add_setting('latte_intro_anchor_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_intro_anchor_color', array(
		'label' => __('Anchor', 'latte'),
		'section' => 'latte_intro_colors',
		'priority' => 20,
		'settings' => 'latte_intro_anchor_color'
	)));

	$wp_customize->add_setting( 'latte_about_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_about_display',array(
		'type' => 'checkbox',
		'label' => __('Disable About Section','latte'),
		'section' => 'latte_about_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_about_background', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_about_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_about_settings',
		'priority' => 10,
		'settings' => 'latte_about_background'
	)));

	$wp_customize->add_setting('latte_about_title', array(
		'default' => esc_html__('About Me', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_about_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_about_settings',
		'priority' => 15,
		'settings' => 'latte_about_title'
	));
	
	$wp_customize->add_setting('latte_about_subtitle', array(
		'default' => esc_html__('Here are some things that you should know about me.', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_about_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_about_settings',
		'priority' => 20,
		'settings' => 'latte_about_subtitle'
	));

	$wp_customize->add_setting('latte_about_avatar', array(
		'default' => get_template_directory_uri().'/assets/images/383x383.png',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_about_avatar', array(
		'label' => __('Image', 'latte'),
		'section' => 'latte_about_content',
		'priority' => 5,
		'settings' => 'latte_about_avatar'
	)));

	$wp_customize->add_setting('latte_about_name', array(
		'default' => esc_html__('John Doe', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_about_name', array(
		'label' => __('Name', 'latte'),
		'section' => 'latte_about_content',
		'priority' => 10,
		'settings' => 'latte_about_name'
	));

	$wp_customize->add_setting('latte_about_position', array(
		'default' => esc_html__('Web Designer', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_about_position', array(
		'label' => __('Position', 'latte'),
		'section' => 'latte_about_content',
		'priority' => 15,
		'settings' => 'latte_about_position'
	));

	$wp_customize->add_setting('latte_about_content', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_textbox',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_about_content', array(
		'label' => __('Content', 'latte'),
		'section' => 'latte_about_content',
		'priority' => 20,
		'type' => 'textarea',
		'settings' => 'latte_about_content'
	));

	$wp_customize->add_setting('latte_about_background_color', array(
		'default' => '#F5F5F5',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_about_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_about_colors',
		'priority' => 5,
		'settings' => 'latte_about_background_color'
	)));

	$wp_customize->add_setting('latte_about_title_color', array(
		'default' => '#333',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_about_title_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'latte_about_colors',
		'priority' => 10,
		'settings' => 'latte_about_title_color'
	)));

	$wp_customize->add_setting('latte_about_subtitle_color', array(
		'default' => '#9F8E8E',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_about_subtitle_color', array(
		'label' => __('Subtitle', 'latte'),
		'section' => 'latte_about_colors',
		'priority' => 15,
		'settings' => 'latte_about_subtitle_color'
	)));

	$wp_customize->add_setting('latte_about_name_color', array(
		'default' => '#333',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_about_name_color', array(
		'label' => __('Name', 'latte'),
		'section' => 'latte_about_colors',
		'priority' => 20,
		'settings' => 'latte_about_name_color'
	)));

	$wp_customize->add_setting('latte_about_position_color', array(
		'default' => '#777',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_about_position_color', array(
		'label' => __('Position', 'latte'),
		'section' => 'latte_about_colors',
		'priority' => 25,
		'settings' => 'latte_about_position_color'
	)));

	$wp_customize->add_setting('latte_about_content_color', array(
		'default' => '#333',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_about_content_color', array(
		'label' => __('Content', 'latte'),
		'section' => 'latte_about_colors',
		'priority' => 30,
		'settings' => 'latte_about_content_color'
	)));

	$wp_customize->add_setting( 'latte_social_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_social_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Social Section','latte'),
		'section' => 'latte_social_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_social_background', array(
		'default' => get_template_directory_uri().'/assets/images/social.jpg',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_social_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_social_settings',
		'priority' => 10,
		'settings' => 'latte_social_background'
	)));

	$wp_customize->add_setting('latte_social_title', array(
		'default' => esc_html__('Social', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_social_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_social_settings',
		'priority' => 15,
		'settings' => 'latte_social_title'
	));

	$wp_customize->add_setting('latte_social_facebook', array(
		'default' => 'https://www.facebook.com',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_social_facebook', array(
		'label' => __('1. Icon URL', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 5,
		'settings' => 'latte_social_facebook'
	));

	$wp_customize->add_setting('latte_social_facebook_title', array(
		'default' => __('Facebook', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_social_facebook_title', array(
		'label' => __('1. Icon Title', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 10,
		'settings' => 'latte_social_facebook_title'
	));

	$wp_customize->add_setting('latte_social_twitter', array(
		'default' => 'https://www.twitter.com',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_social_twitter', array(
		'label' => __('2. Icon URL', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 15,
		'settings' => 'latte_social_twitter'
	));

	$wp_customize->add_setting('latte_social_twitter_title', array(
		'default' => __('Twitter', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_social_twitter_title', array(
		'label' => __('2. Icon Title', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 20,
		'settings' => 'latte_social_twitter_title'
	));

	$wp_customize->add_setting('latte_social_google_plus', array(
		'default' => 'https://plus.google.com',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_social_google_plus', array(
		'label' => __('3. Icon URL', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 25,
		'settings' => 'latte_social_google_plus'
	));

	$wp_customize->add_setting('latte_social_google_plus_title', array(
		'default' => __('Google +', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_social_google_plus_title', array(
		'label' => __('3. Icon Title', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 30,
		'settings' => 'latte_social_google_plus_title'
	));

	$wp_customize->add_setting('latte_social_instagram', array(
		'default' => 'https://www.instagram.com',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_social_instagram', array(
		'label' => __('4. Icon URL', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 35,
		'settings' => 'latte_social_instagram'
	));

	$wp_customize->add_setting('latte_social_instagram_title', array(
		'default' => __('Instagram', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_social_instagram_title', array(
		'label' => __('4. Icon Title', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 40,
		'settings' => 'latte_social_instagram_title'
	));

	$wp_customize->add_setting('latte_social_github', array(
		'default' => 'https://www.github.com',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_social_github', array(
		'label' => __('5. Icon URL', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 45,
		'settings' => 'latte_social_github'
	));

	$wp_customize->add_setting('latte_social_github_title', array(
		'default' => __('Github', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_social_github_title', array(
		'label' => __('5. Icon Title', 'latte'),
		'section' => 'latte_social_content',
		'priority' => 50,
		'settings' => 'latte_social_github_title'
	));

	$wp_customize->add_setting('latte_social_background_color', array(
		'default' => 'rgba(0, 0, 0, 0.7)',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_social_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_social_colors',
		'priority' => 5,
		'settings' => 'latte_social_background_color'
	)));

	$wp_customize->add_setting('latte_social_title_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_social_title_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'latte_social_colors',
		'priority' => 10,
		'settings' => 'latte_social_title_color'
	)));

	$wp_customize->add_setting('latte_social_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_social_color', array(
		'label' => __('Icon', 'latte'),
		'section' => 'latte_social_colors',
		'priority' => 15,
		'settings' => 'latte_social_color'
	)));

	$wp_customize->add_setting('latte_social_facebook_background', array(
		'default' => '#3B5998',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_social_facebook_background', array(
		'label' => __('1. Icon Hover Background', 'latte'),
		'section' => 'latte_social_colors',
		'priority' => 20,
		'settings' => 'latte_social_facebook_background'
	)));

	$wp_customize->add_setting('latte_social_twitter_background', array(
		'default' => '#0084B4',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_social_twitter_background', array(
		'label' => __('2. Icon Hover Background', 'latte'),
		'section' => 'latte_social_colors',
		'priority' => 25,
		'settings' => 'latte_social_twitter_background'
	)));

	$wp_customize->add_setting('latte_social_google_plus_background', array(
		'default' => '#D34836',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_social_google_plus_background', array(
		'label' => __('3. Icon Hover Background', 'latte'),
		'section' => 'latte_social_colors',
		'priority' => 30,
		'settings' => 'latte_social_google_plus_background'
	)));

	$wp_customize->add_setting('latte_social_instagram_background', array(
		'default' => '#3F729B',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_social_instagram_background', array(
		'label' => __('4. Icon Hover Background', 'latte'),
		'section' => 'latte_social_colors',
		'priority' => 35,
		'settings' => 'latte_social_instagram_background'
	)));

	$wp_customize->add_setting('latte_social_github_background', array(
		'default' => '#000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_social_github_background', array(
		'label' => __('5. Icon Hover Background', 'latte'),
		'section' => 'latte_social_colors',
		'priority' => 40,
		'settings' => 'latte_social_github_background'
	)));

	$wp_customize->add_setting( 'latte_services_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_services_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Services Section','latte'),
		'section' => 'latte_services_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_services_background', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_services_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_services_settings',
		'priority' => 10,
		'settings' => 'latte_services_background'
	)));

	$wp_customize->add_setting('latte_services_title', array(
		'default' => esc_html__('Services', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_services_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_services_settings',
		'priority' => 15,
		'settings' => 'latte_services_title'
	));

	$wp_customize->add_setting('latte_services_subtitle', array(
		'default' => esc_html__('Things that I work on.', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_services_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_services_settings',
		'priority' => 20,
		'settings' => 'latte_services_subtitle'
	));

	$wp_customize->add_setting('latte_services_background_color', array(
		'default' => '#F5F5F5',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_services_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_services_colors',
		'priority' => 5,
		'settings' => 'latte_services_background_color'
	)));

	$wp_customize->add_setting('latte_services_title_color', array(
		'default' => '#333',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_services_title_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'latte_services_colors',
		'priority' => 10,
		'settings' => 'latte_services_title_color'
	)));

	$wp_customize->add_setting('latte_services_subtitle_color', array(
		'default' => '#9F8E8E',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_services_subtitle_color', array(
		'label' => __('Subtitle', 'latte'),
		'section' => 'latte_services_colors',
		'priority' => 15,
		'settings' => 'latte_services_subtitle_color'
	)));

	$wp_customize->add_setting('latte_services_widget_icon_background', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_services_widget_icon_background', array(
		'label' => __('Icon/Title Background', 'latte'),
		'section' => 'latte_services_colors',
		'priority' => 20,
		'settings' => 'latte_services_widget_icon_background'
	)));

	$wp_customize->add_setting('latte_services_widget_icon_color', array(
		'default' => '#5E5E5E',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_services_widget_icon_color', array(
		'label' => __('Icon', 'latte'),
		'section' => 'latte_services_colors',
		'priority' => 25,
		'settings' => 'latte_services_widget_icon_color'
	)));

	$wp_customize->add_setting('latte_services_widget_title_color', array(
		'default' => '#9F8E8E',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_services_widget_title_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'latte_services_colors',
		'priority' => 30,
		'settings' => 'latte_services_widget_title_color'
	)));

	$wp_customize->add_setting('latte_services_widget_text_background', array(
		'default' => '#E0E0E0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_services_widget_text_background', array(
		'label' => __('Text Background', 'latte'),
		'section' => 'latte_services_colors',
		'priority' => 35,
		'settings' => 'latte_services_widget_text_background'
	)));

	$wp_customize->add_setting('latte_services_widget_text_color', array(
		'default' => '#777',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_services_widget_text_color', array(
		'label' => __('Text', 'latte'),
		'section' => 'latte_services_colors',
		'priority' => 40,
		'settings' => 'latte_services_widget_text_color'
	)));

	$wp_customize->add_setting( 'latte_separator_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_separator_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Separator Section','latte'),
		'section' => 'latte_separator_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_separator_background', array(
		'default' => get_template_directory_uri().'/assets/images/separator.jpg',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_separator_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_separator_settings',
		'priority' => 10,
		'settings' => 'latte_separator_background',
	)));

	$wp_customize->add_setting('latte_separator_content', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_textbox',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_separator_content', array(
		'label' => __('Content', 'latte'),
		'section' => 'latte_separator_content',
		'priority' => 5,
		'type' => 'textarea',
		'settings' => 'latte_separator_content'
	));

	$wp_customize->add_setting('latte_separator_button', array(
		'default' => esc_html__('Join Now!', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_separator_button', array(
		'label' => __('Button Label', 'latte'),
		'section' => 'latte_separator_content',
		'priority' => 10,
		'settings' => 'latte_separator_button'
	));

	$wp_customize->add_setting('latte_separator_link', array(
		'default' => '#subscribe',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_separator_link', array(
		'label' => __('Button Link', 'latte'),
		'section' => 'latte_separator_content',
		'priority' => 15,
		'settings' => 'latte_separator_link'
	));

	$wp_customize->add_setting('latte_separator_background_color', array(
		'default' => 'rgba(0, 0, 0, 0.7)',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_separator_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_separator_colors',
		'priority' => 5,
		'settings' => 'latte_separator_background_color'
	)));

	$wp_customize->add_setting('latte_separator_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_separator_color', array(
		'label' => __('Text', 'latte'),
		'section' => 'latte_separator_colors',
		'priority' => 10,
		'settings' => 'latte_separator_color'
	)));

	$wp_customize->add_setting('latte_separator_button_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_separator_button_color', array(
		'label' => __('Button Text', 'latte'),
		'section' => 'latte_separator_colors',
		'priority' => 15,
		'settings' => 'latte_separator_button_color'
	)));

	$wp_customize->add_setting('latte_separator_button_hover_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_separator_button_hover_color', array(
		'label' => __('Button Text Hover', 'latte'),
		'section' => 'latte_separator_colors',
		'priority' => 20,
		'settings' => 'latte_separator_button_hover_color'
	)));

	$wp_customize->add_setting('latte_separator_button_background', array(
		'default' => '#181616',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_separator_button_background', array(
		'label' => __('Button Background', 'latte'),
		'section' => 'latte_separator_colors',
		'priority' => 25,
		'settings' => 'latte_separator_button_background'
	)));

	$wp_customize->add_setting('latte_separator_button_hover_background', array(
		'default' => '#222',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_separator_button_hover_background', array(
		'label' => __('Button Background Hover', 'latte'),
		'section' => 'latte_separator_colors',
		'priority' => 30,
		'settings' => 'latte_separator_button_hover_background'
	)));

	$wp_customize->add_setting( 'latte_skills_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_skills_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Skills Section','latte'),
		'section' => 'latte_skills_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_skills_background', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_skills_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_skills_settings',
		'priority' => 10,
		'settings' => 'latte_skills_background'
	)));

	$wp_customize->add_setting('latte_skills_title', array(
		'default' => esc_html__('Skills', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_skills_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_skills_settings',
		'priority' => 15,
		'settings' => 'latte_skills_title'
	));

	$wp_customize->add_setting('latte_skills_subtitle', array(
		'default' => esc_html__('Things that I\'m good at.', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_skills_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_skills_settings',
		'priority' => 20,
		'settings' => 'latte_skills_subtitle'
	));

	$wp_customize->add_setting('latte_skills_background_color', array(
		'default' => '#F5F5F5',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_skills_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_skills_colors',
		'priority' => 5,
		'settings' => 'latte_skills_background_color'
	)));

	$wp_customize->add_setting('latte_skills_title_color', array(
		'default' => '#333',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_skills_title_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'latte_skills_colors',
		'priority' => 10,
		'settings' => 'latte_skills_title_color'
	)));

	$wp_customize->add_setting('latte_skills_subtitle_color', array(
		'default' => '#9F8E8E',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_skills_subtitle_color', array(
		'label' => __('Subtitle', 'latte'),
		'section' => 'latte_skills_colors',
		'priority' => 15,
		'settings' => 'latte_skills_subtitle_color'
	)));

	$wp_customize->add_setting( 'latte_portfolio_display', array(
		'default' => 1,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_portfolio_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Portfolio Section','latte'),
		'section' => 'latte_portfolio_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_portfolio_background', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_portfolio_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_portfolio_settings',
		'priority' => 10,
		'settings' => 'latte_portfolio_background'
	)));
	
	$wp_customize->add_setting('latte_portfolio_title', array(
		'default' => esc_html__('Portfolio', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_portfolio_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_portfolio_settings',
		'priority' => 15,
		'settings' => 'latte_portfolio_title'
	));

	$wp_customize->add_setting('latte_portfolio_subtitle', array(
		'default' => esc_html__('Some of my recent work.', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_portfolio_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_portfolio_settings',
		'priority' => 20,
		'settings' => 'latte_portfolio_subtitle'
	));

	$wp_customize->add_setting('latte_portfolio_items', array(
		'default' => 6,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_text'
	));

	$wp_customize->add_control('latte_portfolio_items', array(
		'label' => __('Number of Items', 'latte'),
		'section' => 'latte_portfolio_settings',
		'priority' => 25,
		'type' => 'number',
		'settings' => 'latte_portfolio_items'
	));

	$wp_customize->add_setting( 'latte_portfolio_post_type', array(
		'sanitize_callback' => 'latte_sanitize_text'
	));

	$wp_customize->add_control( new Latte_Portfolio_Widgets_Area( $wp_customize, 'latte_portfolio_post_type', array(
		'section' => 'latte_portfolio_content'
	)));

	$wp_customize->add_setting('latte_portfolio_background_color', array(
		'default' => '#F5F5F5',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_portfolio_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_portfolio_colors',
		'priority' => 5,
		'settings' => 'latte_portfolio_background_color'
	)));

	$wp_customize->add_setting('latte_portfolio_title_color', array(
		'default' => '#333',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_portfolio_title_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'latte_portfolio_colors',
		'priority' => 10,
		'settings' => 'latte_portfolio_title_color'
	)));

	$wp_customize->add_setting('latte_portfolio_subtitle_color', array(
		'default' => '#9F8E8E',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_portfolio_subtitle_color', array(
		'label' => __('Subtitle', 'latte'),
		'section' => 'latte_portfolio_colors',
		'priority' => 15,
		'settings' => 'latte_portfolio_subtitle_color'
	)));

	$wp_customize->add_setting('latte_portfolio_item_background', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_portfolio_item_background', array(
		'label' => __('Item Background', 'latte'),
		'section' => 'latte_portfolio_colors',
		'priority' => 20,
		'settings' => 'latte_portfolio_item_background'
	)));

	$wp_customize->add_setting('latte_portfolio_item_title', array(
		'default' => '#000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_portfolio_item_title', array(
		'label' => __('Item Title', 'latte'),
		'section' => 'latte_portfolio_colors',
		'priority' => 25,
		'settings' => 'latte_portfolio_item_title'
	)));

	$wp_customize->add_setting('latte_portfolio_item_category', array(
		'default' => '#333',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_portfolio_item_category', array(
		'label' => __('Item Category', 'latte'),
		'section' => 'latte_portfolio_colors',
		'priority' => 30,
		'settings' => 'latte_portfolio_item_category'
	)));

	$wp_customize->add_setting('latte_portfolio_item_hover', array(
		'default' => 'rgba(0, 0, 0, 0.7)',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_portfolio_item_hover', array(
		'label' => __('Item Hover Box', 'latte'),
		'section' => 'latte_portfolio_colors',
		'priority' => 35,
		'settings' => 'latte_portfolio_item_hover'
	)));

	$wp_customize->add_setting('latte_portfolio_item_hover_icon', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_portfolio_item_hover_icon', array(
		'label' => __('Item Hover Box Icon', 'latte'),
		'section' => 'latte_portfolio_colors',
		'priority' => 40,
		'settings' => 'latte_portfolio_item_hover_icon'
	)));

	$wp_customize->add_setting( 'latte_subscribe_display', array(
		'default' => 1,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_subscribe_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Subscribe Section','latte'),
		'section' => 'latte_subscribe_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_subscribe_background', array(
		'default' => get_template_directory_uri().'/assets/images/subscribe.jpg',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_subscribe_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_subscribe_settings',
		'priority' => 10,
		'settings' => 'latte_subscribe_background'
	)));

	$wp_customize->add_setting('latte_subscribe_title', array(
		'default' => esc_html__('Subscribe', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_subscribe_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_subscribe_settings',
		'priority' => 15,
		'settings' => 'latte_subscribe_title'
	));

	$wp_customize->add_setting('latte_subscribe_subtitle', array(
		'default' => esc_html__('I won\'t spam you, promise!', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_subscribe_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_subscribe_settings',
		'priority' => 20,
		'settings' => 'latte_subscribe_subtitle'
	));

	$wp_customize->add_setting( 'latte_subscribe_info', array(
		'sanitize_callback' => 'latte_sanitize_text'
	));

	$wp_customize->add_control( new Latte_Subscribe_Widgets_Area( $wp_customize, 'latte_subscribe_info', array(
		'section' => 'latte_subscribe_instructions'
	)));

	$wp_customize->add_setting('latte_subscribe_background_color', array(
		'default' => 'rgba(0, 0, 0, 0.7)',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_subscribe_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_subscribe_colors',
		'priority' => 5,
		'settings' => 'latte_subscribe_background_color'
	)));

	$wp_customize->add_setting('latte_subscribe_title_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_subscribe_title_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'latte_subscribe_colors',
		'priority' => 10,
		'settings' => 'latte_subscribe_title_color'
	)));

	$wp_customize->add_setting('latte_subscribe_subtitle_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_subscribe_subtitle_color', array(
		'label' => __('Subtitle', 'latte'),
		'section' => 'latte_subscribe_colors',
		'priority' => 15,
		'settings' => 'latte_subscribe_subtitle_color'
	)));

	$wp_customize->add_setting('latte_subscribe_text', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_subscribe_text', array(
		'label' => __('Section Text', 'latte'),
		'section' => 'latte_subscribe_colors',
		'priority' => 20,
		'settings' => 'latte_subscribe_text'
	)));

	$wp_customize->add_setting('latte_subscribe_field_background', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_subscribe_field_background', array(
		'label' => __('SendinBlue Field Background', 'latte'),
		'section' => 'latte_subscribe_colors',
		'priority' => 25,
		'settings' => 'latte_subscribe_field_background'
	)));

	$wp_customize->add_setting('latte_subscribe_field_text', array(
		'default' => '#000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_subscribe_field_text', array(
		'label' => __('SendinBlue Field Text', 'latte'),
		'section' => 'latte_subscribe_colors',
		'priority' => 30,
		'settings' => 'latte_subscribe_field_text'
	)));

	$wp_customize->add_setting('latte_subscribe_field_border', array(
		'default' => '#BBB',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_subscribe_field_border', array(
		'label' => __('SendinBlue Field Border', 'latte'),
		'section' => 'latte_subscribe_colors',
		'priority' => 35,
		'settings' => 'latte_subscribe_field_border'
	)));

	$wp_customize->add_setting('latte_subscribe_button_text', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_subscribe_button_text', array(
		'label' => __('SendinBlue Button Text', 'latte'),
		'section' => 'latte_subscribe_colors',
		'priority' => 40,
		'settings' => 'latte_subscribe_button_text'
	)));

	$wp_customize->add_setting('latte_subscribe_button_text_hover', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_subscribe_button_text_hover', array(
		'label' => __('SendinBlue Button Text Hover', 'latte'),
		'section' => 'latte_subscribe_colors',
		'priority' => 45,
		'settings' => 'latte_subscribe_button_text_hover'
	)));

	$wp_customize->add_setting('latte_subscribe_button_background', array(
		'default' => '#181616',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_subscribe_button_background', array(
		'label' => __('SendinBlue Button Background', 'latte'),
		'section' => 'latte_subscribe_colors',
		'priority' => 50,
		'settings' => 'latte_subscribe_button_background'
	)));

	$wp_customize->add_setting('latte_subscribe_button_background_hover', array(
		'default' => '#222',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_subscribe_button_background_hover', array(
		'label' => __('SendinBlue Button Background Hover', 'latte'),
		'section' => 'latte_subscribe_colors',
		'priority' => 55,
		'settings' => 'latte_subscribe_button_background_hover'
	)));

	$wp_customize->add_setting( 'latte_pricing_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_pricing_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Pricing Section','latte'),
		'section' => 'latte_pricing_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_pricing_background', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_pricing_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_pricing_settings',
		'priority' => 10,
		'settings' => 'latte_pricing_background'
	)));

	$wp_customize->add_setting('latte_pricing_title', array(
		'default' => esc_html__('Pricing', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_pricing_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_pricing_settings',
		'priority' => 15,
		'settings' => 'latte_pricing_title'
	));

	$wp_customize->add_setting('latte_pricing_subtitle', array(
		'default' => esc_html__('Order before it\'s too late!', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_pricing_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_pricing_settings',
		'priority' => 20,
		'settings' => 'latte_pricing_subtitle'
	));

	$wp_customize->add_setting('latte_pricing_background_color', array(
		'default' => '#F5F5F5',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_pricing_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 5,
		'settings' => 'latte_pricing_background_color'
	)));

	$wp_customize->add_setting('latte_pricing_title_color', array(
		'default' => '#333',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_title_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 10,
		'settings' => 'latte_pricing_title_color'
	)));

	$wp_customize->add_setting('latte_pricing_subtitle_color', array(
		'default' => '#9F8E8E',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_subtitle_color', array(
		'label' => __('Subtitle', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 15,
		'settings' => 'latte_pricing_subtitle_color'
	)));

	$wp_customize->add_setting('latte_pricing_table_background', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_table_background', array(
		'label' => __('Table Background', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 20,
		'settings' => 'latte_pricing_table_background'
	)));

	$wp_customize->add_setting('latte_pricing_table_title', array(
		'default' => '#000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_table_title', array(
		'label' => __('Table Title', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 25,
		'settings' => 'latte_pricing_table_title'
	)));

	$wp_customize->add_setting('latte_pricing_table_subtitle', array(
		'default' => '#9F8E8E',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_table_subtitle', array(
		'label' => __('Table Subitle', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 30,
		'settings' => 'latte_pricing_table_subtitle'
	)));

	$wp_customize->add_setting('latte_pricing_table_price_background', array(
		'default' => '#525252',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_table_price_background', array(
		'label' => __('Price Tag Background', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 35,
		'settings' => 'latte_pricing_table_price_background'
	)));

	$wp_customize->add_setting('latte_pricing_table_price_text', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_table_price_text', array(
		'label' => __('Price Tag Text', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 40,
		'settings' => 'latte_pricing_table_price_text'
	)));

	$wp_customize->add_setting('latte_pricing_table_features', array(
		'default' => '#000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_table_features', array(
		'label' => __('Features', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 45,
		'settings' => 'latte_pricing_table_features'
	)));

	$wp_customize->add_setting('latte_pricing_table_button_background', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_table_button_background', array(
		'label' => __('Button Background', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 50,
		'settings' => 'latte_pricing_table_button_background'
	)));

	$wp_customize->add_setting('latte_pricing_table_button_border', array(
		'default' => '#525252',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_table_button_border', array(
		'label' => __('Button Border', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 55,
		'settings' => 'latte_pricing_table_button_border'
	)));

	$wp_customize->add_setting('latte_pricing_table_button_text', array(
		'default' => '#525252',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_table_button_text', array(
		'label' => __('Button Text', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 60,
		'settings' => 'latte_pricing_table_button_text'
	)));

	$wp_customize->add_setting('latte_pricing_table_button_background_hover', array(
		'default' => '#525252',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_table_button_background_hover', array(
		'label' => __('Button Background Hover', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 65,
		'settings' => 'latte_pricing_table_button_background_hover'
	)));

	$wp_customize->add_setting('latte_pricing_table_button_border_hover', array(
		'default' => '#525252',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_table_button_border_hover', array(
		'label' => __('Button Border Hover', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 70,
		'settings' => 'latte_pricing_table_button_border_hover'
	)));

	$wp_customize->add_setting('latte_pricing_table_button_text_hover', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_pricing_table_button_text_hover', array(
		'label' => __('Button Text Hover', 'latte'),
		'section' => 'latte_pricing_colors',
		'priority' => 75,
		'settings' => 'latte_pricing_table_button_text_hover'
	)));

	$wp_customize->add_setting( 'latte_testimonials_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_testimonials_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Testimonials Section','latte'),
		'section' => 'latte_testimonials_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_testimonials_background', array(
		'default' => get_template_directory_uri().'/assets/images/testimonials.jpg',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_testimonials_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_testimonials_settings',
		'priority' => 10,
		'settings' => 'latte_testimonials_background'
	)));

	$wp_customize->add_setting('latte_testimonials_title', array(
		'default' => esc_html__('Testimonials', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_testimonials_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_testimonials_settings',
		'priority' => 15,
		'settings' => 'latte_testimonials_title'
	));

	$wp_customize->add_setting('latte_testimonials_subtitle', array(
		'default' => esc_html__('Here\'s what the clients have to say.', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_testimonials_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_testimonials_settings',
		'priority' => 20,
		'settings' => 'latte_testimonials_subtitle'
	));

	$wp_customize->add_setting('latte_testimonials_background_color', array(
		'default' => 'rgba(0, 0, 0, 0.7)',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_testimonials_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_testimonials_colors',
		'priority' => 5,
		'settings' => 'latte_testimonials_background_color'
	)));

	$wp_customize->add_setting('latte_testimonials_title_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_testimonials_title_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'latte_testimonials_colors',
		'priority' => 10,
		'settings' => 'latte_testimonials_title_color'
	)));

	$wp_customize->add_setting('latte_testimonials_subtitle_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_testimonials_subtitle_color', array(
		'label' => __('Subtitle', 'latte'),
		'section' => 'latte_testimonials_colors',
		'priority' => 15,
		'settings' => 'latte_testimonials_subtitle_color'
	)));

	$wp_customize->add_setting('latte_testimonials_main_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_testimonials_main_color', array(
		'label' => __('Testimonial Text', 'latte'),
		'section' => 'latte_testimonials_colors',
		'priority' => 20,
		'settings' => 'latte_testimonials_main_color'
	)));

	$wp_customize->add_setting('latte_testimonials_meta_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_testimonials_meta_color', array(
		'label' => __('Testimonial Meta', 'latte'),
		'section' => 'latte_testimonials_colors',
		'priority' => 25,
		'settings' => 'latte_testimonials_meta_color'
	)));

	$wp_customize->add_setting( 'latte_blogposts_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_blogposts_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Blog Section','latte'),
		'section' => 'latte_blogposts_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_blogposts_background', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_blogposts_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_blogposts_settings',
		'priority' => 10,
		'settings' => 'latte_blogposts_background'
	)));

	$wp_customize->add_setting('latte_blogposts_title', array(
		'default' => esc_html__('Blog', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_blogposts_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_blogposts_settings',
		'priority' => 15,
		'settings' => 'latte_blogposts_title'
	));

	$wp_customize->add_setting('latte_blogposts_subtitle', array(
		'default' => esc_html__('My thoughts.', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_blogposts_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_blogposts_settings',
		'priority' => 20,
		'settings' => 'latte_blogposts_subtitle'
	));

	$wp_customize->add_setting('latte_blogposts_items', array(
		'default' => 6,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_text'
	));

	$wp_customize->add_control('latte_blogposts_items', array(
		'label' => __('Number of Items', 'latte'),
		'section' => 'latte_blogposts_settings',
		'priority' => 25,
		'type' => 'number',
		'settings' => 'latte_blogposts_items'
	));

	$wp_customize->add_setting( 'latte_blogposts_content', array(
		'sanitize_callback' => 'latte_sanitize_text'
	));

	$wp_customize->add_control( new Latte_Blogposts_Widgets_Area( $wp_customize, 'latte_blogposts_content', array(
		'section' => 'latte_blogposts_content'
	)));

	$wp_customize->add_setting('latte_blogposts_background_color', array(
		'default' => '#F5F5F5',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_blogposts_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_blogposts_colors',
		'priority' => 5,
		'settings' => 'latte_blogposts_background_color'
	)));

	$wp_customize->add_setting('latte_blogposts_title_color', array(
		'default' => '#333',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blogposts_title_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'latte_blogposts_colors',
		'priority' => 10,
		'settings' => 'latte_blogposts_title_color'
	)));

	$wp_customize->add_setting('latte_blogposts_subtitle_color', array(
		'default' => '#9F8E8E',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blogposts_subtitle_color', array(
		'label' => __('Subtitle', 'latte'),
		'section' => 'latte_blogposts_colors',
		'priority' => 15,
		'settings' => 'latte_blogposts_subtitle_color'
	)));

	$wp_customize->add_setting('latte_blogposts_item_background', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blogposts_item_background', array(
		'label' => __('Item Background', 'latte'),
		'section' => 'latte_blogposts_colors',
		'priority' => 20,
		'settings' => 'latte_blogposts_item_background'
	)));

	$wp_customize->add_setting('latte_blogposts_item_text', array(
		'default' => '#333',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blogposts_item_text', array(
		'label' => __('Item Text', 'latte'),
		'section' => 'latte_blogposts_colors',
		'priority' => 25,
		'settings' => 'latte_blogposts_item_text'
	)));

	$wp_customize->add_setting('latte_blogposts_item_meta_text', array(
		'default' => '#808080',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blogposts_item_meta_text', array(
		'label' => __('Item Meta Text', 'latte'),
		'section' => 'latte_blogposts_colors',
		'priority' => 30,
		'settings' => 'latte_blogposts_item_meta_text'
	)));

	$wp_customize->add_setting('latte_blogposts_item_link', array(
		'default' => '#337AB7',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blogposts_item_link', array(
		'label' => __('Item Link', 'latte'),
		'section' => 'latte_blogposts_colors',
		'priority' => 35,
		'settings' => 'latte_blogposts_item_link'
	)));

	$wp_customize->add_setting('latte_blogposts_item_link_hover', array(
		'default' => '#23527C',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blogposts_item_link_hover', array(
		'label' => __('Item Link Hover', 'latte'),
		'section' => 'latte_blogposts_colors',
		'priority' => 40,
		'settings' => 'latte_blogposts_item_link_hover'
	)));

	$wp_customize->add_setting( 'latte_map_display', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_map_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Map Section','latte'),
		'section' => 'latte_map_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_map_location', array(
		'default' => esc_html__('Madison Square Garden', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_map_location', array(
		'label' => __('Map Location', 'latte'),
		'section' => 'latte_map_content',
		'priority' => 10,
		'settings' => 'latte_map_location'
	));

	$wp_customize->add_setting('latte_map_background_color', array(
		'default' => 'rgba(0, 0, 0, 0.7)',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_map_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_map_colors',
		'priority' => 5,
		'settings' => 'latte_map_background_color'
	)));

	$wp_customize->add_setting( 'latte_contact_display', array(
		'default' => 1,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_checkbox'
	));

	$wp_customize->add_control('latte_contact_display',array(
		'type' => 'checkbox',
		'label' => __('Disable Contact Section','latte'),
		'section' => 'latte_contact_settings',
		'priority' => 5
	));

	$wp_customize->add_setting('latte_contact_background', array(
		'default' => get_template_directory_uri().'/assets/images/contact.jpg',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'latte_contact_background', array(
		'label' => __('Background Image', 'latte'),
		'section' => 'latte_contact_settings',
		'priority' => 10,
		'settings' => 'latte_contact_background',
	)));

	$wp_customize->add_setting('latte_contact_title', array(
		'default' => esc_html__('Contact', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_contact_title', array(
		'label' => __('Section Title', 'latte'),
		'section' => 'latte_contact_settings',
		'priority' => 15,
		'settings' => 'latte_contact_title'
	));

	$wp_customize->add_setting('latte_contact_subtitle', array(
		'default' => esc_html__('Let\'s talk.', 'latte'),
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control('latte_contact_subtitle', array(
		'label' => __('Section Subtitle', 'latte'),
		'section' => 'latte_contact_settings',
		'priority' => 20,
		'settings' => 'latte_contact_subtitle'
	));

	$wp_customize->add_setting('latte_contact_code', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('latte_contact_code', array(
		'label' => __('Shortcode', 'latte'),
		'section' => 'latte_contact_content',
		'priority' => 5,
		'settings' => 'latte_contact_code'
	));

	$wp_customize->add_setting( 'latte_contact_shortcode', array(
		'sanitize_callback' => 'latte_sanitize_text'
	));

	$wp_customize->add_control( new Latte_Contact_Shortcode_Area( $wp_customize, 'latte_contact_shortcode', array(
		'section' => 'latte_contact_content',
		'priority' => 10
	)));

	$wp_customize->add_setting('latte_contact_background_color', array(
		'default' => 'rgba(0, 0, 0, 0.7)',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'latte_contact_background_color', array(
		'label' => __('Background Color', 'latte'),
		'section' => 'latte_contact_colors',
		'priority' => 5,
		'settings' => 'latte_contact_background_color'
	)));

	$wp_customize->add_setting('latte_contact_title_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_contact_title_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'latte_contact_colors',
		'priority' => 10,
		'settings' => 'latte_contact_title_color'
	)));

	$wp_customize->add_setting('latte_contact_subtitle_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_contact_subtitle_color', array(
		'label' => __('Subtitle', 'latte'),
		'section' => 'latte_contact_colors',
		'priority' => 15,
		'settings' => 'latte_contact_subtitle_color'
	)));

	$wp_customize->add_setting('latte_blog_title_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blog_title_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'header_image',
		'priority' => 10,
		'settings' => 'latte_blog_title_color'
	)));

	$wp_customize->add_setting('latte_blog_description_color', array(
		'default' => '#FFF',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blog_description_color', array(
		'label' => __('Description', 'latte'),
		'section' => 'header_image',
		'priority' => 15,
		'settings' => 'latte_blog_description_color'
	)));

	$wp_customize->add_setting('latte_blog_heading_color', array(
		'default' => '#000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blog_heading_color', array(
		'label' => __('Title', 'latte'),
		'section' => 'latte_blog_colors',
		'priority' => 5,
		'settings' => 'latte_blog_heading_color'
	)));

	$wp_customize->add_setting('latte_blog_text_color', array(
		'default' => '#000',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blog_text_color', array(
		'label' => __('Text', 'latte'),
		'section' => 'latte_blog_colors',
		'priority' => 10,
		'settings' => 'latte_blog_text_color'
	)));

	$wp_customize->add_setting('latte_blog_meta_color', array(
		'default' => '#808080',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blog_meta_color', array(
		'label' => __('Meta', 'latte'),
		'section' => 'latte_blog_colors',
		'priority' => 15,
		'settings' => 'latte_blog_meta_color'
	)));

	$wp_customize->add_setting('latte_blog_meta_link_color', array(
		'default' => '#404040',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blog_meta_link_color', array(
		'label' => __('Meta Link', 'latte'),
		'section' => 'latte_blog_colors',
		'priority' => 20,
		'settings' => 'latte_blog_meta_link_color'
	)));

	$wp_customize->add_setting('latte_blog_link_color', array(
		'default' => '#0085A1',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blog_link_color', array(
		'label' => __('Link', 'latte'),
		'section' => 'latte_blog_colors',
		'priority' => 25,
		'settings' => 'latte_blog_link_color'
	)));

	$wp_customize->add_setting('latte_blog_link_hover_color', array(
		'default' => '#0085A1',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'latte_blog_link_hover_color', array(
		'label' => __('Link Hover', 'latte'),
		'section' => 'latte_blog_colors',
		'priority' => 30,
		'settings' => 'latte_blog_link_hover_color'
	)));
	
	$wp_customize->add_setting( 'latte_blog_sidebar', array(
		'default' => 'full',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'latte_sanitize_choices'
	));
 
	$wp_customize->add_control( 'latte_blog_sidebar', array(
		'label' => __('Layout', 'latte'),
		'type' => 'radio',
		'section' => 'latte_blog_layout',
		'choices' => array(
			'full' => __('Full Width', 'latte'),
			'left' => __('Left Sidebar', 'latte'),
			'right' => __('Right Sidebar', 'latte'),
		)
	));

}
add_action('customize_register', 'latte_customize_register');

?>
