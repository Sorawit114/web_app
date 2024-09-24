<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Index</title>
    <style type="text/css">

    </style>
</head>

<body>
    <?php
    session_start();
    ?>
    <div class="container-fluid">
        <h1 style="text-align: center;">Webboard Easy</h1>
        <nav class="navbar navbar-expand-lg" style="background-color: #d3d3d3;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <i class="bi bi-house-door-fill"></i> Home </a>
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
                        echo "<li><a class='dropdown-item' href='logout.php'><i class='bi bi-power'></i>ออกจากระบบ</a></li>";
                        echo "</ul>";
                        echo "</li>";
                    }
                    ?>

                </ul>
            </div>
        </nav>

        <div class="dropdown mt-3">
            <label for="">หมวดหมู่</label>
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                --ทั้งหมด--
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item">ทั้งหมด</a></li>
                <li><a class="dropdown-item">เรื่องเรียน</a></li>
                <li><a class="dropdown-item">เรื่องทั่วไป</a></li>
            </ul>
            <?php
            if (isset($_SESSION['id'])) {
                echo "<button class='btn btn-success' href='newpost.php' style='float:right;'> + สร้างกระทู้ใหม่</button>";
            }
            ?>
        </div>
        <table class="table table-striped mt-3">
            <?php
            for ($i = 1; $i <= 10; $i++) {
                if (isset($_SESSION['id']) && $_SESSION["role"] == "a") {
                    echo "<tr><td><a href= post.php?id=$i style='margin-right:10px' class='link-underline link-underline-opacity-0'>กระทู้ที่ $i </a> <button class='btn btn-danger ' href = delete.php?id=$i style='float:right;'><i class=' bi bi-trash' ></i></button></td></tr>";
                } else {
                    echo "<tr><td><a href=post.php?id=$i style='margin-right:10px' class='link-underline link-underline-opacity-0'>กระทู้ที่ $i </a></td></tr>";
                }
            }
            ?>
        </table>

    </div>
</body>

</html>