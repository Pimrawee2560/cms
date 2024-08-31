<?php
    session_start();
    require "DB_config.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LOGO</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <div class="header">LOGO</div>  
        <div class="info">
    <div class="container">
        <h1>อัพโหลดรูปโลโก้</h1>
        <?php if (isset($_SESSION["success"])) { ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION["success"];
                    unset($_SESSION["success"]);
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION["error"])) { ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION["error"];
                    unset($_SESSION["error"]);
                ?>
            </div>
        <?php } ?>
        <hr>
        <form action="DB_upload.php" method="POST" enctype="multipart/form-data">
            <label for="upload">Upload image</label>
            <input type="file" class="form-control" name="image">
            <label style="color: red;">อัพโหลดขนาดรูปภาพ 222px X 32px หรือ 140px X 60px</label>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>
        <hr>
        <h3>Uploaded images</h3>
        <?php 
            $result = $conn->query("SELECT * FROM logo");
            $result->execute();
            $imgData = $result->fetchAll(PDO::FETCH_ASSOC);

            if ($imgData) {
                echo "<div class='row'>";
                foreach($imgData as $img) {
                    echo "<div class='col-md-3'>";
                    echo '<img class="img-thumbnail" src="data:image/jpeg;base64,' . base64_encode($img['image']) . '" alt="Uploaded image" style="width: 100%;" />';
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "No image uploaded yet.";
            }
             
        ?>
    </div>
    


</body>
</html>
