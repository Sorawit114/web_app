<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>KAKao</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location:login.php");
        $_SESSION['login'] = "error";
        die();
    }
    ?>
    <h1 style="text-align: center;">Webboard KAKao</h1>
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

    <?php
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "SELECT t1.title, t1.content, t2.login, t1.post_date FROM post as t1 INNER JOIN user as t2 on (t1.user_id = t2.id) where t1.id = $_GET[id]";
    $result = $conn->query($sql);

    while ($row = $result->fetch()) {
        echo "<div class = 'card border-primary mt-3 col-sm-10 col-md-8 col-lg-4 mx-auto'>";
        echo "<div class = 'card-header bg-primary text-white'> $row[0] </div>";
        echo "<div class = 'card-body'> $row[1]";
        echo "<div class = 'mt-2'> $row[2] - $row[3]</div></div></div>";
    }
    $conn = null;
    ?>

    <?php
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "SELECT t1.id, t1.content, t2.login, t1.post_date FROM comment as t1 INNER JOIN user as t2 on (t1.user_id = t2.id) where t1.post_id = $_GET[id]";
    $result = $conn->query($sql);

    while ($row = $result->fetch()) {
        echo "<div class = 'card border-info mt-3 col-sm-10 col-md-8 col-lg-4 mx-auto'>";
        echo "<div class = 'card-header bg-info text-white'> ความเห็นที่ $row[0] </div>";
        echo "<div class = 'card-body'> $row[1]";
        echo "<div class = 'mt-2'> $row[2] - $row[3]</div></div></div>";
    }
    $conn = null;
    ?>

    <div class="card text-dark bg-white-bordersuccess col-sm-10 col-md-8 col-lg-4 mx-auto mt-3">
        <div class="card-header bg-success text-white"> แสดงความเห็น </div>
        <div class="card-body">
            <form action="post_save.php" method="post">
                <input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">
                <div class="row mb-3 justify-content-center">
                    <div class="col-lg-10">
                        <textarea name="comment" class="form-control" row="8"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                            <button type="submit" class="btn btn-success btn-sm text-white">
                                <i class="bi bi-box-arrow-up-right me-1">ส่งข้อความ</i>
                            </button>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>