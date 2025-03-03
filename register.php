<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // ตรวจสอบว่าชื่อผู้ใช้ซ้ำหรือไม่
    $check_sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $check_result = $stmt->get_result();

    if ($check_result->num_rows > 0) {
        $error = "❌ ชื่อผู้ใช้นี้มีอยู่แล้ว!";
    } else {
        $hashed_password = hash('sha256', $password);
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $hashed_password, $role);
        if ($stmt->execute()) {
            header("Location: login.php?success=register");
            exit();
        } else {
            $error = "❌ มีข้อผิดพลาดในการสมัครสมาชิก!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>สมัครสมาชิก</title>
</head>
<body>
    <h2>สมัครสมาชิก</h2>

    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>

    <form method="POST">
        <label>ชื่อผู้ใช้:</label>
        <input type="text" name="username" required>
        <br>
        <label>รหัสผ่าน:</label>
        <input type="password" name="password" required>
        <br>
        <label>เลือกบทบาท:</label>
        <select name="role">
            <option value="student">นักเรียน</option>
            <option value="teacher">ครู</option>
        </select>
        <br>
        <button type="submit">สมัครสมาชิก</button>
    </form>

    <p>มีบัญชีแล้ว? <a href="login.php">เข้าสู่ระบบ</a></p>
</body>
</html>
