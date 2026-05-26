<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>自訂函式</title>
</head>
<body>

    <h1>自訂函式</h1>
    
    <?php

    name("Leo", "Yu");

    echo "<br>";

    add(5, 10);

    echo "<br>";

    sum("total", 3, 2, 1);

    ?>

    <ul>
        <li>all()-給定資料表名後，會回傳整個資料表的資料</li>
        <li>find()-會回傳資料表指定id的資料</li>
        <li>update()-給定資料表的條件後，會去更新相應的資料。</li>
        <li>insert()-給定資料內容後，會去新增資料到資料表</li>
        <li>del()-給定條件後，會去刪除指定的資料</li>
    </ul>

    <?php

    $rows = all('status', 'school');
    
    echo "<pre>";
    print_r($rows);
    echo "</pre>";

    $rows = find(2, 'status', 'school');
    
    echo "<pre>";
    print_r($rows);
    echo "</pre>";

    $rows = update(2, 'status', 'school', []);

    ?>

</body>
</html>

<?php

function name($first_name, $last_name){
    echo $first_name . " " . $last_name;
}

function add($num1, $num2){
    echo $num1 + $num2;
}

function sum($title, ...$nums){
    echo $title . "年終結算：";
    foreach($nums as $num){
        if($num == $nums[0]){
            echo $num;
            $tmp = $num;
            continue;
        }
        echo " + " . $num;
        $tmp = $tmp + $num;
    }
    echo " = " . $tmp;
    echo "<br>";
}

?>

<?php

$dsn = "mysql:host=localhost; charset=utf8; dbname=$dbname";
$pdo = new PDO($dsn, 'root', '', []);

function all($table, $dbname){
    global $pdo;
    $sql = "SELECT * FROM `$table`";
    $stat = $pdo -> prepare($sql);
    $stat -> execute();
    return $stat -> fetchAll(PDO::FETCH_ASSOC);
}

function find($id, $table, $dbname){
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

function update($id, $table, $dbname, $where = []){
    global $pdo;
    $sets = [];
    $paras = [];
    foreach($where as $key => $value){
        $sets[] = " `$key` = ?";
        $paras[] = $value;
    }
    $sql = "UPDATE `$table` SET " . implode(', ', $sets) . " where `id` = ?";
    $paras[] = $id;
    $stat = $pdo -> prepare($sql);
    $stat -> execute($paras);
    return $stat -> rowCount();
}

?>