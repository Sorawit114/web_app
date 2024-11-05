<?php
session_start();
$name = $_POST['name-category'];

$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
$sql = "SELECT * FROM category ";

$sql = "INSERT INTO category (name) VALUES ('$name')";
$conn->exec($sql);
$_SESSION['category'] = "add_success";
$conn = null;

header("location:category.php");
die();
