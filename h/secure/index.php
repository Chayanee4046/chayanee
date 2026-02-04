<?php
session_start();
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - ชญาณี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f0fff4; /* Mint Green light tint */
            font-family: 'Sarabun', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            border: 2px solid #ffdeeb; /* Pastel Pink border */
        }
        .btn-custom {
            background-color: #98ffca; /* Mint Green */
            border: none;
            color: #444;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #ffc2d4; /* Pastel Pink on hover */
            color: white;
        }
        .form-control:focus {
            border-color: #98ffca;
            box-shadow: 0 0 0 0.25 darkredrem rgba(152, 255, 202, 0.25);
        }
        h2 { color: #ff85a1; } /* Deep Pastel Pink */
    </style>
</head>
<body>

<div class="login-card">
    <div class="text-center mb-4">
        <h2 class="fw-bold">เข้าสู่ระบบ</h2>
        <p class="text-muted">ชญาณี รุ่งนภากานต์ (ตังเม)</p>
    </div>

    <form method="post" action="">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="auser" class="form-control form-control-lg" placeholder="กรอกชื่อผู้ใช้" autofocus required>
        </div>
        <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" name="apwd" class="form-control form-control-lg" placeholder="กรอกรหัสผ่าน" required>
        </div>
        <button type="submit" name="Submit" class="btn btn-custom btn-lg w-100 shadow-sm">LOGIN</button>
    </form>

    <?php
    if (isset($_POST['Submit'])) {
        include_once("connectdb.php");

        $user = $_POST['auser'];
        $pwd = $_POST['apwd'];

        // 1. ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
        $stmt = mysqli_prepare($conn, "SELECT a_id, a_name, a_password FROM admin WHERE a_username = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($data = mysqli_fetch_assoc($result)) {
            // 2. ตรวจสอบรหัสผ่านที่เข้ารหัสด้วย password_verify
            if (password_verify($pwd, $data['a_password'])) {
                $_SESSION['aid'] = $data['a_id'];
                $_SESSION['aname'] = $data['a_name'];
                
                echo "<script>window.location='index2.php';</script>";
            } else {
                echo "<div class='alert alert-danger mt-3 text-center'>รหัสผ่านไม่ถูกต้อง</div>";
            }
        } else {
            echo "<div class='alert alert-danger mt-3 text-center'>ไม่พบชื่อผู้ใช้งานนี้</div>";
        }
        mysqli_stmt_close($stmt);
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>