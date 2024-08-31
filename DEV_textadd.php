<?php 
    require_once('DB_config.php');

    if (isset($_REQUEST['btn_insert'])) {
        $Text	 = $_REQUEST['Text'];
        $Details = $_REQUEST['Details'];
        $connect = $_REQUEST['connect'];
        $show = $_REQUEST['show'];

        if (empty($Text)) {
            $errorMsg = "Please enter Text";
            } else if (empty($Details)) {
            $errorMsg = "please Enter Details";
        } else if (empty($connect)) {
            $errorMsg = "please Enter connect";
            } else if (empty($show)) {
                $errorMsg = "please Enter show";
            } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $conn->prepare("INSERT INTO text(`Text`, `Details`, `connect`, `show`) VALUES (:Text, :Details, :connect, :show)");
                    $insert_stmt->bindParam(':Text', $Text);
                    $insert_stmt->bindParam(':Details', $Details);
                    $insert_stmt->bindParam(':connect', $connect);
                    $insert_stmt->bindParam(':show', $show);

                    if ($insert_stmt->execute()) {
                        $insertMsg = "Insert Successfully...";
                        header("refresh:2;DEV_text.php");
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
    <title>text</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    
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
    <div class="header">TEXT</div>  
        <div class="info">

     <div class="container">
    <div class="display-3 text-center">TEXT ADD</div>

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
            <label for="Text" class="col-sm-3 control-label">Text:</label>
            <div class="col-sm-9">
                <input type="text" name="Text" class="form-control" placeholder="Enter Text...">
            </div>
        </div>
    </div>
    <div class="form-group text-center">
    <div class="row">
        <label for="Text" class="col-sm-3 control-label">Details:</label>
        <div class="col-sm-9">
            <textarea name="Details" id="details" ></textarea>
        </div>
    </div>
</div>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea#details',
        plugins:[
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 
            'table', 'emoticons', 'template', 'codesample'
        ],
        toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' + 
            'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
            'forecolor backcolor emoticons',
        menu: {
            favs: {title: 'menu', items: 'code visualaid | searchreplace | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table',
        content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
    });
</script>
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
            <a href="DEV_text.php" class="btn btn-danger">Cancel</a>
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