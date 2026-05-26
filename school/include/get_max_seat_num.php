<?php

// echo $max_seat_num = $pdo -> query("SELECT max(`seat_num`) FROM `class_student` WHERE `class_code`='{$_GET['code']}'") -> fetchColumn();

if (isset($_GET['code']) && !empty($_GET['code'])) {
    
    $code = $_GET['code'];
    
    // 3. 查出該班級目前最大的座號
    $max_seat = $pdo -> query("SELECT max(`seat_num`) FROM `class_student` WHERE `class_code` = '$code'") -> fetchColumn();
    
    // 4. 強制轉成整數並 + 1（如果是空班級，(int)null 會變成 0，0 + 1 = 1）
    echo (int)$max_seat + 1;

} else {
    // 如果前端沒有傳班級代碼，就回傳空字串
    echo "";
}

?>