<?php
require("/var/www/awake/assets/php/header.php");
?>

<section class="container-fluid section" id="checks">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
      <h1>These are all of the people you are checking on</h1>
      <?php
      $checks = [];
      $select = $db->prepare("select * from checks where user=?");
      $select->execute([$_SESSION["uid"]]);
      while($row = $select->fetch(PDO::FETCH_ASSOC))
        array_push($checks, $row["name"]);
        
      foreach ($checks as $check)
        echo $check;
      ?>
    </div>
  </div>
</section>

<section class="container-fluid section" id="add">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
      <h1>Choose the application a friend is most active on</h1>
      <?php
      $connections = [];
      $select = $db->prepare("select * from connections where user=?");
      $select->execute([$_SESSION["uid"]]);
      while($row = $select->fetch(PDO::FETCH_ASSOC))
        array_push($connections, $row["platform"]);
        
      foreach ($connections as $connection)
        echo '<i style="font-size:120px;cursor:pointer" id="' . $connection . '"'
          . 'class="fa fa-' . $connection . ' fa-5x"></i>'
          . '<i class="fa fa-twitter fa-invisible fa-5x"></i>';
      ?>
      <br><br>
      <div class="collapse" id="fbFriends">
        <div class="well">
          <div class="form-group">
            <label class="sr-only" for="fbSearch">Name to serch for</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-search"></i></div>
              <input type="text" class="form-control" id="fbSearch" placeholder="Friend's name">
            </div>
          </div>
          <br>
          <i style='font-size:120px;color:darkgrey'
            class="fa fa-spinner fa-spin fa-5x"></i>
        </div>
      </div>
      <br><br>
      <h1>Or connect a new app</h1>
      <i style="font-size:120px;cursor:pointer" id="google"
        class="fa fa-google fa-5x"></i>
        
      <i class="fa fa-twitter fa-invisible fa-5x"></i>
      
      <i style="font-size:120px;cursor:pointer" id="twitter"
        class="fa fa-twitter fa-5x"></i>
        
      <i class="fa fa-twitter fa-invisible fa-5x"></i>
      
      <i style="font-size:120px;cursor:pointer" id="pinterest"
        class="fa fa-pinterest fa-5x"></i>
        
      <i class="fa fa-twitter fa-invisible fa-5x"></i>
      
      <i style="font-size:120px;cursor:pointer" id="linkedin"
        class="fa fa-linkedin fa-5x"></i>
        
      <i class="fa fa-twitter fa-invisible fa-5x"></i>
      
      <i style="font-size:120px;cursor:pointer" id="adn"
        class="fa fa-adn fa-5x"></i>
        
      <i class="fa fa-twitter fa-invisible fa-5x"></i>
      
      <i style="font-size:120px;cursor:pointer" id="github"
        class="fa fa-github fa-5x"></i>
        
      <i class="fa fa-twitter fa-invisible fa-5x"></i>
      
      <i style="font-size:120px;cursor:pointer" id="bitbucket"
        class="fa fa-bitbucket fa-5x"></i>
        
      <i class="fa fa-twitter fa-invisible fa-5x"></i>
      
      <i style="font-size:120px;cursor:pointer" id="codepen"
        class="fa fa-codepen fa-5x"></i>
        
      <i class="fa fa-twitter fa-invisible fa-5x"></i>
      
      <i style="font-size:120px;cursor:pointer" id="behance"
        class="fa fa-behance fa-5x"></i>
        
      <i class="fa fa-twitter fa-invisible fa-5x"></i>
      
      <i style="font-size:120px;cursor:pointer" id="envelope"
        class="fa fa-envelope fa-5x"></i>
    </div>
  </div>
</section>

<script>
$("#facebook").click(function() {
  $("#fbFriends").collapse("toggle")
  if ($("#fbFriends a").length == 0) {
    $.ajax({
      type: "POST",
      url: "fb.php",
      data: {},
      dataType: "json",
      context: document.body,
      async: true,
      complete: function(res, stato) {
       res.responseJSON.forEach(function(value) {
        $("#fbFriends .fa-spin").hide()
        $("#fbFriends .well").append(
          "<a href='/confirm?id=" + value[2] + "&name=" + value[0]
          + "&platform=fb' title='" + value[0]+ "'><img class='img-circle' "
          + "src='" + value[1] + "'> "
        )
       })
      }
    })
  }
})

$("#fbSearch").keyup(function(e) {
  var search = $(this).val().toLowerCase()
  $("#fbFriends a").each(function() {
    if ($(this).attr("title").toLowerCase().indexOf(search) == -1)
      $(this).hide()
    else
      $(this).show()
  })
})
</script>

<?php
require("/var/www/awake/assets/php/footer.php");
?>