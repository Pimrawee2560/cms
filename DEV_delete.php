<?php
require "DB_config.php"; // เปลี่ยนจาก include เป็น require เพื่อให้โค้ดหยุดทำงานถ้าไม่พบไฟล์ DB_config.php

try {
    $id = $_GET["id"];
    
    $sql = "DELETE FROM `addnewpost` WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        header("Location: DEV_dashboard.php?");
        exit(); // ใส่ exit เพื่อให้โปรแกรมหยุดทำงานทันทีหลังจาก redirect
    } else {
        echo "No rows affected.";
    }
} catch(PDOException $e) {
    echo "Failed: " . $e->getMessage();
}
?>
