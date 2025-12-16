<?php
include "connection.php";
if ($conn){
    echo "Connection Successful";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $area = $_POST['area'];
    $availability = $_POST['availability'];
    $message  = $_POST['message'];

    $sql = "INSERT INTO volunteers (name, email, phone, preferred_area, availability, message)
            VALUES ('$name', '$email', '$phone', '$preferred', '$availability', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Thank you for volunteering! We will contact you soon.'); window.location.href='volunteer.php';</script>";
    } else {
        echo "❌ Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
