<h2 style="text-align: center">科目列表</h2>

<?php

include "db_connect.php";

$classrooms = $pdo -> query("SELECT * FROM `dept`") -> fetchAll();

echo "<div>";
foreach($s as $class):

?>

<div">
    <div></div>
    <h3><?= $class['name'];?></h3>
    <p><?= $class['tutor']?></p>
</div>

<?php endforeach;?>
</div>