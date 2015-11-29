<?php
require("/var/www/awake/assets/php/header.php");
?>

<section class="container-fluid section" id="section6">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
<?php
$userID = $fb->get('/me')->getDecodedBody()["id"];

$response = $fb->get('/' . $userID)->getDecodedBody();
var_dump($response);
?>
    </div>
  </div>
</section>

<?php
require("/var/www/awake/assets/php/footer.php");
?>