<?php 
//get root folder
$protocol = $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
$root = $protocol . $_SERVER['SERVER_NAME'];

//get root includes folder in file system, which is different between localhost and live servers 
$doc_root = $_SERVER['DOCUMENT_ROOT'];
if ($root === 'http://localhost') $doc_includes = $doc_root.'/landing/includes/landing/';
else $doc_includes = $doc_root.'/includes/landing/';

//get utm campaign values 
$source = (isset($_GET['utm_source'])) ? trim($_GET['utm_source']) : '';
$medium = (isset($_GET['utm_medium'])) ? trim($_GET['utm_medium']) : '';
$campaign = (isset($_GET['utm_campaign'])) ? trim($_GET['utm_campaign']) : '';
$content = (isset($_GET['utm_content'])) ? trim($_GET['utm_content']) : '';
$contentKey = $content;

//set default conversion link to $linkRegular provided on index page
$linkConversion = $linkRegular;
 
//set default body classes - one class for each active camapign 
$bodyClasses = strtolower($theseCampaigns);

//set message for $theseCampaigns if campaign not set on index.php
$theseCampaigns = (empty($theseCampaigns)) ? 'Not Set' : $theseCampaigns;

//check _GET to see if visit is from a campaign listed in $theseCampaigns on index.php
//if so, switch conversion link from default, and set $contentKey and 6-month cookie
if (strpos($campaign, $theseCampaigns) !== false) {
	//if each variable isn't empty, add a comma to concat for cookie string 
	$content = (empty($content)) ? $content : ','.$content;
	$source = (empty($source)) ? $source : ','.$source;
	
	//now handle cookie and body classes
	$cookieValue = $campaign.','.$medium.$source.$content;
	$bodyClasses .= ' '.str_replace(',', ' ', $cookieValue);
	$bodyClasses = strtolower($bodyClasses);
	$domain = str_replace('pbs.', '', getenv('HTTP_HOST'));
	setcookie('klrnCampaign', $cookieValue, time()+(86400*182), '/', $domain);
	
	//root $linkCampaign provided on index page
	$linkConversion = $linkCampaign . '&klrnCampaign=' . $cookieValue;
}

//if there is no $_GET campaign, check cookie for any active campaign
//if there is one, set $linkConversion, $contentKey and $bodyClasses 
//root $linkCampaign provided on index page
else {
	if(isset($_COOKIE['klrnCampaign'])) {
		$linkConversion = $linkCampaign . '&klrnCampaign=' . $_COOKIE['klrnCampaign'];
		$values = explode(',', $_COOKIE['klrnCampaign']);		
		$campaign = $values[0];
		$medium = $values[1];
		$contentKey = end($values);
		$cookieValue = str_replace(',', ' ', $_COOKIE['klrnCampaign']);
		$bodyClasses .= ' '.strtolower($cookieValue);					
	}	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="google-site-verification" content="0RONgESHQ4dbMpBb_dbgCfKUyo2PeiyIOoJUb3S642k" />
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="author" content="KLRN Passport provides access to a catalog of PBS programs that you can watch on-demand from your computer, tablet, smartphone, AppleTV or Roku.">
    <!--<link rel="icon" href="../images/favicon.ico">-->

    <title><?php echo $title; ?></title>

    <!-- CSS -->
    <link href="assets/css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php if (file_exists($doc_includes.'googleAnalytics.php')) include 'googleAnalytics.php'; ?> 
    
  </head>

  <body class="<?php echo $bodyClasses; ?>">

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <!--<a class="navbar-brand" href="#"><img src="assets/img/KLRN_logo_2015_new.png"></a>-->
          <a class="navbar-brand" href="http://www.klrn.org/home/">
            <img src="assets/img/klrn-color-logo-nRlTb9f.png.resize.250x150.png">
          </a>          
        </div>
      </div>
    </nav>
    