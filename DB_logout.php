<?php
    session_start();  // เริ่มต้นเซสชัน
    session_destroy(); // ทำลายเซสชัน (ลบข้อมูลเซสชันทั้งหมด)
    header("Location: index.php"); // เปลี่ยนเส้นทางไปยังหน้า index.php
?>