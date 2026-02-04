<?php
    session_start();
    if(empty($_SESSION['aid'])){
        echo "Access Denied";
        exit;
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>หน้าหลักแอดมิน - ชญาณี</title>
</head>

<body>
<h1>หน้าหลักแอดมิน - ชญาณี</h1>

<?php echo "แอดมิน:".$_SESSION['a_name']; ?> <br>

<ul>
    <a href="products.php"><li>จัดการสินค้า</li></a>
    <a href="orders.php"><li>จัดการออเดอร์</li></a>
    <a href="customers.php"><li>จัดการลูกค้า</li></a>
    <a href="logout.php"><li>ออกจากระบบ</li></a>
</ul>






</body>
</html>