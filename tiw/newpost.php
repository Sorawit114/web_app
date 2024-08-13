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
        if(!isset($_SESSION['id'])){
            header("location:index.php");
            die();
        }
        ?>
        <?php
            $user = $_SESSION['username'];
            echo "ผู้ใช้ : $user";
        ?>
        <br>
        หมวดหมู่ : 
        <select name="catagory" id="">
            <option value="General">เรื่องทั่วไป</option>
            <option value="Study">เรื่องเรียน</option>
        </select>
        <br>
        หัวข้อ : <tr><td colspan="2" align="center"><textarea name="topic"align="center"></textarea></td></tr>
        <br>
        เนื้อหา : <tr><td colspan="2" align="center"><textarea name="content" row="5" cols="20" align="center"></textarea></td></tr>
        <br>
        <tr><td colspan="2" align="center"><input type="submit" value="บันทึกข้อความ"></td></tr>
    </div>
</body>
</html>