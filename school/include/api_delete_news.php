<?php

include_once "db_connect.php";

$sql = "DELETE FROM `news` WHERE `id`='{$_GET['id']}'";
$pdo -> exec($sql);

header("location:../admin.php?inc=news");

?>