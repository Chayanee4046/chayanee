<?php
    session_atart();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ชญาณี รุ่งนภากานต์(ตังเม)</title>
</head>

<body>
<h1>ชญาณี รุ่งนภากานต์(ตังเม)</h1>

<?php
    echo @$_SESSION['name']. "<br>";
    echo @$_SESSION['nickname']. "<br>" ;
    echo @$_SESSION['p1']. "<br>";
    echo @$_SESSION['p2']. "<br>";
?>
</body>
</html>
