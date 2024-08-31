<?php
// เชื่อมต่อกับฐานข้อมูลผ่านไฟล์ DB_config.php
require_once('DB_config.php');

// การดึงข้อมูลทุกแถวที่ฟีล status เป็น 'use' จากตาราง template
$select_stmt_Page10 = $conn->prepare("SELECT `Page10` FROM `template` WHERE `Status` = 'use'");
$select_stmt_Page10->execute();

// วนลูปผลลัพธ์ที่ได้
while ($row_Page10 = $select_stmt_Page10->fetch(PDO::FETCH_ASSOC)) {
    $Page10 = $row_Page10['Page10'];
    include $Page10;
}
?>