<?php 
session_start();

include("DB_config.php"); // Ensure DB_config.php sets up the $conn variable

if(!isset($_SESSION['valid'])){
    header("Location: index.php");
    exit;
}

// Fetch the logged-in user's role
$user_id = $_SESSION['id'];

try {
    $sql = "SELECT `role` FROM users WHERE Id = :user_id"; // Ensure correct column name
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user_role = $stmt->fetchColumn();

    // Check if user role is 'Admin', 'Super Admin', or 'Dev'
    $is_admin = $user_role === 'Super Admin' || $user_role === 'Dev';

    // Debugging output
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>
<?php 
    require_once('DB_config.php');

    // Update role
    if (isset($_REQUEST['update_role_id']) && isset($_REQUEST['new_role'])) {
        $id = $_REQUEST['update_role_id'];
        $new_role = $_REQUEST['new_role'];

        $update_stmt = $conn->prepare("UPDATE `users` SET role = :new_role WHERE id = :id");
        $update_stmt->bindParam(':new_role', $new_role);
        $update_stmt->bindParam(':id', $id);
        $update_stmt->execute();

        // Redirect to refresh the page and remove query parameters
        header('Location: '.$_SERVER['PHP_SELF']);
        exit;
    }

    // Delete user
    if (isset($_REQUEST['delete_id'])) {
        $id = $_REQUEST['delete_id'];

        $delete_stmt = $conn->prepare('DELETE FROM `users` WHERE id = :id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmt->execute();

        // Redirect to refresh the page
        header('Location: '.$_SERVER['PHP_SELF']);
        exit;
    }

    // Handle search
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    if ($searchTerm) {
        // Search query with sorting
        $search_stmt = $conn->prepare("
            SELECT * FROM `users` 
            WHERE Username LIKE :searchTerm OR role LIKE :searchTerm
            ORDER BY
                CASE
                    WHEN role = 'Dev' THEN 1
                    WHEN role = 'Super Admin' THEN 1
                    WHEN role = 'Admin' THEN 2
                    WHEN role IS NULL OR role = '' THEN 3
                END, id
        ");
        $search_term_wildcard = "%$searchTerm%";
        $search_stmt->bindParam(':searchTerm', $search_term_wildcard);
        $search_stmt->execute();
    } else {
        // Default query (fetch all records with sorting)
        $search_stmt = $conn->prepare("
            SELECT * FROM `users`
            ORDER BY
                CASE
                    WHEN role = 'Dev' THEN 1
                    WHEN role = 'Super Admin' THEN 2
                    WHEN role = 'Admin' THEN 3
                    WHEN role IS NULL OR role = '' THEN 4
                END, id
        ");
        $search_stmt->execute();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>dashboard</title>
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
        <div class="header">USER</div>  
        <div class="info">
            <!-- Search Form -->
            <form action="" method="get" class="mb-3">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search Username" value="<?php echo htmlspecialchars($searchTerm); ?>">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Search</button>
            </form>
            <!-- Displaying the Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while ($row = $search_stmt->fetch(PDO::FETCH_ASSOC)) {
                            $editMode = isset($_GET['edit_id']) && $_GET['edit_id'] == $row['id'];
                    ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["Username"]; ?></td>
                            <td><?php echo $row["Age"]; ?></td>
                            <td><?php echo $row["Email"]; ?></td>
                            <td>
                                <?php if ($editMode) { ?>
                                    <form action="" method="get">
                                        <input type="hidden" name="update_role_id" value="<?php echo $row["id"]; ?>">
                                        <select name="new_role" class="form-control">
                                            <option value="" <?php echo empty($row["role"]) ? 'selected' : ''; ?>>Select Role</option>
                                            <option value="Super Admin" <?php echo $row["role"] == 'Super Admin' ? 'selected' : ''; ?>>Super Admin</option>
                                            <option value="Admin" <?php echo $row["role"] == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                                        </select>
                                        <button type="submit" class="btn btn-success btn-sm mt-2">Update</button>
                                    </form>
                                <?php } else { ?>
                                    <?php echo $row["role"]; ?>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($editMode) { ?>
                                    <a href="DEV_user.php" class="btn btn-secondary btn-sm">Cancel</a>
                                    <?php } else { ?>
                                        <?php if ($row["role"] !== 'Dev') { ?>
                                            <a href="?edit_id=<?php echo $row["id"]; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="?delete_id=<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                                            <?php } else { ?>
                                                <span class="text-muted"></span>
                                                <?php } ?>
                                                <?php } ?>
                                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
