<?php include "db_connect.php";

$code=$_GET['code'];
echo $max_seat_num = $pdo -> query("SELECT max(`seat_num`) FROM `class_student` WHERE `class_code`='{$code}'") -> fetchColumn();

?>