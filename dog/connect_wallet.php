<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";     // Change if needed
$dbname = "your_database_name"; // Replace with your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $telegram = $_POST["telegram"];
    $wallet = $_POST["wallet"];

    $sql = "INSERT INTO users (telegram, wallet) VALUES ('$telegram', '$wallet')";

    if ($conn->query($sql) === TRUE) {
        header("Location: balance.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
