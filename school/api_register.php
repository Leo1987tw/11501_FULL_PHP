<?php

include_once "./include/db_connect.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$sql = "INSERT INTO `members` (`account`, `password`, `email`, `tel`, `birthday`) VALUE ('{$_POST['account']}', '{$_POST['password']}', '{$_POST['email']}', '{$_POST['tel']}', '{$_POST['birthday']}')";
$pdo -> exec($sql);

$sql_search = "SELECT * FROM `members`";
$members = $pdo -> query($sql_search) -> fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($members);
// echo "</pre>";

header("location: index.html");

?>