<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <?php
        session_start();
        if (isset($_SESSION['id'])) {
            header("location:index.php");
            die();
        }
        $_SESSION['show'] = "error";
        ?>
        <h1 style="text-align: center;">Webboard Easy</h1>
        <nav class="navbar  navbar-expand-lg" style="background-color: #d3d3d3;">
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
                        echo "<li><a class='dropdown-item' href='logout.php'><i class='bi bi-power'></i>ออกจากระบบ</a></li>";
                        echo "</ul>";
                        echo "</li>";
                    }
                    ?>

                </ul>
            </div>
        </nav>

        <?php
        if (isset($_SESSION['login'])) { ?>
            <div class="mt-3">
                <div class="alert alert-danger ms-auto me-auto" style="width: 500px;">
                    <div class="card-body">
                        <label> กรุณาล็อคอินก่อนแสดงความเห็น </label>
                    </div>
                </div>
            </div>
        <?php unset($_SESSION['login']);
        } ?>

        <?php
        if (isset($_SESSION['error'])) { ?>
            <div class="mt-3">
                <div class="alert alert-danger ms-auto me-auto" style="width: 500px;">
                    <div class="card-body">
                        <label> ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง </label>
                    </div>
                </div>
            </div>
        <?php unset($_SESSION['error']);
        } ?>

        <div class="mt-3">
            <div class="card ms-auto me-auto" style="width: 500px;">
                <form action="verify.php" method="post">
                    <p class="card-header">เข้าสู่ระบบ</p>
                    <div class="card-body">
                        <div class="mt-3 form-group">
                            <label for="login" class="form-label">Login:</label>
                            <input id="login" name="login" class="form-control">
                        </div>
                        <div class="mt-3 form-group">
                            <label for="password" class="form-label">Password:</label>
                            <div class="input-group">
                                <input id="password" type="password" name="password" class="form-control">
                                <button type="button" class="input-group-text" onclick="show()">
                                    <i id="password-icon" class="bi bi-eye-fill "></i>
                                </button>
                            </div>
                        </div>
                        <div class="mt-3" align="center">
                            <input type="submit" value="Login" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function show() {
                let passwordField = document.getElementById('password');
                let passwordIcon = document.getElementById('password-icon');

                if (passwordField.type == 'password') {
                    passwordField.type = 'text';
                    passwordIcon.classList.remove('bi-eye-fill');
                    passwordIcon.classList.add('bi-eye-slash-fill');
                } else {
                    passwordField.type = 'password';
                    passwordIcon.classList.remove('bi-eye-slash-fill');
                    passwordIcon.classList.add('bi-eye-fill');
                }
            }
        </script>

        <div class="container mt-3" align="center">
            ถ้ายังไม่ได้เป็นสมาชิก
            <a href="register.php">กรุณาสมัครสมาชิก</a>
        </div>

    </div>
</body>

</html>