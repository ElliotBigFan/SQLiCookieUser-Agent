<?php
include 'config.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Đảm bảo cookie 'sessionID' mặc định là 'guest'
if (!isset($_COOKIE['sessionID'])) {
    setcookie("sessionID", "guest", time() + 3600, "/");
    $sessionid = "guest"; // Sử dụng giá trị mặc định ngay lập tức
} else {
    $sessionid = $_COOKIE['sessionID'];
}

// LỖ HỔNG SQLi
$sql = "SELECT username FROM users WHERE cookie = '$sessionid'";
$res = $conn->query($sql);

echo "<h1>User Lookup</h1>";
echo "<br>";
echo "Dump all users with sessionID = '$sessionid' <br>";

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        echo "<pre>" . print_r($row, true) . "</pre>";
    }
} else {
    echo "No user found.";
}
echo "<br>";
?>