<?php
    include_once("check_login.php");
    include_once("connectdb.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ - ชญาณี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        body { background-color: #f7fffb; font-family: 'Sarabun', sans-serif; }
        .navbar { background-color: #98ffca !important; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .card-order { border: none; border-radius: 20px; background: white; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; }
        .table thead { background-color: #ffdeeb; color: #613643; }
        
        /* Badge Styles */
        .badge-pending { background-color: #ffdeeb; color: #ff85a1; } /* Pastel Pink */
        .badge-shipped { background-color: #98ffca; color: #2d5a44; } /* Mint Green */
        
        .sidebar-link { text-decoration: none; color: #666; padding: 10px 15px; display: block; border-radius: 10px; transition: 0.3s; }
        .sidebar-link:hover, .sidebar-link.active { background-color: #ffdeeb; color: #ff85a1; }
        .btn-view { color: #8e94f2; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php">CHAYANEE ADMIN</a>
        <span class="navbar-text d-none d-md-inline">
             <i class="bi bi-person-circle"></i> <strong><?php echo htmlspecialchars($_SESSION['aname']); ?></strong>
        </span>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card card-order p-3 border-0">
                <h5 class="fw-bold mb-3 px-3">เมนูแอดมิน</h5>
                <a href="products.php" class="sidebar-link"><i class="bi bi-box-seam me-2"></i> จัดการสินค้า</a>
                <a href="orders.php" class="sidebar-link active"><i class="bi bi-cart-check me-2"></i> จัดการออเดอร์</a>
                <a href="customers.php" class="sidebar-link"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a>
                <hr>
                <a href="logout.php" class="sidebar-link text-danger"><i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold m-0" style="color: #444;">รายการใบสั่งซื้อ</h2>
                <div class="badge rounded-pill badge-pending px-3 py-2">มีออเดอร์ใหม่วันนี้</div>
            </div>

            <div class="card card-order">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="py-3 px-4">เลขที่ออเดอร์</th>
                                <th>ลูกค้า</th>
                                <th>วันที่สั่ง</th>
                                <th>ยอดสุทธิ</th>
                                <th>สถานะ</th>
                                <th class="text-center">รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // ตัวอย่างการดึงข้อมูล Order (สมมติโครงสร้างตาราง orders)
                            $sql = "SELECT * FROM orders ORDER BY o_id DESC";
                            $rs = mysqli_query($conn, $sql);
                            
                            while ($data = mysqli_fetch_array($rs)) {
                                // เช็คสถานะเพื่อเปลี่ยนสี Badge
                                $status_class = ($data['o_status'] == 'shipped') ? 'badge-shipped' : 'badge-pending';
                                $status_text = ($data['o_status'] == 'shipped') ? 'ส่งแล้ว' : 'รอตรวจสอบ';
                            ?>
                            <tr>
                                <td class="px-4 fw-bold">#ORD-<?php echo str_pad($data['o_id'], 5, '0', STR_PAD_LEFT); ?></td>
                                <td><?php echo htmlspecialchars($data['o_customer_name']); ?></td>
                                <td class="small text-muted"><?php echo date('d/m/Y H:i', strtotime($data['o_date'])); ?></td>
                                <td class="fw-bold text-success">฿<?php echo number_format($data['o_total'], 2); ?></td>
                                <td>
                                    <span class="badge rounded-pill <?php echo $status_class; ?>">
                                        <?php echo $status_text; ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="order_detail.php?id=<?php echo $data['o_id']; ?>" class="btn btn-sm btn-view">
                                        <i class="bi bi-search"></i> ดูข้อมูล
                                    </a>
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