<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>01-pdo 連線</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            max-width: 600px;
            width: 100%;
        }
        h3 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 1.8em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        p, div {
            color: #fff;
        }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
        <h3>01-pdo 連線</h3>

        <?php

        $dsn = "mysql: host=localhost; charset=utf8; dbname=school";
        $pdo = new PDO($dsn, 'root', '');

        $sql = "SELECT * FROM `dept`";
        $depts = $pdo ->query($sql) -> fetchAll(PDO::FETCH_ASSOC);

        echo "<pre>";
        print_r($depts);
        echo "<pre>";

        echo "<hr>";

        $sql_insert = "INSERT INTO `dept` (`code`,`name`) VALUES('601','中餐科')";
        $pdo -> exec($sql_insert);
        $depts = $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);

        echo "<pre>";
        print_r($depts);
        echo "</pre>";

        echo "<hr>";

        $sql_update = "UPDATE `dept` SET `code`='602', `name`='西餐科' WHERE `id`='7'";
        $pdo -> exec($sql_update);
        $depts = $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);

        echo "<pre>";
        print_r($depts);
        echo "</pre>";

        echo "<hr>";

        $sql_delete = "DELETE FROM `dept` WHERE `id`='7'";
        $pdo -> exec($sql_delete);
        $depts = $pdo -> query($sql) -> fetchAll(PDO::FETCH_ASSOC);

        echo "<pre>";
        print_r($depts);
        echo "</pre>";

        ?>

    </div>
</body>
</html>