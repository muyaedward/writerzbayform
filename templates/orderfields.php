<?php
$stepone = explode(':', get_option( 'doctype' ));
$doctype = [];
foreach ($stepone as $key => $step) {
	$doctype[] = [
		'value' => $step,
		'lable' => $step
	];
}
$steponesubject = explode(':', get_option( 'subject' ));
$subject = [];
foreach ($steponesubject as $key => $stepsubject) {
	$subject[] = [
		'value' => $stepsubject,
		'lable' => $stepsubject
	];
}
$steponecitation = explode(':', get_option( 'order_style' ));
$citation = [];
foreach ($steponecitation as $key => $cite) {
	$citation[] = [
		'value' => $cite,
		'lable' => $cite
	];
}
$steponeacademic = explode('@', get_option( 'academic_level' ));
$academic_level = [];
foreach ($steponeacademic as $key => $stepacademic) {
	$steptwoacademic = explode(':', $stepacademic);
	$academic_level[] = [
		'value' => (float) $steptwoacademic[0],
		'lable' => $steptwoacademic[1]
	];
}
$steponewriter = explode('@', get_option( 'preferred_writer' ));
$preferred_writer = [];
foreach ($steponewriter as $key => $writer) {
	$steptwowriter = explode(':', $writer);
	$preferred_writer[] = [
		'value' => (float) $steptwowriter[0],
		'lable' => $steptwowriter[1]
	];
}
$steponeurgency = explode('@', get_option( 'urgency' ));
$urgency = [];
foreach ($steponeurgency as $key => $stepurgency) {
	$steptwourgency = explode(':', $stepurgency);
	$urgency[] = [
		'active' => $steptwourgency[0] == 1 ? true : false,
		'lable' => $steptwourgency[1],
		'inhours' => (int) $steptwourgency[2],
		'value' => (float) $steptwourgency[3]
	];
}


$steponepowerpoint = explode(':', get_option( 'powerpoint' ));
$powerpoint = [
	'enabled' => $steponepowerpoint[0] == 1 ? true : false,
	'divideamountby' => (int) $steponepowerpoint[1],
	'lable' => $steponepowerpoint[2]
];

$steponeplagiarismreport = explode(':', get_option( 'plagiarismreport' ));
$plagiarismreport = [
	'enabled' => $steponeplagiarismreport[0] == 1 ? true : false,
	'lable' => $steponeplagiarismreport[1],
	'addamount' => (float) $steponeplagiarismreport[2]
];

$steponeabstractpage = explode(':', get_option( 'abstractpage' ));
$abstractpage = [
	'enabled' => $steponeabstractpage[0] == 1 ? true : false,
	'lable' => $steponeabstractpage[1],
	'addamount' => (float) $steponeabstractpage[2]
];

$steponevipsupport = explode(':', get_option( 'vipsupport' ));
$vipsupport = [
	'enabled' => $steponevipsupport[0] == 1 ? true : false,
	'lable' => $steponevipsupport[1],
	'addamount' => (float) $steponevipsupport[2]
];
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
try{
	/* $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());
	if ($xml->geoplugin_countryName == '' || $xml->geoplugin_countryName == null) {
		$countryiso = 'us';
	}else{
		$countryiso = strtolower($xml->geoplugin_countryName);
	} */
	$countryiso = 'us';
}
catch (\Exception $e ) {
	$countryiso = 'us';
}
$orderdata = [
	'baseprice' => (int) get_option( 'base_price' ),
	'logourl' => get_option( 'logo_url' ),
	'websitename' => get_option( 'studentsite_name' ), //This will be the alt incase logo is unavailable
	'main_domain' => get_option( 'main_domain' ),
	'website_domain' => get_permalink( get_option( 'orderpage' ) ),
	'client_id' => get_option( 'client_id' ),
	'client_secret' => get_option( 'client_secret' ),
	'loginpage' => get_permalink( get_option( 'loginpage' ) ),
	'placeorderpage' => get_permalink( get_option( 'orderpage' ) ),
	'managepage' => get_permalink( get_option( 'managepage' ) ),
	'enablesidebar' => true, // This feature is coming soon. For now edit your sidebar manually below
	'doctype' => $doctype,
	'subject' => $subject,
	'orderstyles' => $citation,
	'preferred_writer' => $preferred_writer,
	'powerpoint' => $powerpoint,
	'plagiarismreport' => $plagiarismreport,
	'abstractpage' => $abstractpage,
	'vipsupport' => $vipsupport,
	'urgency' => $urgency,
	'academic_level' => $academic_level,
	'paymentmethod' => [
		[
			'active' => true,
			'imglocation' => plugins_url('assets/css/img/v3/icon-paypal.svg' , plugin_dir_path( __FILE__ )),
			'lable' => 'Paypal' // Do not change this lable, otherwise payment system will break
		],
		[
			'active' => false,
			'imglocation' => plugins_url('assets/css/img/v3/icon-card.svg' , plugin_dir_path( __FILE__ )),
			'lable' => 'Credit card'
		]
	],		
	'myip' => $countryiso,
	'sidebarcontent' => [
		'color' => 'blue', //choose between red, dark, blue, grean, black, yellow
		'sidebars' => [
			[
				'active' => true,
				'title' => 'Privacy & security',
				'titleicon' => plugins_url('assets/css/images/svg/icon_lock.svg' , plugin_dir_path( __FILE__ )),
				'htmlcontent' => '<p>We value our clients\' privacy and treat all personal information as private and confidential.</p>'
			],
			[
				'active' => true,
				'title' => 'Original content',
				'titleicon' => plugins_url('assets/css/images/svg/icon_search.svg' , plugin_dir_path( __FILE__ )),
				'htmlcontent' => '<p>Plagiarism is something we do not tolerate. We use multiple plagiarism scanners to ensure the originality
				of the work you receive, every time.</p>'
			],
			[
				'active' => true,
				'title' => 'Free inclusions',
				'titleicon' => plugins_url('assets/css/images/svg/icon_lock.svg' , plugin_dir_path( __FILE__ )),
				'htmlcontent' => '<ul class="check-list"><li>Revisions and corrections</li><li>Title page</li><li>References page</li><li>Formatting</li></ul>'
			],
			[
				'active' => false,
				'title' => 'Clients\' reviews',
				'titleicon' => plugins_url('assets/css/images/svg/icon_lock.svg' , plugin_dir_path( __FILE__ )),
				'htmlcontent' => '<p>"Very professional, cheap and friendly service"</p>'
			]
		]
	]

];
//dd($orderdata);
?>