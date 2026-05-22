# ระบบรับสมัครงาน (Job Application System)

โปรเจกต์ระบบรับสมัครงาน พัฒนาด้วย Laravel

---

# ฟังก์ชันหลัก

## ฝั่งผู้สมัคร

- สมัครงานผ่านฟอร์มออนไลน์
- อัปโหลด Resume และ Transcript
- เลือกแผนกที่ต้องการสมัคร

---

## ฝั่ง Admin

- Login เข้าระบบ
- Dashboard แสดงสถิติ
- จัดการแผนก (เพิ่ม / แก้ไข / ลบ)
- ดูข้อมูลผู้สมัคร
- ค้นหา / Filter ตามแผนก
- เปลี่ยนสถานะผู้สมัคร
- Print ใบสมัคร A4
- ลบข้อมูลผู้สมัคร

---

# เทคโนโลยีที่ใช้

- Laravel 12
- PHP 8.2
- MySQL
- Bootstrap 5

---

# วิธีติดตั้งโปรเจกต์

## 1. Clone Project

```bash
git clone https://github.com/Aiwwezz/job-application-system.git
```

---

## 2. เข้าโฟลเดอร์โปรเจกต์

```bash
cd job-application-system
```

---

## 3. ติดตั้ง Package

```bash
composer install
```

---

## 4. สร้างไฟล์ .env

```bash
copy .env.example .env
```

---

## 5. Generate Key

```bash
php artisan key:generate
```

---

## 6. ตั้งค่าฐานข้อมูล

เปิดไฟล์ `.env`

แก้:

```env
DB_DATABASE=job_application_db
DB_USERNAME=root
DB_PASSWORD=
```

---

## 7. Import Database

Import ไฟล์ SQL ผ่าน phpMyAdmin

---

## 8. รันระบบ

```bash
php artisan serve
```

---

# URL การใช้งาน

## สมัครงาน

```text
/apply
```

## Login Admin

```text
/login
```

## Dashboard

```text
/dashboard
```

---

# ระบบความปลอดภัย

- CSRF Protection
- SQL Injection Protection
- Validation Input
- จำกัดไฟล์ PDF
- จำกัดขนาดไฟล์
- Auth Middleware

---

# ผู้จัดทำ

Kittipich Chaisongmueang