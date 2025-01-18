<?php

require_once __DIR__.'/boot.php';

$stmt = pdo()->prepare("UPDATE `mess` SET `name` = :name , `message` = :message WHERE `name` = :uniq");
$stmt->execute([
    'name' => $update['name'],
    'message' => $update['message'],
    'uniq' =>  $uniqname,
]);
