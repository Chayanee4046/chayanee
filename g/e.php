<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>ชญาณี รุ่งนภากานต์ (ตังเม) - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f7f6; }
        .chart-container { position: relative; height: 300px; width: 100%; }
    </style>
</head>
<body>

<div class="container py-5">
    <h2 class="text-center mb-4">รายงานสรุปยอดขายแยกตามประเทศ</h2>
    <h3 class="text-center mb-4">ชญาณี รุ่งนภากานต์ (ตังเม)</h3>
    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <table class="table table-hover mt-2">
                        <thead class="table-light">
                            <tr>
                                <th>ประเทศ</th>
                                <th class="text-end">ยอดขาย</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include_once("connectdb.php");
                        $sql = "SELECT `p_country`, SUM(`p_amount`) AS total FROM `popsupermarket` GROUP BY `p_country` ORDER BY total DESC";
                        $rs = mysqli_query($conn, $sql);
                        
                        $countries = [];
                        $totals = [];
                        
                        while ($data = mysqli_fetch_array($rs)) {
                            $countries[] = $data['p_country'];
                            $totals[] = (float)$data['total'];
                        ?>
                            <tr>
                                <td><?php echo $data['p_country'];?></td>
                                <td class="text-end text-primary fw-bold"><?php echo number_format($data['total'], 0);?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">Bar Chart - ยอดขายแต่ละประเทศ</div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
            
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold">Pie Chart - สัดส่วนการขาย</div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // เตรียมข้อมูลจาก PHP สำหรับ JavaScript
    const labels = <?php echo json_encode($countries); ?>;
    const dataValues = <?php echo json_encode($totals); ?>;
    const colors = [
        'rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 
        'rgba(255, 206, 86, 0.7)', 'rgba(75, 192, 192, 0.7)', 
        'rgba(153, 102, 255, 0.7)', 'rgba(255, 159, 64, 0.7)'
    ];

    // 1. Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'ยอดขายรวม',
                data: dataValues,
                backgroundColor: colors,
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        }
    });

    // 2. Pie Chart
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: dataValues,
                backgroundColor: colors,
                hoverOffset: 10
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'right' }
            }
        }
    });
</script>

</body>
</html>