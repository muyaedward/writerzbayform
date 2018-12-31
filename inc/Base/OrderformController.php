<?php 
/**
 * @package  WriterzBayformPlugin
 */
namespace Inc\Base;
use Inc\Base\BaseController;
/**
* 
*/
class OrderformController extends BaseController
{
	public function register() {
		add_shortcode('orderform', array( $this, 'get_orderform' ));
		add_shortcode('loginform', array( $this, 'login_orderform' ));
		add_shortcode('manageorders', array( $this, 'manageorders' ));
	}
	function get_orderform() {
		//dd(require_once( "$this->plugin_path/templates/orderform.php" ));
		require_once( "$this->plugin_path/templates/orderform.php" );
	}

	function login_orderform() {
		require_once( "$this->plugin_path/templates/loginform.php" );
	}

	function manageorders() {
		require_once( "$this->plugin_path/templates/manage.php" );
	}
}