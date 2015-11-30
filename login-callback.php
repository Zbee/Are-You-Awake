<?php
require_once("/var/www/awake/assets/php/config.php");

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  $oAuth2Client = $fb->getOAuth2Client();
  $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  $_SESSION['facebook_access_token'] = (string) $accessToken;
  
  header("Location: http://awake.zbee.me/use");
  die();
}
?>
