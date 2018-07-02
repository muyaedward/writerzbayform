<?php 
/**
 * @package  WriterzBayformPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function aboutWriterzbay()
	{
		return require_once( "$this->plugin_path/templates/about.php" );
	}

	public function mainSettings()
	{
		return require_once( "$this->plugin_path/templates/settings.php" );
	}	

	public function adminChat()
	{
		return require_once( "$this->plugin_path/templates/chat.php" );
	}
}