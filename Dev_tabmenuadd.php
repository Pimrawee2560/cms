<?php 
    require_once('DB_config.php');

    if (isset($_REQUEST['btn_insert'])) {
        $heading = $_REQUEST['heading'];
        $subtopic1 = $_REQUEST['subtopic1'];
        $connect1 = $_REQUEST['connect1'];
        $subtopic2 = $_REQUEST['subtopic2'];
        $connect2 = $_REQUEST['connect2'];
        $subtopic3 = $_REQUEST['subtopic3'];
        $connect3 = $_REQUEST['connect3'];
        $subtopic4 = $_REQUEST['subtopic4'];
        $connect4 = $_REQUEST['connect4'];
        $subtopic5 = $_REQUEST['subtopic5'];
        $connect5 = $_REQUEST['connect5'];
        $show = $_REQUEST['show'];

        if (empty($heading)) {
            $errorMsg = "Please enter heading";
            } else if (empty($subtopic1)) {
            $errorMsg = "please Enter subtopic1";
            } else if (empty($connect1)) {
            $errorMsg = "please Enter connect1";
            } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $conn->prepare("INSERT INTO tabmenu(`heading`, `subtopic1`, `connect1`, `subtopic2`, `connect2`, `subtopic3`, `connect3`, `subtopic4`, `connect4`, `subtopic5`, `connect5`, `show`) VALUES (:heading, :subtopic1, :connect1, :subtopic2, :connect2, :subtopic3, :connect3, :subtopic4, :connect4, :subtopic5, :connect5, :show)");
                    $insert_stmt->bindParam(':heading', $heading);
                    $insert_stmt->bindParam(':subtopic1', $subtopic1);
                    $insert_stmt->bindParam(':connect1', $connect1);
                    $insert_stmt->bindParam(':subtopic2', $subtopic2);
                    $insert_stmt->bindParam(':connect2', $connect2);
                    $insert_stmt->bindParam(':subtopic3', $subtopic3);
                    $insert_stmt->bindParam(':connect3', $connect3);
                    $insert_stmt->bindParam(':subtopic4', $subtopic4);
                    $insert_stmt->bindParam(':connect4', $connect4);
                    $insert_stmt->bindParam(':subtopic5', $subtopic5);
                    $insert_stmt->bindParam(':connect5', $connect5);
                    $insert_stmt->bindParam(':show', $show);

                    if ($insert_stmt->execute()) {
                        $insertMsg = "Insert Successfully...";
                        header("refresh:2;Dev_tabmenu.php");
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
        <div class="header">TAB MENU ADD</div>  
        <div class="info">
      
    <div class="container">
    <div class="display-3 text-center">TAB MENU ADD</div>

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
            <label for="heading" class="col-sm-3 control-label">Heading</label>
            <div class="col-sm-9">
                <input type="text" name="heading" class="form-control" placeholder="Enter name heading...">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
        <div class="row">
            <label for="subtopic1" class="col-sm-3 control-label">Subtopic 1</label>
            <div class="col-sm-9">
                <input type="text" name="subtopic1" class="form-control" placeholder="Enter name Subtopic 1...">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
    <div class="row">
        <label for="Connect1" class="col-sm-3 control-label">Connect 1</label>
        <div class="col-sm-9">
            <select class="form-control" name="connect1">
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
            <label for="subtopic2" class="col-sm-3 control-label">Subtopic 2</label>
            <div class="col-sm-9">
                <input type="text" name="subtopic2" class="form-control" placeholder="Enter name Subtopic 2...">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
    <div class="row">
        <label for="Connect2" class="col-sm-3 control-label">Connect 2</label>
        <div class="col-sm-9">
            <select class="form-control" name="connect2">
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
            <label for="subtopic3" class="col-sm-3 control-label">Subtopic 3</label>
            <div class="col-sm-9">
                <input type="text" name="subtopic3" class="form-control" placeholder="Enter name Subtopic 3...">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
    <div class="row">
        <label for="Connect3" class="col-sm-3 control-label">Connect 3</label>
        <div class="col-sm-9">
            <select class="form-control" name="connect3">
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
            <label for="subtopic4" class="col-sm-3 control-label">Subtopic 4</label>
            <div class="col-sm-9">
                <input type="text" name="subtopic4" class="form-control" placeholder="Enter name Subtopic 4...">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
    <div class="row">
        <label for="Connect4" class="col-sm-3 control-label">Connect 4</label>
        <div class="col-sm-9">
            <select class="form-control" name="connect4">
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
            <label for="subtopic5" class="col-sm-3 control-label">Subtopic 5</label>
            <div class="col-sm-9">
                <input type="text" name="subtopic5" class="form-control" placeholder="Enter name Subtopic 5...">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
    <div class="row">
        <label for="Connect5" class="col-sm-3 control-label">Connect 5</label>
        <div class="col-sm-9">
            <select class="form-control" name="connect5">
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
            <a href="Dev_tabmenu.php" class="btn btn-danger">Cancel</a>
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