<style>
    .container{
        max-width: 1200px;
    }

    /* 響應式卡片容器外框 */
    .card-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 25px;
      max-width: 1200px;
      margin: 0 auto;
    }

    /* 卡片主體樣式 */
    .student-card {
      background-color: #ffffff;
      border-radius: 16px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      padding: 24px;
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
      border: 1px solid rgba(0, 0, 0, 0.03);
    }

    /* 懸停動態效果：卡片往上飄並增加陰影 */
    .student-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    /* 卡片上方裝飾線 */
    .student-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 6px;
      background: linear-gradient(90deg, #4f46e5, #06b6d4);
    }

    /* 學生頭像區塊 */
    .card-header {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .avatar {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      background-color: #e0e7ff;
      color: #4f46e5;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      font-weight: bold;
      margin-right: 16px;
      border: 2px solid #fff;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .student-meta .name {
      font-size: 1.25rem;
      font-weight: 600;
      color: #1e293b;
      margin-bottom: 4px;
    }

    .student-meta .id {
      font-size: 0.85rem;
      color: #64748b;
    }

    /* 資料列表區塊 */
    .card-body {
      border-top: 1px solid #f1f5f9;
      padding-top: 16px;
    }

    .info-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 12px;
      font-size: 0.95rem;
    }

    .info-row:last-child {
      margin-bottom: 0;
    }

    .label {
      color: #64748b;
      font-weight: 500;
    }

    .value {
      color: #334155;
      font-weight: 600;
    }

    /* 狀態標籤：出席或特殊標記 */
    .status-badge {
      display: inline-block;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
    }

    .status-active {
      background-color: #dcfce7;
      color: #166534;
    }

    .status-away {
      background-color: #fee2e2;
      color: #991b1b;
    }

    /* 功能按鈕 */
    .card-footer {
      margin-top: 20px;
      display: flex;
      gap: 10px;
    }

    .btn {
      flex: 1;
      padding: 8px 0;
      border: none;
      border-radius: 8px;
      font-size: 0.875rem;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.2s ease;
      text-align: center;
      text-decoration: none;
    }

    .btn-primary {
      background-color: #4f46e5;
      color: #ffffff;
    }

    .btn-primary:hover {
      background-color: #4338ca;
    }

    .btn-secondary {
      background-color: #f1f5f9;
      color: #475569;
    }

    .btn-secondary:hover {
      background-color: #e2e8f0;
    }

    .add-btn{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px;
        padding: 30px;
        width: 150px;;
        height: 50px;
        font-size: 1.2rem;
        background-color: #4f46e5;
        color: #ffffff;
    }

    .add-btn:hover{
        background-color: #4338ca;
    }

    .page-nav {
        display: block;
        margin: auto;
        width: 80%;
        color: blue;;
    }

    .page-nav a {
        text-decoration: underline;
        display: inline-block;
        margin: 0px 2px;
        padding: 4px;
        border: 1px solid #ddd;
        border-radius: 6px;
        width: 36px;
        height: 36px;
        text-align: center;
        color: blue;
    }

    .page-nav a.now_page {
      background-color: pink;
    }
</style>

<?php

$dept_name = $pdo -> query("SELECT `name` FROM `dept` WHERE `id`='{$_GET['dept']}'") -> fetchColumn();

?>

<h2><?= $dept_name?>科別學生列表</h2>

<!-- <?= $_GET['code'];?> -->
<button class="btn add-btn"><a href="?inc=add_student">新增學生</a></button>

<?php

$sql_num = "SELECT COUNT(*) FROM `class_student`, `students`, `dept`, `graduate_school`, `classes` WHERE `class_student`.`school_num`=`students`.`school_num` AND `dept`.`id`=`students`.`dept` AND `graduate_school`.`id`=`students`.`graduate_at` AND `classes`.`code`=`class_student`.`class_code` AND `students`.`dept`= '{$_GET['dept']}'";
$total_students = $pdo -> query($sql_num) -> fetchColumn();
$divison = 12;
$pages = ceil($total_students / $divison);
$now_page = $_GET['page']??1;
$start = ($now_page - 1) * $divison;

?>

<!-- 
分頁標籤基礎寫法
<div class='page-nav'>

<?php 

if($now_page > 1){
  $prev = $now_page - 1;
  echo "<a href='?inc=students&page=$prev'>prev</a>";
}

if($now_page > 3){
  echo "<a href='?inc=students&page=1'>1</a>";
}

if($now_page > 4){
  echo "<span>...</span>";
}

if($now_page < 3){
  for($i = 1; $i <= $now_page + 2; $i++){
    if($now_page == $i){
      $now_class="now_page";
    } else{
      $now_class="";
    }
    echo "<a href='?inc=students&page=$i' class='$now_class'>$i</a>";
  }
} elseif($now_page > $pages - 2){
  for($i = $now_page - 2; $i <= $pages; $i++){
    if($now_page == $i){
      $now_class="now_page";
    } else{
      $now_class="";
    }
    echo "<a href='?inc=students&page=$i' class='$now_class'>$i</a>";
  }
} else{
  for($i = $now_page -2; $i <= $now_page + 2; $i++){
    if($now_page == $i){
      $now_class="now_page";
    } else{
      $now_class="";
    }
    echo "<a href='?inc=students&page=$i' class='$now_class'>$i</a>";
  }
}

if($now_page < $pages - 3){
  echo "<span>...</span>";
}

if($now_page < $pages - 2){
  echo "<a href='?inc=students&page=$pages'>$pages</a>";
}

if($now_page + 1 <= $pages){
  $next = $now_page + 1;
  echo "<a href='?inc=students&page=$next'>next</a>";
}

?>

</div> -->

<div class='page-nav'>

<?php 

if($now_page > 1){
  $prev = $now_page - 1;
  echo "<a href='?inc=students&page=$prev'>prev</a>";
}

if($now_page > 3){
  echo "<a href='?inc=students&page=1'>1</a>";
}

if($now_page > 4){
  echo "<span>...</span>";
}

$start_page = $now_page -2;
$end_page = $now_page + 2;

if($now_page < 3){
  $start_page = 1;
}

if($now_page > $pages - 2){
  $end_page = $pages;
}

for($i = $start_page; $i <= $end_page; $i++){
  if($now_page == $i){
    $now_class="now_page";
  } else{
    $now_class="";
  }
  echo "<a href='?inc=students&page=$i' class='$now_class'>$i</a>";
}

if($now_page < $pages - 3){
  echo "<span>...</span>";
}

if($now_page < $pages - 2){
  echo "<a href='?inc=students&page=$pages'>$pages</a>";
}

if($now_page + 1 <= $pages){
  $next = $now_page + 1;
  echo "<a href='?inc=students&page=$next'>next</a>";
}

?>

</div>

<!--
基礎寫法
<?php

$sql = "SELECT * FROM `class_student` WHERE `class_code`='{$_GET['code']}'";
$numbers = $pdo -> query($sql) -> fetchAll();

foreach($numbers as $number){
    $sql = "SELECT * FROM `students` WHERE `school_num`='{$number['school_num']}'";
    $student = $pdo -> query($sql) -> fetch();
    echo $student['name'];
    echo "<br>"; 
}

?> -->

<!--
進階寫法(解決n+1問題)
<?php

$sql = "SELECT `students`.`school_num`, `name`, `birthday` FROM `class_student`, `students` WHERE `class_student`.`class_code`='{$_GET['code']}' AND `class_student`.`school_num`=`students`.`school_num`";
$students = $pdo -> query($sql) -> fetchAll();

echo "<table>";
echo "<tr>";
echo "<td>";
echo "number";
echo "</td>";
echo "<td>";
echo "name";
echo "</td>";
echo "<td>";
echo "birthday";
echo "</td>";
echo "</tr>";

foreach($students as $student){
    echo "<tr>";
    echo "<td>";
    echo "{$student['school_num']}";
    echo "</td>";
    echo "<td>";
    echo "{$student['name']}";
    echo "</td>";
    echo "<td>";
    echo "{$student['birthday']}";
    echo "</td>";
    echo "</tr>";
}

echo "</table>";

?> -->

<div class="card-container">
  
  <?php

  $sql = "SELECT `students`.`school_num`, `students`.`name`, `classes`.`name` AS 'class_name', `dept`.`name`AS 'dept_name', `addr`, `uni_id`, `graduate_school`.`name` AS 'graduate_school', `birthday` FROM `class_student`, `students`, `dept`, `graduate_school`, `classes` WHERE `class_student`.`school_num`=`students`.`school_num` AND `dept`.`id`=`students`.`dept` AND `graduate_school`.`id`=`students`.`graduate_at` AND `classes`.`code`=`class_student`.`class_code` AND `students`.`dept`= '{$_GET['dept']}'";
  $students = $pdo -> query($sql) -> fetchAll();

  ?>
  
  <?php foreach($students as $student):?>
  <div class="student-card">
    <div class="card-header">
      <div class="avatar"><?= mb_substr($student['name'], 0, 1)?></div>
      <div class="student-meta">
        <div class="name"><?= $student['name']?></div>
        <div class="id"><?= $student['school_num']?></div>
      </div>
    </div>
    <div class="card-body">
      <div class="info-row">
        <span class="label">居住地</span>
        <span class="value"><?= mb_substr($student['addr'], 0, 3)?><n></span>
      </div>
      <div class="info-row">
        <span class="label">系所</span>
        <span class="value"><?= $student['dept_name']?></span>
      </div>
      <div class="info-row">
        <span class="label">畢業學校</span>
        <span class="value"><?= $student['graduate_school']?></span>
      </div>
    </div>
    <div class="card-footer">
      <button class="btn btn-primary"><a href="?inc=edit_student&school_num=<?= $student['school_num']?>">編輯</a></button>
      <button class="btn btn-secondary"><a href="?inc=delete_student&school_num=<?= $student['school_num']?>">刪除</a></button>
    </div>
  </div>
  <?php endforeach?>
</div>

<div class='page-nav'>

<?php 

if($now_page > 1){
  $prev = $now_page - 1;
  echo "<a href='?inc=students&page=$prev'>prev</a>";
}

if($now_page > 3){
  echo "<a href='?inc=students&page=1'>1</a>";
}

if($now_page > 4){
  echo "<span>...</span>";
}

if($now_page < 3){
  for($i = 1; $i <= $now_page + 2; $i++){
    if($now_page == $i){
      $now_class="now_page";
    } else{
      $now_class="";
    }
    echo "<a href='?inc=students&page=$i' class='$now_class'>$i</a>";
  }
} elseif($now_page > $pages - 2){
  for($i = $now_page - 2; $i <= $pages; $i++){
    if($now_page == $i){
      $now_class="now_page";
    } else{
      $now_class="";
    }
    echo "<a href='?inc=students&page=$i' class='$now_class'>$i</a>";
  }
} else{
  for($i = $now_page - 2; $i <= $now_page + 2; $i++){
    if($now_page == $i){
      $now_class="now_page";
    } else{
      $now_class="";
    }
    echo "<a href='?inc=students&page=$i' class='$now_class'>$i</a>";
  }
}

if($now_page < $pages - 3){
  echo "<span>...</span>";
}

if($now_page < $pages - 2){
  echo "<a href='?inc=students&page=$pages'>$pages</a>";
}

if($now_page + 1 <= $pages){
  $next = $now_page + 1;
  echo "<a href='?inc=students&page=$next'>next</a>";
}

?>

</div>