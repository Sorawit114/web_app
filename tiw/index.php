<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style type="text/css">
        
    </style>
</head>
<body>
    <center><h1>Webboard Easy</h1></center>
    <hr>
    <div>
        <?php
            session_start();
        ?>
        หมวดหมู่ : 
        <select name="catagory" id="">
            <option value="All">--ทั้งหมด--</option>
            <option value="General">เรื่องทั่วไป</option>
            <option value="Study">เรื่องเรียน</option>
        </select>
        <?php
        if(!isset($_SESSION['id'])){
            echo "<a style='float: right;' href='login.php'>เข้าสู่ระบบ</a>";
        }else{
            $user = $_SESSION['username'];
            echo "<a style='float: right;' href='logout.php'> ออกจากระบบ </a>";
            echo "<span style='float: right; margin-right:15px' > ผู้ใช้งานระบบ : $user </span>";
            echo "<br><a href='newpost.php'> สร้างกระทู้ใหม่ </a>";
        }
        ?>
        <br>

    </div>
    <div>
        <ul>
            <?php
            for($i = 1; $i <= 10; $i++){
                if(isset($_SESSION['id']) && $_SESSION["role"] == "a"){
                    echo "<li><a href=post.php?id=$i style='margin-right:10px'>กระทู้ที่ $i </a> <a href = delete.php?id=$i> ลบ </a> </li>";
                }
                else{
                    echo "<li><a href=post.php?id=$i style='margin-right:10px'>กระทู้ที่ $i </a></li>";
                }
            }
            ?>
        </ul>
    </div>
</body>
</html>