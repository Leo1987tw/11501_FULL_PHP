<?php

include_once "db_connect.php";

$sql = "UPDATE `news` SET `subject`='{$_POST['subject']}', `content`='{$_POST['content']}', `author`='{$_POST['author']}', `department`='{$_POST['department']}' WHERE `id`='{$_POST['id']}'";
$pdo -> exec($sql);

header("location: ../admin.php?inc=news");

?>