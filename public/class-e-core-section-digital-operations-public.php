<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://studiovisual.com.br
 * @since      1.0.0
 *
 * @package    E_Core_Section_Digital_Operations
 * @subpackage E_Core_Section_Digital_Operations/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    E_Core_Section_Digital_Operations
 * @subpackage E_Core_Section_Digital_Operations/public
 * @author     Studio Visual <smenezes@studiovisual.com.br>
 */
class E_Core_Section_Digital_Operations_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_shortcode('section-digital-operations', [$this, 'section_digital_operations']);
	}

	/**
	 * Get template part function
	 *
	 * @return void
	 */
	function section_digital_operations() {
		ob_start();
		include plugin_dir_path( __FILE__ ) . 'partials/e-core-section-digital-operations-public-display.php';
		return ob_get_clean();
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in E_Core_Section_Digital_Operations_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The E_Core_Section_Digital_Operations_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/e-core-section-digital-operations-public.css', array(), $this->version, 'all' );

		// Adicionando o CSS do Slick
		wp_enqueue_style('slick-css', plugin_dir_url( __FILE__ ) . '/css/slick/slick.css', array(), $this->version);
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in E_Core_Section_Digital_Operations_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The E_Core_Section_Digital_Operations_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/e-core-section-digital-operations-public.js', array( 'jquery' ), $this->version, false );

		// Adicionando o JS do Slick
		wp_enqueue_script('slick-js', plugin_dir_url( __FILE__ ) . 'js/slick/slick.min.js', array('jquery'), $this->version, true);
	}

}
