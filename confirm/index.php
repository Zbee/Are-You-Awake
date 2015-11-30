<?php
require("/var/www/awake/assets/php/header.php");
if (!isset($_GET["id"])) {
  header("Location: http://awake.zbee.me/use?err=confirm-noid");
  die();
}
if (!isset($_GET["name"])) {
  header("Location: http://awake.zbee.me/use?err=confirm-noname");
  die();
}
if (!isset($_GET["platform"])) {
  header("Location: http://awake.zbee.me/use?err=confirm-noplatform");
  die();
}

if (isset($_GET["confirmed"]) && $_GET["confirmed"] == "true") {
  
}
?>

<section class="container-fluid section">
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 text-center">
      <?php
      require(strtolower($_GET["platform"]) . ".php");

      echo "<h1>Are you sure you would like to check on "
        . "<a href='https://facebook.com/$Friend[id]'>"
        . "<img class='img-circle' src='" . $Friend["picture"]["data"]["url"]
        . "'> $Friend[name]</a>?</h1><br><br>";
      echo "<p class='lead'>Your friend could be notified of your intentions if they are set "
        . "to receive notifications via email/sms, or if they're on Facebook "
        . "right now.</p><br><br>";
      echo "<h2><a href='/confirm?confirmed=true&name=$Friend[name]&id="
        . "$Friend[id]&platform=fb'>Yes, I am sure</a></h2><h3><a href='/use'>"
        . "No, I am not sure</a></h3>";
      ?>
    </div>
  </div>
</section>

<?php
require("/var/www/awake/assets/php/footer.php");
?>