<?php
session_start();
require 'conn.php'; // Adjust the path to your database connection file

require 'vendor/autoload.php'; // Path to the Composer autoload file

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $booking_id = $_POST['booking_id'];

        // Fetch booking details
        $sql = "SELECT * FROM booking WHERE booking_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $booking_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $booking = $result->fetch_assoc();

            // Create new PDF document
            $pdf = new TCPDF();
            $pdf->AddPage();

            // Set title
            $pdf->SetTitle('Booking Receipt');

            // Add booking details
            $html = "
            <h1>Booking Receipt</h1>
            <p><strong>Booking ID:</strong> " . $booking['booking_id'] . "</p>
            <p><strong>Full Name:</strong> " . $booking['fullname'] . "</p>
            <p><strong>Car Type:</strong> " . $booking['car_type'] . "</p>
            <p><strong>Pickup Location:</strong> " . $booking['pickup_location'] . "</p>
            <p><strong>Drop Off Location:</strong> " . $booking['drop_location'] . "</p>
            <p><strong>Pickup Date and Time:</strong> " . $booking['pickup_date'] . " " . $booking['pickup_time'] . "</p>
            <p><strong>Drop Off Date and Time:</strong> " . $booking['drop_date'] . " " . $booking['drop_time'] . "</p>
            <p><strong>Status:</strong> " . $booking['status'] . "</p>";

            // Print text using writeHTMLCell()
            $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

            // Close and output PDF document
            $pdf->Output('booking_receipt_' . $booking_id . '.pdf', 'I');
        } else {
            echo "No booking found with ID: " . $booking_id;
        }
        $stmt->close();
    }
} else {
    echo "You must be logged in to print a receipt.";
}

// Close database connection
$conn->close();
?>
