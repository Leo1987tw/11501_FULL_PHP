<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            /* 調整：整體底色改為清新淺綠色漸層 */
            background: linear-gradient(135deg, #a8e6cf 0%, #dcedc1 100%);
            color: #333; /* 調整：淺色背景配深色字更清晰 */
            margin: 0;
            padding: 0; /* 調整：增加上下留白，避免表單變長時貼邊 */
            /* display: flex;
            justify-content: center;
            align-items: center; */
            min-height: 100vh;
        }

        /* --- 新增：導覽列樣式 --- */
        .navbar {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.4);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(46, 125, 50, 0.05);
        }
        .nav-logo {
            font-size: 1.5em;
            font-weight: bold;
            color: #ff6f00;
            text-decoration: none;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.05);
        }
        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .nav-item {
            color: #2e7d32;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .nav-item:hover {
            color: #ff6f00;
        }

        /* --- 新增：導覽列按鈕 --- */
        .btn-nav {
            padding: 8px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-login {
            background: rgba(74, 117, 89, 0.15);
            color: #2e7d32;
        }
        .btn-login:hover {
            background: rgba(74, 117, 89, 0.25);
        }
        .btn-register {
            background: #ffb300;
            color: #fff;
            box-shadow: 0 2px 8px rgba(255, 179, 0, 0.2);
        }
        .btn-register:hover {
            background: #ff6f00;
            transform: translateY(-2px);
        }
        
        .container {
            /* 調整：毛玻璃背景改為白底微透明，迎合淺綠風 */
            margin: 10vh auto;
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

    <!-- 頂部導覽列 -->
    <nav class="navbar">
        <a href="./index.html" class="nav-logo">綠意生態網</a>
        <div class="nav-links">
            <a href="#" class="nav-item">首頁</a>
            <a href="#" class="nav-item">最新消息</a>
            <a href="#" class="nav-item">關於我們</a>
            <a href="./login.php" class="btn-nav btn-login">登入</a>
            <a href="./register.php" class="btn-nav btn-register">註冊</a>
        </div>
    </nav>
    
    <?php if(isset($_GET['err'])):;?>
    <div>
        帳號或密碼錯誤！
    </div>
    <?php endif;?>
    
    <div class="container">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
        <form class="register-form" action="api_login.php" method="POST">
            <div class="form-group">
                <label for="account">帳號 (Account)</label>
                <input type="text" id="account" name="account" class="form-control" placeholder="請輸入帳號" required>
            </div>

            <div class="form-group">
                <label for="password">密碼 (Password)</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="請輸入密碼" required>
            </div>

            <button type="submit" class="btn-submit">登入</button>
        </form>

    </div>
</body>
</html>