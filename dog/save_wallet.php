<?php
// Database connection details
$host = 'localhost';
$dbname = 'wallet_db';  // Replace with your database name
$username = 'root';     // Replace with your MySQL username
$password = '';         // Replace with your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Get JSON data from the request
$data = json_decode(file_get_contents("php://input"), true);
$walletAddress = $data['address'] ?? '';

// Check if wallet address is provided
if (empty($walletAddress)) {
    echo json_encode(['status' => 'error', 'message' => 'Wallet address is missing']);
    exit;
}

// Insert the wallet address into the database
try {
    $stmt = $pdo->prepare("INSERT INTO wallets (address) VALUES (:address)");
    $stmt->bindParam(':address', $walletAddress);
    $stmt->execute();

    // Set the initial balance for the user (assuming 100 for now)
    $stmt = $pdo->prepare("UPDATE wallets SET balance = :balance WHERE address = :address");
    $stmt->bindParam(':address', $walletAddress);
    $stmt->bindParam(':balance', $balance);
    $balance = 100;  // Set initial balance
    $stmt->execute();

    echo json_encode(['status' => 'success', 'message' => 'Wallet address saved successfully']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to save wallet address']);
}
?>
