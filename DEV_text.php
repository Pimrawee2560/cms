<?php
require_once('DB_config.php');

// Check if search query is set
$search_query = "";
if (isset($_POST['search'])) {
    $search_query = $_POST['search'];
}

// Prepare the search statement
$search_stmt = $conn->prepare("SELECT * FROM `text` WHERE Text LIKE :search_query");
$search_stmt->bindValue(':search_query', '%' . $search_query . '%');
$search_stmt->execute();

if (isset($_REQUEST['delete_id'])) {
    $id = $_REQUEST['delete_id'];

    $select_stmt = $conn->prepare("SELECT * FROM `text` WHERE id = :id");
    $select_stmt->bindParam(':id', $id);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

    // Delete an original record from db
    $delete_stmt = $conn->prepare('DELETE FROM `text` WHERE id = :id');
    $delete_stmt->bindParam(':id', $id);
    $delete_stmt->execute();

    header('Location:DEV_style.php');
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
                    <div class="display-3 text-center"></div>
                    <a href="DEV_textadd.php" class="btn btn-dark mb-3">Add+</a>
                    <!-- Search form -->
                    <form method="POST" action="" class="form-inline mb-3">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Search by Text" value="<?php echo $search_query; ?>">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Text</th>
                                <th>Details</th>
                                <th>Connect</th>
                                <th>Show</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = $search_stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["Text"]; ?></td>
                                    <td><?php echo $row["Details"]; ?></td>
                                    <td><?php echo $row["connect"]; ?></td>
                                    <td style="color: <?php echo $row["show"] === 'on' ? 'green' : 'red'; ?>"><?php echo $row["show"]; ?></td>
                                    <td><a href="Dev_textedit.php?update_id=<?php echo $row["id"]; ?>"
                                            class="btn btn-dark">Edit</a></td>
                                    <td><a href="?delete_id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
                                    </td>
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