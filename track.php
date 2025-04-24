<?php
include 'config.php';

$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$cookie = $_SERVER['HTTP_COOKIE'] ?? '';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$sql = "INSERT INTO logs (useragent, cookie) VALUES ('$ua', '$cookie')";
$conn->query($sql);

echo "Thank you for visiting! Nothing to see here.";
?>
