<?php

include_once "db_connect.php";

echo "<pre>";
print_r($_POST);
echo "</pre>";

$sql = "DELETE FROM `students` WHERE `school_num`='{$_GET['school_num']}'";
$pdo -> exec($sql);

header("location:../admin.php?inc=class_students&code={$_GET['code']}");

?>