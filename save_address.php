<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    // Retrieve address details from session
    $address = $_SESSION['address'];
    $city = $_SESSION['city'];
    $postal_code = $_SESSION['postal_code'];

    // Establish connection to your SQL database
    $servername = "localhost";
    $username = "username"; // Your MySQL username
    $password = "password"; // Your MySQL password
    $dbname = "delivery_db"; // Your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the table
    $sql = "INSERT INTO delivery_addresses (address, city, postal_code) VALUES ('$address', '$city', '$postal_code')";

    if ($conn->query($sql) === TRUE) {
        echo "Address saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: index.php");
    exit();
}
?>