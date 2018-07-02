<?php
/**
 * @package  WriterzBayformPlugin
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		$default = array();

		if ( ! get_option( 'writerzbayform' ) ) {
			update_option( 'writerzbayform', $default );
		}
	}
}