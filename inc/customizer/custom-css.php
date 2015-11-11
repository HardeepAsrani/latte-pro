<?php
/**
 * Custom CSS for wp_head
 */
function latte_custom_css() {
	$latte_preloader_display = get_theme_mod('latte_preloader_display');
	$latte_menu_display = get_theme_mod('latte_menu_display');
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
	$latte_preloader_image = get_theme_mod('latte_preloader_image', get_template_directory_uri().'/assets/images/loader.gif' );
	$latte_preloader_background = get_theme_mod('latte_preloader_background', '#FFF' );
	$latte_menu_icon_color = get_theme_mod('latte_menu_icon_color', '#000' );
	$latte_menu_icon_background = get_theme_mod('latte_menu_icon_background', '#FFF' );
	$latte_menu_background = get_theme_mod('latte_menu_background', '#222' );
	$latte_menu_header_background = get_theme_mod('latte_menu_header_background', '#1A1A1A' );
	$latte_menu_text_color = get_theme_mod('latte_menu_text_color', '#FFF' );
	$latte_footer_background = get_theme_mod('latte_footer_background', '#272727' );
	$latte_footer_text = get_theme_mod('latte_footer_text', '#FFF' );
	$latte_intro_background_color = get_theme_mod('latte_intro_background_color', 'rgba(0, 0, 0, 0.7)' );
	$latte_intro_title_color = get_theme_mod('latte_intro_title_color', '#FFF' );
	$latte_intro_description_color = get_theme_mod('latte_intro_description_color', '#FFF' );
	$latte_intro_anchor_color = get_theme_mod('latte_intro_anchor_color', '#FFF' );
	$latte_about_background_color = get_theme_mod('latte_about_background_color', '#F5F5F5' );
	$latte_about_title_color = get_theme_mod('latte_about_title_color', '#333' );
	$latte_about_subtitle_color = get_theme_mod('latte_about_subtitle_color', '#9F8E8E' );
	$latte_about_name_color = get_theme_mod('latte_about_name_color', '#333' );
	$latte_about_position_color = get_theme_mod('latte_about_position_color', '#777' );
	$latte_about_content_color = get_theme_mod('latte_about_content_color', '#333' );
	$latte_social_background_color = get_theme_mod('latte_social_background_color', 'rgba(0, 0, 0, 0.7)' );
	$latte_social_title_color = get_theme_mod('latte_social_title_color', '#FFF' );
	$latte_social_color = get_theme_mod('latte_social_color', '#FFF' );
	$latte_services_background_color = get_theme_mod('latte_services_background_color', '#F5F5F5' );
	$latte_services_title_color = get_theme_mod('latte_services_title_color', '#333' );
	$latte_services_subtitle_color = get_theme_mod('latte_services_subtitle_color', '#9F8E8E' );
	$latte_services_widget_icon_background = get_theme_mod('latte_services_widget_icon_background', '#FFF' );
	$latte_services_widget_icon_color = get_theme_mod('latte_services_widget_icon_color', '#5E5E5E' );
	$latte_services_widget_title_color = get_theme_mod('latte_services_widget_title_color', '#9F8E8E' );
	$latte_services_widget_text_background = get_theme_mod('latte_services_widget_text_background', '#E0E0E0' );
	$latte_services_widget_text_color = get_theme_mod('latte_services_widget_text_color', '#777' );
	$latte_separator_background_color = get_theme_mod('latte_separator_background_color', 'rgba(0, 0, 0, 0.7)' );
	$latte_separator_color = get_theme_mod('latte_separator_color', '#FFF' );
	$latte_separator_button_color = get_theme_mod('latte_separator_button_color', '#FFF' );
	$latte_separator_button_hover_color = get_theme_mod('latte_separator_button_hover_color', '#FFF' );
	$latte_separator_button_background = get_theme_mod('latte_separator_button_background', '#181616' );
	$latte_separator_button_hover_background = get_theme_mod('latte_separator_button_hover_background', '#222' );
	$latte_skills_background_color = get_theme_mod('latte_skills_background_color', '#F5F5F5' );
	$latte_skills_title_color = get_theme_mod('latte_skills_title_color', '#333' );
	$latte_skills_subtitle_color = get_theme_mod('latte_skills_subtitle_color', '#9F8E8E' );
	$latte_portfolio_background_color = get_theme_mod('latte_portfolio_background_color', '#F5F5F5' );
	$latte_portfolio_title_color = get_theme_mod('latte_portfolio_title_color', '#333' );
	$latte_portfolio_subtitle_color = get_theme_mod('latte_portfolio_subtitle_color', '#9F8E8E' );
	$latte_portfolio_item_background = get_theme_mod('latte_portfolio_item_background', '#FFF' );
	$latte_portfolio_item_title = get_theme_mod('latte_portfolio_item_title', '#000' );
	$latte_portfolio_item_category = get_theme_mod('latte_portfolio_item_category', '#333' );
	$latte_portfolio_item_hover = get_theme_mod('latte_portfolio_item_hover', 'rgba(0, 0, 0, 0.7)' );
	$latte_portfolio_item_hover_icon = get_theme_mod('latte_portfolio_item_hover_icon', '#FFF' );
	$latte_subscribe_background_color = get_theme_mod('latte_subscribe_background_color', 'rgba(0, 0, 0, 0.7)' );
	$latte_subscribe_title_color = get_theme_mod('latte_subscribe_title_color', '#FFF' );
	$latte_subscribe_subtitle_color = get_theme_mod('latte_subscribe_subtitle_color', '#FFF' );
	$latte_subscribe_text = get_theme_mod('latte_subscribe_text', '#FFF' );
	$latte_subscribe_field_background = get_theme_mod('latte_subscribe_field_background', '#FFF' );
	$latte_subscribe_field_text = get_theme_mod('latte_subscribe_field_text', '000' );
	$latte_subscribe_field_border = get_theme_mod('latte_subscribe_field_border', '000' );
	$latte_subscribe_button_text = get_theme_mod('latte_subscribe_button_text', '#FFF' );
	$latte_subscribe_button_text_hover = get_theme_mod('latte_subscribe_button_text_hover', '#FFF' );
	$latte_subscribe_button_background = get_theme_mod('latte_subscribe_button_background', '#181616' );
	$latte_subscribe_button_background_hover = get_theme_mod('latte_subscribe_button_background_hover', '#222' );
	$latte_pricing_background_color = get_theme_mod('latte_pricing_background_color', '#F5F5F5' );
	$latte_pricing_title_color = get_theme_mod('latte_pricing_title_color', '#333' );
	$latte_pricing_subtitle_color = get_theme_mod('latte_pricing_subtitle_color', '#9F8E8E' );
	$latte_pricing_table_background = get_theme_mod('latte_pricing_table_background', '#FFF' );
	$latte_pricing_table_title = get_theme_mod('latte_pricing_table_title', '#000' );
	$latte_pricing_table_subtitle = get_theme_mod('latte_pricing_table_subtitle', '#9F8E8E' );
	$latte_pricing_table_price_background = get_theme_mod('latte_pricing_table_price_background', '#525252' );
	$latte_pricing_table_price_text = get_theme_mod('latte_pricing_table_price_text', '#FFF' );
	$latte_pricing_table_features = get_theme_mod('latte_pricing_table_features', '#000' );
	$latte_pricing_table_button_background = get_theme_mod('latte_pricing_table_button_background', '#FFF' );
	$latte_pricing_table_button_border = get_theme_mod('latte_pricing_table_button_border', '#525252' );
	$latte_pricing_table_button_text = get_theme_mod('latte_pricing_table_button_text', '#525252' );
	$latte_pricing_table_button_background_hover = get_theme_mod('latte_pricing_table_button_background_hover', '#525252' );
	$latte_pricing_table_button_border_hover = get_theme_mod('latte_pricing_table_button_border_hover', '#525252' );
	$latte_pricing_table_button_text_hover = get_theme_mod('latte_pricing_table_button_tex_hovert', '#FFF' );
	$latte_testimonials_background_color = get_theme_mod('latte_testimonials_background_color', 'rgba(0, 0, 0, 0.7)' );
	$latte_testimonials_title_color = get_theme_mod('latte_testimonials_title_color', '#FFF' );
	$latte_testimonials_subtitle_color = get_theme_mod('latte_testimonials_subtitle_color', '#FFF' );
	$latte_testimonials_main_color = get_theme_mod('latte_testimonials_main_color', '#FFF' );
	$latte_testimonials_meta_color = get_theme_mod('latte_testimonials_meta_color', '#FFF' );
	$latte_blogposts_background_color = get_theme_mod('latte_blogposts_background_color', '#F5F5F5' );
	$latte_blogposts_title_color = get_theme_mod('latte_blogposts_title_color', '#333' );
	$latte_blogposts_subtitle_color = get_theme_mod('latte_blogposts_subtitle_color', '#9F8E8E' );
	$latte_blogposts_item_background = get_theme_mod('latte_blogposts_item_background', '#FFF' );
	$latte_blogposts_item_text = get_theme_mod('latte_blogposts_item_text', '#333' );
	$latte_blogposts_item_link = get_theme_mod('latte_blogposts_item_link', '#337AB7' );
	$latte_blogposts_item_link_hover = get_theme_mod('latte_blogposts_item_link_hover', '#23527C' );
	$latte_map_background_color = get_theme_mod('latte_map_background_color', 'rgba(0, 0, 0, 0.7)' );
	$latte_contact_background_color = get_theme_mod('latte_contact_background_color', 'rgba(0, 0, 0, 0.7)' );
	$latte_contact_title_color = get_theme_mod('latte_contact_title_color', '#FFF' );
	$latte_contact_subtitle_color = get_theme_mod('latte_contact_subtitle_color', '#FFF' );
	$latte_blog_title_color = get_theme_mod('latte_blog_title_color', '#FFF' );
	$latte_blog_description_color = get_theme_mod('latte_blog_description_color', '#FFF' );
	$latte_blog_heading_color = get_theme_mod('latte_blog_heading_color', '#000' );
	$latte_blog_text_color = get_theme_mod('latte_blog_text_color', '#000' );
	$latte_blog_meta_color = get_theme_mod('latte_blog_meta_color', '#808080' );
	$latte_blog_meta_link_color = get_theme_mod('latte_blog_meta_link_color', '#404040' );
	$latte_blog_link_color = get_theme_mod('latte_blog_link_color', '#0085A1' );
	$latte_blog_link_hover_color = get_theme_mod('latte_blog_link_hover_color', '#0085A1' );
?>
<style>
<?php if( isset($latte_preloader_display) && $latte_preloader_display != 1 ): ?>
<?php if(!empty($latte_preloader_image)) : ?>
.status {
	background-image: url('<?php echo $latte_preloader_image; ?>');
}
<?php endif; ?>
<?php if(!empty($latte_preloader_background)) : ?>
.preloader {
	background: <?php echo $latte_preloader_background; ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_menu_display) && $latte_menu_display != 1 ): ?>
<?php if(!empty($latte_menu_icon_color) || !empty($latte_menu_icon_background)) : ?>
#showLeftPush {
<?php if(!empty($latte_menu_icon_color)) : ?>
	color: <?php echo $latte_menu_icon_color; ?>;
<?php endif; ?>
<?php if(!empty($latte_menu_icon_background)) : ?>
	background: <?php echo $latte_menu_icon_background; ?>;
<?php endif; ?>
}
<?php endif; ?>
<?php if(!empty($latte_menu_background)) : ?>
.pmenu {
	background: <?php echo $latte_menu_background; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_menu_header_background)) : ?>
.pmenu h3,
.pmenu a:hover {
	background: <?php echo $latte_menu_header_background; ?>;
}
.pmenu-vertical a {
	border-bottom: 2px solid <?php echo $latte_menu_header_background; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_menu_text_color)) : ?>
.pmenu h3,
.pmenu a,
.pmenu a:hover {
	color: <?php echo $latte_menu_text_color; ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if(!empty($latte_footer_background) || !empty($latte_services_widget_text_color)) : ?>
.footer {
<?php if(!empty($latte_footer_background)) : ?>
	background: <?php echo $latte_footer_background; ?>;
<?php endif; ?>
<?php if(!empty($latte_footer_text)) : ?>
	color: <?php echo $latte_footer_text; ?>;
<?php endif; ?>
}
<?php endif; ?>
<?php if(!empty($latte_footer_text)) : ?>
.footer a {
	color: <?php echo $latte_footer_text; ?>;
}
<?php endif; ?>
<?php if ( is_page_template( 'template-home.php' ) ) : ?>
<?php if( isset($latte_intro_display) && $latte_intro_display != 1 ): ?>
<?php if(!empty($latte_intro_background_color)) : ?>
.intro {
	background: <?php echo $latte_intro_background_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_intro_title_color)) : ?>
.intro .cover-heading {
	color: <?php echo $latte_intro_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_intro_description_color)) : ?>
.intro .lead {
	color: <?php echo $latte_intro_description_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_intro_anchor_color)) : ?>
.intro .arrow .fa {
	color: <?php echo $latte_intro_anchor_color; ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_about_display) && $latte_about_display != 1 ): ?>
<?php if(!empty($latte_about_background_color)) : ?>
.about {
	background: <?php echo $latte_about_background_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_about_title_color)) : ?>
.about .about-header h2 {
	color: <?php echo $latte_about_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_about_subtitle_color)) : ?>
.about .about-header h3 {
	color: <?php echo $latte_about_subtitle_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_about_name_color)) : ?>
.about .name {
	color: <?php echo $latte_about_name_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_about_position_color)) : ?>
.about span.text-muted {
	color: <?php echo $latte_about_position_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_about_content_color)) : ?>
.about .lead {
	color: <?php echo $latte_about_content_color; ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_social_display) && $latte_social_display != 1 ): ?>
<?php if(!empty($latte_social_background_color)) : ?>
.social {
	background: <?php echo $latte_social_background_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_social_title_color)) : ?>
.social .social-header h2 {
	color: <?php echo $latte_social_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_social_color)) : ?>
.social .icon-item .icon i,
.social .icon-item span {
	color: <?php echo $latte_social_color; ?>;
}
.social .icon-item .icon {
	border: 4px solid <?php echo $latte_social_color; ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_services_display) && $latte_services_display != 1 ): ?>
<?php if(!empty($latte_services_background_color)) : ?>
.services {
	background: <?php echo $latte_services_background_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_services_title_color)) : ?>
.services .services-header h2 {
	color: <?php echo $latte_services_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_services_subtitle_color)) : ?>
.services .services-header h3 {
	color: <?php echo $latte_services_subtitle_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_services_widget_icon_background)) : ?>
.services .service-icon {
	background: <?php echo $latte_services_widget_icon_background; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_services_widget_icon_color)) : ?>
.services .service-icon .fa {
	color: <?php echo $latte_services_widget_icon_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_services_widget_title_color)) : ?>
.services .service-icon h3 {
	color: <?php echo $latte_services_widget_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_services_widget_text_background) || !empty($latte_services_widget_text_color)) : ?>
.services .service-box p {
<?php if(!empty($latte_services_widget_text_background)) : ?>
	background: <?php echo $latte_services_widget_text_background; ?>;
<?php endif; ?>
<?php if(!empty($latte_services_widget_text_color)) : ?>
	color: <?php echo $latte_services_widget_text_color; ?>;
<?php endif; ?>
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_separator_display) && $latte_separator_display != 1 ): ?>
<?php if(!empty($latte_separator_background_color)) : ?>
.separator {
	background: <?php echo $latte_separator_background_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_separator_color)) : ?>
.separator h2 {
	color: <?php echo $latte_separator_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_separator_button_color) || !empty($latte_separator_button_background)) : ?>
.separator .btn {
<?php if(!empty($latte_separator_button_color)) : ?>
	color: <?php echo $latte_separator_button_color; ?>;
<?php endif; ?>
<?php if(!empty($latte_separator_button_background)) : ?>
	background: <?php echo $latte_separator_button_background; ?>;
<?php endif; ?>
}
<?php endif; ?>
<?php if(!empty($latte_separator_button_hover_color) || !empty($latte_separator_button_hover_background)) : ?>
.separator .btn:hover {
<?php if(!empty($latte_separator_button_hover_color)) : ?>
	color: <?php echo $latte_separator_button_hover_color; ?>;
<?php endif; ?>
<?php if(!empty($latte_separator_button_hover_background)) : ?>
	background: <?php echo $latte_separator_button_hover_background; ?>;
<?php endif; ?>
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_skills_display) && $latte_skills_display != 1 ): ?>
<?php if(!empty($latte_skills_background_color)) : ?>
.skills {
	background: <?php echo $latte_skills_background_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_skills_title_color)) : ?>
.skills .skills-header h2 {
	color: <?php echo $latte_skills_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_skills_subtitle_color)) : ?>
.skills .skills-header h3 {
	color: <?php echo $latte_skills_subtitle_color; ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_portfolio_display) && $latte_portfolio_display != 1 ): ?>
<?php if(!empty($latte_portfolio_background_color)) : ?>
.portfolio-gird {
	background: <?php echo $latte_portfolio_background_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_portfolio_title_color)) : ?>
.portfolio-gird .portfolio-header h2 {
	color: <?php echo $latte_portfolio_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_portfolio_subtitle_color)) : ?>
.portfolio-gird .portfolio-header h3 {
	color: <?php echo $latte_portfolio_subtitle_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_portfolio_item_background)) : ?>
.portfolio-gird .portfolio-item .portfolio-caption {
	background: <?php echo $latte_portfolio_item_background; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_portfolio_item_title)) : ?>
.portfolio-gird .portfolio-item .portfolio-caption h4 {
	color: <?php echo $latte_portfolio_item_title; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_portfolio_item_category)) : ?>
.portfolio-gird .portfolio-item .portfolio-caption h5 {
	color: <?php echo $latte_portfolio_item_category; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_portfolio_item_hover)) : ?>
.portfolio-gird .portfolio-item .portfolio-link .portfolio-hover {
	background: <?php echo $latte_portfolio_item_hover; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_portfolio_item_hover_icon)) : ?>
.portfolio-gird .portfolio-item .portfolio-link .portfolio-hover .portfolio-hover-content {
	color: <?php echo $latte_portfolio_item_hover_icon; ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_subscribe_display) && $latte_subscribe_display != 1 ): ?>
<?php if(!empty($latte_subscribe_background_color)) : ?>
.subscribe {
	background: <?php echo $latte_subscribe_background_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_subscribe_title_color)) : ?>
.subscribe .subscribe-header h2 {
	color: <?php echo $latte_subscribe_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_subscribe_subtitle_color)) : ?>
.subscribe .subscribe-header h3 {
	color: <?php echo $latte_subscribe_subtitle_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_subscribe_text)) : ?>
.subscribe p,
.subscribe .sendinbluetitle {
	color: <?php echo $latte_subscribe_text; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_subscribe_field_background) || !empty($latte_subscribe_field_text) || !empty($latte_subscribe_field_border)) : ?>
.subscribe .sib_signup_form .sib_signup_box_inside .sib-email-area,
.subscribe .sib_signup_form .sib_signup_box_inside .sib-NAME-area {
<?php if(!empty($latte_subscribe_field_background)) : ?>
	background: <?php echo $latte_subscribe_field_background; ?>;
<?php endif; ?>
<?php if(!empty($latte_subscribe_field_text)) : ?>
	color: <?php echo $latte_subscribe_field_text; ?>;
<?php endif; ?>
<?php if(!empty($latte_subscribe_field_border)) : ?>
	border-color: <?php echo $latte_subscribe_field_border; ?> !important;
<?php endif; ?>
}
<?php endif; ?>
<?php if(!empty($latte_subscribe_button_text) || !empty($latte_subscribe_button_background)) : ?>
.subscribe .sib_signup_form .sib_signup_box_inside .sib-default-btn {
<?php if(!empty($latte_subscribe_button_text)) : ?>
	color: <?php echo $latte_subscribe_button_text; ?> !important;
<?php endif; ?>
<?php if(!empty($latte_subscribe_button_background)) : ?>
	background: <?php echo $latte_subscribe_button_background; ?> !important;
<?php endif; ?>
}
<?php endif; ?>
<?php if(!empty($latte_subscribe_button_text_hover) || !empty($latte_subscribe_button_background_hover)) : ?>
.subscribe .sib_signup_form .sib_signup_box_inside .sib-default-btn:hover {
<?php if(!empty($latte_subscribe_button_text_hover)) : ?>
	color: <?php echo $latte_subscribe_button_text_hover; ?> !important;
<?php endif; ?>
<?php if(!empty($latte_subscribe_button_background_hover)) : ?>
	background: <?php echo $latte_subscribe_button_background_hover; ?> !important;
<?php endif; ?>
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_pricing_display) && $latte_pricing_display != 1 ): ?>
<?php if(!empty($latte_pricing_background_color)) : ?>
.pricing {
	background: <?php echo $latte_pricing_background_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_pricing_title_color)) : ?>
.pricing .pricing-header h2 {
	color: <?php echo $latte_pricing_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_pricing_subtitle_color)) : ?>
.pricing .pricing-header h3 {
	color: <?php echo $latte_pricing_subtitle_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_pricing_table_background)) : ?>
.pricing .pricing-plans .pricing-plan .pricing-container {
	background: <?php echo $latte_pricing_table_background; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_pricing_table_title)) : ?>
.pricing-container .title h2 {
	color: <?php echo $latte_pricing_table_title; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_pricing_table_subtitle)) : ?>
.pricing-container .title h3 {
	color: <?php echo $latte_pricing_table_subtitle; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_pricing_table_price_background) || !empty($latte_pricing_table_price_text)) : ?>
.pricing-container .price p {
<?php if(!empty($latte_pricing_table_price_background)) : ?>
	background: <?php echo $latte_pricing_table_price_background; ?>;
<?php endif; ?>
<?php if(!empty($latte_pricing_table_price_text)) : ?>
	color: <?php echo $latte_pricing_table_price_text; ?>;
<?php endif; ?>
}
<?php endif; ?>
<?php if(!empty($latte_pricing_table_features)) : ?>
.pricing-container .options li {
	color: <?php echo $latte_pricing_table_features; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_pricing_table_button_background) || !empty($latte_pricing_table_button_border) || !empty($latte_pricing_table_button_text)) : ?>
.pricing-container .button a {
<?php if(!empty($latte_pricing_table_button_background)) : ?>
	background: <?php echo $latte_pricing_table_button_background; ?>;
<?php endif; ?>
<?php if(!empty($latte_pricing_table_button_border)) : ?>
	border: 2px solid <?php echo $latte_pricing_table_button_border; ?>;
<?php endif; ?>
<?php if(!empty($latte_pricing_table_button_text)) : ?>
	color: <?php echo $latte_pricing_table_button_text; ?>;
<?php endif; ?>
}
<?php endif; ?>
<?php if(!empty($latte_pricing_table_button_background_hover) || !empty($latte_pricing_table_button_border_hover) || !empty($latte_pricing_table_button_text_hover)) : ?>
.pricing-container .button a:hover {
<?php if(!empty($latte_pricing_table_button_background_hover)) : ?>
	background: <?php echo $latte_pricing_table_button_background_hover; ?>;
<?php endif; ?>
<?php if(!empty($latte_pricing_table_button_border_hover)) : ?>
	border: 2px solid <?php echo $latte_pricing_table_button_border_hover; ?>;
<?php endif; ?>
<?php if(!empty($latte_pricing_table_button_text_hover)) : ?>
	color: <?php echo $latte_pricing_table_button_text_hover; ?>;
<?php endif; ?>
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_testimonials_display) && $latte_testimonials_display != 1 ): ?>
<?php if(!empty($latte_testimonials_background_color)) : ?>
.testimonials {
	background: <?php echo $latte_testimonials_background_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_testimonials_title_color)) : ?>
.testimonials .testimonials-header h2 {
	color: <?php echo $latte_testimonials_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_testimonials_subtitle_color)) : ?>
.testimonials .testimonials-header h3 {
	color: <?php echo $latte_testimonials_subtitle_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_testimonials_main_color)) : ?>
.testimonials .testimonials-slide blockquote {
	color: <?php echo $latte_testimonials_main_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_testimonials_meta_color)) : ?>
.testimonials .testimonials-slide span {
	color: <?php echo $latte_testimonials_meta_color; ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_blogposts_display) && $latte_blogposts_display != 1 ): ?>
<?php if(!empty($latte_blogposts_background_color)) : ?>
.blogposts {
	background: <?php echo $latte_blogposts_background_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_blogposts_title_color)) : ?>
.blogposts .blog-header h2 {
	color: <?php echo $latte_blogposts_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_blogposts_subtitle_color)) : ?>
.blogposts .blog-header h3 {
	color: <?php echo $latte_blogposts_subtitle_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_blogposts_item_background) || !empty($latte_blogposts_item_text)) : ?>
.blogposts .blog-item .item {
<?php if(!empty($latte_blogposts_item_background)) : ?>
	background: <?php echo $latte_blogposts_item_background; ?>;
<?php endif; ?>
<?php if(!empty($latte_blogposts_item_text)) : ?>
	color: <?php echo $latte_blogposts_item_text; ?>;
<?php endif; ?>
}
<?php endif; ?>
<?php if(!empty($latte_blogposts_item_link)) : ?>
.blogposts .blog-item .item a { 
	color: <?php echo $latte_blogposts_item_link; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_blogposts_item_link_hover)) : ?>
.blogposts .blog-item .item a:hover {
	color: <?php echo $latte_blogposts_item_link_hover; ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_map_display) && $latte_map_display != 1 ): ?>
<?php if(!empty($latte_map_background_color)) : ?>
.map {
	background: <?php echo $latte_map_background_color; ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php if( isset($latte_contact_display) && $latte_contact_display != 1 ): ?>
<?php if(!empty($latte_contact_background_color)) : ?>
.contact {
	background: <?php echo $latte_contact_background_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_contact_title_color)) : ?>
.contact .contact-header h2 {
	color: <?php echo $latte_contact_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_contact_subtitle_color)) : ?>
.contact .contact-header h3 {
	color: <?php echo $latte_contact_subtitle_color; ?>;
}
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php if ( has_header_image() ) : ?>
.archive-header {
	background: transparent url("<?php echo( get_header_image() ); ?>") repeat scroll center center / cover;
}
<?php endif; ?>
<?php if(!empty($latte_blog_title_color)) : ?>
.archive-header .cover-heading {
	color: <?php echo $latte_blog_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_blog_description_color)) : ?>
.archive-header .lead {
	color: <?php echo $latte_blog_description_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_blog_heading_color)) : ?>
.container .item .post-title,
.sidebar h3 {
	color: <?php echo $latte_blog_heading_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_blog_text_color)) : ?>
body,
h2.comments-title,
.comment-list .comment-content,
.comment-list .comment-author .fn a,
.container .pager li > a,
.container .pager a > li > span {
	color: <?php echo $latte_blog_text_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_blog_meta_color)) : ?>
.container .item .post-meta,
.comment-list .comment-author .says {
	color: <?php echo $latte_blog_meta_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_blog_meta_link_color)) : ?>
.container .item .post-meta a, {
	color: <?php echo $latte_blog_meta_link_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_blog_link_color)) : ?>
a,
.container .item .post-content a,
.container .item .post-subtitle a,
.comment-list .comment-content a {
	color: <?php echo $latte_blog_link_color; ?>;
}
<?php endif; ?>
<?php if(!empty($latte_blog_link_hover_color)) : ?>
a,
a:hover,
a:focus,
.container .item a .post-title:hover,
.container .item .post-meta a:hover,
.container .item a:hover,
.container .pager li > span,
.container .pager li > a:hover,
.container .pager li > span:hover,
.comment-list .comment-content a:hover,
	color: <?php echo $latte_blog_link_hover_color; ?>;
}
<?php endif; ?>
</style>
<?php
}

add_action('wp_head', 'latte_custom_css');

?>