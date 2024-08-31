<?php 

    require_once('DB_config.php');

    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $conn->prepare('SELECT * FROM addnewpost WHERE id = :id');
            $select_stmt->bindParam(":id", $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }   

    if (isset($_REQUEST['btn_update'])) {
        try {

            $Title = $_REQUEST['Title'];
            $Status = $_REQUEST['Status'];
            $link = $_POST['link'];
            $content = $_REQUEST['content'];
            $day = $_REQUEST['day'];

            $image_file = $_FILES['image']['name'];
            $type = $_FILES['image']['type'];
            $size = $_FILES['image']['size'];
            $temp = $_FILES['image']['tmp_name'];

            $path = "upload/".$image_file;
            $directory = "upload/"; // set uplaod folder path for upadte time previos file remove and new file upload for next use

            if (!empty($_FILES['image']['name'])) {
                if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif"|| $type == "image/mp4") {
                    if (!file_exists($path)) { // check file not exist in your upload folder path
                        if ($size < 5000000) { // check file size 5MB
                            unlink($directory.$row['image']); // unlink functoin remove previos file
                            move_uploaded_file($temp, 'upload/'.$image_file); // move upload file temperory directory to your upload folder
                        } else {
                            $errorMsg = "Your file to large please upload 5MB size";
                        }
                    } else {
                        $errorMsg = "File already exists... Check upload folder";
                    }
                } else {
                    $errorMsg = "Upload JPG, JPEG, PNG & GIF formats...";
                }
            } else {
                $image_file = $row['image']; // if you not select new image than previos image same it is it.
            }

            if (!isset($errorMsg)) {
                $update_stmt = $conn->prepare("UPDATE addnewpost SET Title = :Title, Status = :Status, link = :link, content = :content, day = :day, image = :image WHERE id = :id");
                $update_stmt->bindParam(':Title', $Title);
                $update_stmt->bindParam(':Status', $Status);
                $update_stmt->bindParam(':link', $link);
                $update_stmt->bindParam(':content', $content);
                $update_stmt->bindParam(':day', $day);
                $update_stmt->bindParam(':image', $image_file);
                $update_stmt->bindParam(':id', $id);

                if ($update_stmt->execute()) {
                    $updateMsg = "File update successfully...";
                    header("refresh:2;Admin_dashboard.php");
                }
            }
            
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Post</title>
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
        <div class="header">Edit Post</div>
        <div class="info"></div>
    </div>
</div>

<div class="container">
    <div class="text-center mb-4">
        <h3>Edit Post</h3>
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
            if(isset($updateMsg)) {
        ?>
            <div class="alert alert-success">
                <strong><?php echo $updateMsg; ?></strong>
            </div>
        <?php } ?>
        <form action="" method="post" style="width:50vw; min-width:300px;" class="form-horizontal" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Title:</label>
                    <input type="text" class="form-control" name="Title"  value="<?php echo $Title; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status:</label>
                    <select class="form-select" name="Status" value="<?php echo $Status; ?>">
                        <option value="Publish" <?php if ($Status == 'Publish') echo 'selected'; ?>>Publish</option>
                        <option value="Not published" <?php if ($Status == 'Not published') echo 'selected'; ?>>Not published</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">Link:</label>
                    <input type="text" class="form-control" name="link"  value="<?php echo $link; ?>">
                    <div style="color: red; font-size: small;">Example link: https://www.youtube.com/embed/44NE7bVKAYc?si=syMKrC_8PehwzmzZ</div>
                </div>
                 <div class="form-group mb-3">
                        <label for="name">Upload Image:</label>
                        <input type="file" name="image" class="form-control" value="<?php echo $image; ?>">
                        <p>
                            <?php if(isset($image)) { ?>
                            <img src="upload/<?php echo $image; ?>" height="100" width="100" alt="">
                            <?php } ?>
                        </p>
                    </div>
                    </div>
                
                <div class="form-group mb-3">
                    <label>Content:</label>
                    <textarea name="content" id="default"><?php echo $content; ?></textarea>
                    <script src="tinymce\js\tinymce\tinymce.min.js"></script>
                    <script src="script.js"></script>
                </div>
                <div class="form-group mb-3">
                    <div class="col">
                        <label class="day">Date:</label>
                        <input type="date" class="form-control" name="day" id="dateInput" value="<?php echo $day; ?>">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="btn_update" value="Update" >Update</button>
                    <a href="Admin_dashboard.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>



  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>