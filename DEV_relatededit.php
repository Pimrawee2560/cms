<?php 
    require_once('DB_config.php');

    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $conn->prepare("SELECT * FROM `related` WHERE id = :id");
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
        $name = $_REQUEST['name'];
        $format= $_REQUEST['format'];
        $show = $_REQUEST['show'];

        if (empty($name)) {
            $errorMsg = "Please Enter name";
            } else if (empty($show)) {
                $errorMsg = "please Enter show";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $update_stmt = $conn->prepare("UPDATE `related` SET name = :name, `show` = :show, `format` = :format WHERE id = :id");
                    $update_stmt->bindParam(':name', $name);
                    $update_stmt->bindParam(':format', $format);
                    $update_stmt->bindParam(':show', $show);
                    $update_stmt->bindParam(':id', $id);

                    if ($update_stmt->execute()) {
                        $updateMsg = "Record update successfully...";
                        header("refresh:2;DEV_related.php");
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
    <title>User</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
    .green {
        color: green;
    }

    .red {
        color: red;
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
    <div class="header">POST SHOW</div>  
        <div class="info">
            <div class="container">
    <div class="display-3 text-center">Edit POST SHOW</div>

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
            <label for="name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" readonly>
            </div>
        </div>
    </div>
    <div class="form-group text-center">
        <div class="row">
             <label for="format" class="col-sm-3 control-label">Display format</label>
            <div class="col-sm-9">
                <select id="colors" name="format" class="form-select">
                <option value="">-- Select an option --</option>
                <option value="2" <?php echo ($format == '2') ? 'selected' : ''; ?>>2</option>
                <option value="4" <?php echo ($format == '4') ? 'selected' : ''; ?>>4</option>
                <option value="6" <?php echo ($format == '6') ? 'selected' : ''; ?>>6</option>
                <option value="8" <?php echo ($format == '8') ? 'selected' : ''; ?>>8</option>
                <option value="10" <?php echo ($format == '10') ? 'selected' : ''; ?>>10</option>
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
                    <a href="DEV_dashboard.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
                </form>

      </div>
    </div>
</div>

</body>
</html>