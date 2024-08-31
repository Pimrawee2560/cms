<?php 
    require_once('DB_config.php');

    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $conn->prepare("SELECT * FROM `colors` WHERE id = :id");
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
        $section = $_REQUEST['section'];
        $colors = $_REQUEST['colors'];
        $tcolors = $_REQUEST['tcolors'];
        $border = $_REQUEST['border'];
        $radius = $_REQUEST['radius'];
        $bcolors = $_REQUEST['bcolors'];

        if (empty($section)) {
            $errorMsg = "Please Enter Section";
        } else if (empty($colors)) {
            $errorMsg = "Please Enter colors";
            } else if (empty($tcolors)) {
            $errorMsg = "Please Enter colors";
                } else if (empty($bcolors)) {
                $errorMsg = "please Enter border colors";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $update_stmt = $conn->prepare("UPDATE `colors` SET section = :section, colors = :colors, tcolors = :tcolors, `border` = :border, `radius` = :radius, `bcolors` = :bcolors WHERE id = :id");
                    $update_stmt->bindParam(':section', $section);
                    $update_stmt->bindParam(':colors', $colors);
                    $update_stmt->bindParam(':tcolors', $tcolors);
                    $update_stmt->bindParam(':border', $border);
                    $update_stmt->bindParam(':radius', $radius);
                    $update_stmt->bindParam(':bcolors', $bcolors);
                    $update_stmt->bindParam(':id', $id);

                    if ($update_stmt->execute()) {
                        $updateMsg = "Record update successfully...";
                        header("refresh:2;DEV_style.php");
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
    <title>Colors</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div class="header">STYLE</div>
    <div class="info">
     <div class="container">
    <div class="display-3 text-center">Edit STYLE</div>
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
            <label for="Section" class="col-sm-3 control-label">Section</label>
            <div class="col-sm-9">
                <input type="text" name="section" class="form-control" value="<?php echo $section; ?>" readonly >
            </div>
        </div>
    </div>
<div class="form-group text-center">
    <div class="row">
        <label for="colors" class="col-sm-3 control-label">Colors</label>
        <div class="col-sm-9">
            <select id="colors" name="colors" class="form-select">
                <option value="primary" <?php if ($colors == 'primary') echo 'selected'; ?>>Primary</option>
                <option value="secondary" <?php if ($colors == 'secondary') echo 'selected'; ?>>Secondary</option>
                <option value="danger" <?php if ($colors == 'danger') echo 'selected'; ?>>Danger</option>
                <option value="warning" <?php if ($colors == 'warning') echo 'selected'; ?>>Warning</option>
                <option value="success" <?php if ($colors == 'success') echo 'selected'; ?>>Success</option>
                <option value="info" <?php if ($colors == 'info') echo 'selected'; ?>>Info</option>
                <option value="light" <?php if ($colors == 'light') echo 'selected'; ?>>Light</option>
                <option value="dark" <?php if ($colors == 'dark') echo 'selected'; ?>>Dark</option>
                <option value="white" <?php if ($colors == 'white') echo 'selected'; ?>>White</option>
            </select>
        </div>
    </div>
</div>

<div class="form-group text-center">
    <div class="row">
        <label for="tcolors" class="col-sm-3 control-label">Colors</label>
        <div class="col-sm-9">
            <select id="tcolors" name="tcolors" class="form-select">
                <option value="primary" <?php if ($tcolors == 'primary') echo 'selected'; ?>>Primary</option>
                <option value="secondary" <?php if ($tcolors == 'secondary') echo 'selected'; ?>>Secondary</option>
                <option value="danger" <?php if ($tcolors == 'danger') echo 'selected'; ?>>Danger</option>
                <option value="warning" <?php if ($tcolors == 'warning') echo 'selected'; ?>>Warning</option>
                <option value="success" <?php if ($tcolors == 'success') echo 'selected'; ?>>Success</option>
                <option value="info" <?php if ($tcolors == 'info') echo 'selected'; ?>>Info</option>
                <option value="light" <?php if ($tcolors == 'light') echo 'selected'; ?>>Light</option>
                <option value="dark" <?php if ($tcolors == 'dark') echo 'selected'; ?>>Dark</option>
                <option value="white" <?php if ($tcolors == 'white') echo 'selected'; ?>>White</option>
            </select>
        </div>
    </div>
</div>

<div class="form-group text-center">
    <div class="row">
        <label for="border" class="col-sm-3 control-label">Thickness Border</label>
        <div class="col-sm-9">
                <input type="text" name="border" class="form-control"  value="<?php echo $border; ?>">
            </div>
    </div>
</div>
<div class="form-group text-center">
    <div class="row">
        <label for="radius" class="col-sm-3 control-label">Border Radius</label>
        <div class="col-sm-9">
                <input type="text" name="radius" class="form-control" value="<?php echo $radius; ?>">
            </div>
    </div>
</div>
<div class="form-group text-center">
    <div class="row">
        <label for="bcolors" class="col-sm-3 control-label">Border Colors</label>
        <input type="color" class="form-control form-control-color" name="bcolors" value="<?php echo $bcolors; ?>" title="Choose your color">
    </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="Update">
                    <a href="DEV_style.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>


    </form>

      </div>
    </div>
</div>

</body>
</html>