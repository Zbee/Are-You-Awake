<?php
if (isset($_COOKIE[session_name()]))
setcookie(session_name(), "", time()-3600, "/");
$_SESSION = [];
session_destroy();
header("Location: http://awake.zbee.me/");
die();
?>
