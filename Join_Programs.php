<?php
include "connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['full_name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone_number'];
    $program  = $_POST['preferred_program'];
   
    $sql = "INSERT INTO join_programs (full_name, email, phone_number, preferred_program)
            VALUES ('$name', '$email', '$phone', '$program')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Successfully joined the program!'); window.location.href='join_programs.php';</script>";
    } else {
        echo "❌ Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>