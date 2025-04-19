# 🗳️Real-time election (final-project)
โปรเจคจบปวช. ของผม เป็นเว็บไซต์เลือกตั้งประธานแผนกแบบเรียลไทม์ด้วย jquery  
ซึ่งผมพัฒณาขึ้นภายในระยะเวลาประมาน 2สัปดาห์ _(เพราะรีบซ้อมแข่งอีกโปรเจคนนึง)_ ตั้งแต่ออกแบบ ไปจนถึงเขียนหน้าเว็บ และจัดการฐานข้อมูลด้วยตัวคนเดียว เนื่องจากผมค่อนข้างรีบ โค้ดส่วนใหญ่จึงไม่ได้จัดระเบียบมากนัก และ **ไม่ได้เน้นความปลอดภัย** แต่ก็ยังสามารถใช้งานได้ตามวัตถุประสงค์หลัก

## ⚙️ เทคโนโลยีที่ใช้
- HTML, CSS, JavaScript
- PHP + MySQL (XAMPP)
- jQuery
- Bootstrap
- PhpSpreadsheet (นำเข้าข้อมูลนักเรียนจาก Excel)

## 🎯 ฟีเจอร์หลัก

- ผู้ดูแลระบบ
   - ล็อคอินใช้งาน
   - เปลี่ยนรหัสผ่าน
   - ดูผลโหวตแบบ real-time
   - กำหนดวัน เวลาโหวต
   - import ไฟล์รายชื่อนักเรียน (.xls, .xlsx)
   - เพิ่มนักเรียนเป็นผู้ลงสมัคร
- นักเรียน
  - ลงชื่อเข้าใช้ด้วยรหัสนักศึกษาและบัตรประชาชน
  - ดูลำดับคะแนน ผลโหวตแบบ real-time
  - ลงคะแนนโหวต
  - สรุปผลเมื่อหมดเวลา

## 📱ตัวอย่างหน้าจอ 
<p align="center">
  <img src="https://raw.githubusercontent.com/TeerapatSuksamang/election-final-project/refs/heads/main/ex-vote.gif" width="40%">
  &nbsp;
  <img src="https://raw.githubusercontent.com/TeerapatSuksamang/election-final-project/refs/heads/main/ex-vote.png" width="40.1%">
</p>


## 🛠️ การติดตั้งและใช้งานโปรเจค 


### ✅ ความต้องการเบื้องต้น (Requirements)

- PHP 7.4 ขึ้นไป
- Composer
- XAMPP (หรือโปรแกรม Web Server อื่นที่รัน PHP + MySQL ได้)
- เปิดใช้งาน `ext-zip` ใน `php.ini`

---

### 📦 วิธีติดตั้งโปรเจค

1. **Clone หรือดาวน์โหลดโปรเจค**
	```bash
   git clone https://github.com/your-username/your-repo-name.git
	```
	หรือดาวน์โหลด ZIP แล้วแตกไฟล์ไปไว้ในโฟลเดอร์ `htdocs` ของ XAMPP
	
2. ติดตั้ง Composer ในโปรเจค
	```bash
	composer install
	```
	ติดตั้ง php spreadsheet
	```bash
	composer require phpoffice/phpspreadsheet
	```
	อย่าลืมเปิดใช้งาน zip extention ที่ `\xampp\php\php.ini`
	ค้นหา ;extension=zip แล้วนำ ; ข้างหน้าออก

3. ตั้งค่าฐานข้อมูล
	- สร้างฐานข้อมูลชื่อ election
	- import ไฟล์ [election.sql](https://github.com/TeerapatSuksamang/election-final-project/blob/main/election.sql)
4. ✅เปิดใช้งานที่ ``http://localhost/election``

## ⚠️ หมายเหตุ

- **ยังไม่ได้จัดระเบียบโครงสร้างโปรเจคอย่างเป็นระบบ** 
- **ยังไม่มีการป้องกันความปลอดภัยที่เพียงพอ** เช่น SQL Injection
- โปรเจคนี้จัดทำขึ้นเพื่อการศึกษาและฝึกฝนเท่านั้น ไม่เหมาะสำหรับใช้งานจริงในระบบที่ต้องการความปลอดภัยสูง
