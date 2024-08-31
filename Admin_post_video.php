<?php 

    require_once('DB_config.php');

    if (isset($_REQUEST['delete_id'])) {
        $id = $_REQUEST['delete_id'];

        $select_stmt = $conn->prepare('SELECT * FROM `postvideo` WHERE id = :id');
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        unlink("upload/".$row['image']); // unlin functoin permanently remove your file

        // delete an original record from db
        $delete_stmt = $conn->prepare('DELETE FROM `postvideo` WHERE id = :id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmt->execute();

        header("Location: Admin_post_video.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post</title>
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
            <li><a href="Admin_dashboard.php"><i class="fas fa-home"></i>หน้าหลัก</a></li>
            <li><a href="Admin_user.php"><i class="fas fa-address-book"></i>User</a></li>
            <li><a href="DB_logout.php"><i class="fas fa-map-pin"></i>Log Out</a></li>
        </ul> 
    </div>
    <div class="main_content">
    <div class="header">POST VIDEO</div>  
        <div class="info">
            <?php
            if (isset($_GET["msg"])) {
                $msg = $_GET["msg"];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                      ' . $msg . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
            ?>
            <a href="Admin_postaddnew_video.php"  class="btn btn-dark">ADD NEW POST VIDEO</a>
            <div class="info">
            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Title</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `postvideo`";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                      <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["Title"] ?></td>
                        <td style="color: <?php echo $row["Status"] === 'Publish' ? 'green' : 'red'; ?>"><?php echo $row["Status"]; ?></td>
                        <td>
                          <a href="Admin_postedit_video.php?update_id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3" style="color: black;"></i></a>
                          <a href="?delete_id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5" style="color: black;"></i></a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
