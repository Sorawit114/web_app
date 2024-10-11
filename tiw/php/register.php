<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Register</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['id'])) {
        header("location:index.php");
        die();
    }
    ?>
    <center>
        <h1>สมัครสมาชิก</h1>
    </center>
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
    if (isset($_SESSION['add_login'])) {
        if ($_SESSION['add_login'] == 'error') {
            echo "<div class='alert alert-danger col-sm-10 col-md-8 col-lg-4 mx-auto'>ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา</div>";
        } else {
            echo "<div class = 'alert alert-success col-sm-10 col-md-8 col-lg-4 mx-auto'> เพิ่มบัญชีเรียบร้อย </div>";
        }
        unset($_SESSION['add_login']);
    }
    ?>
    <div class="container-fluid">
        <div class="mt-3">
            <div class="card border-primary col-sm-10 col-md-8 col-lg-4 mx-auto">
                <form action="register_save.php" method="post">

                    <p class="card-header bg-primary text-white">เข้าสู่ระบบ</p>
                    <div class="card-body">

                        <div class="row mt-3">
                            <label for="login" class="col-lg-3 col-form-lable"> ชื่อบัญชี :</label>
                            <div class="col-lg-9">
                                <input id="login" name="login" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="password" class="col-lg-3 col-form-lable"> รหัสผ่าน :</label>
                            <div class="col-lg-9">
                                <input id="password" name="password" class="form-control" type="password" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="name" class="col-lg-3 col-form-lable"> ชื่อ-นามสกุล :</label>
                            <div class="col-lg-9">
                                <input id="name" name="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label class="col-lg-3 col-form-lable"> เพศ : </label>
                            <div class="col-lg-9">
                                <div class="col-lg-9">
                                    <input name="gender" type="radio" value="m" required class="from-check-input"> ชาย
                                </div>
                                <div class="col-lg-9">
                                    <input name="gender" type="radio" value="f" required class="from-check-input"> หญิง
                                </div>
                                <div class="col-lg-9">
                                    <input name="gender" type="radio" value="o" required class="from-check-input"> อื่นๆ
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="email" class="col-lg-3 col-form-lable"> อีเมล :</label>
                            <div class="col-lg-9">
                                <input id="email" name="email" type="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-primary" required><i class="bi bi-box-arrow-in-down"></i> สมัครสมาชิก </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>