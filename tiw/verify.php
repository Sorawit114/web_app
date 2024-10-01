<?php
session_start();
if (isset($_SESSION['id'])) {
    header("location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAKao</title>
</head>

<body>
    <center>
        <h1>Webboard Easy</h1>
    </center>
    <hr>
    <div align="center">
        <?php
        $user = $_POST['user'];
        $pass = $_POST['password'];
        if (!isset($_SESSION['id']) && $user == "admin" && $pass == "ad1234") {
            $_SESSION["username"] = "admin";
            $_SESSION["role"] = "a";
            $_SESSION["id"] = session_id();
            header("location:index.php");
            die();
        } elseif (!isset($_SESSION['id']) && $user == "member" && $pass == "mem1234") {
            $_SESSION["username"] = "member";
            $_SESSION["role"] = "m";
            $_SESSION["id"] = session_id();
            header("location:index.php");
            die();
        } else {
            $_SESSION['error'] = '1';
            header("location:login.php");
            die();
        }
        ?>
        <br>
        <div>
            <a href="index.php  ">กลับไปหน้าหลัก</a>
        </div>
    </div>
</body>

</html>