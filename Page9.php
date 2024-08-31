<?php
// เชื่อมต่อกับฐานข้อมูลผ่านไฟล์ DB_config.php
require_once('DB_config.php');

// การดึงข้อมูลทุกแถวที่ฟีล status เป็น 'use' จากตาราง template
$select_stmt_Page9 = $conn->prepare("SELECT `Page9` FROM `template` WHERE `Status` = 'use'");
$select_stmt_Page9->execute();

// วนลูปผลลัพธ์ที่ได้
while ($row_Page9 = $select_stmt_Page9->fetch(PDO::FETCH_ASSOC)) {
    $Page9 = $row_Page9['Page9'];
    include $Page9;
}
?>