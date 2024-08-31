<?php 
    require_once('DB_config.php');

    if (isset($_REQUEST['btn_insert'])) {
        $icon = $_REQUEST['icon'];
        $type = $_REQUEST['type'];
        $colors = $_REQUEST['colors'];
        $link = $_REQUEST['link'];
        $connect = $_REQUEST['connect'];
        $show = $_REQUEST['show'];

        if (empty($icon)) {
            $errorMsg = "Please enter icon";
            } else if (empty($type)) {
            $errorMsg = "please Enter type";
            } else if (empty($colors)) {
            $errorMsg = "please Enter colors";
            } else if (empty($show)) {
                $errorMsg = "please Enter show";
            } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $conn->prepare("INSERT INTO icon(`icon`, `type`, `colors`, `link`, `connect`, `show`) VALUES (:icon, :type, :colors, :link, :connect, :show)");
                    $insert_stmt->bindParam(':icon', $icon);
                    $insert_stmt->bindParam(':type', $type);
                    $insert_stmt->bindParam(':colors', $colors);
                    $insert_stmt->bindParam(':link', $link);
                    $insert_stmt->bindParam(':connect', $connect);
                    $insert_stmt->bindParam(':show', $show);

                    if ($insert_stmt->execute()) {
                        $insertMsg = "Insert Successfully...";
                        header("refresh:2;DEV_icon.php");
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
	<title>icon add</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <div class="header">ICON ADD</div>  
        <div class="info">
      
    <div class="container">
    <div class="display-3 text-center">ICON ADD</div>

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
            <label for="icon" class="col-sm-3 control-label">Icon</label>
            <div class="col-sm-9">
                <input type="text" name="icon" class="form-control" placeholder="Enter name icon...">
            </div>
        </div>
    </div>
        <div class="form-group text-center">
        <div class="row">
             <label for="type" class="col-sm-3 control-label">Type</label>
            <div class="col-sm-9">
                <select id="colors" name="type" class="form-select">
                    <option value="fab fa-twitter">Twitter</option>
                    <option value="fab fa-facebook-f">Facebook</option>
                    <option value="fab fa-pinterest-p">Pinterest</option>
                    <option value="fa-brands fa-spotify">Spotify</option>
                    <option value="fab fa-youtube">Youtube</option>
                    <option value="fab fa-instagram">Instagram</option>
                    <option value="fa-brands fa-spotify">light</option>
                    <option value="fa fa-home">Home</option>
                </select>
            </div>
        </div>
    </div>
            <div class="form-group text-center">
        <div class="row">
             <label for="colors" class="col-sm-3 control-label">Colors</label>
            <div class="col-sm-9">
                <select id="colors" name="colors" class="form-select">
                    <option value="primary">primary</option>
                    <option value="secondary">secondary</option>
                    <option value="danger">danger</option>
                    <option value="bg-warning">warning</option>
                    <option value="success">success</option>
                    <option value="info">info</option>
                    <option value="light">light</option>
                    <option value="dark">dark</option>
                    <option value="white">white</option>
                </select>
            </div>
        </div>
    </div>
      <div class="form-group text-center">
        <div class="row">
            <label for="link" class="col-sm-3 control-label">Link</label>
            <div class="col-sm-9">
                <input type="text" name="link" class="form-control" placeholder="Enter link...">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
    <div class="row">
        <label for="Connect" class="col-sm-3 control-label">Connect</label>
        <div class="col-sm-9">
            <select class="form-control" name="connect">
                <option value="">-- Select an option --</option>
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
                <option value="Login.php">Login.php</option>
                <option value="Register.php">Register.php</option>
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
            <a href="DEV_icon.php" class="btn btn-danger">Cancel</a>
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