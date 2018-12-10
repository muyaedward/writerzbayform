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
			wp_enqueue_script( 'orderform', '/admin/assets/js/placeorder.js' );
		}
		if (is_page(get_option( 'loginpage' ))) {
			wp_enqueue_script( 'orderform', '/admin/assets/js/login.js' );
		}
	}

	function enqueuestyle() {
		if (is_page(get_option( 'orderpage' ))) {
			wp_enqueue_style( 'bootstrap', '/admin/assets/css/bootstrap.css' );
			wp_enqueue_style( 'placeorder', '/admin/assets/css/placeorder.css' );
		}
		/* if (is_page(get_option( 'loginpage' ))) {
			wp_enqueue_style( 'logincss', '/admin/assets/css/login.css' );
		} */
	}
}