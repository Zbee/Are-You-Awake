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
  
  if (!isset($noAdd)) {
    $select = $db->prepare("select * from users where email=?");
    $select->execute([$email]);
    if ($select->rowCount() == 1)
      while($row = $select->fetch(PDO::FETCH_ASSOC))
        $_SESSION["uid"] = intval($row["id"]);
    else {
      $insert = $db->prepare("insert into users (`email`, `registered`) values (?, ?)");
      $insert->execute([$email, time()]);
      $_SESSION["uid"] = $db->lastInsertId();
      $connect = $db->prepare(
        "insert into connections (`user`, `type`, `platform`, `platform_id`) values (?, ?, ?, ?)"
      );
      $connect->execute([$_SESSION["uid"], 1, "fb", $userNode->getProperty("id")]);
    }
  }
  $loggedIn = true;
  $navbar = [
    ["Check Statuses", "/use"]
  ];
}

?>
