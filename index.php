<?php
require("/var/www/awake/assets/php/header.php");

$helper = $fb->getRedirectLoginHelper();
$permissions = [
  "public_profile",
  "email",
  "user_friends",
  "user_posts",
  "publish_actions"
];
$loginUrl = $helper->getLoginUrl('http://awake.zbee.me/login-callback.php', $permissions);
?>

<section class="container-fluid section" id="section1">
    <h1 class="text-center v-center">Are you awake?</h1>
  
    <div class="container">
      <div class="row">
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-10 col-sm-offset-2 text-center">
                <h3>New</h3>
                <p>
                  There is no other service like this that helps you know why
                  they stopped responding.
                </p>
                <i class="fa fa-exclamation fa-5x"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-4 text-center">
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1 text-center">
                <h3>Simple</h3>
                <p>
                  You just select your friend's accounts and we do take care of
                  identifying their status.
                </p>
                <i class="fa fa-user fa-5x"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-4 text-center">
            <div class="row">
              <div class="col-sm-10 text-center">
                <h3>For Devs</h3>
                <p>
                  With a simple API developers can implement the status of a
                  human into their own apps.
                </p>
                <i class="fa fa-code fa-5x"></i>
              </div>
            </div>
          </div>
      </div><!--/row-->
      <br>
      <div class="row">
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-10 col-sm-offset-2 text-center">
                <h3>Open Source</h3>
                <p>
                  Leverages the power of more than the Are You Awake developers
                  to further our code base.
                </p>
                <i class="fa fa-gavel fa-5x"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-4 text-center">
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1 text-center">
                <h3>Expansive</h3>
                <p>
                  Instead of just picking our favorite social and communication
                  applications, many are included.
                </p>
                <i class="fa fa-expand fa-5x"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-4 text-center">
            <div class="row">
              <div class="col-sm-10 text-center">
                <h3>Intelligent</h3>
                <p>
                  Using machine learning Are You Awake doesn't just assume a
                  humn is asleep, but rather relies on past data as well.
                </p>
                <i class="fa fa-server fa-5x"></i>
              </div>
            </div>
          </div>
      </div><!--/row-->
    <div class="row"><br></div>
  </div><!--/container-->
</section>

<section class="container-fluid section" id="section2">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
        <h1>What is Are You Awake?</h1>
        <br>
        <p class="lead">
          Are You Awake helps you keep track of your friends and family in the
          sense of understanding when they last used social media and other
          methods of communication by letting you know when they were last
          active.
        </p>
        <br> 
        <i style="font-size:120px" class="fa fa-share-alt fa-5x"></i>
    </div>
  </div>
</section>

<section class="container-fluid section" id="section3">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
        <h1>Why does Are You Awake exist?</h1>
        <br>
        <p class="lead">
          Are You Awake exists to let you know the status of your friends and
          family.
          <br><br>
          If you're having a serious conversation with someone and they stop
          responding, it will let you know if you're being ignored or if they
          finally sucumbed to sleep.
        </p>
        <br> 
        <i style="font-size:120px" class="fa fa-bed fa-5x"></i>
    </div>
  </div>
</section>

<section class="container-fluid section" id="section4">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
        <h1>How does Are You Awake work?</h1>
        <br>
        <p class="lead">
          Are You Awake operates off of the assumption that most of our friends
          and family have a social media or communication account of some sort,
          and are at least somewhat regular in checking and using them.
          <br>
          Using this assumption, Are You Awake utilizes APIs of popular social
          media and communication applications to check a user's most recent
          activity to help create a good idea of a human's status.
          <br><br>
          In addition to just checking the timestamps from applications, Are You
          Awake also learns when a human falls asleep and wakes up based on a
          number of factors, to help build a better idea for you of their
          status.
        </p>
        <br> 
        <i style="font-size:120px" class="fa fa-globe fa-5x"></i>
    </div>
  </div>
</section>

<section class="container-fluid section" id="section5">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
        <h1>How do I use Are You Awake?</h1>
        <br>
        <p class="lead">
          You just create an account with Facebook or Google, and from there you
          can connect as many other social media and communication applications
          as you like to help you learn the status of your loved ones.
        </p>
        <br>
        <h2>Create an Account or Log In</h2>
        <br>
        <a href="<?=$loginUrl?>" style="color:inherit">
          <i style="font-size:120px" class="fa fa-facebook fa-5x"></i></a>
          
        <i style="font-size:120px" class="fa fa-twitter fa-invisible fa-5x"></i>
        
        <a href="#" style="color:inherit">
          <i style="font-size:120px" class="fa fa-google fa-5x"></i></a>
        <br>
        <h2>Then You Can Connect</h2>
        <br>
        <a href="#" style="color:inherit">
          <i style="font-size:120px" class="fa fa-facebook fa-5x"></i></a>
          
        <i class="fa fa-twitter fa-invisible fa-5x"></i>
        
        <a href="#" style="color:inherit">
          <i style="font-size:120px" class="fa fa-google fa-5x"></i></a>
          
        <i class="fa fa-twitter fa-invisible fa-5x"></i>
        
        <a href="#" style="color:inherit">
          <i style="font-size:120px" class="fa fa-twitter fa-5x"></i></a>
          
        <i class="fa fa-twitter fa-invisible fa-5x"></i>
        
        <a href="#" style="color:inherit">
          <i style="font-size:120px" class="fa fa-pinterest fa-5x"></i></a>
          
        <i class="fa fa-twitter fa-invisible fa-5x"></i>
        
        <a href="#" style="color:inherit">
          <i style="font-size:120px" class="fa fa-linkedin fa-5x"></i></a>
          
        <i class="fa fa-twitter fa-invisible fa-5x"></i>
        
        <a href="#" style="color:inherit">
          <i style="font-size:120px" class="fa fa-adn fa-5x"></i></a>
          
        <i class="fa fa-twitter fa-invisible fa-5x"></i>
        
        <a href="#" style="color:inherit">
          <i style="font-size:120px" class="fa fa-github fa-5x"></i></a>
          
        <i class="fa fa-twitter fa-invisible fa-5x"></i>
        
        <a href="#" style="color:inherit">
          <i style="font-size:120px" class="fa fa-bitbucket fa-5x"></i></a>
          
        <i class="fa fa-twitter fa-invisible fa-5x"></i>
        
        <a href="#" style="color:inherit">
          <i style="font-size:120px" class="fa fa-codepen fa-5x"></i></a>
          
        <i class="fa fa-twitter fa-invisible fa-5x"></i>
        
        <a href="#" style="color:inherit">
          <i style="font-size:120px" class="fa fa-behance fa-5x"></i></a>
          
        <i class="fa fa-twitter fa-invisible fa-5x"></i>
        
        <a href="#" style="color:inherit">
          <i style="font-size:120px" class="fa fa-envelope fa-5x"></i></a>
    </div>
  </div>
</section>

<section class="container-fluid section" id="section6">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 text-center">
        <h1>Who made Are You Awake?</h1>
        <br>
        <p class="lead">
          Are You Awake was first created by <a href="https://keybase.io/Zbee"
            target="_blank">Ethan Henderson (Zbee)</a> on an off-day in November
          2015 while listening to a <a href="http://l.zbee.me/1XqkF0u"
            target="_blank">poor collection of electronic music</a>.
        </p>
        <br>
        <a href="https://keybase.io/Zbee" target="_blank">
          <img src="https://i.imgur.com/mGOEBGi.jpg" alt="Zbee's face"
            class="img-circle" height="256"></a>
        <br>
        <div class="col-sm-4 col-sm-offset-4">
          <h2>Dan Van Bueren</h2>
          Then helped with the design of a new logo and managing textual content
          while listening to
          <a href="http://l.zbee.me/1IiSsSf" target="_blank">a still-better collection
          of totally eclectic music</a>.
          <br>
          <a href="https://keybase.io/danvb10" target="_blank">
            <img src="https://i.imgur.com/7egMNBS.jpg" alt="Dan's face"
              class="img-circle" height="128"></a>
        </div>
    </div>
  </div>
</section>

<?php
require("/var/www/awake/assets/php/footer.php");
?>