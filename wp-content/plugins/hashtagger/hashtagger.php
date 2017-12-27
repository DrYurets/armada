<?php

/**
 * The hashtagger Plugin
 *
 * hashtagger allows usage of #hashtags, @usernames and $cashtags in posts
 *
 * @wordpress-plugin
 * Plugin Name: hashtagger
 * Plugin URI: http://petersplugins.com/free-wordpress-plugins/hashtagger/
 * Description: Use #hashtags, @usernames and $cashtags in your posts
 * Version: 3.8
 * Author: Peter Raschendorfer
 * Author URI: http://petersplugins.com
 * Text Domain: hashtagger
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * Load core plugin class and run the plugin
 */
require_once( plugin_dir_path( __FILE__ ) . '/inc/class-hashtagger.php' );
$pp_hashtagger = new PP_Hashtagger( __FILE__ );


/**
 * Theme function
 */
function do_hashtagger( $content ) {
  global $pp_hashtagger;
  return $pp_hashtagger->work( $content );
}

?>