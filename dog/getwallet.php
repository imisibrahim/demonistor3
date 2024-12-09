<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest connected wallet
$sql = "SELECT wallet_address FROM users WHERE wallet_address IS NOT NULL LIMIT 1";
$result = $conn->query($sql);

$response = array();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['connected'] = true;
    $response['wallet'] = $row['wallet_address'];
} else {
    $response['connected'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
