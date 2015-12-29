<?php
/**
 * Custom JS for wp_footer
 */
function latte_custom_js() {
	$latte_preloader_display = get_theme_mod('latte_preloader_display');
	$latte_menu_display = get_theme_mod('latte_menu_display');
	$latte_animations_display = get_theme_mod('latte_animations_display');
	$latte_testimonials_display = get_theme_mod('latte_testimonials_display');
	$latte_skills_display = get_theme_mod('latte_skills_display');
	$latte_intro_background = get_theme_mod('latte_intro_background', get_template_directory_uri().'/assets/images/intro.jpg' );
	$latte_about_background = get_theme_mod('latte_about_background');
	$latte_social_background = get_theme_mod('latte_social_background', get_template_directory_uri().'/assets/images/social.jpg' );
	$latte_services_background = get_theme_mod('latte_services_background');
	$latte_separator_background = get_theme_mod('latte_separator_background', get_template_directory_uri().'/assets/images/separator.jpg' );
	$latte_skills_background = get_theme_mod('latte_skills_background');
	$latte_portfolio_background = get_theme_mod('latte_portfolio_background');
	$latte_subscribe_background = get_theme_mod('latte_subscribe_background', get_template_directory_uri().'/assets/images/subscribe.jpg' );
	$latte_pricing_background = get_theme_mod('latte_pricing_background');
	$latte_testimonials_background = get_theme_mod('latte_testimonials_background', get_template_directory_uri().'/assets/images/testimonials.jpg' );
	$latte_blogposts_background = get_theme_mod('latte_blogposts_background');
	$latte_contact_background = get_theme_mod('latte_contact_background', get_template_directory_uri().'/assets/images/contact.jpg' );
?>

<script type="text/javascript">
jQuery(window).load(function() {
<?php if( isset($latte_preloader_display) && $latte_preloader_display != 1 ) : ?>
	/* Preloader */
	jQuery(".status").fadeOut();
	jQuery(".preloader").delay(1000).fadeOut("slow");
<?php endif; ?>

<?php if( isset($latte_animations_display) && $latte_animations_display != 1 ) : ?>
	/* scrollReval */
	window.sr = new scrollReveal();
<?php endif; ?>
});
jQuery(document).ready(function($) {
<?php if( is_page_template( 'template-home.php' ) ) : ?>
	/* Smooth Scroll */
	jQuery('a[href*=#]').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				jQuery('html,body').animate({
					scrollTop: target.offset().top
				}, 1200);
				return false;
			}
		}
	});

	/* Parallax */
<?php if(!empty($latte_intro_background)) : ?>
	$('.intro').parallax({imageSrc: '<?php echo $latte_intro_background; ?>', bleed: '10', androidFix: 'false'});
<?php endif; ?>
<?php if(!empty($latte_about_background)) : ?>
	$('.about').parallax({imageSrc: '<?php echo $latte_about_background; ?>', bleed: '10', androidFix: 'false'});
<?php endif; ?>
<?php if(!empty($latte_social_background)) : ?>
	$('.social').parallax({imageSrc: '<?php echo $latte_social_background; ?>', bleed: '10', androidFix: 'false'});
<?php endif; ?>
<?php if(!empty($latte_services_background)) : ?>
	$('.services').parallax({imageSrc: '<?php echo $latte_services_background; ?>', bleed: '10', androidFix: 'false'});
<?php endif; ?>
<?php if(!empty($latte_separator_background)) : ?>
	$('.separator').parallax({imageSrc: '<?php echo $latte_separator_background; ?>', bleed: '10', androidFix: 'false'});
<?php endif; ?>
<?php if(!empty($latte_skills_background)) : ?>
	$('.skills').parallax({imageSrc: '<?php echo $latte_skills_background; ?>', bleed: '10', androidFix: 'false'});
<?php endif; ?>
<?php if(!empty($latte_portfolio_background)) : ?>
	$('.portfolio').parallax({imageSrc: '<?php echo $latte_portfolio_background; ?>', bleed: '10', androidFix: 'false'});
<?php endif; ?>
<?php if(!empty($latte_subscribe_background)) : ?>
	$('.subscribe').parallax({imageSrc: '<?php echo $latte_subscribe_background; ?>', bleed: '10', androidFix: 'false'});
<?php endif; ?>
<?php if(!empty($latte_pricing_background)) : ?>
	$('.pricing').parallax({imageSrc: '<?php echo $latte_pricing_background; ?>', bleed: '10', androidFix: 'false'});
<?php endif; ?>
<?php if(!empty($latte_testimonials_background)) : ?>
	$('.testimonials').parallax({imageSrc: '<?php echo $latte_testimonials_background; ?>', bleed: '10', androidFix: 'false'});
<?php endif; ?>
<?php if(!empty($latte_blogposts_background)) : ?>
	$('.blogposts').parallax({imageSrc: '<?php echo $latte_blogposts_background; ?>', bleed: '10', androidFix: 'false'});
<?php endif; ?>
<?php if(!empty($latte_contact_background)) : ?>
	$('.contact').parallax({imageSrc: '<?php echo $latte_contact_background; ?>', bleed: '50', androidFix: 'false'});
<?php endif; ?>
<?php endif; ?>

<?php if( isset($latte_menu_display) && $latte_menu_display != 1 ) : ?>
	/* Enable Slideout Menu */
	var menuLeft = document.getElementById( 'pmenu' ),
	showLeftPush = document.getElementById( 'showLeftPush' ),
	hideLeftPush = document.getElementById( 'hideLeftPush' ),
	body = document.body;

	showLeftPush.onclick = function() {
		classie.toggle( this, 'active' );
		classie.toggle( body, 'pmenu-push-toright' );
		if (classie.has(showLeftPush,"fa-bars")) {
			classie.remove(showLeftPush,"fa-bars");
			classie.add(showLeftPush,"fa-times");
		} else {
			classie.add(showLeftPush,"fa-bars");
		}
		classie.toggle( menuLeft, 'pmenu-open' );
		disableOther( 'showLeftPush' );
	};
	hideLeftPush.onclick = function() {
		classie.toggle( this, 'active' );
		classie.toggle( body, 'pmenu-push-toright' );
		classie.toggle( menuLeft, 'pmenu-open' );
		disableOther( 'hideLeftPush' );
		classie.add(showLeftPush,"fa-bars");
	};

	function disableOther( button ) {
		if( button !== 'showLeftPush' ) {
			classie.toggle( showLeftPush, 'disabled' );
		}
	}
<?php endif; ?>

<?php if( is_page_template( 'template-home.php' ) ) : ?>
<?php if( isset($latte_skills_display) && $latte_skills_display != 1 ) : ?>
	/* Skillbar animation speed */
	jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
<?php endif; ?>

	/* Apply matchHeight to match services grid */
	var byRow = $('body').hasClass('pmenu-push');
	$('.col-md-12').each(function() {
		$(this).children('.service-box').matchHeight(byRow);
	});
	$('.col-md-12').each(function() {
		$(this).children('.portfolio-item').matchHeight(byRow);
	});
	$('.col-md-12').each(function() {
		$(this).children('.blog-item').matchHeight(byRow);
	});
	$('.wpcf7-form').each(function() {
		$(this).find('*').addClass('contact-form');
	});

<?php if( isset($latte_testimonials_display) && $latte_testimonials_display != 1 ) : ?>
	/* Enable Swiper for Testimonials */
	var mySwiper = new Swiper ('.swiper-container', {
		loop: true,
		autoplay:10000
	})
<?php endif; ?>
<?php endif; ?>
});
</script>
<?php
}

add_action ( 'wp_footer', 'latte_custom_js', 100 );

?>