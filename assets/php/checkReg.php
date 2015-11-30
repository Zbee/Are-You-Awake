<?php
$select = $db->prepare("select * from users where email=?");
$select->execute([$email]);
if ($select->rowCount() == 1)
  while($row = $select->fetch(PDO::FETCH_ASSOC))
  $_SESSION["uid"] = intval($row["id"]);
else {
  $insert = $db->prepare("insert into users (`email`, `registered`) values (?, ?)");
  $insert->execute([$email, time()]);
  $_SESSION["uid"] = $db->lastInsertId();
  $connect = $db->prepare(
    "insert into connections (`user`, `type`, `platform`, `platform_id`) values (?, ?, ?, ?)"
  );
  $connect->execute([$_SESSION["uid"], 1, "fb", $userNode->getProperty("id")]);
}
?>
