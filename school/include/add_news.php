<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新增消息</title>
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

    /* 輸入框、下拉選單、日期選取器、文字區域的通用美化 */
    input[type="text"],
    input[type="number"],
    input[type="date"],
    select,
    textarea {
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

    textarea {
      min-height: 240px;
      resize: vertical;
      line-height: 1.6;
    }

    /* 滑鼠點擊輸入框時的高亮效果 */
    input:focus,
    select:focus,
    textarea:focus {
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
  
  <div class="form-container">
    <h2>新增消息</h2>
    <p class="subtitle">請填寫完整的最新消息，確認無誤後點擊儲存。</p>

    <!-- 改為 POST 表單，action 請自行串接你的 PHP 接收頁面 -->
    <form action="./include/api_add_news.php" method="POST">
      <div class="form-grid">
        <div class="form-group">
          <label for="subject">主題</label>
          <input type="text" id="subject" name="subject" value="">
        </div>

        <div class="form-group">
          <label for="author">作者</label>
          <input type="text" id="author" name="author" value="">
        </div>

        <div class="form-group full-width">
          <label for="department">單位</label>
          <input type="text" id="department" name="department" required>
        </div>

        <div class="form-group full-width">
          <label for="content">內容</label>
          <textarea id="content" name="content" required></textarea>
        </div>
      </div>

      <!-- 按鈕區 -->
      <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="history.back()">取消返回</button>
        <button type="submit" class="btn btn-primary">新增消息</button>
      </div>
    </form>
  </div>

</body>
</html>