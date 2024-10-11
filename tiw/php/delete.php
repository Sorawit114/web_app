<?php
session_start();
$id = $_GET['id']; ?>
<script>
    alert(5 + 6);
</script>
<?php
if (isset($_SESSION['id']) && $_SESSION['role'] == "a") {
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
    $sql = "DELETE FROM post where id = $_GET[id]";
    $conn->exec($sql);
    $sql = "DELETE FROM comment where post_id = $_GET[id]";
    $conn->exec($sql);
    $conn = null;
    header("location:index.php");
    die();
} else {
    header("location:index.php");
    die();
}
