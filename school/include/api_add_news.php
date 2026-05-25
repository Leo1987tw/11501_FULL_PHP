<?php

include_once "db_connect.php";

$sql = "INSERT INTO `news` (`subject`, `content`, `author`, `department`) VALUES ('{$_POST['subject']}', '{$_POST['content']}', '{$_POST['author']}', '{$_POST['department']}')";
$pdo -> exec($sql);

header("location: ../admin.php?inc=news");

?>