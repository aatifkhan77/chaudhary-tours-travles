<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    // Redirect to the login page if the user is not logged in
    // header("Location: login.html");
    echo "<script>alert('Please Login before Booking!'); window.location='login.html';</script>";
    exit();
}

// Include database connection
include('conn.php');

// Fetch phone number for the logged-in user
$user_username = $_SESSION["user_username"]; // Assuming username is stored in session
$stmt_user = $conn->prepare("SELECT phone FROM users WHERE fullname = ?");
$stmt_user->bind_param("s", $user_username);
$stmt_user->execute();
$stmt_user->store_result();
$stmt_user->bind_result($phone);
$stmt_user->fetch();
$stmt_user->close();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind SQL statement to insert booking data
    $stmt = $conn->prepare("INSERT INTO booking (fullname, phone, car_type, pickup_location, drop_location, pickup_date, pickup_time, drop_date, drop_time, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')");

    // Bind parameters
    $stmt->bind_param("sssssssss", $fullname, $phone, $car_type, $pickup_location, $drop_location, $pickup_date, $pickup_time, $drop_date, $drop_time);

    // Set parameters
    $fullname = $_SESSION["user_username"]; // Assuming username is stored in session
    $car_type = $_POST["car_type"];
    $pickup_location = $_POST["pickup_location"];
    $drop_location = $_POST["drop_location"];
    // Format date inputs for MySQL (assuming the date format is Y-m-d)
    $pickup_date = date("Y-m-d", strtotime($_POST["pickup_date"]));
    $drop_date = date("Y-m-d", strtotime($_POST["drop_date"]));
    // Format time inputs for MySQL (assuming the time format is H:i:s)
    // $pickup_time = date("H:i:s", strtotime($_POST["pickup_time"]));
    // $drop_time = date("H:i:s", strtotime($_POST["drop_time"]));
    $pickup_time = $_POST["pickup_time"];
    $drop_time = $_POST["drop_time"];

    // Execute the statement
    if ($stmt->execute()) {
        // Booking successful, display success message
        // echo "<script>alert('Booking successful!');</script>";
        // // Redirect to a confirmation page
        // header("Location: index.php");
        echo "<script>alert('Booking successful!'); window.location='index.php';</script>";
        // exit();
        exit();
    } else {
        // Error in executing SQL statement
        echo "<script>alert('Error booking car. Please try again later.');</script>";
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>
