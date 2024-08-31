<?php
    session_start();
    require "DB_config.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SLIDESHOW</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <div class="header">SLIDESHOW</div>  
        <div class="info">
 <div class="container">
    <div class="text-center mb-4">
        <h3>Slide Show</h3>
        </div>
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
            <form action="DB_slideshow.php" method="POST" enctype="multipart/form-data">
            <h2><label for="upload">Upload images</label></h2>
            <input type="file" class="form-control" name="image">
            <label style="color: red;">อัพโหลดขนาดรูปภาพ 1000px X 400px</label>
            <br>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>
        <hr>
        <h3>รูปที่อัพโหลด</h3>
        <?php 
            $result = $conn->query("SELECT image FROM `slideshow`");
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
