<?php
session_start();
if (($_SESSION['role'] == "a")) {
    $id = $_POST['id-user'];
    $name = $_POST['name-user'];
    $gender = $_POST['gender-user'];
    $email = $_POST['email-user'];
    $role = $_POST['role-user'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "UPDATE user SET name = '$name', gender = '$gender', email = '$email', role = '$role' WHERE id = $id";
    $conn->exec($sql);
    $_SESSION['user'] = "edit_success";
    $conn = null;
    header("location:user.php");
    die();
} else {
    header("location:index.php");
    die();
}
