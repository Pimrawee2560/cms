<?php 
session_start();

include("DB_config.php"); // ตรวจสอบให้แน่ใจว่า config.php มีการสร้างตัวแปร $conn

if(!isset($_SESSION['valid'])){
    header("Location: index.php");
    exit;
}

// ดึงข้อมูลของผู้ใช้ที่ล็อกอิน
$user_id = $_SESSION['id'];

// ตรวจสอบว่าผู้ใช้เป็น 'Super Admin' หรือ 'Dev'
try {
    $sql = "SELECT role FROM users WHERE id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user_role = $stmt->fetchColumn();

    // ตรวจสอบว่าผู้ใช้มีบทบาทที่ต้องการหรือไม่
    $is_admin = $user_role === 'Admin';
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>
<?php 

    require_once('DB_config.php');

    if (isset($_REQUEST['delete_id'])) {
        $id = $_REQUEST['delete_id'];

        $select_stmt = $conn->prepare('SELECT * FROM `addnewpost` WHERE id = :id');
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        unlink("upload/".$row['image']); // unlin functoin permanently remove your file

        // delete an original record from db
        $delete_stmt = $conn->prepare('DELETE FROM `addnewpost` WHERE id = :id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmt->execute();

        header("Location: Admin_dashboard.php");
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
            <li><a href="Admin_dashboard.php"><i class="fas fa-home"></i>หน้าหลัก</a></li>
            <li><a href="Admin_user.php"><i class="fas fa-address-book"></i>User</a></li>
            <li><a href="DB_logout.php"><i class="fas fa-map-pin"></i>Log Out</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">DASHBORD ADMIN</div>  
        <div class="info">
            <a href="Admin_slideshow.php" class="btn btn-dark">SLIDESHOW</a>
            <?php
            if (isset($_GET["msg"])) {
                $msg = $_GET["msg"];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                      ' . $msg . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
            ?>
            <a href="Admin_post_video.php" class="btn btn-dark">POST VIDEO</a>
             <a href="Admin_addnewpost.php"  class="btn btn-dark">ADD NEW POST IMAGE AND LINK</a>
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
                    $sql = "SELECT * FROM `addnewpost`";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                      <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["Title"] ?></td>
                        <td style="color: <?php echo $row["Status"] === 'Publish' ? 'green' : 'red'; ?>"><?php echo $row["Status"]; ?></td>
                        <td>
                          <a href="Admin_addnewpostedit.php?update_id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3" style="color: black;"></i></a>
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
  <script>
        window.addEventListener('beforeunload', function (e) {
            // ส่ง request ไปยัง logout.php เมื่อปิดแท็บ
            navigator.sendBeacon('logout.php');
        });
    </script>
</body>
</html>
