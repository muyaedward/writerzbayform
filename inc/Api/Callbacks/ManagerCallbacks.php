<?php 
/**
 * @package  WriterzBayformPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
	public function checkboxSanitize( $input )
	{
		$output = array();

		foreach ( $this->managers as $key => $value ) {
			$output[$key] = isset( $input[$key] ) ? true : false;
		}

		return $output;
	}
	public function writerzbay_options_group( $input ) 
	{
		return $input;
	}

	public function writerzbay_options_group_orders( $input ) 
	{
		return $input;
	}
	
	public function doctype($args)
	{
		$doctypeplugin = $args['value'];
		$doctypedatabase = get_option( 'doctype' );
		$escapeddoctype = esc_attr( get_option( 'doctype' ) );
		$doctype =  empty($doctypedatabase) ? $doctypeplugin : $escapeddoctype ;	
		echo '<textarea name="doctype" rows="5" class="regular-text">'.$doctype.'</textarea>';
	}

	public function subject($args)
	{
		$subjectplugin = $args['value'];
		$subjectdatabase = get_option( 'subject' );
		$escapedsubject = esc_attr( get_option( 'subject' ) );
		$subject =  empty($subjectdatabase) ? $subjectplugin : $escapedsubject ;
		echo '<textarea name="subject" rows="5" class="regular-text">'.$subject.'</textarea>';
	}
	public function order_style($args)
	{
		$order_styleplugin = $args['value'];
		$order_styledatabase = get_option( 'order_style' );
		$escapedorder_style = esc_attr( get_option( 'order_style' ) );
		$order_style =  empty($order_styledatabase) ? $order_styleplugin : $escapedorder_style ;
		echo '<textarea name="order_style" rows="5" class="regular-text">'.$order_style.'</textarea>';
	}
	public function urgency($args)
	{
		$urgencyplugin = $args['value'];
		$urgencydatabase = get_option( 'urgency' );
		$escapedurgency = esc_attr( get_option( 'urgency' ) );
		$urgency =  empty($urgencydatabase) ? $urgencyplugin : $escapedurgency ;
		echo '<textarea name="urgency" rows="5" class="regular-text">'.$urgency.'</textarea>';
	}

	public function academic_level($args)
	{
		$academic_levelplugin = $args['value'];
		$academic_leveldatabase = get_option( 'academic_level' );
		$escapedacademic_level = esc_attr( get_option( 'academic_level' ) );
		$academic_level =  empty($academic_leveldatabase) ? $academic_levelplugin : $escapedacademic_level ;
		echo '<textarea name="academic_level" rows="5" class="regular-text">'.$academic_level.'</textarea>';
	}
	public function preferred_writer($args)
	{
		$preferred_writerplugin = $args['value'];
		$preferred_writerdatabase = get_option( 'preferred_writer' );
		$escapedpreferred_writer = esc_attr( get_option( 'preferred_writer' ) );
		$preferred_writer =  empty($preferred_writerdatabase) ? $preferred_writerplugin : $escapedpreferred_writer ;
		echo '<textarea name="preferred_writer" rows="5" class="regular-text">'.$preferred_writer.'</textarea>';
	}

	public function powerpoint($args)
	{
		$powerpointplugin = $args['value'];
		$powerpointdatabase = get_option( 'powerpoint' );
		$escapedpowerpoint = esc_attr( get_option( 'powerpoint' ) );
		$powerpoint =  empty($powerpointdatabase) ? $powerpointplugin : $escapedpowerpoint ;
		echo '<textarea name="powerpoint" rows="5" class="regular-text">'.$powerpoint.'</textarea>';
	}

	public function plagiarismreport($args)
	{
		$plagiarismreportplugin = $args['value'];
		$plagiarismreportdatabase = get_option( 'plagiarismreport' );
		$escapedplagiarismreport = esc_attr( get_option( 'plagiarismreport' ) );
		$plagiarismreport =  empty($plagiarismreportdatabase) ? $plagiarismreportplugin : $escapedplagiarismreport ;
		echo '<textarea name="plagiarismreport" rows="5" class="regular-text">'.$plagiarismreport.'</textarea>';
	}

	public function abstractpage($args)
	{
		$abstractpageplugin = $args['value'];
		$abstractpagedatabase = get_option( 'abstractpage' );
		$escapedabstractpage = esc_attr( get_option( 'abstractpage' ) );
		$abstractpage =  empty($abstractpagedatabase) ? $abstractpageplugin : $escapedabstractpage ;
		echo '<textarea name="abstractpage" rows="5" class="regular-text">'.$abstractpage.'</textarea>';
	}

	public function vipsupport($args)
	{
		$vipsupportplugin = $args['value'];
		$vipsupportdatabase = get_option( 'vipsupport' );
		$escapedvipsupport = esc_attr( get_option( 'vipsupport' ) );
		$vipsupport =  empty($vipsupportdatabase) ? $vipsupportplugin : $escapedvipsupport ;
		echo '<textarea name="vipsupport" rows="5" class="regular-text">'.$vipsupport.'</textarea>';
	}

	public function logo_url($args)
	{
		$logo_urlplugin = $args['value'];
		$logo_urldatabase = get_option( 'logo_url' );
		$escapedlogo_url = esc_attr( get_option( 'logo_url' ) );
		$logo_url =  empty($logo_urldatabase) ? $logo_urlplugin : $escapedlogo_url ;
		echo '<textarea name="logo_url" rows="5" class="regular-text">'.$logo_url.'</textarea>';
	}

	public function studentsite_name($args)
	{
		$studentsite_nameplugin = $args['value'];
		$studentsite_namedatabase = get_option( 'studentsite_name' );
		$escapedstudentsite_name = esc_attr( get_option( 'studentsite_name' ) );
		$studentsite_name =  empty($studentsite_namedatabase) ? $studentsite_nameplugin : $escapedstudentsite_name ;
		echo '<textarea name="studentsite_name" rows="5" class="regular-text">'.$studentsite_name.'</textarea>';
	}

	public function base_price($args)
	{
		$base_priceplugin = $args['value'];
		$base_pricedatabase = get_option( 'base_price' );
		$escapedbase_price = esc_attr( get_option( 'base_price' ) );
		$base_price =  empty($base_pricedatabase) ? $base_priceplugin : $escapedbase_price ;
		echo '<input type="text" class="regular-text" name="base_price" value="'.$base_price.'" placeholder="Base price" />';
	}	
	public function main_domain($args)
	{
		$main_domainplugin = $args['value'];
		$main_domaindatabase = get_option( 'main_domain' );
		$escapedmain_domain = esc_attr( get_option( 'main_domain' ) );
		$main_domain =  empty($main_domaindatabase) ? $main_domainplugin : $escapedmain_domain ;
		echo '<input type="text" class="regular-text" name="main_domain" value="'.$main_domain.'" placeholder="Main domain" />';
	}

	public function website_domain($args)
	{
		$website_domainplugin = $args['value'];
		$website_domaindatabase = get_option( 'website_domain' );
		$escapedwebsite_domain = esc_attr( get_option( 'website_domain' ) );
		$website_domain =  empty($website_domaindatabase) ? $website_domainplugin : $escapedwebsite_domain ;
		echo '<input type="text" class="regular-text" name="website_domain" value="'.$website_domain.'" placeholder="Plugin domain" />';
	}

	public function client_id($args)
	{
		$client_idplugin = $args['value'];
		$client_iddatabase = get_option( 'client_id' );
		$escapedclient_id = esc_attr( get_option( 'client_id' ) );
		$client_id =  empty($client_iddatabase) ? $client_idplugin : $escapedclient_id ;
		echo '<input type="text" class="regular-text" name="client_id" value="'.$client_id.'" placeholder="Client secret key" />';
	}

	public function client_secret($args)
	{
		$client_secretplugin = $args['value'];
		$client_secretdatabase = get_option( 'client_secret' );
		$escapedclient_secret = esc_attr( get_option( 'client_secret' ) );
		$client_secret =  empty($client_secretdatabase) ? $client_secretplugin : $escapedclient_secret ;
		echo '<input type="text" class="regular-text" name="client_secret" value="'.$client_secret.'" placeholder="Client id" />';
	}

	public function orderpage($args)
	{
		$orderpageplugin = $args['value'];
		$orderpagedatabase = get_option( 'orderpage' );
		$escapedorderpage = esc_attr( get_option( 'orderpage' ) );
		$orderpage =  empty($orderpagedatabase) ? $orderpageplugin : $escapedorderpage ;

		echo '<select class="regular-text" name="orderpage" required>';
		echo '<option value="">'.esc_attr( __( 'Select preferred order page' ) ).'</option>';
			$pages = get_pages(); 
		     foreach ( $pages as $page ) {
		       $option = '<option value="' . $page->ID . '" '. selected( $orderpage, $page->ID ) .'>'.$page->post_title.'</option>';
		       echo $option;
		    }
		echo '</select>';
	}

	public function loginpage($args)
	{
		$loginpageplugin = $args['value'];
		$loginpagedatabase = get_option( 'loginpage' );
		$escapedloginpage = esc_attr( get_option( 'loginpage' ) );
		$loginpage =  empty($loginpagedatabase) ? $loginpageplugin : $escapedloginpage ;

		echo '<select class="regular-text" name="loginpage" required>';
		echo '<option value="">'.esc_attr( __( 'Select preferred login page' ) ).'</option>';
			$pages = get_pages(); 
		     foreach ( $pages as $page ) {
		       $option = '<option value="' . $page->ID . '" '. selected( $loginpage, $page->ID ) .'>'.$page->post_title.'</option>';
		       echo $option;
		    }
		echo '</select>';
	}

	public function managepage($args)
	{
		$managepageplugin = $args['value'];
		$managepagedatabase = get_option( 'managepage' );
		$escapedmanagepage = esc_attr( get_option( 'managepage' ) );
		$managepage =  empty($managepagedatabase) ? $managepageplugin : $escapedmanagepage ;

		echo '<select class="regular-text" name="managepage" required>';
		echo '<option value="">'.esc_attr( __( 'Select manage page(Order management)' ) ).'</option>';
			$pages = get_pages(); 
		     foreach ( $pages as $page ) {
		       $option = '<option value="' . $page->ID . '" '. selected( $managepage, $page->ID ) .'>'.$page->post_title.'</option>';
		       echo $option;
		    }
		echo '</select>';
	}

	public function adminMainSettings()
	{
		echo 'Writerzbay Main Settings';
	}

	public function adminSectionManager()
	{
		echo 'Manage the Sections and Features of this Plugin by activating the checkboxes from the following list.';
	}

	public function checkboxField( $args )
	{
		$name = $args['label_for'];
		$classes = $args['class'];
		$option_name = $args['option_name'];
		$checkbox = get_option( $option_name );
		$checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

		echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ( $checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
	}
}