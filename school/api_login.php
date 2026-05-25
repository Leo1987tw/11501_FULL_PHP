<?php

include_once "./include/db_connect.php";

$dsn = "mysql: host=localhost; charset=utf8; dbname=test";
$pdo = new PDO($dsn, 'root', '');

echo "<pre>";
print_r($_POST);
echo "</pre>";

$sql = "SELECT COUNT(*) FROM `members` WHERE `account`='{$_POST['account']}' AND `password`='{$_POST['password']}'";
$result = $pdo -> query($sql) -> fetchColumn();

echo "<pre>";
print_r($result);
echo "<br>";
if($result == 1){
    echo "success";
    $_SESSION['login']=1;
    $_SESSION['account']="Leo";
    header("location: admin.php");
} else{
    echo "false";
    header("location: login.php?err=1");
}
echo "</pre>";

?>