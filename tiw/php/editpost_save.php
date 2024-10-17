<?php
session_start();

$topic = $_POST['topic'];
$comment =  $_POST['comment'];
$idp = $_POST['id_post'];
$post_date = date('Y-m-d H:i:s');

$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
$sql = "UPDATE post SET title = '$topic', content = '$comment' , post_date = '$post_date' where id = $idp";
$conn->exec($sql);
$_SESSION['edit_post'] = "success";
$conn = null;
header("location:editpost.php?id=$idp");
die();
