<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data
$wallet_address = "";
if (isset($_GET['connected']) && $_GET['connected'] == "true") {
    $result = $conn->query("SELECT wallet_address FROM users ORDER BY id DESC LIMIT 1");
    $row = $result->fetch_assoc();
    if ($row) {
        $wallet_address = $row['wallet_address'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balance</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="balance-container">
        <h2><b>💸</b></h2>
        <br>
        <span id="balance">0</span> 💾 your total Save
        <br>
        <br>
        <h2><b><?php echo $wallet_address ? $wallet_address : "No Wallet Connected"; ?></b></h2>
        <br>
        <?php if ($wallet_address): ?>
            <button style="background-color: green; color: white;">CONNECTED</button>
        <?php else: ?>
            <a href="connect_wallet.html"><button>CONNECT WALLET</button></a>
        <?php endif; ?>
    </div>
</body>
</html>
