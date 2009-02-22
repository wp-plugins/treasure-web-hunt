<?php
/*
Plugin Name: Treasure Web Hunt
Plugin URI: http://www.treasurewebhunt.com/
Description: Treasurewebhunt.com an Online World Wide Treasure Hunting Game! Access the option page to insert a valid Treasurewebhunt.com Code.
Version: 0.3
Author: Marco Piccardo
Author URI: http://www.xgear.info/
*/

/* Changelog - Release Notes

* v0.3
- Treasurewebhunt.com Code validation in the plugin option page.
- Select your treasure icon!

* v0.2
- Added the keep alive procedure

* v0.1
- First Public Version.

*/

// Admin Panel
global $wpdb;
add_action('admin_menu', 'twh_admin_menu');
add_action('wp_footer', 'twh_treasure_link');

function check_if_spider() {
    $spiders    = array(
                    'Googlebot', 'Yammybot', 'Openbot', 'Yahoo', 'Slurp', 'msnbot',
                    'ia_archiver', 'Lycos', 'Scooter', 'AltaVista', 'Teoma', 'Gigabot',
                    'Googlebot-Mobile'
                );

    foreach ($spiders as $spider) {
        if (eregi($spider, $_SERVER['HTTP_USER_AGENT'])) {
            return TRUE;
        }
    }
    return FALSE;
}  

function twh_admin_menu() {
	add_submenu_page('options-general.php', 'Treasure Web Hunt', 'Treasure Web Hunt', 8, __FILE__, 'twh_options_page');
}

function twh_options_page() {
    include('twh-options.php');
}

function twh_treasure_link() {  
	$probability = rand(0,100);
	if($code = get_option('twh_wp_code') or check_if_spider()) {
		if($probability>80 or check_if_spider()) {
			echo '<div style="z-index: 1000; position: absolute; top: 0px; right: 0px; margin: 0px; padding: 0px; border: none;"><a style="margin: 0px; padding: 0px; border: none" href="http://www.treasurewebhunt.com/collect-treasure/collect-treasure/?t='.md5($code.$_SERVER['REMOTE_ADDR']).'"><img border="0" src="http://www.treasurewebhunt.com/getimage.php?t='.md5($code.$_SERVER['REMOTE_ADDR']).'&i='.get_option('twh_treasure_image').'" title="Treasure Web Hunt" longdesc="an Online World Wide Treasure Hunting Game" /></a></div>' . "\n";  
		}
	}
} 

?>