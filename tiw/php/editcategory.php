<?php
session_start();
if (($_SESSION['role'] == "a")) {
    $id_ca = $_POST['id-category'];
    $name_ca = $_POST['name-category'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "UPDATE category SET name = '$name_ca' where id = $id_ca";
    $conn->exec($sql);
    $_SESSION['category'] = "edit_success";
    $conn = null;
    header("location:category.php");
    die();
} else {
    header("location:index.php");
    die();
}
