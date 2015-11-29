<?php
require_once(__DIR__ . "/config.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Are You Awake?</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="/assets/css/styles.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  </head>
  <body>
<nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Are You Awake?</a>
    </div>
    <div class="navbar-collapse collapse" id="navbar-collapsible">
      <ul class="nav navbar-nav navbar-left">
        <?php
        if (!isset($navbar))
          echo '<li><a href="/#section2">What?</a></li>'
            . '<li><a href="/#section3">Why?</a></li>'
            . '<li><a href="/#section4">How?</a></li>'
            . '<li><a href="/#section6">Who?</a></li>'
            . '<li>&nbsp;</li>';
        else
          foreach ($navbar as $li)
            echo '<li><a href="' . $li[1] . '">' . $li[0] . '</a></li>';
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if ($loggedIn == false): ?>
          <li><a href="/#section5">Log In</a></li>
        <?php else: ?>
          <li><a href="/account">Hello, <?=$user?></a></li>
          <li>
            <a href="/settings" title="Modify Settings">
              <i class="fa fa-cog"></i></a>
          </li>
          <li>
            <a href="/logout" title="Log Out">
              <i class="fa fa-power-off"></i></a>
          </li>
        <?php endif; ?>
        <li>&nbsp;</li>
      </ul>
    </div>
  </div>
</nav>
