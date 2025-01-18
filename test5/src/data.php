<?php
require_once 'boot.php';
$stmt = pdo()->prepare("SELECT * FROM `mess`");
$stmt->execute();
$messList = [];
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $messList[] = $row;
  }

$stmt = pdo()->prepare("SELECT * FROM `users`");
$stmt->execute();
$userList = [];
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  
      $userList[$row['id']] = $row;
    }
    foreach($messList as $mess):
             $mess['name'];
             $mess['message'];
             $userList[$mess['userId']]['username'];
             $mess['checkbox'];
    endforeach;
?>