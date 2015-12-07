<?php
require("/var/www/awake/assets/php/header.php");

/*
{
  "confirm-noid":"No user ID given",
  "confirm-noname": "No user name given",
  "confirm-noplatform": "No platform given",
  "confirm-nsplatform": "Non-supported platform given",
  "confirm-already": "Already checking on that person",
  "confirmed": "Now checking on $_GET['name']"
}
*/

if (!isset($_GET["id"])) {
  header("Location: https://awake.zbee.me/use?err=confirm-noid");
  die();
}
if (!isset($_GET["name"])) {
  header("Location: https://awake.zbee.me/use?err=confirm-noname");
  die();
}
if (!isset($_GET["platform"])) {
  header("Location: https://awake.zbee.me/use?err=confirm-noplatform");
  die();
}
$platform = strtolower($_GET["platform"]);
$supported_platforms = ["fb"];
if (!in_array($platform, $supported_platforms)) {
  header("Location: https://awake.zbee.me/use?err=confirm-nsplatform");
  die();
}

$select = $db->prepare(
  "select * from checks where platform=? and platform_id=?"
);
$select->execute([$platform, $_GET["id"]]);
if ($select->rowCount() != 0) {
  header("Location: https://awake.zbee.me/use?err=confirm-already");
  die();
}

if (isset($_GET["confirmed"]) && $_GET["confirmed"] == "true") {
  $insert = $db->prepare(
    "insert into checks (`user`, `platform`, `platform_id`, `name`, `date`) "
    . "values (?, ?, ?, ?, ?)"
  );
  $insert->execute(
    [$_SESSION["uid"], $platform, $_GET["id"], $_GET["name"], time()]
  );
  header(
    "Location: https://awake.zbee.me/use?err=confirmed&name=$_GET[name]"
  );
  die();
}
?>

<section class="container-fluid section">
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 text-center">
      <?php
      $picture = $link = $name = $id = "";
      require($platform . ".php");

      echo "<h1>Are you sure you want to begin checking on and learning about"
        . "<br>"
        . "<a href='$link'><img class='img-circle' src='$picture'>$name</a>?"
        . "</h1><br><br>";
      echo "<p class='lead'>By the way, your friend could be notified of your "
        . " intentions if they are set to receive notifications via email/sms, "
        . "or if they're on Facebook right now.</p><br><br>";
      echo "<h2><a href='/confirm?confirmed=true&name=$name&id="
        . "$id&platform=$platform'>Yes, I am sure</a></h2><h3><a href='/use'>"
        . "No, nevermind</a></h3>";
      ?>
    </div>
  </div>
</section>

<?php
require("/var/www/awake/assets/php/footer.php");
?>