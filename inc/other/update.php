<?php

function update_notifier_menu() {  
	$xml = get_latest_theme_version(43200); // This tells the function to cache the remote call for 43200 seconds (12 hours)
	$theme_data = wp_get_theme(); // Get theme data from style.css (current version is what we want)
	
	if(version_compare($theme_data->Version, $xml->latest) == -1) {
		add_dashboard_page( $theme_data->Name . __(' Theme Updates', 'latte'), $theme_data->Name . ' <span class="update-plugins count-1"><span class="update-count">1</span></span>', 'administrator', strtolower($theme_data->Name) . '-updates', 'update_notifier');
	}
}  

add_action('admin_menu', 'update_notifier_menu');

function update_notifier() { 
	$xml = get_latest_theme_version(43200); // This tells the function to cache the remote call for 43200 seconds (12 hours)
	$theme_data = wp_get_theme(); // Get theme data from style.css (current version is what we want) ?>
	
	<style>
		.update-nag {display: none;}
		#instructions {max-width: 800px;}
		h3.title {margin: 30px 0 0 0; padding: 30px 0 0 0; border-top: 1px solid #ddd;}
	</style>

	<div class="wrap">
	
		<h2><?php printf( __( '%1$s Theme Updates', 'latte' ), $theme_data->Name ); ?></h2>
		<div id="message" class="updated below-h2"><p><?php printf( __( '<strong>There is a new version of the %1$s theme available.</strong> You have version %2$s installed. Update to version %3$s.', 'latte' ), $theme_data->Name, $theme_data->Version, $xml->latest ); ?></p></div>
		
		<img style="float: left; margin: 0 20px 20px 0; border: 1px solid #ddd;" src="<?php echo get_bloginfo( 'template_url' ) . '/screenshot.png'; ?>" />
		
		<div id="instructions" style="max-width: 800px;">
			<h3><?php _e('Update Instructions', 'latte'); ?></h3>
			<p><?php _e('Make sure to create a backup of the Theme inside your WordPress installation folder <strong>/wp-content/themes/latte/</strong>', 'latte'); ?></p>
			<p><?php _e('Check your email for the latest version of the theme. If you didn\'t receive the email, then email at contact@hardeepasrani.com with your invoice to receive the latest version.', 'latte'); ?></p>
			<p><?php _e('After downloading the latest version, use <a target="_blank" href="https://wordpress.org/plugins/easy-theme-and-plugin-upgrades/">Easy Theme And Plugin Updates</a> plugin to update to the latest version of the theme. Feel free to email if you face any issues with this process.', 'latte'); ?></p>
		</div>
		
		<div class="clear"></div>
		
	</div>
	
<?php } 

// This function retrieves a remote xml file on my server to see if there's a new update 
// For performance reasons this function caches the xml content in the database for XX seconds ($interval variable)
function get_latest_theme_version($interval) {
	// remote xml file location
	$notifier_file_url = 'http://www.hardeepasrani.com/themes/latte/update.xml';
	
	$db_cache_field = 'latte-nollie-notifier-cache';
	$db_cache_field_last_updated = 'latte-nollie-notifier-last-updated';
	$last = get_option( $db_cache_field_last_updated );
	$now = time();
	// check the cache
	if ( !$last || (( $now - $last ) > $interval) ) {
		// cache doesn't exist, or is old, so refresh it
		if( function_exists('curl_init') ) { // if cURL is available, use it...
			$ch = curl_init($notifier_file_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			$cache = curl_exec($ch);
			curl_close($ch);
		} else {
			$cache = file_get_contents($notifier_file_url); // ...if not, use the common file_get_contents()
		}
		
		if ($cache) {			
			// we got good results
			update_option( $db_cache_field, $cache );
			update_option( $db_cache_field_last_updated, time() );			
		}
		// read from the cache file
		$notifier_data = get_option( $db_cache_field );
	} else {
		// cache file is fresh enough, so read from it
		$notifier_data = get_option( $db_cache_field );
	}
	
	if( $notifier_data ) $xml = @simplexml_load_string($notifier_data); 
	
	return $xml;
}

?>