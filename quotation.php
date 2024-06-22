<?php
// Include database connection
include('conn.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $user_name = $_POST['rq_name'];
    $user_email = $_POST['rq_email'];
    $quotation_title = $_POST['rq_email_title'];
    $quotation_message = $_POST['rq_message'];
    
    // Insert data into the quotation table
    $sql = "INSERT INTO quotation (user_name, user_email, quotation_title, quotation_message,date) VALUES ('$user_name', '$user_email', '$quotation_title', '$quotation_message',NOW())";
    
    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully, show success alert
        echo "<script>alert('Quotation sent! We will contact you soon.');
              window.location.href = 'index.php';</script>";
    } else {
        // Error inserting data
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Close database connection
$conn->close();
?>
