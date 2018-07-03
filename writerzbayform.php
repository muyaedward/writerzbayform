<?php
/**
 * @package  WriterzBayformPlugin
 */
/*
/*
	Plugin Name: WriterzBay Order Form
	Plugin URI: https://github.com/muyaedward/writerzbayform
	Description: Wordpress plugin to manage orders in writerzbay website.
	Version: 2.0.28
	Author: Edward Muya Mwangi
	Author URI: https://www.writersbayapp.com
	Licence: GPLv2 or later
	Text Domain: writerzbayform
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// If this file is called directly, abort!!!
defined('ABSPATH' ) or die('Not all who wander are lost. But you are lost.');

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_writerzbayform_plugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_writerzbayform_plugin' );
/**
 * The code that runs during plugin deactivation
 */
function deactivate_writerzbayform_plugin() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_writerzbayform_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}

require 'plugin-update-checker/plugin-update-checker.php';

require 'pagetemplater.php';

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/muyaedward/writerzbayform/',
	__FILE__,
	'writerzbayform'
);