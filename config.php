<?php
session_start();

require_once(__DIR__ . "/vendor/autoload.php");
require_once(__DIR__ . "/_secret_keys.php");

$fb = new Facebook\Facebook(
  [
    "app_id" => $fb["id"],
    "app_secret" => $fb["secret"],
    "default_graph_version" => "v2.2",
  ]
);

?>
