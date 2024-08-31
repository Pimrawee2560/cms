<?php
require_once('DB_config.php');

if (isset($_REQUEST['update_id'])) {
    try {
        $id = $_REQUEST['update_id'];
        $select_stmt = $conn->prepare("SELECT * FROM `button` WHERE id = :id");
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

if (isset($_REQUEST['btn_update'])) {
    $button = $_REQUEST['button'];
    $name = $_REQUEST['name'];
    $connect = $_REQUEST['connect'];
    $show = $_REQUEST['show'];;

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
                $update_stmt = $conn->prepare("UPDATE `button` SET button = :button, name = :name, connect = :connect, `show` = :show WHERE id = :id");
                $update_stmt->bindParam(':button', $button);
                $update_stmt->bindParam(':name', $name);
                $update_stmt->bindParam(':connect', $connect);
                $update_stmt->bindParam(':show', $show);
                $update_stmt->bindParam(':id', $id);

                if ($update_stmt->execute()) {
                    $updateMsg = "Record update successfully...";
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
    <title>Menu Edit</title>
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
            <div class="header">BUTTON</div>
            <div class="info">
                <div class="container">
                    <div class="display-3 text-center">Button Edit Page</div>

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
                                <label for="button" class="col-sm-3 control-label">BUTTON ADDRESS</label>
                                <div class="col-sm-9">
                                    <input type="text" name="button" class="form-control" value="<?php echo $button; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="row">
                                <label for="name" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="row">
                                <label for="Connect" class="col-sm-3 control-label">Connect</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="connect">
                                        <option value="index.php" <?php if ($connect == 'index.php') echo 'selected'; ?>>index.php</option>
                                        <option value="Page2.php" <?php if ($connect == 'Page2.php') echo 'selected'; ?>>Page2.php</option>
                                        <option value="Page3.php" <?php if ($connect == 'Page3.php') echo 'selected'; ?>>Page3.php</option>
                                        <option value="Page4.php" <?php if ($connect == 'Page4.php') echo 'selected'; ?>>Page4.php</option>
                                        <option value="Page5.php" <?php if ($connect == 'Page5.php') echo 'selected'; ?>>Page5.php</option>
                                        <option value="Page6.php" <?php if ($connect == 'Page6.php') echo 'selected'; ?>>Page6.php</option>
                                        <option value="Page7.php" <?php if ($connect == 'Page7.php') echo 'selected'; ?>>Page7.php</option>
                                        <option value="Page8.php" <?php if ($connect == 'Page8.php') echo 'selected'; ?>>Page8.php</option>
                                        <option value="Page9.php" <?php if ($connect == 'Page9.php') echo 'selected'; ?>>Page9.php</option>
                                        <option value="Page10.php" <?php if ($connect == 'Page10.php') echo 'selected'; ?>>Page10.php</option>
                                        <option value="Page11.php" <?php if ($connect == 'Page11.php') echo 'selected'; ?>>Page11.php</option>
                                        <option value="Page12.php" <?php if ($connect == 'Page12.php') echo 'selected'; ?>>Page12.php</option>
                                        <option value="Login.php" <?php if ($connect == 'login.php') echo 'selected'; ?>>Login.php</option>
                                        <option value="Register.php" <?php if ($connect == 'register.php') echo 'selected'; ?>>Register.php</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="row">
                                <label for="show" class="col-sm-3 control-label">Show</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="show">
                                        <option value="on" <?php if ($show == 'on') echo 'selected'; ?>>on</option>
                                        <option value="off" <?php if ($show == 'off') echo 'selected'; ?>>off</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-md-12 mt-3">
                                <input type="submit" name="btn_update" class="btn btn-success" value="Update">
                                <a href="DEV_button.php" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>

</body>

</html>