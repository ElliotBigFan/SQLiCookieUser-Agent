<?php
// Login page for the admin panel
include 'config.php';
session_start(); // Đảm bảo session_start() được gọi ngay đầu file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $u, $p);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php"); // Chuyển hướng đến dashboard
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <input name="username" placeholder="Username"><br>
        <input name="password" placeholder="Password" type="password"><br>
        <button>Login</button>
    </form>

    <!-- Thêm các đường link -->
    <a href="cookie_sqli.php" target="_blank">Go to Cookie SQLi</a><br>
    <a href="theme.php" target="_blank">Go to Theme SQLi</a>
</body>
</html>