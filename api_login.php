<?php

$dsn = "mysql: host=localhost; charset=utf8; dbname=form";
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
} else{
    echo "false";
}
echo "</pre>";

?>