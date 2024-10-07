<?php
session_start();
$topic = $_POST['topic'];
$comment = $_POST['comment'];

$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

$user_id = $_SESSION['user_id'];

$category = $_POST['category'];

$post_date = date('Y-m-d H:i:s');

$sql = "INSERT INTO post (title, content, post_date, cat_id, user_id) VALUES ('$topic', '$comment', '$post_date',  '$category', '$user_id')";

$conn->exec($sql);

$conn = null;
header("location:index.php");
die();
