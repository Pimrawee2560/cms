<?php
// เชื่อมต่อกับฐานข้อมูลผ่านไฟล์ DB_config.php
require_once('DB_config.php');

// การดึงข้อมูลทุกแถวที่ฟีล status เป็น 'use' จากตาราง template
$select_stmt_Page11 = $conn->prepare("SELECT `Page11` FROM `template` WHERE `Status` = 'use'");
$select_stmt_Page11->execute();

// วนลูปผลลัพธ์ที่ได้
while ($row_Page11 = $select_stmt_Page11->fetch(PDO::FETCH_ASSOC)) {
    $Page11 = $row_Page11['Page11'];
    include $Page11;
}
?>