<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ชญาณี รุ่งนภากานต์ (ตังเม) - ฟอร์ม Bootstrap</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    /* ปรับแต่งเพิ่มเติมเล็กน้อย */
    .form-label {
        font-weight: bold;
    }
    .result-box {
        padding: 15px;
        margin-top: 20px;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        background-color: #f8f9fa;
    }
    .color-display {
        height: 25px;
        display: inline-block;
        width: 300px; /* ใช้ความกว้างเดียวกับโค้ดเดิม แต่ปรับให้เข้ากับ Bootstrap */
        border: 1px solid #ccc;
        border-radius: 0.25rem;
    }
</style>
</head>

<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h1 class="h4 mb-0">ฟอร์มรับข้อมูล - ชญาณี รุ่งนภากานต์ (ตังเม)</h1>
                </div>
                <div class="card-body">
                    
                    <form method="post" action="" class="needs-validation" novalidate>
                        
                        <div class="mb-3">
                            <label for="fullname" class="form-label">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fullname" name="fullname" autofocus required>
                            <div class="invalid-feedback">กรุณากรอกชื่อ-นามสกุล</div>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                            <div class="invalid-feedback">กรุณากรอกเบอร์โทรศัพท์</div>
                        </div>

                        <div class="mb-3">
                            <label for="height" class="form-label">ส่วนสูง (ซม.) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="height" name="height" min="100" max="200" required>
                            <div class="form-text">ต้องอยู่ระหว่าง 100 ถึง 200 ซม.</div>
                            <div class="invalid-feedback">กรุณากรอกส่วนสูงที่ถูกต้อง (100-200 ซม.)</div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">ที่อยู่</label>
                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="birthday" class="form-label">วันเดือนปีเกิด</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                        </div>
                        
                        <div class="mb-3">
                            <label for="color" class="form-label">สีที่ชอบ</label>
                            <input type="color" class="form-control form-control-color" id="color" name="color" value="#563d7c">
                        </div>

                        <div class="mb-3">
                            <label for="major" class="form-label">สาขาวิชา</label>
                            <select class="form-select" id="major" name="major">
                                <option value="การบัญชี">การบัญชี</option>
                                <option value="การตลาด">การตลาด</option>
                                <option value="การจัดการ">การจัดการ</option>
                                <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                            </select>
                        </div>

                        <hr>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <button type="submit" name="Submit" class="btn btn-danger me-md-2">
                                <i class="bi bi-person-check-fill"></i> สมัครสมาชิก
                            </button>
                            <button type="reset" class="btn btn-warning text-dark me-md-2">
                                <i class="bi bi-x-octagon-fill"></i> ยกเลิก
                            </button>
                            <button type="button" onClick="window.location='https://www.msu.ac.th';" class="btn btn-info me-md-2">
                                Go To MSU
                            </button>
                            <button type="button" onMouseOver="alert('แน่ใจ??');" class="btn btn-secondary me-md-2">
                                Hello
                            </button>
                            <button type="button" onClick="window.print();" class="btn btn-outline-primary">
                                <i class="bi bi-printer-fill"></i> พิมพ์
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <?php
            if (isset($_POST['Submit'])) {
                $fullname = $_POST['fullname'];
                $phone = $_POST['phone'];
                $height = $_POST['height'];
                $address = $_POST['address'];
                $birthday = $_POST['birthday'];
                $color = $_POST['color'];
                $major = $_POST['major'];
				
				include_once("connectdb.php");
				
				$sql = "INSERT INTO register (r_id, r_name, r_phone, r_height, r_address, r_birthday, r_color, r_major) VALUES (NULL, '{$fullname}', '{$phone}', '{$height}', '{$address}', '{$birthday}', '{$color}', '{$major}');";
				mysqli_query($conn, $sql) or die ("insert ไม่ได้");
				
				echo "<script>";
				echo "alert('บันทึกข้อมูลสำเร็จ');";
				echo "</script>";
				        
            }
            ?>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
// ตัวอย่างการเปิดใช้งานการตรวจสอบความถูกต้องของฟอร์มของ Bootstrap
(function () {
  'use strict'

  // ดึงแบบฟอร์มทั้งหมดที่เราต้องการใช้การตรวจสอบแบบกำหนดเองของ Bootstrap
  var forms = document.querySelectorAll('.needs-validation')

  // วนซ้ำและป้องกันการส่ง (ถ้าไม่ถูกต้อง)
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</body>
</html>