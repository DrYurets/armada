<?php
/**
 * Plugin Name: Scheduled Post Trigger
 * Description: This plugin triggers scheduled posts that were missed by the server's cron
 * Version: 1.8
 * Author: Jennifer Moss - Moss Web Works
 * Author URI: http://mosswebworks.com
 * License: GPL2
 */
function pubScheduledPost() {
	global $wpdb;
	$now=gmdate('Y-m-d H:i:s');
	$sql="Select ID from $wpdb->posts where post_status='future' and post_date_gmt<'$now'";
	$resulto = $wpdb->get_results($sql);
 	if($resulto) {
		foreach( $resulto as $thisarr ) {
			wp_publish_post($thisarr->ID);
		}
	}
}
add_action("wp_head", "pubScheduledPost"); 
?>