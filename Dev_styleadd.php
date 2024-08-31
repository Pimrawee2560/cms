<?php 
    require_once('DB_config.php');

    if (isset($_REQUEST['btn_insert'])) {
        $section = $_REQUEST['section'];
        $colors = $_REQUEST['colors'];
        $tcolors = $_REQUEST['tcolors'];
        $border = $_REQUEST['border'];
        $radius = $_REQUEST['radius'];
        $bcolors = $_REQUEST['bcolors'];

        if (empty($section)) {
            $errorMsg = "Please enter section";
        } else if (empty($colors)) {
            $errorMsg = "please Enter colors";
            } else if (empty($tcolors)) {
            $errorMsg = "please Enter colors";
            } else if (empty($border)) {
                $errorMsg = "please Enter border";
                } else if (empty($radius)) {
                    $errorMsg = "please Enter border radius";
                    } else if (empty($bcolors)) {
                        $errorMsg = "please Enter border colors";
            } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $conn->prepare("INSERT INTO `colors`(`section`, `colors`, `tcolors`, `border`, `radius`, `bcolors`) VALUES (:section, :colors, :tcolors, :border, :radius, :bcolors)");
                    $insert_stmt->bindParam(':section', $section);
                    $insert_stmt->bindParam(':colors', $colors);
                    $insert_stmt->bindParam(':tcolors', $tcolors);
                    $insert_stmt->bindParam(':border', $border);
                    $insert_stmt->bindParam(':radius', $radius);
                    $insert_stmt->bindParam(':bcolors', $bcolors);

                    if ($insert_stmt->execute()) {
                        $insertMsg = "Insert Successfully...";
                        header("refresh:2;DEV_style.php");
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
    <title>Colors</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <div class="display-3 text-center">Style</div>

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
            <label for="Section" class="col-sm-3 control-label">Section</label>
            <div class="col-sm-9">
                <input type="text" name="section" class="form-control" placeholder="Enter Section...">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
        <div class="row">
            <label for="colors" class="col-sm-3 control-label">Colors1</label>
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
            <label for="tcolors" class="col-sm-3 control-label">Colors1</label>
            <div class="col-sm-9">
                <select id="colors" name="tcolors" class="form-select">
                    <option value="primary">primary</option>
                    <option value="secondary">secondary</option>
                    <option value="danger">danger</option>
                    <option value="warning">warning</option>
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
        <label for="border" class="col-sm-3 control-label">Thickness Border</label>
        <div class="col-sm-9">
                <input type="text" name="border" class="form-control" placeholder="Enter number border ....10px">
            </div>
    </div>
</div>
<div class="form-group text-center">
    <div class="row">
        <label for="radius" class="col-sm-3 control-label">Border Radius</label>
        <div class="col-sm-9">
                <input type="text" name="radius" class="form-control" placeholder="Enter number Border Radius....10px">
            </div>
    </div>
</div>
<div class="form-group text-center">
    <div class="row">
        <label for="bcolors" class="col-sm-3 control-label">Border Colors</label>
        <input type="color" class="form-control form-control-color" name="bcolors" value="#563d7c" title="Choose your color">
    </div>
    <div class="form-group text-center">
        <div class="col-md-12 mt-3">
            <input type="submit" name="btn_insert" class="btn btn-dark" value="Insert">
            <a href="DEV_style.php" class="btn btn-danger">Cancel</a>
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