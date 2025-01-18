<?php

require_once __DIR__.'/boot.php';

$stmt = pdo()->prepare("UPDATE `mess` SET `checkbox` = :checkbox WHERE `name` = :uniq");
$stmt->execute([
    'uniq' =>  $uniqname,
    'checkbox' => $checkbox,
]);

