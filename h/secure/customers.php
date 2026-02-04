<?php
    include_once("check_login.php");
    include_once("connectdb.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการลูกค้า - ชญาณี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        body { background-color: #f7fffb; font-family: 'Sarabun', sans-serif; }
        .navbar { background-color: #98ffca !important; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .card-custom { border: none; border-radius: 20px; background: white; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; }
        .table thead { background-color: #ffdeeb; color: #613643; }
        
        .avatar-circle {
            width: 40px;
            height: 40px;
            background-color: #ffdeeb;
            color: #ff85a1;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .sidebar-link { text-decoration: none; color: #666; padding: 10px 15px; display: block; border-radius: 10px; transition: 0.3s; }
        .sidebar-link:hover, .sidebar-link.active { background-color: #ffdeeb; color: #ff85a1; }
        .btn-action { color: #666; transition: 0.2s; }
        .btn-action:hover { color: #ff85a1; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php">CHAYANEE ADMIN</a>
        <span class="navbar-text">
             <i class="bi bi-person-circle text-dark"></i> <strong><?php echo htmlspecialchars($_SESSION['aname']); ?></strong>
        </span>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card card-custom p-3 border-0">
                <h5 class="fw-bold mb-3 px-3">เมนูระบบ</h5>
                <a href="products.php" class="sidebar-link"><i class="bi bi-box-seam me-2"></i> จัดการสินค้า</a>
                <a href="orders.php" class="sidebar-link"><i class="bi bi-cart-check me-2"></i> จัดการออเดอร์</a>
                <a href="customers.php" class="sidebar-link active"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a>
                <hr>
                <a href="logout.php" class="sidebar-link text-danger"><i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold m-0" style="color: #444;">รายชื่อลูกค้า</h2>
                <span class="text-muted">ข้อมูลสมาชิกทั้งหมด</span>
            </div>

            <div class="card card-custom">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="py-3 px-4">ลูกค้า</th>
                                <th>อีเมล / เบอร์โทร</th>
                                <th>ที่อยู่</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // สมมติโครงสร้างตาราง customers
                            $sql = "SELECT * FROM customers ORDER BY c_id DESC";
                            $rs = mysqli_query($conn, $sql);
                            
                            while ($data = mysqli_fetch_array($rs)) {
                            ?>
                            <tr>
                                <td class="px-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle me-3">
                                            <i class="bi bi-person-heart"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold"><?php echo htmlspecialchars($data['c_name']); ?></div>
                                            <small class="text-muted">ID: <?php echo $data['c_id']; ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="small"><i class="bi bi-envelope me-1"></i> <?php echo htmlspecialchars($data['c_email']); ?></div>
                                    <div class="small"><i class="bi bi-telephone me-1"></i> <?php echo htmlspecialchars($data['c_tel']); ?></div>
                                </td>
                                <td class="small text-truncate" style="max-width: 200px;">
                                    <?php echo htmlspecialchars($data['c_address']); ?>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-link btn-action" type="button" data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                                            <li><a class="dropdown-item" href="edit_customer.php?id=<?php echo $data['c_id']; ?>"><i class="bi bi-pencil me-2"></i>แก้ไข</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="delete_customer.php?id=<?php echo $data['c_id']; ?>" onclick="return confirm('ยืนยันการลบลูกค้ารายนี้?')"><i class="bi bi-trash me-2"></i>ลบข้อมูล</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>