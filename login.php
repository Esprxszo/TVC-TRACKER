<?php
session_start();
include("db.php");

// กดปุ่มล็อกอิน
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit();
    } else {
        $error = "❌ ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบ</title>
</head>
<body>
    <h2>เข้าสู่ระบบ</h2>

    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>

    <form method="POST">
        <label>ชื่อผู้ใช้:</label>
        <input type="text" name="username" required>
        <br>
        <label>รหัสผ่าน:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="login">ล็อกอิน</button>
    </form>

    <p>ยังไม่มีบัญชี? <a href="register.php">สมัครสมาชิก</a></p>
</body>
</html>
