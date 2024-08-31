<?php
// เชื่อมต่อกับฐานข้อมูลผ่านไฟล์ DB_config.php
require_once('DB_config.php');

// การดึงข้อมูลทุกแถวที่ฟีล status เป็น 'use' จากตาราง template
$select_stmt_Page7 = $conn->prepare("SELECT `Page7` FROM `template` WHERE `Status` = 'use'");
$select_stmt_Page7->execute();

// วนลูปผลลัพธ์ที่ได้
while ($row_Page7 = $select_stmt_Page7->fetch(PDO::FETCH_ASSOC)) {
    $Page7 = $row_Page7['Page7'];
    include $Page7;
}
?>