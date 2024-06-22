<?php
include('conn.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO consultation (first_name, last_name, email, phone, message, status) VALUES (?, ?, ?, ?, ?, 0)");
    $stmt->bind_param("sssis", $first_name, $last_name, $email, $phone, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // If the record is created successfully, display an alert and redirect back to the form page
        echo "<script>
                alert('Thank you for your consultation request. We will contact you soon.');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
