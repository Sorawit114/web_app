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
        หมวดหมู่ : 
        <select name="catagory" id="">
            <option value="All">--ทั้งหมด--</option>
            <option value="General">เรื่องทั่วไป</option>
            <option value="Study">เรื่องเรียน</option>
        </select>
        <a style="float: right;" href="login.html">เข้าสู่ระบบ</a>
    </div>
    <div>
        <ul>
            <?php
            for($i = 1; $i <= 10; $i++){
                echo "<li><a href=post.php?id=$i>กระทู้ที่ $i   </a></li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>