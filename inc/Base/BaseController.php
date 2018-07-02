<?php 
/**
 * @package  WriterzBayformPlugin
 */
namespace Inc\Base;

class BaseController
{
	public $plugin_path;

	public $plugin_url;

	public $plugin;

	//public $appdetails;

	public function __construct() {
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/writerzbayform.php';
		//$this->appdetails = $this->getappdetails();
	}

	public function activated( string $key )
	{
		$option = get_option( 'writerzbayform' );

		return isset( $option[ $key ] ) ? $option[ $key ] : false;
	}

	function getappdetails(){
		$stepone = explode('@', get_option( 'doctype' ));
		$doctype = [];
		foreach ($stepone as $key => $step) {
			$steptwo = explode(':', $step);
			$doctype[] = [
				'value' => $steptwo[0],
				'lable' => $steptwo[1]
			];
		}
		$steponesubject = explode('@', get_option( 'subject' ));
		$subject = [];
		foreach ($steponesubject as $key => $stepsubject) {
			$steptwosubject = explode(':', $stepsubject);
			$subject[] = [
				'value' => $steptwosubject[0],
				'lable' => $steptwosubject[1]
			];
		}
		$steponeacademic = explode('@', get_option( 'academic_level' ));
		$academic_level = [];
		foreach ($steponeacademic as $key => $stepacademic) {
			$steptwoacademic = explode(':', $stepacademic);
			$academic_level[] = [
				'value' => $steptwoacademic[0],
				'lable' => $steptwoacademic[1]
			];
		}
		$steponeurgency = explode('@', get_option( 'urgency' ));
		$urgency = [];
		foreach ($steponeurgency as $key => $stepurgency) {
			$steptwourgency = explode(':', $stepurgency);
			$urgency[] = [
				'f_value' => $steptwourgency[0],
				'lable' => $steptwourgency[1],
				'value' => $steptwourgency[2],
				'in' => $steptwourgency[3]
			];
		}
		$orderdata = [
			//'baseprice' => 10,
			'stripe_key' => get_option( 'stripe_key' ),
			'stripe_logourl' => get_option( 'stripe_logourl' ),
			'main_domain' => get_option( 'main_domain' ),
			'website_domain' => get_permalink( get_option( 'orderpage' ) ),
			'client_id' => get_option( 'client_id' ),
			'client_secret' => get_option( 'client_secret' ),
			'baseprice' => get_option( 'base_price' ),
			'doctype' => $doctype,
			'subject' => $subject,
			'urgency' => $urgency,
			'academic_level' => $academic_level
		];
		return $orderdata;
	}
}