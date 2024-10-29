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
    if (!($_SESSION['role'] == "a")) {
        header("location:index.php");
        die();
    }
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
                        if (isset($_SESSION['id']) && $_SESSION['role'] == 'a') {
                            echo "<li><a class='dropdown-item' href='category.php'><i class='bi bi-bookmarks'></i>จัดการหมวดหมู่</a></li>";
                            echo "<li><a class='dropdown-item' href=''><i class='bi bi-person-check'></i>จัดการผู้ใช้งาน</a></li>";
                        }
                        echo "<li><a class='dropdown-item' href='logout.php'><i class='bi bi-power'></i>ออกจากระบบ</a></li>";
                        echo "</ul>";
                        echo "</li>";
                    }
                    ?>

                </ul>
            </div>
        </nav>

        <?php
        if (isset($_SESSION['user'])) {
            echo "<div class='alert alert-success mt-3'>แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว</div>";
            unset($_SESSION['user']);
        }
        ?>

        <div class='mt-3'>
            <table class="table table-striped mt-3">
                <tr>
                    <td style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="width: 30%;">
                            <center><b>ลำดับ</b></center>
                        </span>
                        <span style="width: 30%;">
                            <center><b>ชื่อผู้ใช้</b></center>
                        </span>
                        <span style="width: 30%;">
                            <center><b>ชื่อ-นามสกุล</b></center>
                        </span>
                        <span style="width: 30%;">
                            <center><b>เพศ</b></center>
                        </span>
                        <span style="width: 30%;">
                            <center><b>อีเมล</b></center>
                        </span>
                        <span style="width: 30%;">
                            <center><b>สิทธ์</b></center>
                        </span>
                        <span style="width: 30%;">
                            <center><b>จัดการ</b></center>
                        </span>
                    </td>
                </tr>
                <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $sql = "SELECT * FROM user";
                $result = $conn->query($sql);
                $id = 1;
                while ($row = $result->fetch()) {
                    echo "<tr><td style='display: flex; justify-content: space-between; align-items: center;'>";
                    echo "<span style='width: 30%;'>" . "<center>" . $id . "</center>" . "</span>";
                    echo "<span style='width: 30%;'>" . "<center>" .  $row['login'] . "</center>" . "</span>";
                    echo "<span style='width: 30%;'>" . "<center>" .  $row['name'] . "</center>" . "</span>";
                    echo "<span style='width: 30%;' id = 'gender'>" . "<center>" .  $row['gender'] . "</center>" . "</span>";
                    echo "<span style='width: 30%;'>" . "<center>" .  $row['email'] . "</center>" . "</span>";
                    echo "<span style='width: 30%;'>" . "<center>" .  $row['role'] . "</center>" . "</span>";
                    echo "<span style='width: 30%;'>";
                    echo "<center><a href='#' class='btn btn-warning btn-sm me-2' data-bs-toggle='modal' data-bs-target='#showForm' data-id='" . $row['id'] . "' data-login='" . $row['login'] . "' data-name='" . $row['name'] . "' data-gender='" . $row['gender'] . "' data-email='" . $row['email'] . "' data-role='" . $row['role'] . "'><i class='bi bi-pencil-fill'></i></a></center>";
                    echo "</span>";
                    echo "</td></tr>";
                    $id++;
                }
                $conn = null;
                ?>
            </table>
        </div>

        <div class="modal fade" id="showForm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">แก้ไขหมวดหมู่</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="edituser.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>ชื่อผู้ใช้:</label>
                                <input name="login-user" type="text" class="form-control" disabled>
                                <input name="id-user" type="text" class="form-control d-none">
                            </div>
                            <div class="form-group">
                                <label>ชื่อ-นามสกุล:</label>
                                <input name="name-user" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>เพศ:</label>
                                <select name="gender-user" class="form-control">
                                    <option value="m">ผู้ชาย</option>
                                    <option value="f">ผู้หญิง</option>
                                    <option value="o">อื่นๆ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>อีเมล:</label>
                                <input name="email-user" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>สิทธ์:</label>
                                <select name="role-user" class="form-control">
                                    <option value="m">Member</option>
                                    <option value="a">Admin</option>
                                    <option value="b">Band</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            const showForm = document.getElementById('showForm');
            showForm.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const categoryId = button.getAttribute('data-id');
                const categoryLogin = button.getAttribute('data-login');
                const categoryName = button.getAttribute('data-name');
                const categoryGender = button.getAttribute('data-gender');
                const categoryEmail = button.getAttribute('data-email');
                const categoryRole = button.getAttribute('data-role');

                const modalInput = showForm.querySelectorAll('.modal-body input');
                modalInput[0].value = categoryLogin;
                modalInput[1].value = categoryId;
                modalInput[2].value = categoryName;
                modalInput[3].value = categoryEmail;

                const genderSelect = showForm.querySelector('select[name="gender-user"]');
                genderSelect.value = categoryGender;

                const roleSelect = showForm.querySelector('select[name="role-user"]');
                roleSelect.value = categoryRole;
            });
        </script>

        <script>
            function delete_category(category) {
                if (confirm("ต้องการลบจริงหรือไม่")) {
                    window.location.href = `deletecategory.php?id=${category}`;
                }
            }
        </script>
    </div>

</body>

</html>