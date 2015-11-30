<?php
$data = [
  "message" => "This is a test post for Are You Awake. The poster of this "
    . "status has decided to check up on you to understand your inactivity "
    . "practices.\n\nWe understand that this is somewhat creepy, in a way; but "
    . "the only information provided to the poster of this status is if you're "
    . "active on Facebook - information he or she can already get. "
    . "\n\nRandom string: "
    . base64_encode("status to get friend's ID ". time()),
  "link" => "http://awake.zbee.me",
  "place" => 203158081233,
  "tags" => $_GET["id"],
  "privacy" => ["value" => "SELF"]
];
$post = $fb->post('/me/feed', $data);
$graph = $post->getGraphObject()["id"];

$response = $fb->get('/' . $graph . '?fields=message_tags')
  ->getDecodedBody();
$friendID = explode("_", $response["id"])[1];

$deletePost = $fb->delete("/" . $graph)->getDecodedBody();
if ($deletePost["success"] != true)
  die("Your post was not deleted successfully, btw.");

$possibleFriends = $fb->get("/me/friends?ids=" . $friendID)
  ->getDecodedBody()["me"]["data"];
foreach ($possibleFriends as $friend)
  if ($friend["name"] == $_GET["name"])
    $Friend = $friend["id"];

$Friend = $fb->get("/" . $Friend . "?fields=picture,name")
  ->getDecodedBody();
?>
