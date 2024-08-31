<?php 

    session_start();
    require "DB_config.php";

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = $_FILES["image"]["tmp_name"];
        $imgContent = file_get_contents($image);

        $stmt = $conn->prepare("INSERT INTO `slideshow`(image) VALUES(?)");
        $stmt->execute([$imgContent]);

        if ($stmt) {
            $_SESSION["success"] = "Image uploaded successfully.";
            header("Location: DEV_slideshow.php");
        } else {
            $_SESSION["error"] = "Failed to upload image. please try again.";
            header("Location: DEV_slideshow.php");
        }
    } else {
        $_SESSION["error"] = "Please select an image file to upload.";
        header("Location: DEV_slideshow.php");
    }

?>