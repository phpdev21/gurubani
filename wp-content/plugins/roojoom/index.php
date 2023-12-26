<?php
/*
Plugin Name: Roojoom
Plugin URI:  https://wordpress.org/plugins/roojoom/
Description: Embed your content from roojoom.com into your WordPress site.
Version:     1.4
Author:      Rami Yushuvaev
Author URI:  https://GenerateWP.com/
Text Domain: roojoom
*/



/**
 * Security check
 * Exit if file accessed directly.
 *
 * @since 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Include plugin files
 */
include_once ( plugin_dir_path( __FILE__ ) . 'includes/activator.php' );   // Add Activation hook
include_once ( plugin_dir_path( __FILE__ ) . 'includes/deactivator.php' ); // Add Deactivation hook
include_once ( plugin_dir_path( __FILE__ ) . 'includes/admin.php' );       // Add Admin Page
include_once ( plugin_dir_path( __FILE__ ) . 'includes/shortcode.php' );   // Add Shortcode
include_once ( plugin_dir_path( __FILE__ ) . 'includes/oembed.php' );      // Add oEmbed Provider
include_once ( plugin_dir_path( __FILE__ ) . 'includes/widget.php' );      // Add Widget
include_once ( plugin_dir_path( __FILE__ ) . 'includes/i18n.php' );        // Add Internationalization support



/*
 * Add settings link on plugin page
 *
 * @since 1.0
 */
function roojoom_settings_link( $links ) {
	$links[] = '<a href="' . admin_url( 'options-general.php?page=roojoom' ) . '">' . __( 'Settings' ) . '</a>';
	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'roojoom_settings_link' );
