<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>editpost</title>
</head>

<body>
    <?php
    session_start();
    ?>
    <div class="container">
        <h1 style="text-align: center;">Webboard Easy</h1>
        <nav class="navbar navbar-expand-lg" style="background-color: #d3d3d3;">
            <div class="container">
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
                        echo "<li><a class='dropdown-item' href='category.php'><i class='bi bi-bookmarks'></i>จัดการหมวดหมู่</a></li>";
                        echo "<li><a class='dropdown-item' href='user.php'><i class='bi bi-person-check'></i>จัดการผู้ใช้งาน</a></li>";
                        echo "<li><a class='dropdown-item' href='logout.php'><i class='bi bi-power'></i>ออกจากระบบ</a></li>";
                        echo "</ul>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <?php
        if (isset($_SESSION['edit_post'])) {
            echo "<div class = 'alert alert-success col-sm-10 col-md-8 col-lg-4 mx-auto mt-3'> แก้ไขข้อมูลเรียบร้อย </div>";
            unset($_SESSION['edit_post']);
        }
        ?>

        <div class="card text-dark bg-white border-warning col-sm-10 col-md-8 col-lg-4 mx-auto mt-3">
            <div class="card-header bg-warning text-white">แก้ไขกระทู้</div>
            <div class="card-body">
                <form action="editpost_save.php" method="post">
                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">หมวดหมู่ :</label>
                        <div class="col-lg-9">
                            <select name="category" class="form-select">
                                <?php
                                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                                $sql = "SELECT t1.id,t1.name,t2.title,t2.content,t2.user_id,t2.id FROM category as t1 INNER JOIN post as t2 on (t2.id = $_GET[id]) where t1.id = t2.cat_id";
                                $result = $conn->query($sql);
                                $row = $result->fetch();
                                echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
                                echo "<input type='hidden' name='id_post' value=" . $row[5] . "></input>";
                                if (!isset($_SESSION['id']) || $row[4] != $_SESSION['user_id']) {
                                    header("location:index.php");
                                    die();
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">หัวข้อ :</label>
                        <div class="col-lg-9">
                            <?php
                            echo " <input value = '$row[2]' type='text' name='topic' class='form-control' required>";
                            ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-lg-3 col-form-label">เนื้อหา :</label>
                        <div class="col-lg-9">
                            <?php
                            echo " <textarea name='comment' class='form-control' rows='8'>$row[3]</textarea>";
                            ?>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <center>
                                <button type="submit" class="btn btn-warning btn-sm text-white">
                                    <i class="bi bi-caret-right-square me-1"></i>บันทึกข้อความ
                                </button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>