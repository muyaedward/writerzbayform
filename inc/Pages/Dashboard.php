<?php 
/**
 * @package  WriterzBayformPlugin
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController
{
	public $settings;

	public $callbacks;

	public $callbacks_mngr;

	public $pages = array();

	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->callbacks_mngr = new ManagerCallbacks();

		$this->setPages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();  

		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->register();

		$this->settings->addSubPages( $this->subpages )->register();
	}

	public function setPages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'WriterzBay Plugin', 
				'menu_title' => 'WriterzBay', 
				'capability' => 'manage_options', 
				'menu_slug' => 'writerzbayform', 
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-store', 
				'position' => 50
			)
		);
		$this->subpages = array(
			array(
				'parent_slug' => 'writerzbayform',
				'page_title' => 'Main settings',
				'menu_title' => 'Settings',
				'capability' => 'manage_options',
				'menu_slug' => 'main_settings',
				'callback' => array( $this->callbacks, 'mainSettings' )
			),
			array(
				'parent_slug' => 'writerzbayform',
				'page_title' => 'About Writerz Bay',
				'menu_title' => 'About',
				'capability' => 'manage_options',
				'menu_slug' => 'about_writerzbay',
				'callback' => array( $this->callbacks, 'aboutWriterzbay' )
			)
		);
	}

	public function setSettings()
	{
		// Register settings
		$args = array(
			array(
				'option_group' => 'writerzbay_options_group',
				'option_name' => 'doctype',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group' )
			),
			array(
				'option_group' => 'writerzbay_options_group',
				'option_name' => 'subject',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group' )
			),
			array(
				'option_group' => 'writerzbay_options_group',
				'option_name' => 'urgency',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group' )
			),
			array(
				'option_group' => 'writerzbay_options_group',
				'option_name' => 'academic_level',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group' )
			),
			array(
				'option_group' => 'writerzbay_options_group',
				'option_name' => 'order_style',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group' )
			),
			array(
				'option_group' => 'writerzbay_options_group',
				'option_name' => 'preferred_writer',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group' )
			),
			array(
				'option_group' => 'writerzbay_options_group',
				'option_name' => 'powerpoint',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group' )
			),
			array(
				'option_group' => 'writerzbay_options_group',
				'option_name' => 'plagiarismreport',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group' )
			),
			array(
				'option_group' => 'writerzbay_options_group',
				'option_name' => 'abstractpage',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group' )
			),
			array(
				'option_group' => 'writerzbay_options_group',
				'option_name' => 'vipsupport',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group' )
			),
			array(
				'option_group' => 'writerzbay_options_group_orders',
				'option_name' => 'base_price',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group_orders' )
			),
			array(
				'option_group' => 'writerzbay_options_group_orders',
				'option_name' => 'logo_url',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group_orders' )
			),
			array(
				'option_group' => 'writerzbay_options_group_orders',
				'option_name' => 'studentsite_name',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group_orders' )
			),
			array(
				'option_group' => 'writerzbay_options_group_orders',
				'option_name' => 'managepage',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group_orders' )
			),
			array(
				'option_group' => 'writerzbay_options_group_orders',
				'option_name' => 'main_domain',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group_orders' )
			),
			array(
				'option_group' => 'writerzbay_options_group_orders',
				'option_name' => 'website_domain',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group_orders' )
			),
			array(
				'option_group' => 'writerzbay_options_group_orders',
				'option_name' => 'client_id',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group_orders' )
			),
			array(
				'option_group' => 'writerzbay_options_group_orders',
				'option_name' => 'client_secret',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group_orders' )
			),
			array(
				'option_group' => 'writerzbay_options_group_orders',
				'option_name' => 'orderpage',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group_orders' )
			),
			array(
				'option_group' => 'writerzbay_options_group_orders',
				'option_name' => 'loginpage',
				'callback' => array( $this->callbacks_mngr, 'writerzbay_options_group_orders' )
			)
		);

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'orderfields_section',
				'title' => 'Settings',
				'callback' => array( $this->callbacks_mngr, 'adminSectionManager' ),
				'page' => 'writerzbayform'
			),
			array(
				'id' => 'main_settings_section',
				'title' => 'Main Settings',
				'callback' => array( $this->callbacks_mngr, 'adminMainSettings' ),
				'page' => 'main_settings'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		// Register fields
		//$args = array();
		$args = array(
			array(
				'id' => 'doctype',
				'title' => 'Document type:',
				'callback' => array( $this->callbacks_mngr, 'doctype' ),
				'page' => 'writerzbayform',
				'section' => 'orderfields_section',
				'args' => array(
					'value' => 'Admission essay:Analytical essay:Annotated bibliography:Argumentative essay:Article revie: Assessment:Biographies:Book review:Business plan:Capstone project:Other'
				)
			),
			array(
				'id' => 'subject',
				'title' => 'Subject:',
				'callback' => array( $this->callbacks_mngr, 'subject' ),
				'page' => 'writerzbayform',
				'section' => 'orderfields_section',
				'args' => array(
					'label_for' => 'subject',
					'value' => 'Accounting:Anthropology:Architecture:Art:Astronomy:Aviation:Biology:Business:Chemistry:Classic English Literature:Computer science:Criminal law:Culture:Ecology:Economics:Education:Engineering:English',
					'class' => ''
				)
			),
			array(
				'id' => 'order_style',
				'title' => 'Style/Citation:',
				'callback' => array( $this->callbacks_mngr, 'order_style' ),
				'page' => 'writerzbayform',
				'section' => 'orderfields_section',
				'args' => array(
					'value' => 'MLA:APA:Chicago/Turabian:Harvard:Not applicable'
				)
			),
			array(
				'id' => 'urgency',
				'title' => 'Urgency:',
				'callback' => array( $this->callbacks_mngr, 'urgency' ),
				'page' => 'writerzbayform',
				'section' => 'orderfields_section',
				'args' => array(
					'label_for' => 'urgency',
					'value' => '0:14 days:336:1@0:7 days:168:1.45@0:5 days:120:1.56@1:3 days:72:1.67@0:2 days:48:1.90@0:1 day:24:2.22@0:12 hours:12:2.45@0:8 hours:8:2.56',
					'class' => ''
				)
			),
			array(
				'id' => 'academic_level',
				'title' => 'Academic Level:',
				'callback' => array( $this->callbacks_mngr, 'academic_level' ),
				'page' => 'writerzbayform',
				'section' => 'orderfields_section',
				'args' => array(
					'label_for' => 'academic_level',
					'value' => '1:High school@1.2:College@1.4:Undergraduate@1.8:Masters@2.3:PHD@5:Admission',
					'class' => ''
				)
			),
			array(
				'id' => 'preferred_writer',
				'title' => 'Preferred Writer:',
				'callback' => array( $this->callbacks_mngr, 'preferred_writer' ),
				'page' => 'writerzbayform',
				'section' => 'orderfields_section',
				'args' => array(
					'label_for' => 'preferred_writer',
					'value' => '5.1:Top writer@4.25:Advanced@0.1:Previous@0.01:Regular',
					'class' => ''
				)
			),			
			array(
				'id' => 'powerpoint',
				'title' => 'Powerpoint presentation:',
				'callback' => array( $this->callbacks_mngr, 'powerpoint' ),
				'page' => 'writerzbayform',
				'section' => 'orderfields_section',
				'args' => array(
					'label_for' => 'powerpoint',
					'value' => '1:2:PowerPoint slides (1/2 page fee)',
					'class' => ''
				)
			),
			array(
				'id' => 'plagiarismreport',
				'title' => 'Plagiarism Report:',
				'callback' => array( $this->callbacks_mngr, 'plagiarismreport' ),
				'page' => 'writerzbayform',
				'section' => 'orderfields_section',
				'args' => array(
					'label_for' => 'plagiarismreport',
					'value' => '1:Plagiarism report:5.1',
					'class' => ''
				)
			),
			array(
				'id' => 'abstractpage',
				'title' => 'Abstract page:',
				'callback' => array( $this->callbacks_mngr, 'abstractpage' ),
				'page' => 'writerzbayform',
				'section' => 'orderfields_section',
				'args' => array(
					'label_for' => 'abstractpage',
					'value' => '1:Abstract page (1 page fee):9.99',
					'class' => ''
				)
			),
			array(
				'id' => 'vipsupport',
				'title' => 'VIP support:',
				'callback' => array( $this->callbacks_mngr, 'vipsupport' ),
				'page' => 'writerzbayform',
				'section' => 'orderfields_section',
				'args' => array(
					'label_for' => 'vipsupport',
					'value' => '1:VIP support:14.99',
					'class' => ''
				)
			),
			array(
				'id' => 'base_price',
				'title' => 'Base price:',
				'callback' => array( $this->callbacks_mngr, 'base_price' ),
				'page' => 'main_settings',
				'section' => 'main_settings_section',
				'args' => array(
					'label_for' => 'base_price',
					'value' => 10,
					'class' => ''
				)
			),
			array(
				'id' => 'logo_url',
				'title' => 'Logo url:',
				'callback' => array( $this->callbacks_mngr, 'logo_url' ),
				'page' => 'main_settings',
				'section' => 'main_settings_section',
				'args' => array(
					'label_for' => 'logo_url',
					'value' => 'https://www.questdesigners.com/wp-content/uploads/2015/11/Quest-Logo-300x92.png',
					'class' => ''
				)
			),
			array(
				'id' => 'studentsite_name',
				'title' => 'Student site name:',
				'callback' => array( $this->callbacks_mngr, 'studentsite_name' ),
				'page' => 'main_settings',
				'section' => 'main_settings_section',
				'args' => array(
					'label_for' => 'studentsite_name',
					'value' => 'Student website',
					'class' => ''
				)
			),
			array(
				'id' => 'main_domain',
				'title' => 'Main domain:',
				'callback' => array( $this->callbacks_mngr, 'main_domain' ),
				'page' => 'main_settings',
				'section' => 'main_settings_section',
				'args' => array(
					'label_for' => 'main_domain',
					'value' => '',
					'class' => ''
				)
			),
			array(
				'id' => 'website_domain',
				'title' => 'Plugin domain:',
				'callback' => array( $this->callbacks_mngr, 'website_domain' ),
				'page' => 'main_settings',
				'section' => 'main_settings_section',
				'args' => array(
					'label_for' => 'website_domain',
					'value' => get_site_url(),
					'class' => ''
				)
			),
			array(
				'id' => 'client_id',
				'title' => 'Client id:',
				'callback' => array( $this->callbacks_mngr, 'client_id' ),
				'page' => 'main_settings',
				'section' => 'main_settings_section',
				'args' => array(
					'label_for' => 'client_id',
					'value' => 2,
					'class' => ''
				)
			),
			array(
				'id' => 'client_secret',
				'title' => 'Client secret key:',
				'callback' => array( $this->callbacks_mngr, 'client_secret' ),
				'page' => 'main_settings',
				'section' => 'main_settings_section',
				'args' => array(
					'label_for' => 'client_secret',
					'value' => '',
					'class' => ''
				)
			),
			array(
				'id' => 'orderpage',
				'title' => 'Order page:',
				'callback' => array( $this->callbacks_mngr, 'orderpage' ),
				'page' => 'main_settings',
				'section' => 'main_settings_section',
				'args' => array(
					'label_for' => 'orderpage',
					'value' => '',
					'class' => ''
				)
			),
			array(
				'id' => 'loginpage',
				'title' => 'Login page:',
				'callback' => array( $this->callbacks_mngr, 'loginpage' ),
				'page' => 'main_settings',
				'section' => 'main_settings_section',
				'args' => array(
					'label_for' => 'loginpage',
					'value' => '',
					'class' => ''
				)
			),
			array(
				'id' => 'managepage',
				'title' => 'Main page(Order management page):',
				'callback' => array( $this->callbacks_mngr, 'managepage' ),
				'page' => 'main_settings',
				'section' => 'main_settings_section',
				'args' => array(
					'label_for' => 'managepage',
					'value' => '',
					'class' => ''
				)
			)


		);
		$this->settings->setFields( $args );
	}
}