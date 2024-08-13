
<?php
    session_start();
    $id = $_GET['id'];
    if(isset($_SESSION['id']) && $_SESSION['role'] == "a"){
        echo "ลบกระทู้ หมายเลข $id";
    }
    else{
        header("location:index.php");
        die();
    }
?>