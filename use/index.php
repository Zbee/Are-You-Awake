<?php
require("/var/www/awake/assets/php/header.php");
?>

<section class="container-fluid section" id="section6">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
<?php
$userFriends = $fb->get('/me/friends')
  ->getDecodedBody()["summary"]["total_count"];

$response = $fb->get('/me/taggable_friends')->getDecodedBody();
foreach ($response["data"] as $friend) {
  echo "name: " . $friend["name"];
  echo "<br>";
  echo "picture: <img src='" . $friend["picture"]["data"]["url"] . "'>";
  echo "<hr>";
}
?>
    </div>
  </div>
</section>

<?php
require("/var/www/awake/assets/php/footer.php");
?>