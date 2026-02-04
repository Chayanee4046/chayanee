<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ชญาณี รุ่งนภากานต์(ตังเม)</title>
</head>
<body>

<h1>หน้าเข้าสู่ระบบ - ชญาณี</h1>
<form method="post" action="">
Username <input type="text" name="auser" autofocus required> <br>
Password <input type="password" name="apwd" required> <br>
    <button type="submit" name="Submit">LOGIN</button>
</form>

<?php
is(isset($_POST['Submit'])){
    include_once("connectdb.php");
    $sql = "SELECT * FROM admin WHERE a_username='{$_POST['auser']}' AND a_password='xxx' LIMIT 1";
    $rs = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($rs);

    echo $num ;
}
?>

</body>
</html>
