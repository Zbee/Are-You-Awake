<?php
require_once(__DIR__ . "/config.php");

$helper = $fb->getRedirectLoginHelper();
$permissions = ["user_friends"]; // optional
$loginUrl = $helper->getLoginUrl('http://awake.zbee.me/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>