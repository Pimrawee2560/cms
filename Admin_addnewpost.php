<?php 
    require_once('DB_config.php');

    if (isset($_POST['btn_insert'])) {
        try {
            $Title = $_POST['Title'];
            $Status = $_POST['Status'];
            $link = $_POST['link'];
            $content = $_POST['content'];
            $day = $_POST['day'];

            if (empty($Title)) {
                $errorMsg = "Please Enter Title";
            } elseif (empty($Status)) {    
                $errorMsg = "Please Select Status";
            } elseif (empty($content)) {    
                $errorMsg = "Please Enter Content";
                } elseif (empty($day)) {    
                $errorMsg = "Please Enter day";
            } else {
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $image_file = $_FILES['image']['name'];
                    $type = $_FILES['image']['type'];
                    $size = $_FILES['image']['size'];
                    $temp = $_FILES['image']['tmp_name'];

                    $path = "upload/" . $image_file;

                    if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
                        if (!file_exists($path)) {
                            if ($size < 5000000) {
                                move_uploaded_file($temp, 'upload/'.$image_file);
                            } else {
                                $errorMsg = "Your file is too large, please upload a file with size less than 5MB.";
                            }
                        } else {
                            $errorMsg = "File already exists. Please choose a different file.";
                        }
                    } else {
                        $errorMsg = "Please upload JPG, JPEG, PNG, or GIF file formats only.";
                    }
                } else {
                    $errorMsg = "Failed to upload image. Please try again.";
                }
            }

            if (!isset($errorMsg)) {
                $insert_stmt = $conn->prepare('INSERT INTO `addnewpost`(Title, Status, link, content, day, image) VALUES (:Title, :Status, :link, :content, :day, :image)');
                $insert_stmt->bindParam(':Title', $Title);
                $insert_stmt->bindParam(':Status', $Status);
                $insert_stmt->bindParam(':link', $link);
                $insert_stmt->bindParam(':content', $content);
                $insert_stmt->bindParam(':day', $day);
                $insert_stmt->bindParam(':image', $image_file);

                if ($insert_stmt->execute()) {
                    $insertMsg = "Post added successfully.";
                    header('refresh:2;Admin_dashboard.php');
                }
            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add New Post</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2>CMS</h2>
        <ul>
            <li><a href="Admin_dashboard.php"><i class="fas fa-home"></i>หน้าหลัก</a></li>
            <li><a href="Admin_user.php"><i class="fas fa-address-book"></i>User</a></li>
            <li><a href="DB_logout.php"><i class="fas fa-map-pin"></i>Log Out</a></li>
        </ul> 
    </div>
        <div class="main_content">
            <div class="header">Add New Post</div>  
            <div class="info">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New Post</h3>
            <p class="text-muted">กรอกข้อมูลเพื่อทำเพิ่มเนื้อหาในเว็บไซต์</p>
        </div>
        <div class="container d-flex justify-content-center">
            <?php 
            if(isset($errorMsg)) {
        ?>
            <div class="alert alert-danger">
                <strong><?php echo $errorMsg; ?></strong>
            </div>
        <?php } ?>

        <?php 
            if(isset($insertMsg)) {
        ?>
            <div class="alert alert-success">
                <strong><?php echo $insertMsg; ?></strong>
            </div>
        <?php } ?>
             <form action="" method="post" style="width:50vw; min-width:300px;"  class="form-horizontal" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Title:</label>
                        <input type="text" class="form-control" name="Title" placeholder="หัวข้อเรื่อง">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status:</label>
                        <select class="form-select" name="Status" >
                            <option value="Publish">Publish</option>
                            <option value="Not published">Not published</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Link:</label>
                        <input type="text" class="form-control" name="link" placeholder="ใส่ลิ้ง">
                        <div style="color: red; font-size: small;">Example link: https://www.youtube.com/embed/44NE7bVKAYc?si=syMKrC_8PehwzmzZ</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Upload Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Content:</label>
                        <textarea name="content" id="default" ></textarea>
                        <script src="tinymce\js\tinymce\tinymce.min.js"></script>
                        <script src="script.js"></script>
                    </div>
                    <div class="col">
                        <label class="day">Date:</label>
                        <input type="date" class="form-control" name="day" id="dateInput">
                    </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" name="btn_insert"  value="Insert">Save</button>
                        <a href="Admin_dashboard.php" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
