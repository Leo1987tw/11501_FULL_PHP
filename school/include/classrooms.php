<h2 style="text-align: center">班級列表</h2>

<?php

$classrooms = $pdo -> query("SELECT * FROM `classes`") -> fetchAll();

echo "<div class='cards-container'>";
foreach($classrooms as $class):

?>

<a href="?inc=class_students&code=<?= $class['code'];?>">
    <div>
        <div></div>
        <h3><?= $class['name']?>(<?= $class['code'];?>)</h3>
        <p><?= $class['tutor']?></p>
    </div>
</a>

<?php endforeach;?>
</div>