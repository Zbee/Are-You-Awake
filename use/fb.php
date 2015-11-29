<?php
require("/var/www/awake/assets/php/config.php");
header('Content-Type: application/json');

$echo = [];
$friends = $fb->get('/me/taggable_friends?limit=500')->getDecodedBody()["data"];
foreach ($friends as $friend)
  if ($friend["picture"]["data"]["is_silhouette"] == false)
    array_push($echo, [$friend["name"], $friend["picture"]["data"]["url"]]);

echo json_encode($echo);
?>
