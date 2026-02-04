<?php
    include_once("check_login.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - ชญาณี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f7fffb; /* Light Mint Tint */
            font-family: 'Sarabun', sans-serif;
        }
        .navbar {
            background-color: #98ffca !important; /* Mint Green */
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .admin-welcome {
            color: #444;
            font-weight: 500;
        }
        .menu-card {
            border: none;
            border-radius: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            color: #333;
            background: white;
            border-bottom: 5px solid #ffdeeb; /* Pastel Pink Accent */
        }
        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            color: #ff85a1; /* Pink on hover */
        }
        .icon-box {
            font-size: 3rem;
            color: #98ffca;
            margin-bottom: 1rem;
        }
        .btn-logout {
            background-color: #ffc2d4; /* Pastel Pink */
            border: none;
            color: #613643;
            font-weight: bold;
        }
        .btn-logout:hover {
            background-color: #ff85a1;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light mb-5">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">CHAYANEE ADMIN</a>
        <div class="ms-auto d-flex align-items-center">
            <span class="admin-welcome me-3">
                <i class="bi bi-person-circle"></i> แอดมิน: <strong><?php echo htmlspecialchars($_SESSION['aname']); ?></strong>
            </span>
            <a href="logout.php" class="btn btn-logout btn-sm rounded-pill px-3">
                <i class="bi bi-box-arrow-right"></i> ออกจากระบบ
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="fw-bold" style="color: #444;">แผงควบคุมระบบ</h1>
            <p class="text-muted">ยินดีต้อนรับคุณตังเม เลือกเมนูที่ต้องการจัดการได้เลยค่ะ</p>
        </div>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-4 col-lg-3">
            <a href="products.php" class="card menu-card h-100 text-center p-4">
                <div class="icon-box"><i class="bi bi-box-seam"></i></div>
                <h4 class="fw-bold">จัดการ