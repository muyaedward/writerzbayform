<?php 
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Base;

use Inc\Base\BaseController;

class Enqueue extends BaseController
{
	public function register() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ));
		add_action( 'wp_print_styles', array( $this, 'enqueuestyle' ), 99);
	}

	function enqueue() {
		if (is_page(get_option( 'orderpage' ))) {
			wp_enqueue_script( 'orderform', $this->plugin_url . 'assets/js/placeorder.js' );
		}
		if (is_page(get_option( 'loginpage' ))) {
			wp_enqueue_script( 'orderform', $this->plugin_url . 'assets/js/login.js' );
		}
	}

	function enqueuestyle() {
		if (is_page(get_option( 'orderpage' ))) {
			wp_enqueue_style( 'orderform', $this->plugin_url . 'assets/css/placeorder.css' );
		}
		if (is_page(get_option( 'loginpage' ))) {
			wp_enqueue_style( 'orderform', $this->plugin_url . 'assets/css/login.css' );
		}
	}
}