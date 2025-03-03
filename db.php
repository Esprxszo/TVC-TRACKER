<?php
$servername = "localhost"; // โฮสต์ของฐานข้อมูล (ปกติเป็น localhost)
$username = "root"; // ชื่อผู้ใช้ MySQL
$password = ""; // รหัสผ่าน MySQL (ถ้าใช้ XAMPP/MAMP ส่วนใหญ่จะว่าง)
$dbname = "club_system"; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบว่าการเชื่อมต่อสำเร็จหรือไม่
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

// ตั้งค่าภาษาให้รองรับภาษาไทย
mysqli_set_charset($conn, "utf8");
?>
