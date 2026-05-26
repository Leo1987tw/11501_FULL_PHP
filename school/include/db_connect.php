<?php

$dsn="mysql:host=localhost; charset=utf8; dbname=school";
$pdo = new PDO($dsn, 'root', '', []);

session_start();
date_default_timezone_set("Asia/Taipei");

function pdo($dbname){
    $dsn = "mysql:host=localhost; charset=utf8; dbname=$dbname";
    return new PDO($dsn, 'root', '', []);
}

function all($table){
    global $pdo;
    $sql = "SELECT * FROM `$table`";
    $stat = $pdo -> prepare($sql);
    $stat -> execute();
    return $stat -> fetchAll(PDO::FETCH_ASSOC);
}

function find($id, $table){
    global $pdo;
    if(!is_numeric($id)){
        echo "ID must be a number";
        return false;
    }
    $sql = "SELECT * FROM `$table` WHERE `id` = ?";
    $stat = $pdo -> prepare($sql);
    $stat -> execute([$id]);
    $rows = $stat -> fetch(PDO::FETCH_ASSOC);
    if(!$rows){
        echo "can not find data";
        return false;
    }
    return $rows;
}

function insert($table, $values = []){
    global $pdo;
    $cols1 = [];
    $cols2 = [];
    $paras = [];
    foreach($values as $key => $value){
        $cols1[] = "`$key`";
        $cols2[] = "?";
        $paras[] = $value;
    }
    echo $sql = "INSERT INTO `$table` (" . implode(', ', $cols1) . ") VALUES (" . implode(', ', $cols2) . ")";
    $stat = $pdo -> prepare($sql);
    $stat -> execute($paras);
    return $pdo -> lastInsertId();
}

function update($table, $finds =[], $values = []){
    global $pdo;
    $cols1 = [];
    $cols2 = [];
    $paras = [];
    foreach($values as $key => $value){
        $cols1[] = "`$key` = ?";
        $paras[] = $value;
    }
    foreach($finds as $key => $value){
        $cols2[] = "`$key` = ?";
        $paras[] = $value;
    }
    echo $sql = "UPDATE `$table` SET " . implode(', ', $cols1) . " WHERE " . implode(' AND ', $cols2);
    print_r($paras);
    $stat = $pdo -> prepare($sql);
    $stat -> execute($paras);
    return $stat -> rowCount();
}

function delete($table, $finds =[]){
    global $pdo;
    if(empty($finds)){
        echo "arguments can not be empty";
        return false;
    }
    $cols = [];
    $paras = [];
    foreach($finds as $key => $value){
        $cols[] = "`$key` = ?";
        $paras[] = $value;
    }
    echo $sql = "DELETE FROM `$table`" . " WHERE " . implode(' AND ', $cols);
    print_r($paras);
    $stat = $pdo -> prepare($sql);
    $stat -> execute($paras);
    return $stat -> rowCount();
}

?>