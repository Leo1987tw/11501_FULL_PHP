<?php

include_once "db_connect.php";

echo "<pre>";
print_r($_POST);
echo "</pre>";

$sql_student = "DELETE FROM `students` WHERE `school_num`='{$_GET['school_num']}'";
$sql_class = "DELETE FROM `class_student` WHERE `school_num`='{$_GET['school_num']}'";

$pdo -> exec($sql_student);
$pdo -> exec($sql_class);

// header("location:../admin.php?inc=class_students&code={$_GET['code']}");

?>