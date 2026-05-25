<?php

$sql = "SELECT `class_code` FROM `class_student` WHERE `school_num`={$_GET['school_num']}";
$class_code = $pdo -> query($sql) -> fetch();

?>

<!-- delete_student.php -->
<style>
    /* 警告專屬容器：在父層白框內完美居中 */
    .warning-card-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px 0;
        animation: cardFadeIn 0.4s ease-out;
    }

    /* 精緻警告圖示 */
    .warning-icon-box {
        width: 80px;
        height: 80px;
        background: rgba(216, 67, 21, 0.1); 
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5em;
        color: #d84315; 
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(216, 67, 21, 0.1);
    }

    /* 警告標題 */
    .warning-title {
        font-size: 1.8em;
        font-weight: bold;
        color: #d84315;
        margin: 0 0 15px 0;
        letter-spacing: 1px;
    }

    /* 警告內文細節 */
    .warning-desc {
        font-size: 1.1em;
        color: #666;
        line-height: 1.8;
        margin: 0 0 35px 0;
    }
    .warning-desc strong {
        color: #c62828;
        background: rgba(198, 40, 40, 0.08);
        padding: 2px 6px;
        border-radius: 4px;
    }

    /* 內嵌式按鈕群組 */
    .warning-btn-group {
        display: flex;
        gap: 20px;
        justify-content: center;
        width: 100%;
        max-width: 350px; 
    }

    /* ✨ 修正後的通用精緻按鈕樣式（完美支援 <a> 標籤） ✨ */
    .btn-warning-action {
        flex: 1;
        padding: 14px 0;
        font-size: 1.05em;
        font-weight: bold;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.25s ease;
        border: none;
        text-align: center;
        box-sizing: border-box;
        
        /* 💡 關鍵新增：讓 <a> 標籤具備區塊特性，才能正常套用 flex 和 padding 寬高 */
        display: inline-block; 
        text-decoration: none; /* 徹底移除 a 標籤預設的底線 */
    }

    /* 確定刪除按鈕 */
    .btn-warning-danger {
        background: linear-gradient(135deg, #ff8f00 0%, #ff6f00 100%);
        color: #fff;
        box-shadow: 0 4px 12px rgba(255, 111, 0, 0.3);
    }
    .btn-warning-danger:hover {
        background: linear-gradient(135deg, #ff6f00 0%, #e65100 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(255, 111, 0, 0.4);
    }

    /* 取消按鈕 */
    .btn-warning-cancel {
        background: rgba(74, 117, 89, 0.12);
        color: #2e7d32;
        border: 1px solid rgba(74, 117, 89, 0.2);
    }
    .btn-warning-cancel:hover {
        background: rgba(74, 117, 89, 0.22);
        color: #1b5e20;
        transform: translateY(-2px);
    }

    /* 輕微淡入動畫 */
    @keyframes cardFadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* 手機版自動適應 */
    @media (max-width: 480px) {
        .warning-btn-group { flex-direction: column; gap: 12px; }
        .btn-warning-action { width: 100%; }
    }
</style>

<!-- 內嵌警告卡片 HTML 結構 -->
<div class="warning-card-wrapper">
    <div class="warning-icon-box">⚠️</div>
    
    <h2 class="warning-title">確定登出？</h2>
    
    <p class="warning-desc">
        您確定要登出嗎？<br>
    </p>
    
    <div class="warning-btn-group">
        <!-- 1. 取消超連結 -->
        <a href="?inc=news?>" class="btn-warning-action btn-warning-cancel">
            取消
        </a>
        
        <!-- 2. 確定登出超連結 -->
        <a href="./api_logout.php" class="btn-warning-action btn-warning-danger">
            確定登出
        </a>
    </div>
</div>