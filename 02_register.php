<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            /* 調整：整體底色改為清新淺綠色漸層 */
            background: linear-gradient(135deg, #a8e6cf 0%, #dcedc1 100%);
            color: #333; /* 調整：淺色背景配深色字更清晰 */
            margin: 0;
            padding: 40px 0; /* 調整：增加上下留白，避免表單變長時貼邊 */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            /* 調整：毛玻璃背景改為白底微透明，迎合淺綠風 */
            background: rgba(255, 255, 255, 0.65);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(46, 125, 50, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            max-width: 600px;
            width: 100%;
            box-sizing: border-box;
        }
        h3 {
            /* 調整：標題改為亮眼的橘色 */
            color: #ff6f00;
            margin-bottom: 20px;
            font-size: 1.8em;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        p, div {
            color: #444;
        }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            /* 調整：按鈕微調以融入新風格 */
            background: rgba(74, 117, 89, 0.15);
            color: #2e7d32;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background: #ffb300; /* 懸停：亮黃色 */
            color: #fff;
            transform: translateY(-3px);
        }
        ul {
            color: #555;
            padding-left: 20px;
            margin-bottom: 25px;
        }
        li {
            margin-bottom: 5px;
        }

        /* --- 新增：註冊表單與欄位樣式 --- */
        .register-form {
            margin-top: 30px;
            background: rgba(255, 255, 255, 0.5);
            padding: 25px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #e65100; /* 標籤：深橘色 */
        }
        .form-control {
            width: 100%;
            padding: 12px;
            border: 2px solid #a8e6cf; /* 邊框：淺綠色 */
            border-radius: 10px; /* 規格：圓角欄位 */
            box-sizing: border-box;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            outline: none;
            border-color: #ffb300; /* 聚焦：黃色邊框 */
            box-shadow: 0 0 8px rgba(255, 179, 0, 0.3);
        }
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: #ffb300; /* 按鈕：黃色 */
            color: #fff;
            border: none;
            border-radius: 10px; /* 規格：圓角按鈕 */
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(255, 179, 0, 0.2);
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            background: #ff6f00; /* 懸停：轉為橘色 */
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 111, 0, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
        <h3>簡易註冊系統</h3>

        <ul>
            <li>建立一個資料表來存放使用者的帳號、密碼及個人資料</li>
            <li>建立一個網頁表單可以讓使用者輸入自己的帳號、密碼及個人資料</li>
            <li>送出表單後可以將使用者的資料存入資料表</li>
        </ul>

        <h3>資料表設計-members</h3>

        <ul>
            <li>id</li>
            <li>account</li>
            <li>password</li>
            <li>tel</li>
            <li>birthday</li>
            <li>email</li>
        </ul>

        <h3>註冊表單設計</h3>

        <ul>
            <li>清新簡約風</li>
            <li>整體底色是淺綠色</li>
            <li>文字以黃色或橘色作搭配</li>
            <li>表單輸入欄位都要有圓角</li>
        </ul>

        <!-- 新增：符合 members 資料表欄位的 HTML 表單 -->
        <form class="register-form" action="api_register.php" method="POST">
            <div class="form-group">
                <label for="account">帳號 (Account)</label>
                <input type="text" id="account" name="account" class="form-control" placeholder="請輸入帳號" required>
            </div>

            <div class="form-group">
                <label for="password">密碼 (Password)</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="請輸入密碼" required>
            </div>

            <div class="form-group">
                <label for="tel">電話 (Telephone)</label>
                <input type="tel" id="tel" name="tel" class="form-control" placeholder="例如：0912345678">
            </div>

            <div class="form-group">
                <label for="birthday">生日 (Birthday)</label>
                <input type="date" id="birthday" name="birthday" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">電子郵件 (Email)</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="例如：example@mail.com">
            </div>

            <button type="submit" class="btn-submit">註冊會員</button>
        </form>

    </div>
</body>
</html>