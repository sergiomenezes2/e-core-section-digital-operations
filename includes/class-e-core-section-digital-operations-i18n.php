<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://studiovisual.com.br
 * @since      1.0.0
 *
 * @package    E_Core_Section_Digital_Operations
 * @subpackage E_Core_Section_Digital_Operations/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    E_Core_Section_Digital_Operations
 * @subpackage E_Core_Section_Digital_Operations/includes
 * @author     Studio Visual <smenezes@studiovisual.com.br>
 */
class E_Core_Section_Digital_Operations_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'e-core-section-digital-operations',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
