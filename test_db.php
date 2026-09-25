<?php
$config = require 'config/Database.php';
$conn = new mysqli($config['host'], $config['username'], $config['password'], $config['database'], $config['port']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully\n";

$sql = "CREATE TABLE IF NOT EXISTS password_resets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    otp VARCHAR(10) NOT NULL,
    expires_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table password_resets created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}
$conn->close();
?>
