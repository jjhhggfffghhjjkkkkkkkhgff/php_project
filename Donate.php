<?php
include "connection.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['full_name'];
    $email    = $_POST['email'];
    $amount   = $_POST['donation_amount'];
    $method   = $_POST['payment_method'];
    $message  = $_POST['message'];

    $sql = "INSERT INTO deposit (full_name, email, donation_amount, payment_method, message)
            VALUES ('$name', '$email', '$amount', '$method', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Thank you for your donation!'); window.location.href='donate.php';</script>";
    } else {
        echo "❌ Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

