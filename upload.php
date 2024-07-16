<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orderdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize inputs
    $name = $_POST['name'];
    $number = $_POST['number'];
    $order_name = $_POST['order'];
    $additional_food = $_POST['additional_food'];
    $quantity = $_POST['quantity'];
    $datetime = $_POST['email'];
    $address = $_POST['address'];
    $message = $_POST['message'];

    // Construct the SQL query
    $sql = "INSERT INTO `order` (name, number, order_name, additional_food, quantity, email, address, message) 
            VALUES ('$name', '$number', '$order_name', '$additional_food', '$quantity', '$email', '$address', '$message')";

    // Execute the statement and check for errors
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("LOCATION:index.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>
