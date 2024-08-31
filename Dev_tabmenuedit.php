<?php 
    require_once('DB_config.php');

    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $conn->prepare("SELECT * FROM tabmenu WHERE id = :id");
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
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
                    $update_stmt = $conn->prepare("UPDATE tabmenu SET heading = :heading, subtopic1 = :subtopic1, connect1 = :connect1, subtopic2 = :subtopic2, connect2 = :connect2, subtopic3 = :subtopic3, connect3 = :connect3, subtopic4 = :subtopic4, connect4 = :connect4, subtopic5 = :subtopic5, connect5 = :connect5, `show` = :show WHERE id = :id");
                    $update_stmt->bindParam(':heading', $heading);
                    $update_stmt->bindParam(':subtopic1', $subtopic1);
                    $update_stmt->bindParam(':connect1', $connect1);
                    $update_stmt->bindParam(':subtopic2', $subtopic2);
                    $update_stmt->bindParam(':connect2', $connect2);
                    $update_stmt->bindParam(':subtopic3', $subtopic3);
                    $update_stmt->bindParam(':connect3', $connect3);
                    $update_stmt->bindParam(':subtopic4', $subtopic4);
                    $update_stmt->bindParam(':connect4', $connect4);
                    $update_stmt->bindParam(':subtopic5', $subtopic5);
                    $update_stmt->bindParam(':connect5', $connect5);
                    $update_stmt->bindParam(':show', $show);
                    $update_stmt->bindParam(':id', $id);

                    if ($update_stmt->execute()) {
                        $updateMsg = "Record update successfully...";
                        header("refresh:2;Dev_tabmenu.php");
                    }
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Icon Edit</title>
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
         if (isset($updateMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>Success! <?php echo $updateMsg; ?></strong>
        </div>
    <?php } ?>

    <form method="post" class="form-horizontal mt-5">
    <div class="form-group text-center">
        <div class="row">
            <label for="heading" class="col-sm-3 control-label">Heading</label>
            <div class="col-sm-9">
                <input type="text" name="heading" class="form-control" value="<?php echo $heading; ?>">
            </div>
        </div>
    </div>
    <form method="post" class="form-horizontal mt-5">
    <div class="form-group text-center">
        <div class="row">
            <label for="subtopic1" class="col-sm-3 control-label">Subtopic 1</label>
            <div class="col-sm-9">
                <input type="text" name="subtopic1" class="form-control" value="<?php echo $subtopic1; ?>">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
    <div class="row">
        <label for="Connect1" class="col-sm-3 control-label">Connect 1</label>
        <div class="col-sm-9">
            <select class="form-control" name="connect1" >
                <option value="">-- Select an option --</option>
                <option value="index.php"  <?php if ($connect1 == 'index.php') echo 'selected'; ?>>index.php</option>
                <option value="Page2.php"  <?php if ($connect1 == 'Page2.php') echo 'selected'; ?>>Page2.php</option>
                <option value="Page3.php"  <?php if ($connect1 == 'Page3.php') echo 'selected'; ?>>Page3.php</option>
                <option value="Page4.php"  <?php if ($connect1 == 'Page4.php') echo 'selected'; ?>>Page4.php</option>
                <option value="Page5.php"  <?php if ($connect1 == 'Page5.php') echo 'selected'; ?>>Page5.php</option>
                <option value="Page6.php"  <?php if ($connect1 == 'Page6.php') echo 'selected'; ?>>Page6.php</option>
                <option value="Page7.php"  <?php if ($connect1 == 'Page7.php') echo 'selected'; ?>>Page7.php</option>
                <option value="Page8.php"  <?php if ($connect1 == 'Page8.php') echo 'selected'; ?>>Page8.php</option>
                <option value="Page9.php"  <?php if ($connect1 == 'Page9.php') echo 'selected'; ?>>Page9.php</option>
                <option value="Page10.php"  <?php if ($connect1 == 'Page10.php') echo 'selected'; ?>>Page10.php</option>
                <option value="Page11.php"  <?php if ($connect1 == 'Page11.php') echo 'selected'; ?>>Page11.php</option>
                <option value="Page12.php"  <?php if ($connect1 == 'Page12.php') echo 'selected'; ?>>Page12.php</option>
                <option value="Login.php"  <?php if ($connect1 == 'Login.php') echo 'selected'; ?>>Login.php</option>
                <option value="Register.php"  <?php if ($connect1 == 'Register.php') echo 'selected'; ?>>Register.php</option>
            </select>
        </div>
    </div>
</div>
    <form method="post" class="form-horizontal mt-5">
    <div class="form-group text-center">
        <div class="row">
            <label for="subtopic2" class="col-sm-3 control-label">Subtopic 2</label>
            <div class="col-sm-9">
                <input type="text" name="subtopic2" class="form-control" value="<?php echo $subtopic2; ?>">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
    <div class="row">
        <label for="Connect2" class="col-sm-3 control-label">Connect 2</label>
        <div class="col-sm-9">
            <select class="form-control" name="connect2" >
                <option value="">-- Select an option --</option>
                <option value="index.php"  <?php if ($connect2 == 'index.php') echo 'selected'; ?>>index.php</option>
                <option value="Page2.php"  <?php if ($connect2 == 'Page2.php') echo 'selected'; ?>>Page2.php</option>
                <option value="Page3.php"  <?php if ($connect2 == 'Page3.php') echo 'selected'; ?>>Page3.php</option>
                <option value="Page4.php"  <?php if ($connect2 == 'Page4.php') echo 'selected'; ?>>Page4.php</option>
                <option value="Page5.php"  <?php if ($connect2 == 'Page5.php') echo 'selected'; ?>>Page5.php</option>
                <option value="Page6.php"  <?php if ($connect2 == 'Page6.php') echo 'selected'; ?>>Page6.php</option>
                <option value="Page7.php"  <?php if ($connect2 == 'Page7.php') echo 'selected'; ?>>Page7.php</option>
                <option value="Page8.php"  <?php if ($connect2 == 'Page8.php') echo 'selected'; ?>>Page8.php</option>
                <option value="Page9.php"  <?php if ($connect2 == 'Page9.php') echo 'selected'; ?>>Page9.php</option>
                <option value="Page10.php"  <?php if ($connect2 == 'Page10.php') echo 'selected'; ?>>Page10.php</option>
                <option value="Page11.php"  <?php if ($connect2 == 'Page11.php') echo 'selected'; ?>>Page11.php</option>
                <option value="Page12.php"  <?php if ($connect2 == 'Page12.php') echo 'selected'; ?>>Page12.php</option>
                <option value="Login.php"  <?php if ($connect2 == 'Login.php') echo 'selected'; ?>>Login.php</option>
                <option value="Register.php"  <?php if ($connect2 == 'Register.php') echo 'selected'; ?>>Register.php</option>
            </select>
        </div>
    </div>
</div>
    <form method="post" class="form-horizontal mt-5">
    <div class="form-group text-center">
        <div class="row">
            <label for="subtopic3" class="col-sm-3 control-label">Subtopic 3</label>
            <div class="col-sm-9">
                <input type="text" name="subtopic3" class="form-control" value="<?php echo $subtopic3; ?>">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
    <div class="row">
        <label for="Connect3" class="col-sm-3 control-label">Connect 3</label>
        <div class="col-sm-9">
            <select class="form-control" name="connect3" >
                <option value="">-- Select an option --</option>
                <option value="index.php"  <?php if ($connect3 == 'index.php') echo 'selected'; ?>>index.php</option>
                <option value="Page2.php"  <?php if ($connect3 == 'Page2.php') echo 'selected'; ?>>Page2.php</option>
                <option value="Page3.php"  <?php if ($connect3 == 'Page3.php') echo 'selected'; ?>>Page3.php</option>
                <option value="Page4.php"  <?php if ($connect3 == 'Page4.php') echo 'selected'; ?>>Page4.php</option>
                <option value="Page5.php"  <?php if ($connect3 == 'Page5.php') echo 'selected'; ?>>Page5.php</option>
                <option value="Page6.php"  <?php if ($connect3 == 'Page6.php') echo 'selected'; ?>>Page6.php</option>
                <option value="Page7.php"  <?php if ($connect3 == 'Page7.php') echo 'selected'; ?>>Page7.php</option>
                <option value="Page8.php"  <?php if ($connect3 == 'Page8.php') echo 'selected'; ?>>Page8.php</option>
                <option value="Page9.php"  <?php if ($connect3 == 'Page9.php') echo 'selected'; ?>>Page9.php</option>
                <option value="Page10.php"  <?php if ($connect3 == 'Page10.php') echo 'selected'; ?>>Page10.php</option>
                <option value="Page11.php"  <?php if ($connect3 == 'Page11.php') echo 'selected'; ?>>Page11.php</option>
                <option value="Page12.php"  <?php if ($connect3 == 'Page12.php') echo 'selected'; ?>>Page12.php</option>
                <option value="Login.php"  <?php if ($connect3 == 'Login.php') echo 'selected'; ?>>Login.php</option>
                <option value="Register.php"  <?php if ($connect3 == 'Register.php') echo 'selected'; ?>>Register.php</option>
            </select>
        </div>
    </div>
</div>
    <form method="post" class="form-horizontal mt-5">
    <div class="form-group text-center">
        <div class="row">
            <label for="subtopic4" class="col-sm-3 control-label">Subtopic 4</label>
            <div class="col-sm-9">
                <input type="text" name="subtopic4" class="form-control" value="<?php echo $subtopic4; ?>">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
    <div class="row">
        <label for="Connect4" class="col-sm-3 control-label">Connect 4</label>
        <div class="col-sm-9">
            <select class="form-control" name="connect4" >
                <option value="">-- Select an option --</option>
                <option value="index.php"  <?php if ($connect4 == 'index.php') echo 'selected'; ?>>index.php</option>
                <option value="Page2.php"  <?php if ($connect4 == 'Page2.php') echo 'selected'; ?>>Page2.php</option>
                <option value="Page3.php"  <?php if ($connect4 == 'Page3.php') echo 'selected'; ?>>Page3.php</option>
                <option value="Page4.php"  <?php if ($connect4 == 'Page4.php') echo 'selected'; ?>>Page4.php</option>
                <option value="Page5.php"  <?php if ($connect4 == 'Page5.php') echo 'selected'; ?>>Page5.php</option>
                <option value="Page6.php"  <?php if ($connect4 == 'Page6.php') echo 'selected'; ?>>Page6.php</option>
                <option value="Page7.php"  <?php if ($connect4 == 'Page7.php') echo 'selected'; ?>>Page7.php</option>
                <option value="Page8.php"  <?php if ($connect4 == 'Page8.php') echo 'selected'; ?>>Page8.php</option>
                <option value="Page9.php"  <?php if ($connect4 == 'Page9.php') echo 'selected'; ?>>Page9.php</option>
                <option value="Page10.php"  <?php if ($connect4 == 'Page10.php') echo 'selected'; ?>>Page10.php</option>
                <option value="Page11.php"  <?php if ($connect4 == 'Page11.php') echo 'selected'; ?>>Page11.php</option>
                <option value="Page12.php"  <?php if ($connect4 == 'Page12.php') echo 'selected'; ?>>Page12.php</option>
                <option value="Login.php"  <?php if ($connect4 == 'Login.php') echo 'selected'; ?>>Login.php</option>
                <option value="Register.php"  <?php if ($connect4 == 'Register.php') echo 'selected'; ?>>Register.php</option>
            </select>
        </div>
    </div>
</div>
    <form method="post" class="form-horizontal mt-5">
    <div class="form-group text-center">
        <div class="row">
            <label for="subtopic5" class="col-sm-3 control-label">Subtopic 5</label>
            <div class="col-sm-9">
                <input type="text" name="subtopic5" class="form-control" value="<?php echo $subtopic5; ?>">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
    <div class="row">
        <label for="Connect5" class="col-sm-3 control-label">Connect 5</label>
        <div class="col-sm-9">
            <select class="form-control" name="connect5" >
                <option value="">-- Select an option --</option>
                <option value="index.php"  <?php if ($connect5 == 'index.php') echo 'selected'; ?>>index.php</option>
                <option value="Page2.php"  <?php if ($connect5 == 'Page2.php') echo 'selected'; ?>>Page2.php</option>
                <option value="Page3.php"  <?php if ($connect5 == 'Page3.php') echo 'selected'; ?>>Page3.php</option>
                <option value="Page4.php"  <?php if ($connect5 == 'Page4.php') echo 'selected'; ?>>Page4.php</option>
                <option value="Page5.php"  <?php if ($connect5 == 'Page5.php') echo 'selected'; ?>>Page5.php</option>
                <option value="Page6.php"  <?php if ($connect5 == 'Page6.php') echo 'selected'; ?>>Page6.php</option>
                <option value="Page7.php"  <?php if ($connect5 == 'Page7.php') echo 'selected'; ?>>Page7.php</option>
                <option value="Page8.php"  <?php if ($connect5 == 'Page8.php') echo 'selected'; ?>>Page8.php</option>
                <option value="Page9.php"  <?php if ($connect5 == 'Page9.php') echo 'selected'; ?>>Page9.php</option>
                <option value="Page10.php"  <?php if ($connect5 == 'Page10.php') echo 'selected'; ?>>Page10.php</option>
                <option value="Page11.php"  <?php if ($connect5 == 'Page11.php') echo 'selected'; ?>>Page11.php</option>
                <option value="Page12.php"  <?php if ($connect5 == 'Page12.php') echo 'selected'; ?>>Page12.php</option>
                <option value="Login.php"  <?php if ($connect5 == 'Login.php') echo 'selected'; ?>>Login.php</option>
                <option value="Register.php"  <?php if ($connect5 == 'Register.php') echo 'selected'; ?>>Register.php</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group text-center">
    <div class="row">
        <label for="show" class="col-sm-3 control-label">Show</label>
        <div class="col-sm-9">
            <select class="form-control" name="show" >
                 <option value="on" <?php if ($show == 'on') echo 'selected'; ?>>on</option>
                 <option value="off" <?php if ($show == 'off') echo 'selected'; ?>>off</option>
            </select>
        </div>
    </div>
</div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="Update">
                    <a href="Dev_tabmenu.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>


    </form>

      </div>
    </div>
</div>

</body>
</html>