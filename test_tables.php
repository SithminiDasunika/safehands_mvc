<?php
$config = require 'config/Database.php';
$conn = new mysqli($config['host'], $config['username'], $config['password'], $config['database'], $config['port']);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$result = $conn->query("SHOW TABLES");
$tables = [];
while ($row = $result->fetch_array()) {
    $tables[] = $row[0];
}
echo implode("\n", $tables);
$conn->close();
?>
