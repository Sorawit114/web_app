<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAKao</title>
</head>
<body>
    <center><h1>Webboard Easy</h1></center>
    <hr>
    <div align="center">
        <?php 
        $user = $_POST['user'];
        $pass = $_POST['password'];
        if ($user == "admin" && $pass == "ad1234")
            echo "ยินดีต้อนรับคุณ ADMIN";
        elseif ($user == "member" && $pass == "mem1234")
            echo "ยินดีต้อนรับคุณ MEMBER";
        else
            echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";
        ?> 
            <br>
            <div>
                <a href="index.php  ">กลับไปหน้าหลัก</a>
            </div>
    </div>
</body>
</html> 