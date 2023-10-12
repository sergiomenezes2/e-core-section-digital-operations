<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://studiovisual.com.br
 * @since             1.0.0
 * @package           E_Core_Section_Digital_Operations
 *
 * @wordpress-plugin
 * Plugin Name:       E-core Section Digital Operations
 * Plugin URI:        https://studiovisual.com.br
 * Description:       Plugin Criado para adicionar a nova Section Digital Operations
 * Version:           1.0.0
 * Author:            Studio Visual
 * Author URI:        https://studiovisual.com.br/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       e-core-section-digital-operations
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'E_CORE_SECTION_DIGITAL_OPERATIONS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-e-core-section-digital-operations-activator.php
 */
function activate_e_core_section_digital_operations() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-e-core-section-digital-operations-activator.php';
	E_Core_Section_Digital_Operations_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-e-core-section-digital-operations-deactivator.php
 */
function deactivate_e_core_section_digital_operations() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-e-core-section-digital-operations-deactivator.php';
	E_Core_Section_Digital_Operations_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_e_core_section_digital_operations' );
register_deactivation_hook( __FILE__, 'deactivate_e_core_section_digital_operations' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-e-core-section-digital-operations.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_e_core_section_digital_operations() {

	$plugin = new E_Core_Section_Digital_Operations();
	$plugin->run();

}
run_e_core_section_digital_operations();
