<?php
require_once('DB_config.php');

if (isset($_REQUEST['update_id'])) {
    try {
        $id = $_REQUEST['update_id'];
        // อัพเดทสถานะในฐานข้อมูล
        $update_stmt = $conn->prepare("UPDATE template SET Status = CASE WHEN id = :id THEN 'use' ELSE 'unuse' END");
        $update_stmt->bindParam(':id', $id);
        $update_stmt->execute();
        $updateMsg = "Template has been changed....";
        header("refresh:2;DEV_template.php");
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['btn_copy'])) {
    $templateId = $_POST['update_id'];

    try {
        // คัดลอกข้อมูลจากแถวที่เลือก
        $copy_stmt = $conn->prepare("INSERT INTO template (Template, Status, Page1, Page2, Page3, Page4, Page5, Page6, Page7, Page8, Page9, Page10, Page11, Page12, image) SELECT CONCAT(Template, ' copy'), 'unuse', Page1, Page2, Page3,Page4, Page5, Page6, Page7, Page8, Page9, Page10, Page11, Page12, image FROM template WHERE id = :id");
        $copy_stmt->bindParam(':id', $templateId);
        $copy_stmt->execute();
        $copyMsg = "Template successfully copied.";
    } catch(PDOException $e) {
        $errorMsg = "Failed to copy template: " . $e->getMessage();
    }
}
?>
<?php
    require_once('DB_config.php');

    function copyFolder($source, $dest) {
        if (is_dir($source)) {
            @mkdir($dest);
            $dir = opendir($source);
            while (($file = readdir($dir)) !== false) {
                if ($file != '.' && $file != '..') {
                    if (is_dir($source . '/' . $file)) {
                        copyFolder($source . '/' . $file, $dest . '/' . $file);
                    } else {
                        copy($source . '/' . $file, $dest . '/' . $file);
                    }
                }
            }
            closedir($dir);
        }
    }

    $htmlToAdd = ''; // สร้างตัวแปรเพื่อเก็บ HTML ที่จะเพิ่ม

    if (isset($_POST['btn_copy'])) {
        $templateId = $_POST['update_id'];
        $sourceDir = '';
        $destDir = '';

        switch ($templateId) {
            case '1':
                $sourceDir = 'Template1';
                $destDir = 'Template1_copy';
                break;
            case '2':
                $sourceDir = 'Template2';
                $destDir = 'Template2_copy';
                break;
            case '3':
                $sourceDir = 'Template3';
                $destDir = 'Template3_copy';
                break;
        }

        if (!empty($sourceDir) && !empty($destDir)) {
            copyFolder($sourceDir, $destDir);
            $copyMsg = "Files successfully copied to $destDir.";
        } else {
            $errorMsg = "Failed to copy files.";
        }
    }
?>
