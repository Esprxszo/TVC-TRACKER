<?php
// เริ่มต้นเซสชัน (ถ้าจำเป็น)
session_start();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TVC-TRACKER</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <main>
        <section class="banner">
            <img src="preview-page0.jpg" alt="Banner Image">
            <div class="banner-text">
                <h1>TVC-TRACKER</h1>
                <p>เช็คชื่อเข้าร่วมกิจกรรมชมรมวิชาชีพ</p>
            </div>
        </section>

        <div class="announcement">
            <button>ประกาศ</button>
            <div class="scrolling-text">
                <p>ขณะนี้เว็บไซต์ยังอยู่ในขั้นตอนของการพัฒนา [W.I.P]</p>
            </div>
            <button class="changelog-btn" onclick="openChangeLog()">ChangeLog</button>
        </div>
    
        <!-- ป๊อปอัปสำหรับ Change Log -->
        <div id="changelog-popup" class="popup-overlay">
            <div class="popup-content">
                <h2>-- ChangeLog Alpha 0.2 --</h2>
                <p>- ปรับปรุงหน้าเช็คชื่อรูปแบบใหม่</p>
                <p>- เพิ่มรายชื่อปี 3 ของทุกแผนก</p>
                <button onclick="closeChangeLog()">ปิด</button>
            </div>
        </div>
    
        <script>
            function openChangeLog() {
                document.getElementById('changelog-popup').style.display = 'flex';
            }
    
            function closeChangeLog() {
                document.getElementById('changelog-popup').style.display = 'none';
            }
        </script>
        
        <section class="products">
            <h2>MENU</h2>
            <div class="menu">
                <div class="card">
                    <img src="student5651.jpg" alt="icon">
                    <p>เช็ครายชื่อนักศึกษา</p>
                    <a href="panak.php">
                        <button>เริ่มต้นใช้งาน</button>
                    </a>
                </div>
                <div class="card">
                    <img src="pngtree-vector-resume-icon-png-image_927259.jpg" alt="icon">
                    <p>ประวัติการเช็คชื่อ</p>
                    <a href="CheckHistory.php">
                        <button>ตรวจสอบประวัติเช็คชื่อ</button>
                    </a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
