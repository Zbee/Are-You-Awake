<?php
session_start();

require_once("/var/www/awake/vendor/autoload.php");
require_once(__DIR__ . "/_secret_keys.php");

$fb = new Facebook\Facebook(
  [
    "app_id" => $fb["id"],
    "app_secret" => $fb["secret"],
    "default_graph_version" => "v2.5",
  ]
);

$loggedIn = false;
if (isset($_SESSION['facebook_access_token'])) {
  $accessToken = $_SESSION['facebook_access_token'];
  $fb->setDefaultAccessToken($accessToken);
  try {
    $response = $fb->get("/me?fields=email");
    $userNode = $response->getGraphUser();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  $user = $userNode->getName();
  $email = $userNode->getProperty("email");
  
  if (!isset($noAdd)) require_once(__DIR__ . "/checkReg.php");
  
  $loggedIn = true;
  $navbar = [
    ["Check Statuses", "/use"]
  ];
}

?>
