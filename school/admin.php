<?php

include_once "./include/db_connect.php";

?>

<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>網站首頁</title>
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
        <a href="./index.php" class="nav-logo">綠意生態網</a>
        <div class="nav-links">
            <a href="?inc=news" class="nav-item">最新消息</a>
            <a href="?inc=classrooms" class="nav-item">班級</a>
            <a href="?inc=students" class="nav-item">學生</a>
            <a href="?inc=subjects" class="nav-item">科別</a>
            <a href="./logout.php" class="btn-nav btn-login">登出</a>
            <!-- <a href="./register.php" class="btn-nav btn-register">註冊</a> -->
        </div>
    </nav>

    <!-- 主要內容區 -->
    <main class="main-content">
        <div class="container">
            <h1>歡迎來到我們的網站</h1>

            <?php

            $inc=(isset($_GET['inc']))?$_GET['inc']:'classrooms';
            $file="./include/" . $inc . ".php";

            // if(file_exists($file)){
                include $file;
            // } else{
            //     include "./include/classrooms.php";
            // }

            ?>
        </div>
    </main>

</body>
</html>