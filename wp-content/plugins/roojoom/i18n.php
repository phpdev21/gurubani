<?php
/*
 * Security check
 * Exit if file accessed directly.
 *
 * @since 1.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/*
 * Internationalization
 * Load plugin translation files.
 *
 * @since 1.2
 */
class Roojoomi18n {

	/*
	 * Constructor
	 */
	public function __construct() {

		// Load textdomain
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

	}

	/*
	 * Load the text domain for translation
	 */
	public function load_textdomain() {

		load_plugin_textdomain( 'roojoom' );

	}

}
new Roojoomi18n();
