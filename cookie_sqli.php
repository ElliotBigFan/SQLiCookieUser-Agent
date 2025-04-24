<?php
include 'config.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Ensure cookie is set and has a default value
if (!isset($_COOKIE['sessionID'])) {
    setcookie("sessionID", "guest", time() + 3600, "/");
    $sessionid = "guest"; // Default value
} else {
    $sessionid = $_COOKIE['sessionID'];
}

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