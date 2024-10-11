<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAKao</title>
</head>
<body>
    <?php $id = $_GET['id'] ?>
    <h1 style="text-align: center;">Webboard KAKao</h1>
    <hr>
    <div style="text-align: center;">
        <?php echo "ต้องการดูกระทู้หมายเลข $id <br>";
        if (($id %2) == 0)
            echo "เป็นกระทู้หมายเลขคู่";
        else
            echo "เป็นกระทู้หมายเลขคี่";
        ?>
    </div>
    <br>
    <table style="border: 2px solid black; width: 40%;" align="center">
        <tr><td colspan="2" style="background-color: #6cd2fe;" align="enter">แสดงความคิดเห็น</td></tr>
        <tr><td colspan="2" align="center"><textarea name="mess" row="10" cols="20" align="center"></textarea></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" value="ส่งข้อความ"></td></tr>
        <tr><td colspan="2" align="center"><a href="index.php">กลับไปหน้าหลัก</a></td></tr>
    </table>
</body>
</html>