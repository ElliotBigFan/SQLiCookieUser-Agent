<?php
session_start();
if (!isset($_SESSION['admin'])) die("No access.");

echo "<h1>Welcome, admin!</h1>";
echo "<h3>FLAG: " . file_get_contents("flag.txt") . "</h3>";
?>
