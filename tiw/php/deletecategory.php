<?php
session_start();
if (($_SESSION['role'] == "a")) {
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "DELETE FROM category where id = $_GET[id]";
    $conn->exec($sql);
    $conn = null;
    $_SESSION['category'] = "delete_success";
    header("location:category.php");
    die();
} else {
    header("location:index.php");
    die();
}
