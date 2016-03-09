<?php
	$latte_map_location = get_theme_mod('latte_map_location',__( 'Madison Square Garden', 'latte' ));
?>

		<section class="map" id="map">
			<div class="map_overlay" onClick="style.pointerEvents='none'"></div>
			<iframe data-sr="ease-in-out wait 0.25s" class='map_frame' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q=<?php if(!empty($latte_map_location)) : echo esc_html($latte_map_location); endif; ?>&amp;output=embed&iwloc'></iframe>
		</section>
