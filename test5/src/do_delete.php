<?php

require_once __DIR__.'/boot.php';

$stmt = pdo()->prepare("DELETE FROM `mess` WHERE `name` = :uniq1");
$stmt->execute([
    'uniq1' =>  $delete,
]);

?>