<?php
session_start();

// Retrieve and display entered address details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['postal_code'] = $_POST['postal_code'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm Delivery Address</title>
</head>
<body>

<h2>Confirm Delivery Address</h2>

<?php
if (isset($_SESSION['address']) && isset($_SESSION['city']) && isset($_SESSION['postal_code'])) {
    echo "<p>Address: " . $_SESSION['address'] . "</p>";
    echo "<p>City: " . $_SESSION['city'] . "</p>";
    echo "<p>Postal Code: " . $_SESSION['postal_code'] . "</p>";
    echo '<form action="save_address.php" method="post">';
    echo '<input type="submit" name="save" value="Save Address">';
    echo '</form>';
} else {
    echo "<p>No address details found.</p>";
}
?>

</body>
</html>