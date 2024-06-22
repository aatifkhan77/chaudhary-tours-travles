<?php
include('conn.php'); // Include the database connection file

// Check if form fields are set
if (isset($_POST["f-name"], $_POST["email"], $_POST["phone"], $_POST["pass"])) {
    $fullName = $_POST["f-name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = password_hash($_POST["pass"], PASSWORD_DEFAULT); // Hash the password

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, phone, password) VALUES (?, ?, ?, ?)");
    
    // Check if the statement preparation was successful
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ssss", $fullName, $email, $phone, $password);

        // Execute the statement
        if ($stmt->execute()) {
            // Registration successful
            $response = array("success" => true, "message" => "Registration successful!");
            
            // Close statement
            $stmt->close();

            // Close database connection
            $conn->close();

            // Return response as JSON
            echo json_encode($response);

            // Show alert
            echo "<script>alert('Registration successful!'); window.location.href='login.html';</script>";
            exit(); // Make sure no more code execution happens after redirection
        } else {
            // Registration failed
            $response = array("success" => false, "error" => "Unable to execute SQL statement");
        }

        // Close statement
        $stmt->close();
    } else {
        // Error in preparing SQL statement
        $response = array("success" => false, "error" => "Unable to prepare SQL statement");
    }
} else {
    // Missing form fields
    $response = array("success" => false, "error" => "Missing form fields");
}

// Close database connection
$conn->close();

// Return response as JSON
echo json_encode($response);
?>
