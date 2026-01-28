<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มใบสมัครงาน - CreativeTech Solutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            max-width: 900px; /* กำหนดความกว้างสูงสุดของฟอร์ม */
            padding-top: 20px;
            padding-bottom: 50px;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h1 class="h3 mb-0">ใบสมัครงาน</h1>
            <p class="mb-0">บริษัท CreativeTech Solutions Co., Ltd.</p>
            <p class="mb-0">ชญาณี รุ่งนภากานต์ (ตังเม)</p>
        </div>
        <div class="card-body p-4">

            <form class="row g-3 needs-validation" novalidate 
                  method="post" 
                  action="f.php" 
                  enctype="multipart/form-data">

                <h4 class="mt-4 border-bottom pb-2 text-primary">ส่วนที่ 1: ข้อมูลตำแหน่งงานและส่วนตัว</h4>

                <div class="col-md-6">
                    <label for="jobPosition" class="form-label">ตำแหน่งที่ต้องการสมัคร <span class="text-danger">*</span></label>
                    <select class="form-select" id="jobPosition" name="jobPosition" required>
                        <option selected disabled value="">เลือกตำแหน่ง...</option>
                        <option value="Software_Engineer">Software Engineer</option>
                        <option value="UI_UX_Designer">UI/UX Designer</option>
                        <option value="Digital_Marketing">Digital Marketing Specialist</option>
                        <option value="Data_Analyst">Data Analyst</option>
                    </select>
                    <div class="invalid-feedback">กรุณาเลือกตำแหน่งที่ต้องการสมัคร</div>
                </div>

                <div class="col-md-2">
                    <label for="prefix" class="form-label">คำนำหน้า <span class="text-danger">*</span></label>
                    <select class="form-select" id="prefix" name="prefix" required>
                        <option selected disabled value="">เลือก...</option>
                        <option value="นาย">นาย</option>
                        <option value="นาง">นาง</option>
                        <option value="นางสาว">นางสาว</option>
                        <option value="อื่นๆ">อื่นๆ</option>
                    </select>
                    <div class="invalid-feedback">กรุณาเลือกคำนำหน้า</div>
                </div>

                <div class="col-md-4">
                    <label for="firstName" class="form-label">ชื่อ (ภาษาไทย) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required pattern="[ก-๙เ\s]+">
                    <div class="invalid-feedback">กรุณากรอกชื่อจริง (ภาษาไทย)</div>
                </div>

                <div class="col-md-6">
                    <label for="lastName" class="form-label">นามสกุล (ภาษาไทย) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required pattern="[ก-๙เ\s]+">
                    <div class="invalid-feedback">กรุณากรอกนามสกุล (ภาษาไทย)</div>
                </div>

                <div class="col-md-3">
                    <label for="birthDate" class="form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="birthDate" name="birthDate" required>
                    <div class="invalid-feedback">กรุณาระบุวันเดือนปีเกิด</div>
                </div>

                <div class="col-md-3">
                    <label for="phoneNumber" class="form-label">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required pattern="[0-9]{10}">
                    <div class="invalid-feedback">กรุณากรอกเบอร์โทรศัพท์ 10 หลัก</div>
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">อีเมล <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="name@example.com">
                    <div class="invalid-feedback">กรุณากรอกอีเมลที่ถูกต้อง</div>
                </div>

                <h4 class="mt-4 border-bottom pb-2 text-primary">ส่วนที่ 2: ข้อมูลการศึกษา</h4>

                <div class="col-md-4">
                    <label for="educationLevel" class="form-label">ระดับการศึกษาสูงสุด <span class="text-danger">*</span></label>
                    <select class="form-select" id="educationLevel" name="educationLevel" required>
                        <option selected disabled value="">เลือก...</option>
                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                        <option value="ปริญญาโท">ปริญญาโท</option>
                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                        <option value="อื่นๆ">อื่นๆ</option>
                    </select>
                    <div class="invalid-feedback">กรุณาเลือกระดับการศึกษาสูงสุด</div>
                </div>

                <div class="col-md-8">
                    <label for="institutionName" class="form-label">ชื่อสถาบัน/มหาวิทยาลัย <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="institutionName" name="institutionName" required>
                    <div class="invalid-feedback">กรุณากรอกชื่อสถาบัน</div>
                </div>

                <div class="col-md-6">
                    <label for="faculty" class="form-label">คณะ/สาขาที่จบ</label>
                    <input type="text" class="form-control" id="faculty" name="faculty">
                </div>

                <div class="col-md-2">
                    <label for="gpa" class="form-label">เกรดเฉลี่ย</label>
                    <input type="number" step="0.01" min="0.00" max="4.00" class="form-control" id="gpa" name="gpa" placeholder="เช่น 3.50">
                </div>

                <h4 class="mt-4 border-bottom pb-2 text-primary">ส่วนที่ 3: ข้อมูลเพิ่มเติม</h4>

                <div class="col-12">
                    <label for="specialSkills" class="form-label">ความสามารถพิเศษ/ทักษะที่เกี่ยวข้อง</label>
                    <textarea class="form-control" id="specialSkills" name="specialSkills" rows="3" placeholder="เช่น ทักษะภาษาอังกฤษระดับดีมาก, เชี่ยวชาญโปรแกรม Adobe Creative Suite, ได้รับใบรับรอง PMP"></textarea>
                </div>

                <div class="col-12">
                    <label for="workExperience" class="form-label">ประสบการณ์ทำงานโดยย่อ (ถ้ามี)</label>
                    <textarea class="form-control" id="workExperience" name="workExperience" rows="4" placeholder="ระบุชื่อบริษัท ตำแหน่ง และระยะเวลาทำงานโดยย่อ (หากมีประสบการณ์)"></textarea>
                </div>

                <div class="col-12">
                    <label for="resumeFile" class="form-label">แนบ Resume/CV (PDF, DOCX เท่านั้น) <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="resumeFile" name="resumeFile" accept=".pdf, .docx" required>
                    <div class="invalid-feedback">กรุณาแนบไฟล์ Resume/CV</div>
                </div>

                <div class="col-12 mt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Yes" id="dataConsent" name="dataConsent" required>
                        <label class="form-check-label" for="dataConsent">
                            ข้าพเจ้าขอรับรองว่าข้อมูลข้างต้นเป็นความจริงทุกประการ
                        </label>
                        <div class="invalid-feedback">กรุณายืนยันความถูกต้องของข้อมูล</div>
                    </div>
                </div>

                <div class="col-12 text-center mt-4">
                    <button class="btn btn-primary btn-lg" type="submit">ส่งใบสมัคร</button>
                    <button class="btn btn-outline-secondary btn-lg" type="reset">รีเซ็ตข้อมูล</button>
                </div>

            </form>
        </div>
        <div class="card-footer text-muted text-center">
            บริษัท CreativeTech Solutions Co., Ltd. สงวนสิทธิ์ในการพิจารณาผู้สมัครที่ให้ข้อมูลครบถ้วนเท่านั้น
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
(() => {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
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