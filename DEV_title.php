<?php 
    require_once('DB_config.php');

    if (isset($_REQUEST['delete_id'])) {
        $id = $_REQUEST['delete_id'];

        $select_stmt = $conn->prepare("SELECT * FROM `title` WHERE id = :id");
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        // Delete an original record from db
        $delete_stmt = $conn->prepare('DELETE FROM `title` WHERE id = :id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmt->execute();

        header('Location:DEV_title.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div class="header">TITLE</div>  
        <div class="info">
                <div class="display-3 text-center">TITLE</div>
                <div class="container">
                    <div class="display-3 text-center"></div>
                    <a href="DEV_titleadd.php" class="btn btn-dark mb-3">Add+</a>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Page</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Show</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody>
            <?php 
                $select_stmt = $conn->prepare("SELECT * FROM `title`");
                $select_stmt->execute();

                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>

                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["page"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["image"]; ?></td>
                                <td style="color: <?php echo $row["show"] === 'on' ? 'green' : 'red'; ?>"><?php echo $row["show"]; ?></td>
                                <td><a href="DEV_titleedit.php?update_id=<?php echo $row["id"]; ?>"
                                        class="btn btn-dark">Edit</a></td>
                            
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</body>

</html>