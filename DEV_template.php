<?php
require_once('DB_config.php');

if (isset($_REQUEST['update_id'])) { //use
    try {
        $id = $_REQUEST['update_id'];
        // Update the status in the database
        $update_stmt = $conn->prepare("UPDATE template SET Status = CASE WHEN id = :id THEN 'use' ELSE 'unuse' END");
        $update_stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $update_stmt->execute();
        $updateMsg = "Template has been changed....";
        header("refresh:2;DEV_template.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['btn_copy'])) {
    $templateId = $_POST['update_id'];


    // Define source directory based on the template ID
    $sourceDir = '';
    switch ($templateId) {
        case '1':
            $sourceDir = 'Template1';
            break;
        case '2':
            $sourceDir = 'Template2';
            break;
        case '3':
            $sourceDir = 'Template3';
            break;
    }

    if (!empty($sourceDir)) {
        $destDir = getNextAvailableDirectoryNew($sourceDir);

        // Copy table 'template' data and update data
        try {
            $copy_stmt = $conn->prepare("
                INSERT INTO template (Template, Status, Page1, Page2, Page3, Page4, Page5, Page6, Page7, Page8, Page9, Page10, Page11, Page12, image)
                SELECT 
                    CONCAT(Template,:id), 
                    'unuse', 
                    REPLACE(Page1, :sourceDir, :destDir),
                    REPLACE(Page2, :sourceDir, :destDir),
                    REPLACE(Page3, :sourceDir, :destDir),
                    REPLACE(Page4, :sourceDir, :destDir),
                    REPLACE(Page5, :sourceDir, :destDir),
                    REPLACE(Page6, :sourceDir, :destDir),
                    REPLACE(Page7, :sourceDir, :destDir),
                    REPLACE(Page8, :sourceDir, :destDir),
                    REPLACE(Page9, :sourceDir, :destDir),
                    REPLACE(Page10, :sourceDir, :destDir),
                    REPLACE(Page11, :sourceDir, :destDir),
                    REPLACE(Page12, :sourceDir, :destDir),
                    image
                FROM template
                WHERE id = :id
            ");
            $copy_stmt->bindValue(':id', $templateId, PDO::PARAM_INT);
            $copy_stmt->bindValue(':sourceDir', $sourceDir, PDO::PARAM_STR);
            $copy_stmt->bindValue(':destDir', $destDir, PDO::PARAM_STR);
            $copy_stmt->execute();

            // Get the new ID of the copied template
            $copyMsg = "Template successfully copied PageTemplate.";
            $newTemplateId = $conn->lastInsertId(); // เก็บ ID ของแถวที่แทรก

            $destPrefix = 'Template' . $newTemplateId;

            $update_stmt = $conn->prepare("
                UPDATE template
                SET 
                    Template = :destPrefix,
                    Page1 = REPLACE(Page1, :destDir, :destPrefix),
                    Page2 = REPLACE(Page2, :destDir, :destPrefix),
                    Page3 = REPLACE(Page3, :destDir, :destPrefix),
                    Page4 = REPLACE(Page4, :destDir, :destPrefix),
                    Page5 = REPLACE(Page5, :destDir, :destPrefix),
                    Page6 = REPLACE(Page6, :destDir, :destPrefix),
                    Page7 = REPLACE(Page7, :destDir, :destPrefix),
                    Page8 = REPLACE(Page8, :destDir, :destPrefix),
                    Page9 = REPLACE(Page9, :destDir, :destPrefix),
                    Page10 = REPLACE(Page10, :destDir, :destPrefix),
                    Page11 = REPLACE(Page11, :destDir, :destPrefix),
                    Page12 = REPLACE(Page12, :destDir, :destPrefix)
                WHERE id = :id;
            ");
            $update_stmt->bindValue(':id', $newTemplateId, PDO::PARAM_INT);
            $update_stmt->bindValue(':destDir', $destDir, PDO::PARAM_STR);
            $update_stmt->bindValue(':destPrefix', $destPrefix, PDO::PARAM_STR);
            $update_stmt->execute();
        } catch (PDOException $e) {
            $errorMsg = "Error in copying template data: " . $e->getMessage();
        }
        // Copy colors data with updated section names
        try {
            $copy_colors_stmt = $conn->prepare("
                INSERT INTO `colors` (`section`, `colors`, `border`, `radius`, `bcolors`, `tcolors`)
                SELECT 
                    REPLACE(section, :sourceDir2, :destPrefix),
                    `colors`, 
                    `border`, 
                    `radius`,
                    `bcolors`,
                    `tcolors`
                FROM `colors`
                WHERE `section` REGEXP :sourceDir
            ");
            $copy_colors_stmt->bindValue(':sourceDir2', $sourceDir, PDO::PARAM_STR);
            $copy_colors_stmt->bindValue(':destPrefix', $destPrefix, PDO::PARAM_STR);
            $copy_colors_stmt->bindValue(':sourceDir', '^' . $sourceDir . '_[^0-9].*', PDO::PARAM_STR);
            $copy_colors_stmt->execute();
            $copyMsg .= " Colors data successfully copied.";
        } catch (PDOException $e) {
            $errorMsg = "Failed to copy colors data: " . $e->getMessage();
        }
        // Copy button data with updated button names
        try {
            $copy_button_stmt = $conn->prepare("
                INSERT INTO button (button, name, connect, `show`)
                SELECT 
                    REPLACE(button, :sourceDir2, :destPrefix),
                    name,
                    connect, 
                    `show`
                FROM button
                WHERE button REGEXP :sourceDir
            ");
            // Bind the parameters to the SQL statement
            $copy_button_stmt->bindValue(':sourceDir2', $sourceDir, PDO::PARAM_STR);
            $copy_button_stmt->bindValue(':destPrefix', $destPrefix, PDO::PARAM_STR);
            $copy_button_stmt->bindValue(':sourceDir', '^' . $sourceDir . '_[^0-9].*', PDO::PARAM_STR);
            $copy_button_stmt->execute();
            $copyMsg .= " Button data successfully copied.";
            $newButtonId = $conn->lastInsertId(); // เก็บ ID ของแถวที่แทรก
        } catch (PDOException $e) {
            $errorMsg = "Failed to copy button data: " . $e->getMessage();
        }
        //copy text
        try {
            $copy_text_stmt = $conn->prepare("
                INSERT INTO `text` (`Text`, `Details`, `connect`, `show`)
                SELECT 
                    REPLACE(Text, :sourceDir2, :destPrefix),
                    `Details`,
                    `connect`,
                    `show`
                FROM `text`
                WHERE `Text` REGEXP :sourceDir
            ");
            $copy_text_stmt->bindValue(':sourceDir2', $sourceDir, PDO::PARAM_STR);
            $copy_text_stmt->bindValue(':destPrefix', $destPrefix, PDO::PARAM_STR);
            $copy_text_stmt->bindValue(':sourceDir', '^' . $sourceDir . '_[^0-9].*', PDO::PARAM_STR);
            $copy_text_stmt->execute();
            $copyMsg .= " Text data successfully copied.";
            $newTextId = $conn->lastInsertId(); // เก็บ ID ของแถวที่แทรก
        } catch (PDOException $e) {
            $errorMsg = "Failed to copy text data: " . $e->getMessage();
        }
        // Insert template_setting
        try {
            $select_id_template = $conn->prepare("
                SELECT id FROM template WHERE id = :newTemplateId
                UNION ALL
                SELECT id FROM `colors` WHERE `section` REGEXP :destPrefix
                UNION ALL
                SELECT id FROM `button` WHERE `button` REGEXP :destPrefix
                UNION ALL
                SELECT id FROM `text` WHERE `Text` REGEXP :destPrefix
            ");
            $select_id_template->bindValue(':newTemplateId', $newTemplateId, PDO::PARAM_INT);
            $select_id_template->bindValue(':destPrefix', '^' . $destPrefix . '_[^0-9].*', PDO::PARAM_STR);
            $select_id_template->execute();
            $result = $select_id_template->fetchAll(PDO::FETCH_ASSOC);
            $data = array();
            foreach ($result as $placeholder => $value) {
                array_push($data, $value['id']);
            }

            $template_setting_stmt = $conn->prepare("INSERT INTO `template_setting` 
                (`id`, `background_colors`, `tab_header`, `register_button`, `login_button`, `tab_menu`, `page1_content`, `page1_content2`, `page2_content`, `page2_content2`, `page3_content`, `page3_content2`, `page4_content`, `page4_content2`, `page5_content`, `page5_content2`, `page6_content`, `page6_content2`, `page7_content`, `page7_content2`, `page8_content`, `page8_content2`, `page9_content`, `page9_content2`, `page10_content`, `page10_content2`, `page11_content`, `page11_content2`, `page12_content`, `page12_content2`, `footer_background`, `tab_menu2`, `register_button_homepage`, `login_button_homepage`, `contact_button_homepage`, `about_button_homepage`, `searchbox`, `page1_text_sideshow`, `page1_text_sideshow1`, `page1_text_sideshow2`, `page1_section1`, `page1_section2`, `footer`, `footer2`, `footer3`, `page2_text_head1`, `page2_text_content1`, `page2_text_head2`, `page2_text_content2`, `page3_heading`, `page7_headcontact`, `page7_contact`, `page7_headcontact2`, `page7_contact2`, `page7_headcontact3`, `page7_contact3`, `page1_section3`, `page1_section4`, `page2_section`, `page5_header`, `page3_Textcontent`, `page3_Textcontent2`, `Page4_TextHead1`, `Page4_Textcontent1`, `Page4_TextHead2`, `Page4_Textcontent2`) VALUES (" . implode(',', array_fill(0, count($data), '?')) . ")
            ");
            // Bind the values
            foreach ($data as $index => $id) {
                $template_setting_stmt->bindValue($index + 1, $id, PDO::PARAM_INT);
            }
            // Execute the statement
            $template_setting_stmt->execute();
        } catch (PDOException $e) {
            $errorMsg = "Failed to insert template_setting: " . $e->getMessage();
        }

        copyFolderNew($sourceDir, $destPrefix);

        // ค้นหาไฟล์ PHP ทั้งหมดในโฟลเดอร์ที่ถูกคัดลอกไป
        $files = glob($destPrefix . '/*.php');

        foreach ($files as $file) {
            // อ่านเนื้อหาของไฟล์
            $content = file_get_contents($file);

            // กำหนดข้อความที่ต้องการค้นหาเป็นรูปแบบ Regular Expression
            $pattern = "/template_setting_id = \d+/";  // ค้นหา template_setting_id = และเลขใด ๆ

            // กำหนดข้อความที่ต้องการแทนที่
            $replace = "template_setting_id = $newTemplateId";

            // แทนที่ข้อความโดยใช้ preg_replace
            $newContent = preg_replace($pattern, $replace, $content);

            // เขียนเนื้อหาใหม่กลับไปที่ไฟล์ (เขียนทับไฟล์เดิม)
            file_put_contents($file, $newContent);
        }
    }
}



function copyFolderNew($source, $dest)
{
    if (is_dir($source)) {
        @mkdir($dest);
        $dir = opendir($source);
        while (($file = readdir($dir)) !== false) {
            if ($file != '.' && $file != '..') {
                if (is_dir($source . '/' . $file)) {
                    copyFolderNew($source . '/' . $file, $dest . '/' . $file);
                } else {
                    copy($source . '/' . $file, $dest . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
}

function getNextAvailableDirectoryNew($sourceDir)
{
    $baseDir = $sourceDir;
    $index = 1;
    $destDir = $baseDir . '_copy';

    while (is_dir($destDir)) {
        $destDir = $baseDir . '_copy' . $index;
        $index++;
    }

    return $destDir;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Raleway", sans-serif
        }

        .btn-spacing {
            margin-right: 10px;
            /* เพิ่มระยะห่างด้านขวาของปุ่ม */
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>CMS</h2>
            <ul>
                <li><a href="DEV_dashboard.php"><i class="fas fa-home"></i>หน้าหลัก</a></li>
                <li><a href="DEV_Post.php"><i class="fas fa-clipboard"></i>Post</a></li>
                <li><a href="DEV_template.php"><i class="fas fa-object-group"></i>Template</a></li>
                <li><a href="DEV_user.php"><i class="fas fa-address-book"></i>User</a></li>
                <li><a href="DB_logout.php"><i class="fas fa-map-pin"></i>Log Out</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div class="header">Template</div>
            <div class="info">
                <?php
                if (isset($errorMsg)) {
                ?>
                    <div class="alert alert-danger">
                        <strong>Wrong! <?php echo $errorMsg; ?></strong>
                    </div>
                <?php } ?>


                <?php
                if (isset($updateMsg)) {
                ?>
                    <div class="alert alert-success">
                        <strong>Success! <?php echo $updateMsg; ?></strong>
                    </div>
                <?php } ?>
                <?php
                if (isset($errorMsg)) {
                ?>
                    <div class="alert alert-danger">
                        <strong>Wrong! <?php echo $errorMsg; ?></strong>
                    </div>
                <?php } ?>

                <?php
                if (isset($updateMsg)) {
                ?>
                    <div class="alert alert-success">
                        <strong>Success! <?php echo $updateMsg; ?></strong>
                    </div>
                <?php } ?>

                <?php
                if (isset($copyMsg)) {
                ?>
                    <div class="alert alert-success">
                        <strong>Success! <?php echo $copyMsg; ?></strong>
                    </div>
                <?php } ?>
                <!-- Overlay effect when opening sidebar on small screens -->
                <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

                <!-- !PAGE CONTENT! -->
                <div class="w3-main" style="margin-left:20px"> <!-- Adjusted margin-left value -->

                    <!-- Header -->
                    <header id="portfolio">
                        <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
                        <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
                        <div class="w3-container">
                            <h1><b>Template</b></h1>
                            <div class="w3-section w3-bottombar w3-padding-16">
                                <span class="w3-margin-right">Filter:</span>
                                <button class="w3-button w3-black">ALL</button>
                            </div>
                        </div>
                    </header>
                    <form method="post" class="form-horizontal mt-5">
                        <div class="w3-third w3-container w3-margin-bottom">
                            <img src="upload\tempic\tem2.png" alt="Norway" style="width:100%; border-radius: 5%;">
                            <div class="w3-container w3-white">
                                <p><b>Template News First</b></p>
                                <p>Template HTML/CSS</p>
                                <input type="hidden" name="update_id" value="1"> <!-- กำหนดค่า update_id เป็น 1 -->
                                <input type="submit" name="btn_update" class="btn btn-success" value="Use"> <!-- ปุ่ม Use -->
                                <input type="submit" name="btn_copy" class="btn btn-secondary btn-spacing" value="Copy">
                            </div>
                        </div>
                    </form>
                    <form method="post" class="form-horizontal mt-5">
                        <div class="w3-third w3-container w3-margin-bottom">
                            <img src="upload\tempic\tem1.png" alt="Norway" style="width:100%; border-radius: 5%;">
                            <div class="w3-container w3-white">
                                <p><b>Template News Two</b></p>
                                <p>Template HTML/CSS</p>
                                <input type="hidden" name="update_id" value="2"> <!-- กำหนดค่า update_id เป็น 2 -->
                                <input type="submit" name="btn_update" class="btn btn-success" value="Use"> <!-- ปุ่ม Use -->
                                <input type="submit" name="btn_copy" class="btn btn-secondary btn-spacing" value="Copy">
                            </div>
                        </div>
                    </form>
                    <form method="post" class="form-horizontal mt-5">
                        <div class="w3-third w3-container w3-margin-bottom">
                            <img src="upload\tempic\tem3.png" alt="Norway" style="width:100%; border-radius: 5%;">
                            <div class="w3-container w3-white">
                                <p><b>Template News Three</b></p>
                                <p>Template HTML/CSS</p>
                                <input type="hidden" name="update_id" value="3"> <!-- กำหนดค่า update_id เป็น 3 -->
                                <input type="submit" name="btn_update" class="btn btn-success" value="Use"> <!-- ปุ่ม Use -->
                                <input type="submit" name="btn_copy" class="btn btn-secondary btn-spacing" value="Copy">
                            </div>
                        </div>
                    </form>


                    <!-- First Photo Grid-->
                    <?php
                    try {
                        // ดึงข้อมูลที่มี Status เป็น 'Publish' และที่ฟิลด์ link ว่างเปล่าหรือเป็น NULL
                        // แสดงข้อมูลทั้งหมด ยกเว้น ID ที่ 1, 2, 3
                        $sql = "SELECT * FROM `template` WHERE id NOT IN (1, 2, 3)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            // วนลูปผลลัพธ์และแสดงข้อมูลในรูปแบบ HTML
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<form method="post" class="form-horizontal mt-5">';
                                echo '<div class="w3-third w3-container w3-margin-bottom">';
                                echo '<img src="upload/tempic/' . $row["image"] . '" alt="Norway" style="width:100%; border-radius: 5%;">';
                                echo '<div class="w3-container w3-white">';
                                echo '<p><b>' . $row["Template"] . '</b></p>';
                                echo '<p>Template HTML/CSS</p>';
                                echo '<input type="hidden" name="update_id" value="' . $row["id"] . '">';
                                echo '<input type="submit" name="btn_update" class="btn btn-success btn-spacing" value="Use">';
                                echo '</div>';
                                echo '</div></form>';
                            }
                        } else {
                            echo "";
                        }
                    } catch (PDOException $e) {
                        echo "การเชื่อมต่อล้มเหลว: " . $e->getMessage();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        // เมื่อปุ่ม Use ถูกคลิก
        document.querySelectorAll('input[name="btn_update"]').forEach(item => {
            item.addEventListener('click', event => {
                // หาค่า update_id จากฟิลด์ซ่อน
                let updateId = item.parentElement.querySelector('input[name="update_id"]').value;
                // ส่งค่า update_id ไปยัง PHP script
                window.location.href = 'your_php_script.php?update_id=' + updateId;
            });
        });
    </script>
    </form>
</body>

</html>