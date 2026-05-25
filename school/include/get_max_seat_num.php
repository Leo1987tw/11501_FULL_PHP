<?php

echo $max_seat_num = $pdo -> query("SELECT max(`seat_num`) FROM `class_student` WHERE `class_code`='{$_GET['code']}'") -> fetchColumn();

?>