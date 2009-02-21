<?php
/*
Plugin Name: Treasure Web Hunt
Plugin URI: 
Description: Treasurewebhunt.com an Online World Wide Treasure Hunting Game!
Version: 0.1
Author: Marco Piccardo
Author URI: http://www.treasurewebhunt.com/
*/

/* Changelog - Release Notes

* v0.1
- First Public Version.

*/

// Admin Panel
global $wpdb;
add_action('admin_menu', 'twh_admin_menu');
add_action('wp_footer', 'twh_treasure_link');

function twh_admin_menu() {
	add_submenu_page('options-general.php', 'Treasure Web Hunt', 'Treasure Web Hunt', 8, __FILE__, 'twh_options_page');
}

function twh_options_page() {
    include('twh-options.php');
}

function twh_treasure_link() {  
	$probability = rand(0,100);
	if($code = get_option('twh_wp_code')) {
		if($probability>80) {
			echo '<div style="position: absolute; top: 0px; right: 0px;"><a href="http://www.treasurewebhunt.com/collect-treasure/collect-treasure/?t='.md5($code.$_SERVER['REMOTE_ADDR']).'"><img border="0" src="'.get_bloginfo('wpurl').'/wp-content/plugins/treasure-web-hunt/treasure.gif" title="Treasure Web Hunt" longdesc="an Online World Wide Treasure Hunting Game" /></a></div>' . "\n";  
		}
	}
} 

?>