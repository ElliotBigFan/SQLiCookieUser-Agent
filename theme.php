<?php
include 'config.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Đảm bảo User-Agent mặc định là 'default'
$ua = $_SERVER['HTTP_USER_AGENT'] ?? 'default';

// LỖ HỔNG SQLi tại đây
$sql = "SELECT * FROM themes WHERE name = '$ua'";
$res = $conn->query($sql);

echo "<h1>Theme Preview</h1>";

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        echo "<pre>" . print_r($row, true) . "</pre>";
    }
} else {
    echo "Your User-Agent is not found in the database. So we can't show you the theme." . "<br>";
    echo "<br>Try to change your User-Agent to 'default' or any other value.";
}
?>