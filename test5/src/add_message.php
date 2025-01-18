<?php

require_once __DIR__.'/boot.php';

$stmt = pdo()->prepare("INSERT INTO `mess` (`checkbox`, `name`, `message`,`userId`) VALUES (:checkbox, :name, :message, :userId)");
$stmt->execute([
    'name' => $add['name'],
    'message' => $add['message'],
    'userId' =>  $add['userId'],
    'checkbox' => '0',
]);

