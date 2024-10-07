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
                <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $sql = "SELECT * FROM category";
                foreach ($conn->query($sql) as $row) {
                    echo "<li><a class= dropdown-item href = #> $row[name] </a></li>";
                }
                $conn = null;
                ?>
            </ul>

            <?php
            if (isset($_SESSION['id'])) {
                echo "<button type='button' class='btn btn-success' style='float:right;'><a href = 'newpost.php' class ='text-white link-underline link-underline-opacity-0'> + สร้างกระทู้ใหม่</a></button>";
            }
            ?>

        </div>
        <table class="table table-striped mt-3">
            <?php
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
            $sql = "SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date FROM post as t1 INNER JOIN user as t2 on (t1.user_id = t2.id) INNER JOIN category as t3 on (t1.cat_id = t3.id) ORDER BY t1.post_date DESC";
            $result = $conn->query($sql);
            while ($row = $result->fetch()) {
                echo "<tr><td>[ $row[0] ] <a href = post.php?id = $row[2] style = text-decoration:none>$row[1]</a><br>$row[3] - $row[4]</td></tr>";
            }
            $conn = null;
            ?>
        </table>

    </div>
</body>

</html>