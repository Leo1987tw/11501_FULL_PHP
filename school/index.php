<?php

include "./include/db_connect.php";

?>

<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>板橋國小</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #a8e6cf 0%, #dcedc1 100%);
            color: #333;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        /* --- 調整：主視覺容器 --- */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            box-sizing: border-box;
        }
        .container {
            background: rgba(255, 255, 255, 0.65);
            padding: 50px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(46, 125, 50, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            max-width: 800px;
            width: 100%;
            box-sizing: border-box;
            text-align: center;
        }
        h1 {
            color: #ff6f00;
            margin-bottom: 15px;
            font-size: 2.5em;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .subtitle {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        /* --- 新增：主頁面大按鈕組 --- */
        .cta-group {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-bottom: 40px;
        }
        .btn-cta {
            padding: 15px 40px;
            font-size: 1.1em;
            font-weight: bold;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-cta-primary {
            background: #ffb300;
            color: white;
            box-shadow: 0 4px 10px rgba(255, 179, 0, 0.2);
        }
        .btn-cta-primary:hover {
            background: #ff6f00;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 111, 0, 0.3);
        }
        .btn-cta-secondary {
            background: rgba(255, 255, 255, 0.8);
            color: #2e7d32;
            border: 2px solid #a8e6cf;
        }
        .btn-cta-secondary:hover {
            background: #fff;
            border-color: #ffb300;
            color: #ff6f00;
            transform: translateY(-3px);
        }

        /* --- 特色介紹區 --- */
        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            text-align: left;
            margin-top: 20px;
        }
        .feature-card {
            background: rgba(255, 255, 255, 0.4);
            padding: 20px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .feature-card h4 {
            color: #e65100;
            margin: 0 0 10px 0;
        }
        .feature-card p {
            margin: 0;
            font-size: 0.9em;
            color: #555;
            line-height: 1.5;
        }

        /* 響應式調整 */
        @media (max-width: 768px) {
            .navbar { padding: 15px 20px; }
            .features { grid-template-columns: 1fr; }
            .cta-group { flex-direction: column; gap: 10px; }
            .btn-cta { width: 100%; box-sizing: border-box; text-align: center; }
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

    <!-- 主要內容區 -->
    <main class="main-content">
        <div class="container">
            <h1>歡迎來到板橋國小</h1>
            <p class="subtitle">探索清新、自然且高效的數位體驗。我們致力於提供最優質的服務，讓您的生活更輕鬆、更美好。</p>
            
            <!-- 行動呼籲按鈕組 -->
            <div class="cta-group">
                <a href="./register.php" class="btn-cta btn-cta-primary">立即免費註冊</a>
                <a href="./login.php" class="btn-cta btn-cta-secondary">會員登入入口</a>
            </div>

            <!-- 平台特色區 -->
            <div class="features">
                <div class="feature-card">
                    <h4>優雅介面</h4>
                    <p>採用舒適的綠色與溫暖橘色調，給您最放鬆的視覺享受。</p>
                </div>
                <div class="feature-card">
                    <h4>快速安全</h4>
                    <p>先進的前端毛玻璃架構，保障瀏覽時的流暢與美觀。</p>
                </div>
                <div class="feature-card">
                    <h4>響應式設計</h4>
                    <p>無論使用電腦、平板或手機，都能獲得最完美的排版呈現。</p>
                </div>
            </div>
        </div>
    </main>

</body>
</html>