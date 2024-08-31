<?php
require_once('DB_config.php');

// Check if search query is set
$search_query = "";
if (isset($_POST['search'])) {
    $search_query = $_POST['search'];
}

// Prepare the search statement
$search_stmt = $conn->prepare("SELECT * FROM `button` WHERE `button` LIKE :search_query");
$search_stmt->bindValue(':search_query', '%' . $search_query . '%');
$search_stmt->execute();

// Handle deletion
if (isset($_REQUEST['delete_id'])) {
    $id = $_REQUEST['delete_id'];

    $select_stmt = $conn->prepare("SELECT * FROM `button` WHERE id = :id");
    $select_stmt->bindParam(':id', $id);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

    $delete_stmt = $conn->prepare('DELETE FROM `button` WHERE id = :id');
    $delete_stmt->bindParam(':id', $id);
    $delete_stmt->execute();

    header('Location:DEV_button.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Button</title>
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

        .search-input {
            width: 100%;
            /* ปรับขนาดให้เต็มความกว้างของคอนเทนเนอร์ */
            padding: 10px;
            /* เพิ่ม Padding */
            border-radius: 5px;
            /* เพิ่มขอบมน */
            border: 1px solid #ccc;
            /* ปรับสีขอบ */
        }

        .search-button {
            padding: 10px 15px;
            /* เพิ่ม Padding ให้ปุ่ม */
            background-color: #007bff;
            /* ปรับสีพื้นหลัง */
            color: white;
            /* ปรับสีข้อความ */
            border: none;
            /* ลบขอบ */
            border-radius: 5px;
            /* เพิ่มขอบมน */
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
            <div class="header">BUTTON</div>
            <div class="info">
                <div class="container">
                    <div class="display-3 text-center"></div>
                    <a href="Dev_buttonadd.php" class="btn btn-dark mb-3">Add</a>
                    <!-- Search Form -->
                    <form method="POST" action="" class="form-inline mb-3">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Search by button" value="<?php echo $search_query; ?>">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Button</th>
                                <th>Name</th>
                                <th>Connect</th>
                                <th>Show</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = $search_stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["button"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["connect"]; ?></td>
                                    <td style="color: <?php echo $row["show"] === 'on' ? 'green' : 'red'; ?>"><?php echo $row["show"]; ?></td>
                                    <td><a href="Dev_buttonedit.php?update_id=<?php echo $row["id"]; ?>"
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