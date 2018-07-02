<?php 
/**
 * @package  WriterzBayformPlugin
 */
namespace Inc\Api;

class SettingsApi
{
	public $admin_pages = array();

	public $admin_subpages = array();

	public $settings = array();

	public $sections = array();

	public $fields = array();

	public function register()
	{
		if ( ! empty($this->admin_pages) || ! empty($this->admin_subpages) ) {
			add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );
		}

		if ( !empty($this->settings) ) {
			add_action( 'admin_init', array( $this, 'registerCustomFields' ) );
		}
	}

	public function addPages( array $pages )
	{
		$this->admin_pages = $pages;

		return $this;
	}

	public function withSubPage( $title = null ) 
	{
		if ( empty($this->admin_pages) ) {
			return $this;
		}

		$admin_page = $this->admin_pages[0];

		$subpage = array(
			array(
				'parent_slug' => $admin_page['menu_slug'], 
				'page_title' => $admin_page['page_title'], 
				'menu_title' => ($title) ? $title : $admin_page['menu_title'], 
				'capability' => $admin_page['capability'], 
				'menu_slug' => $admin_page['menu_slug'], 
				'callback' => $admin_page['callback']
			)
		);

		$this->admin_subpages = $subpage;

		return $this;
	}

	public function addSubPages( array $pages )
	{
		$this->admin_subpages = array_merge( $this->admin_subpages, $pages );

		return $this;
	}

	public function addAdminMenu()
	{
		foreach ( $this->admin_pages as $page ) {
			add_menu_page( $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position'] );
		}

		foreach ( $this->admin_subpages as $page ) {
			add_submenu_page( $page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'] );
		}
	}

	public function setSettings( array $settings )
	{
		$this->settings = $settings;

		return $this;
	}

	public function setSections( array $sections )
	{
		$this->sections = $sections;

		return $this;
	}

	public function setFields( array $fields )
	{
		$this->fields = $fields;

		return $this;
	}

	public function registerCustomFields()
	{
		// register setting
		foreach ( $this->settings as $setting ) {
			register_setting( $setting["option_group"], $setting["option_name"], ( isset( $setting["callback"] ) ? $setting["callback"] : '' ) );
		}

		// add settings section
		foreach ( $this->sections as $section ) {
			add_settings_section( $section["id"], $section["title"], ( isset( $section["callback"] ) ? $section["callback"] : '' ), $section["page"] );
		}

		// add settings field
		foreach ( $this->fields as $field ) {
			add_settings_field( $field["id"], $field["title"], ( isset( $field["callback"] ) ? $field["callback"] : '' ), $field["page"], $field["section"], ( isset( $field["args"] ) ? $field["args"] : '' ) );
		}
	}
}


//Fatal error: Uncaught TypeError: Argument 1 passed to Inc\Api\SettingsApi::withSubPage() must be an instance of Inc\Api\string, string given, called in /home/wmasters/test.madayer.com/wp-content/plugins/writerzbayform-master/inc/Pages/Dashboard.php on line 0 and defined in /home/wmasters/test.madayer.com/wp-content/plugins/writerzbayform-master/inc/Api/SettingsApi.php:0 Stack trace: #0 /home/wmasters/test.madayer.com/wp-content/plugins/writerzbayform-master/inc/Pages/Dashboard.php(0): Inc\Api\SettingsApi->withSubPage('Dashboard') #1 /home/wmasters/test.madayer.com/wp-content/plugins/writerzbayform-master/inc/Init.php(0): Inc\Pages\Dashboard->register() #2 /home/wmasters/test.madayer.com/wp-content/plugins/writerzbayform-master/writerzbayform.php(62): Inc\Init::register_services() #3 /home/wmasters/test.madayer.com/wp-admin/includes/plugin.php(1897): include('/home/wmasters/...') #4 /home/wmasters/test.madayer.com/wp-admin/plugins.php(172): plugin_sandbox_scrape('writerzbayform-...') #5 {main} thrown in /home/wmasters/test.madayer.com/wp-content/plugins/writerzbayform-master/inc/Api/SettingsApi.php on line 0