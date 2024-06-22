<?php
session_start(); // Start session to manage user login state

include('conn.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set
    if (isset($_POST["f-name"], $_POST["pass"])) {
        $email = $_POST["f-name"]; // For simplicity, I assume the email is used for login
        $password = $_POST["pass"];

        // Prepare and bind SQL statement
        $stmt = $conn->prepare("SELECT id, email, password, fullname FROM users WHERE email = ?");
        
        // Check for SQL statement preparation errors
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("s", $email);

            // Execute the statement
            if ($stmt->execute()) {
                // Bind result variables
                $stmt->bind_result($id, $dbEmail, $dbPassword,$username);

                // Fetch value
                if ($stmt->fetch()) {
                    // Verify password
                    if (password_verify($password, $dbPassword)) {
                        // Password is correct, create session variables
                        $_SESSION["user_id"] = $id;
                        $_SESSION["user_email"] = $dbEmail;
                        $_SESSION["user_username"] = $username;
                        $_SESSION["logged_in"] = true;
                        
                        // Redirect after successful login
                        header("Location: index.php");
                        exit(); // Make sure no more code execution happens after redirection
                    } else {
                        // Password is incorrect, display alert and redirect
                        echo "<script>alert('Incorrect password.'); window.location.href = 'login.html';</script>";
                        exit();
                    }
                } else {
                    // No matching user found, display alert and redirect
                    echo "<script>alert('User does not exist. Please register first.'); window.location.href = 'registration.html';</script>";
                    exit();
                }
            } else {
                // Error executing SQL statement
                echo "<script>alert('Error executing SQL statement: " . $stmt->error . "'); window.location.href = 'login.html';</script>";
                exit();
            }

            // Close statement
            $stmt->close();
        } else {
            // Error in preparing SQL statement
            echo "<script>alert('Unable to prepare SQL statement: " . $conn->error . "'); window.location.href = 'login.html';</script>";
            exit();
        }
    } else {
        // Missing form fields, display alert and redirect
        echo "<script>alert('Missing form fields'); window.location.href = 'login.html';</script>";
        exit();
    }
}

// Close database connection
$conn->close();
?>
