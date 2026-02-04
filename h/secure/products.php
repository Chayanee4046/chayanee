<?php
    include_once("check_login.php");
    include_once("connectdb.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการสินค้า - ชญาณี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f7fffb;
            font-family: 'Sarabun', sans-serif;
        }
        .navbar {
            background-color: #98ffca !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .card-table {
            border: none;
            border-radius: 20px;
            background: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .table thead {
            background-color: #ffdeeb; /* Pastel Pink Header */
            color: #613643;
        }
        .btn-add {
            background-color: #98ffca;
            border: none;
            color: #333;
            font-weight: bold;
        }
        .btn-add:hover {
            background-color: #7ae6b1;
        }
        .btn-edit { color: #ff85a1; }
        .btn-delete { color: #dc3545; }
        .sidebar-link {
            text-decoration: none;
            color: #666;
            padding: 10px 15px;
            display: block;
            border-radius: 10px;
            transition: 0.3s;
        }
        .sidebar-link:hover, .sidebar-link.active {
            background-color: #ffdeeb;
            color: #ff85a1;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php">CHAYANEE ADMIN</a>
        <span class="navbar-text">
             <i class="bi bi-person-circle"></i> <strong><?php echo htmlspecialchars($_SESSION['aname']); ?></strong>
        </span>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card card-table p-3">
                <h5 class="fw-bold mb-3 px-3">เมนูหลัก</h5>
                <a href="products.php" class="sidebar-link active"><i class="bi bi-box-seam me-2"></i> จัดการสินค้า</a>
                <a href="orders.php" class="sidebar-link"><i class="bi bi-cart-check me-2"></i> จัดการออเดอร์</a>
                <a href="customers.php" class="sidebar-link"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a>
                <hr>
                <a href="logout.php" class="sidebar-link text-danger"><i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold m-0" style="color: #444;">รายการสินค้า</h2>
                <a href="add_product.php" class="btn btn-add rounded-pill px-4 shadow-sm">
                    <i class="bi bi-plus-lg"></i> เพิ่มสินค้าใหม่
                </a>
            </div>

            <div class="card card-table">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="py-3 px-4">รูปภาพ</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคา</th>
                                <th>สต็อก</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // ตัวอย่างการดึงข้อมูลแบบปลอดภัย
                            $sql = "SELECT * FROM products ORDER BY p_id DESC";
                            $rs = mysqli_query($conn, $sql);
                            
                            while ($data = mysqli_fetch_array($rs)) {
                            ?>
                            <tr>
                                <td class="px-4">
                                    <img src="images/<?php echo $data['p_img']; ?>" width="50" class="rounded shadow-sm">
                                </td>
                                <td class="fw-bold"><?php echo htmlspecialchars($data['p_name']); ?></td>
                                <td><?php echo number_format($data['p_price'], 2); ?> บาท</td>
                                <td><?php echo $data['p_stock']; ?> ชิ้น</td>
                                <td class="text-center">
                                    <a href="edit_product.php?id=<?php echo $data['p_id']; ?>" class="btn btn-sm btn-edit"><i class="bi bi-pencil-square"></i></a>
                                    <a href="delete_product.php?id=<?php echo $data['p_id']; ?>" class="btn btn-sm btn-delete" onclick="return confirm('ยืนยันการลบสินค้า?')"><i class="bi bi-trash"></i></a>
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