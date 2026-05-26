<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用函數畫星星</title>
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
            max-width: 800px;
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
        *{
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
        <h3>以 * 符號為基礎在網頁上排列出下列圖形:</h3>

        <ul>
            <li>直角三角型</li>
            <li>倒直角三角型</li>
            <li>正三角型</li>
            <li>菱型</li>
            <li>矩形</li>
            <li>內含對角線的矩形</li>
        </ul>

        <img src="畫星星.png" alt="畫星星" width="400px">

        <form action="" method="post">
            <label for="number">請輸入數字：</label>
            <input type="number" id="number" name="number" required>
            <input type="submit" value="產生數列">
        </form>


        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $n = $_POST["number"];
        } else {
            echo "<div class='result'>請輸入數字。</div>";
            exit;
        }

        ?>

        <h3>直角三角型</h3>

        <table>
            <tr>
                <td>
                <?php

                right_triangle_one($n);

                function right_triangle_one($n){
                    for($i=0; $i < $n; $i++){
                        for($j=0; $j <= $i; $j++){
                            echo "*";
                        }
                        echo "<br>";
                    }
                }
                ?>
                </td>
                <td>
                <?php

                right_triangle_two($n);

                function right_triangle_two($n){
                    for($i=0; $i < $n; $i++){
                        for($j=0; $j <= $n; $j++){
                            if($i >= $j){
                                echo "*";
                            }
                        }
                        echo "<br>";
                    }
                }

                ?>
                </td>
            </tr>
        </table>

        <h3>倒直角三角型</h3>

        <table>
            <tr>
                <td>
                    <?php

                    reverse_right_triangle_one($n);

                    function reverse_right_triangle_one($n){
                        for($i=$n; $i > 0; $i--){
                            for($j=0;$j < $i; $j++){
                                echo "*";
                            }
                            echo "<br>";
                        }
                    }

                    ?>
                </td>
                <td>
                    <?php

                    reverse_right_triangle_two($n);
                    
                    function reverse_right_triangle_two($n){
                        for($i=0; $i < $n; $i++){
                            for($j=0;$j < $n-$i; $j++){
                                echo "*";
                            }
                            echo "<br>";
                        }
                    }

                    ?>
            
                </td>
                <td>
                    <?php

                    reverse_right_triangle_three($n);
                    
                    function reverse_right_triangle_three($n){
                        for($i=0; $i < $n; $i++){
                            for($j=0; $j <= $n; $j++){
                                if($i < $j){
                                    echo "*";
                                }
                            }
                            echo "<br>";
                        }
                    }

                    ?>
                </td>
            </tr>
        </table>

        <h3>正三角型</h3>

        <table>
            <tr>
                <td>
                     <?php

                    equilateral_triangle_one($n);
                    
                    function equilateral_triangle_one($n){
                        for($i=0; $i < $n; $i++){
                            for($j=0; $j < $n - $i - 1; $j++){
                                echo "&nbsp";
                            }
                            for($k=0; $k <= $i*2; $k++){
                                    echo "*";
                            }
                            echo "<br>";
                        }
                    }

                    ?>
                </td>
                <td>
                    <?php

                    equilateral_triangle_two($n);
                    
                    function equilateral_triangle_two($n){
                        for($i=1; $i < $n + 1; $i++){
                            for($j=0; $j <= ($n - 1)*2; $j++){
                                if($j < $n -1 + $i && $j > $n -1 - $i){
                                    echo "*";
                                } else {
                                    echo "&nbsp";
                                }
                            }
                            echo "<br>";
                        }
                    }

                    ?>
                </td>
            </tr>
        </table>

        <h3>菱型</h3>

        <table>
            <tr>
                <td>
                    <?php

                    diamond_one($n);
                    
                    function diamond_one($n){
                        for($i=0; $i < $n+1; $i++){
                            for($j=0; $j <= $n*2; $j++){
                                if($j < $n - 1 + $i && $j > $n - 1 - $i){
                                    echo "*";
                                } else {
                                    echo "&nbsp";
                                }
                            }
                            echo "<br>";
                        }
                        for($i=$n - 1; $i > 0; $i--){
                            for($j=0; $j <= $n*2; $j++){
                                if($j < $n - 1 + $i && $j > $n - 1 - $i){
                                    echo "*";
                                } else {
                                    echo "&nbsp";
                                }
                            }
                            echo "<br>";
                        }
                    }

                    ?>
                </td>
                <td>
                    <?php
                    
                    diamond_two($n);
                    
                    function diamond_two($n){
                        for($i=0; $i < $n * 2 + 1; $i++){
                            for($j=0; $j <= $n * 2 - 1; $j++){
                                if($i < $n){
                                    if($j < $n - 1 + $i && $j > $n - 1 - $i){
                                        echo "*";
                                    } else {
                                        echo "&nbsp";
                                    }
                                } else {
                                    if($j < $n -1 + ($n*2-$i) && $j > $n - 1 - ($n*2-$i)){
                                        echo "*";
                                    } else {
                                        echo "&nbsp";
                                    }
                                }
                            }
                            echo "<br>";
                        }
                    }

                    ?>
                </td>
                <td>
                    <?php

                    diamond_three($n);
                    
                    function diamond_three($n){
                        for($i=0; $i < $n*2; $i++){
                            $k = -abs($n-$i)+$n;
                            for($j=0; $j <= $n*2 - 1; $j++){
                                if($j < $n - 1 + $k && $j > $n - 1 - $k){
                                    echo "*";
                                } else {
                                    echo "&nbsp";
                                }
                            }
                            echo "<br>";
                        }
                    }

                    ?>
                </td>
                <td>
                    <?php

                    diamond_four($n);
                    
                    function diamond_four($n){
                        for($i=0; $i < $n*2 + 1; $i++){
                            $k = $i < $n ? $i : $n*2 - $i;
                            for($j=0; $j <= $n*2 - 1; $j++){
                                if($j < $n - 1 + $k && $j > $n - 1 - $k){
                                    echo "*";
                                } else {
                                    echo "&nbsp";
                                }
                            }
                            echo "<br>";
                        }
                    }

                    ?>
                </td>
            </tr>
        </table>

        <h3>矩形</h3>

        <table>
            <tr>
                <td>
                    <?php

                    regular_one($n);
                    
                    function regular_one($n){
                        for($i=0; $i < $n +2; $i++){
                            echo "*";
                        }
                        echo "<br>";
                        for($i=0; $i < $n; $i++){
                            for($j=0; $j < $n + 2; $j++){
                                if($j == 0 || $j == $n + 1){
                                    echo "*";
                                } else{
                                    echo "&nbsp";
                                }
                            }
                            echo "<br>";
                        }
                        for($i=0; $i < $n + 2; $i++){
                            echo "*";
                        }
                        echo "<br>";
                    }

                    ?>
                </td>
                <td>
                    <?php

                    regular_two($n);
                    
                    function regular_two($n){
                        for($i=0; $i<$n +2; $i++){
                            for($j=0; $j<$n +2; $j++){
                                if($i == 0 || $i == $n +1){
                                    echo "*";
                                } else if($j == 0 || $j == $n +1){
                                    echo "*";
                                } else{
                                    echo "&nbsp";
                                }
                            }
                            echo "<br>";
                        }
                    }
                    
                    ?>
                </td>
                <td>
                    <?php

                    regular_three($n);
                    
                    function regular_three($n){
                        for($i=0; $i<$n + 2; $i++){
                            for($j=0; $j<$n + 2; $j++){
                                if($i == 0 || $i == $n + 1 || $j == 0 || $j == $n + 1){
                                    echo "*";
                                } else {
                                    echo "&nbsp";
                                }
                            }
                            echo "<br>";
                        }
                    }

                    ?>
                </td>
            </tr>
        </table>

        <h3>內含對角線的矩形</h3>

        <table>
            <tr>
                <td>
                    <?php

                    regular_cross($n);
                    
                    function regular_cross($n){
                        for($i=0; $i<$n + 2; $i++){
                            for($j=0; $j<$n + 2; $j++){
                                if($i == 0 || $i == $n + 1 || $j == 0 || $j == $n + 1 || $i == $j || $i + $j == $n + 1){
                                    echo "*";
                                } else{
                                    echo "&nbsp";
                                }
                            }
                            echo "<br>";
                        }
                    }
                    
                    ?>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>