<?php 
    require_once('DB_config.php');

    if (isset($_REQUEST['btn_insert'])) {
        $button = $_REQUEST['button'];
        $name = $_REQUEST['name'];
        $connect = $_REQUEST['connect'];
        $show = $_REQUEST['show'];

        if (empty($button)) {
            $errorMsg = "Please enter button";
        } else if (empty($name)) {
            $errorMsg = "please Enter name";
            } else if (empty($connect)) {
                $errorMsg = "please Enter connect";
                } else if (empty($show)) {
                $errorMsg = "please Enter show";
            } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $conn->prepare("INSERT INTO `button`(`button`, `name`, `connect`, `show`) VALUES (:button, :name, :connect, :show)");
                    $insert_stmt->bindParam(':button', $button);
                    $insert_stmt->bindParam(':name', $name);
                    $insert_stmt->bindParam(':connect', $connect);
                    $insert_stmt->bindParam(':show', $show);

                    if ($insert_stmt->execute()) {
                        $insertMsg = "Insert Successfully...";
                        header("refresh:2;DEV_button.php");
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Button add</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
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
        <div class="header">BUTTON</div>  
        <div class="info">
      
    <div class="container">
    <div class="display-3 text-center">Add Button</div>

    <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>Wrong! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    

    <?php 
         if (isset($insertMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>Success! <?php echo $insertMsg; ?></strong>
        </div>
    <?php } ?>

    <form method="post" class="form-horizontal mt-5">
    <div class="form-group text-center">
        <div class="row">
             <label for="button" class="col-sm-3 control-label">BUTTON ADDRESS</label>
            <div class="col-sm-9">
                <input type="text" name="button" class="form-control" placeholder="Enter button...">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
        <div class="row">
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" placeholder="Enter Name...">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
    <div class="row">
        <label for="Connect" class="col-sm-3 control-label">Connect</label>
        <div class="col-sm-9">
            <select class="form-control" name="connect">
                <option value="index.php">index.php</option>
                <option value="Page2.php">Page2.php</option>
                <option value="Page3.php">Page3.php</option>
                <option value="Page4.php">Page4.php</option>
                <option value="Page5.php">Page5.php</option>
                <option value="Page6.php">Page6.php</option>
                <option value="Page7.php">Page7.php</option>
                <option value="Page8.php">Page8.php</option>
                <option value="Page9.php">Page9.php</option>
                <option value="Page10.php">Page10.php</option>
                <option value="Page11.php">Page11.php</option>
                <option value="Page11.php">Page12.php</option>
                <option value="Login.php">login.php</option>
                <option value="Register.php">register.php</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group text-center">
    <div class="row">
        <label for="show" class="col-sm-3 control-label">Show</label>
        <div class="col-sm-9">
            <select class="form-control" name="show">
                <option value="on">on</option>
                <option value="off">off</option>
            </select>
        </div>
    </div>
</div>
    <div class="form-group text-center">
        <div class="col-md-12 mt-3">
            <input type="submit" name="btn_insert" class="btn btn-dark" value="Insert">
            <a href="DEV_button.php" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</form>

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
      </div>
    </div>
</div>

</body>
</html>