<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $type       = $_POST['type'];
    $location   = $_POST['location'];
    $date       = $_POST['date'];
    $file   = $_POST['file'];
    $description  = $_POST['description'];
    $sql = "INSERT INTO report_case (name, email, type, location, date, filee , description ) 
            VALUES ('$name', '$email', '$type','$location', '$date', '$evidence', '$description', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "<h2 style='color:green; text-align:center;'>✅ Report submitted successfully!</h2>";
        echo "<p style='text-align:center;'><a href='show_reports.php'>View All Reports</a></p>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
