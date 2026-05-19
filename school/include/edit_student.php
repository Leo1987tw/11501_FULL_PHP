<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新增學生資料表單</title>
  <style>
    /* 重設基礎樣式 */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, "Microsoft JhengHei";
    }

    body {
      background-color: #f4f7f6;
      color: #333;
      padding: 40px 20px;
    }

    /* 表單外殼容器 */
    .form-container {
      max-width: 700px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      padding: 35px;
      position: relative;
      overflow: hidden;
    }

    /* 頂部彩色裝飾線（與卡片風格呼應） */
    .form-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 6px;
      background: linear-gradient(90deg, #4f46e5, #06b6d4);
    }

    h2 {
      font-size: 1.6rem;
      color: #1e293b;
      margin-bottom: 8px;
      font-weight: 600;
    }

    p.subtitle {
      color: #64748b;
      font-size: 0.95rem;
      margin-bottom: 30px;
    }

    /* 表單欄位群組（雙欄網格排版） */
    .form-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    /* 當欄位需要獨佔一行時（例如跨兩欄） */
    .full-width {
      grid-column: span 2;
    }

    /* 欄位標籤 */
    label {
      font-size: 0.9rem;
      font-weight: 600;
      color: #475569;
      margin-bottom: 8px;
    }

    /* 輸入框、下拉選單、日期選取器的通用美化 */
    input[type="text"],
    input[type="number"],
    input[type="date"],
    select {
      width: 100%;
      padding: 12px 14px;
      font-size: 0.95rem;
      color: #334155;
      background-color: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      outline: none;
      transition: all 0.3s ease;
    }

    /* 滑鼠點擊輸入框時的高亮效果 */
    input:focus,
    select:focus {
      background-color: #ffffff;
      border-color: #4f46e5;
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    /* 按鈕區塊 */
    .form-actions {
      margin-top: 35px;
      border-top: 1px solid #f1f5f9;
      padding-top: 25px;
      display: flex;
      justify-content: flex-end;
      gap: 15px;
    }

    .btn {
      padding: 12px 28px;
      border: none;
      border-radius: 8px;
      font-size: 0.95rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s ease;
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

    /* 響應式：手機畫面改為單欄 */
    @media (max-width: 600px) {
      .form-grid {
        grid-template-columns: 1fr;
      }
      .full-width {
        grid-column: span 1;
      }
      .form-container {
        padding: 25px 20px;
      }
    }
  </style>
</head>
<body>
  <?php

  include "db_connect.php";

  $student = $pdo -> query("SELECT * FROM `students` WHERE `school_num`={$_GET['school_num']}") -> fetch();
  $class_code = $pdo -> query("SELECT * FROM `class_student` WHERE `school_num`={$_GET['school_num']}") -> fetch();

  ?>

  <div class="form-container">
    <h2>新增學生資料</h2>
    <p class="subtitle">請填寫完整的學生學籍資料，確認無誤後點擊儲存。</p>

    <!-- 改為 POST 表單，action 請自行串接你的 PHP 接收頁面 -->
    <form action="./include/api_add_student.php" method="POST">
      <div class="form-grid">
        
        <!-- 學號 (文字輸入) -->
        <div class="form-group">
          <label for="school_num">學號</label>
          <?= $student['school_num']; ?>
          <input type="hidden" id="school_num" name="school_num" placeholder="例如：<?= $student['school_num']; ?>" value="<?= $student['school_num']; ?>" required>
        </div>

        <!-- 姓名 (文字輸入) -->
        <div class="form-group">
          <label for="name">姓名</label>
          <input type="text" id="name" name="name" value="<?= $student['name'];?>" required>
        </div>

        <div class="form-group">
            <label for="class">所屬班級</label>
            <select id="class" name="class" >
                <option value="">請選擇分配的班級</option>
                <?php 
                    $classes = $pdo -> query("SELECT * FROM `classes`") -> fetchAll();
                    foreach($classes as $class):
                ?>
                <option value="<?= $class['code'];?>" <?= ($class['code'] == $class_code['class_code'])?'selected':'';?>><?= $class['name']; ?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group">
            <label for="seat_num">座號</label>
            <input type="number" id="seat_num" name="seat_num" value="<?= $class_code['seat_num'];?>">
        </div>

        <script>
            // 監聽班級選擇變更
            document.getElementById('class').addEventListener('change', function() {
                const classCode = this.value;
                    
                // 如果沒有選擇班級，清空座號
                if (!classCode) {
                    document.getElementById('seat_num').value = '';
                    return;
                }
                    
                // 發送 GET 請求到後端取得最大座號
                fetch(`./include/get_max_seat_num.php?code=${encodeURIComponent(classCode)}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.text();
                    })
                    .then(data => {
                        // 將取得的座號填入輸入框
                        document.getElementById('seat_num').value = data.trim();
                    })
                    .catch(error => {
                        console.error('錯誤:', error);
                        alert('取得座號失敗，請稍後重試');
                    });
            });
        </script>

        <!-- 生日 (日期選取器) -->
        <div class="form-group">
          <label for="birthday">生日</label>
          <input type="date" id="birthday" name="birthday" value="<?= $student['birthday'];?> required>
        </div>

        <!-- 身分證字號 (文字輸入) -->
        <div class="form-group">
          <label for="uni_id">身分證字號</label>
          <input type="text" id="id_card" name="id_card" value="<?= $student['uni_id'];?>" placeholder="例如：A123456789" required>
        </div>

        <!-- 父母 (文字輸入) -->
        <div class="form-group">
          <label for="parent">父母</label>
          <input type="text" id="parents" name="parents" value="<?= $student['parents'];?>" required>
        </div>

        <!-- 電話 (文字輸入) -->
        <div class="form-group">
          <label for="tel">電話</label>
          <input type="text" id="tel" name="tel" value="<?= $student['tel'];?>" required>
        </div>

        <!-- 科別 (下拉選單) -->
        <div class="form-group">
          <label for="dept">科別</label>
          <select id="dept" name="dept" required>
            <option value="" disabled selected>請選擇科別</option>
            <?php
            $depts = $pdo -> query("SELECT * FROM `dept`") -> fetchAll();
            foreach($depts as $dept):
            ?>
            <option value="<?= $dept['id']?>" <?= ($dept['id'] == $student['dept'])?'selected':'';?>><?= $dept['name']?></option>
            <?php endforeach;?>
          </select>
        </div>

        <!-- 畢業國中 (下拉選單) -->
        <div class="form-group">
          <label for="graduate_school">畢業國中</label>
          <select id="graduate_school" name="graduate_school" required>
            <option value="" disabled selected>請選擇畢業國中</option>
            <?php
            $schools = $pdo -> query("SELECT * FROM `graduate_school`") -> fetchAll();
            foreach($schools as $school):
            ?>
            <option value="<?= $school['id']?>" <?= ($school['id'] == $student['graduate_at'])?'selected':'';?>><?= $school['name']?></option>
            <?php endforeach;?>
          </select>
        </div>

        <!-- 畢業狀態 (下拉選單) -->
        <div class="form-group">
          <label for="graduate_status">畢業狀態</label>
          <select id="graduate_status" name="graduate_status" required>
            <option value="" disabled selected>請選擇狀態</option>
            <?php
            $status = $pdo -> query("SELECT * FROM `status`") -> fetchAll();
            foreach($status as $s):
            ?>
            <option value="<?= $s['id']?>" <?= ($s['id'] == $student['status_code'])?'selected':'';?>><?= $s['status']?></option>
            <?php endforeach;?>
          </select>
        </div>

      </div>

      <!-- 按鈕區 -->
      <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="history.back()">取消返回</button>
        <button type="submit" class="btn btn-primary">儲存資料</button>
      </div>
    </form>
  </div>

</body>
</html>