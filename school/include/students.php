<h2 style="text-align: center">學生列表</h2>

<?php

include "db_connect.php";

$classrooms = $pdo -> query("SELECT * FROM `students`") -> fetchAll();

echo "<div class='cards-container'>";
foreach($students as $student):

?>

<div class="card">
    <div class="card-icon"></div>
    <h3><?= $student['name'];?></h3>
    <p><?= $student['tutor']?></p>
</div>

<?php endforeach;?>
</div>