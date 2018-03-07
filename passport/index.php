<?php 
//in this block, fill in content variables
$title = 'KLRN Passport is an added benefit for valued PBS donors';
$description = 'With KLRN Passport, you can access past episodes of your favorite PBS programs whenever you want using your computer, smartphone, tablet, AppleTV or Roku.';
$theseCampaigns = 'Passport'; //this is case-sensitive keyword to check for in each campaign name
$linkRegular = 'https://klrn.secureallegiance.com/klrn/WebModule/Donate.aspx?P=WEBPASS&PAGETYPE=PLG&CHECK=W%2fdAvpGzKANMeHHUySsEIOzWDeZ%2beA1M';
$linkCampaign = 'https://klrn.secureallegiance.com/klrn/WebModule/Donate.aspx?P=WEBPASC&PAGETYPE=PLG&CHECK=W%2fdAvpGzKAPMF%2bNfCiuek%2bzWDeZ%2beA1M';
$subHead = 'endless entertainment';
$headline = 'On-demand access to quality PBS programs. On your schedule.';
?>

<?php include '../includes/landing/header.php'; ?>

<?php 
if (isset($campaign)) $customContentFile = "../includes/landing/customContent/$campaign.php";
if (isset($customContentFile) && file_exists($customContentFile)) include $customContentFile;
else include '../includes/landing/customContent/Passport-default.php';
?>

<?php 
if (array_key_exists($contentKey, $customContent)) {
	$headline = substr($medium, -2) == '_b' ? 'testHeadline' : 'headline';
	if (isset($customContent[$contentKey]['subHead'])) $subHead = $customContent[$contentKey]['subHead']; 
	if (isset($customContent[$contentKey][$headline])) $headline = $customContent[$contentKey][$headline];
	elseif (isset($customContent[$contentKey]['headline'])) $headline = $customContent[$contentKey]['headline'];	
}
?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      <h2 class="option_header"><?php echo $subHead; ?></h2>
        <img id="passport_logo" src="assets/img/Passport_Station_Letters_WHITE_web.png">
        <h2 class="option_default">YOUR FAVORITES<br>
        YOUR CONVENIENCE</h2>
        <p><a id="cta_button" class="option_header" href="<?php echo $linkConversion; ?>" role="button">Get Access Now &raquo;</a></p>
      </div>
    </div>

    <div id="main" class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-sm-12">
          <h1><?php echo $headline; ?></h1>
          <p class="lead">With KLRN Passport, you can access past episodes of your favorite PBS programs whenever you want using your computer, smartphone, tablet, AppleTV or Roku. See full seasons of Victoria, Poldark, Finding Your Roots, the Great British Baking Show, Call the Midwife, Home Fires, Endeavour, The Tunnel and Downton Abbey. Catch up on American Experience, NOVA and Nature.</p>
          <p class="lead">Get access to KLRN Passport for a year with a one-time contribution of $60. Or sign up to be a KLRN sustainer and receive Passport uninterrupted at $5 a month. How you give is up to you!</p>
        </div>
        <div class="col-md-4">
          <h2>Get Started</h2>
          <p>Become a KLRN member right now and get instant access to extended on-demand quality content.</p>
          <p>
            <a class="btn btn-primary" href="<?php echo $linkConversion; ?>" role="button">Donate Now &raquo;</a>
          </p>
        </div>
        <div class="col-md-4">
          <h2>Learn More</h2>
          <p>KLRN Passport is an added benefit for valued donors of public television. Find out more about this benefit.</p>
          <p><a class="btn btn-primary" href="http://www.klrn.org/passport/" role="button">Learn More &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Contact Us</h2>
          <p>Still have questions about KLRN membership or Passport? Please contact us during business hours.</p>
          <p><a class="btn btn-primary" href="mailto:members@klrn.org?cc=pr@klrn.org&subject=KLRN%20Passport" role="button">Contact Us &raquo;</a></p>
        </div>
      </div><!-- .row -->      
    </div> <!-- #main.container -->   

<?php include '../includes/landing/footer.php'; ?>