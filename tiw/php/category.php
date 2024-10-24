<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location:index.php");
        die();
    }
    ?>
    <div class="container">
        <h1 style="text-align: center;">Webboard Easy</h1>
        <nav class="navbar navbar-expand-lg" style="background-color: #d3d3d3;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"> <i class="bi bi-house-door-fill"></i> Home </a>
                <ul class="navbar-nav">

                    <?php
                    if (!isset($_SESSION['id'])) {
                        echo "<li class= 'nav-item'>";
                        echo "<a class='nav-link'  href = 'login.php' > <i class='bi bi-pencil-square'></i> เข้าสู่ระบบ</a>";
                        echo "</li>";
                    } else {
                        $user = $_SESSION['username'];
                        echo "<li class='nav-item dropdown'>";
                        echo "<a class='btn btn-outline-secondary btn-sm' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
                        echo "<i class='bi bi-person-lines-fill'></i> $user";
                        echo "</a>";
                        echo "<ul class='dropdown-menu'>";
                        echo "<li><a class='dropdown-item' href=''><i class='bi bi-bookmarks'></i>จัดการหมวดหมู่</a></li>";
                        echo "<li><a class='dropdown-item' href=''><i class='bi bi-person-check'></i>จัดการผู้ใช้งาน</a></li>";
                        echo "<li><a class='dropdown-item' href='logout.php'><i class='bi bi-power'></i>ออกจากระบบ</a></li>";
                        echo "</ul>";
                        echo "</li>";
                    }
                    ?>

                </ul>
            </div>
        </nav>

        <div class='mt-3 col-sm-10 col-md-8 col-lg-7 mx-auto'>
            <table class="table table-striped mt-3">
                <tr>
                    <td style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="width: 30%; text-align: left;"><b>ลำดับ</b></span>
                        <span style="width: 50%; text-align: center;"><b>ชื่อหมวดหมู่</b></span>
                        <span style="width: 30%; text-align: right;"><b>จัดการ</b></span>
                    </td>
                </tr>
                <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $sql = "SELECT * FROM category";
                $result = $conn->query($sql);

                while ($row = $result->fetch()) {
                    echo "<tr><td style='display: flex; justify-content: space-between; align-items: center;'>";
                    echo "<span style='width: 30%; text-align: left;'>" . $row['id'] . "</span>";
                    echo "<span style='width: 50%; text-align: center;'>" . $row['name'] . "</span>";
                    echo "<span style='width: 30%; text-align: right;'>";
                    echo "<a href='editcategory.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'><i class='bi bi-pencil-fill'></i></a> ";
                    echo "<button onclick='delete_category(" . $row['id'] . ")' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></button>";
                    echo "</span>";
                    echo "</td></tr>";
                }
                $conn = null;
                ?>
            </table>
            <div class="col-lg-12">
                <center>
                    <button type="submit" class="btn btn-success btn-sm text-white">
                        <i class="bi bi-bookmark-plus mt-1">เพิ่มหมวดหมู่ใหม่</i>
                    </button>
                </center>
            </div>
        </div>


    </div>

</body>

</html>