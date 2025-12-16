    <?php
include "connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['full_name'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (full_name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Your message has been sent successfully!'); window.location.href='contact.php';</script>";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}

$conn->close();

?>