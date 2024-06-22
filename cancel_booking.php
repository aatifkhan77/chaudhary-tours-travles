<?php
session_start();
require 'conn.php'; // Adjust the path to your database connection file

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $booking_id = $_POST['booking_id'];

        // Check if the booking status is 'Pending'
        $sql = "SELECT status FROM booking WHERE booking_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $booking_id);
        $stmt->execute();
        $stmt->bind_result($status);
        $stmt->fetch();
        $stmt->close();

        if ($status === 'Pending') {
            // Update the booking status to 'Cancelled'
            $sql = "UPDATE booking SET status='Cancelled' WHERE booking_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $booking_id);
            if ($stmt->execute()) {
                echo "Booking cancelled successfully.";
            } else {
                echo "Error cancelling booking: " . $conn->error;
            }
            $stmt->close();
        } else {
            echo "Booking cannot be cancelled. Current status: " . $status;
        }
    }
} else {
    echo "You must be logged in to cancel a booking.";
}

// Close database connection
$conn->close();

// Redirect back to the bookings page (adjust the URL as needed)
header("Location: reservation.php");
exit();
?>
