<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard ยอดขายรายเดือน - ชญาณี</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f8f9fa; }
        .card { border: none; border-radius: 12px; transition: 0.3s; }
        .card:hover { box-shadow: 0 8px 16px rgba(0,0,0,0.1); }
        .chart-container { position: relative; height: 260px; width: 100%; }
        .table-v-center td { vertical-align: middle; }
    </style>
</head>
<body>

<div class="container py-4">
    <h3 class="mb-4 text-dark fw-bold border-start border-primary border-4 ps-3">ชญาณี รุ่งนภากานต์ (ตังเม)</h3>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary">สรุปยอดขายรายเดือน</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-v-center mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3">เดือนที่</th>
                                    <th class="text-end pe-3">ยอดขาย</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include_once("connectdb.php");
                            $sql = "SELECT MONTH(p_date) AS Month, SUM(p_amount) AS Total_Sales FROM popsupermarket GROUP BY MONTH(p_date) ORDER BY Month";
                            $rs = mysqli_query($conn, $sql);
                            
                            $months = [];
                            $sales = [];
                            
                            while ($data = mysqli_fetch_array($rs)) {
                                $month_name = "เดือน " . $data['Month']; // ปรับชื่อเดือนให้สวยงาม
                                $months[] = $month_name;
                                $sales[] = (float)$data['Total_Sales'];
                            ?>
                                <tr>
                                    <td class="ps-3"><?php echo $month_name; ?></td>
                                    <td class="text-end pe-3 fw-bold text-success"><?php echo number_format($data['Total_Sales'], 0); ?></td>
                                </tr>
                            <?php } mysqli_close($conn); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">เปรียบเทียบยอดขาย (Bar)</h6>
                            <div class="chart-container">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">สัดส่วนรายเดือน (Doughnut)</h6>
                            <div class="chart-container">
                                <canvas id="doughnutChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = <?php echo json_encode($months); ?>;
    const dataSales = <?php echo json_encode($sales); ?>;
    
    // กำหนดสีให้ดูทันสมัย
    const chartColors = [
        '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796'
    ];

    // 1. Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'ยอดขาย',
                data: dataSales,
                backgroundColor: '#4e73df',
                borderRadius: 5
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    // 2. Doughnut Chart
    new Chart(document.getElementById('doughnutChart'), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: dataSales,
                backgroundColor: chartColors,
                hoverOffset: 15
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 11 } } }
            },
            cutout: '65%' // ปรับรูตรงกลางให้ดูทันสมัย
        }
    });
</script>

</body>
</html>