<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ชญาณี รุ่งนภากานต์ (ตังเม)</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-4">
    <div class="card shadow-lg">
        <div class="card-body">
            <h1 class="text-center mb-4 text-dark">ฟอร์มรับข้อมูล - ชญาณี รุ่งนภากานต์ (ตังเม) - ChatGPT</h1>

            <form method="post" action="">
                
                <div class="mb-3">
                    <label class="form-label">ชื่อ-นามสกุล *</label>
                    <input type="text" name="fullname" class="form-control" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label">เบอร์โทรศัพท์ *</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">ส่วนสูง (ซม.) *</label>
                    <input type="number" name="height" min="100" max="200" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">ที่อยู่</label>
                    <textarea name="address" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">วันเดือนปีเกิด</label>
                    <input type="date" name="birthday" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">สีที่ชอบ</label>
                    <input type="color" name="color" class="form-control form-control-color">
                </div>

                <div class="mb-4">
                    <label class="form-label">สาขาวิชา</label>
                    <select name="major" class="form-select">
                        <option value="การบัญชี">การบัญชี</option>
                        <option value="การตลาด">การตลาด</option>
                        <option value="การจัดการ">การจัดการ</option>
                        <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" name="Submit" class="btn btn-danger">สมัครสมาชิก</button>
                    <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                    <button type="button" class="btn btn-success" onClick="window.location='https://www.msu.ac.th';">Go To MSU</button>
                    <button type="button" class="btn btn-warning" onMouseOver="alert('แน่ใจ??');">Hello</button>
                    <button type="button" class="btn btn-dark" onClick="window.print();">พิมพ์</button>
                </div>

            </form>
        </div>
    </div>

    <hr class="my-4">

    <!-- ส่วนแสดงผล -->
    <div class="card p-3 shadow-sm">
    <?php
    if (isset($_POST['Submit'])) {
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $height = $_POST['height'];
        $address = $_POST['address'];
        $birthday = $_POST['birthday'];
        $color = $_POST['color'];
        $major = $_POST['major'];
        
        echo "<h4 class='text-primary'>ข้อมูลที่ส่งมา:</h4>";
        echo "<p><strong>ชื่อ-สกุล:</strong> {$fullname}</p>";
        echo "<p><strong>เบอร์โทรศัพท์:</strong> {$phone}</p>";
        echo "<p><strong>ส่วนสูง:</strong> {$height} ซม.</p>";
        echo "<p><strong>ที่อยู่:</strong> {$address}</p>";
        echo "<p><strong>วันเดือนปีเกิด:</strong> {$birthday}</p>";
        echo "<p><strong>สีที่ชอบ:</strong> <span style='background-color:{$color};padding:5px 20px;display:inline-block;border-radius:5px'></span> {$color}</p>";
        echo "<p><strong>สาขาวิชา:</strong> {$major}</p>";
    }
    ?>
    </div>

</div>

</body>
</html>
