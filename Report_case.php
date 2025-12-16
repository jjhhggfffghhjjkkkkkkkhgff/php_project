<?php
include  'connection.php';
if ($conn){
    echo "Connection Successful";
}


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $type       = $_POST['type'];
    $location   = $_POST['location'];
    $date       = $_POST['date'];
    $file       = $_POST['file'];
    $description = $_POST['description'];

    // Handle file upload
    $evidence = "";
    if (($_FILES['evidence']['name'])) {
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $evidence = $targetDir . basename($_FILES["evidence"]["name"]);
        move_uploaded_file($_FILES["evidence"]["tmp_name"], $evidence);
    }

    // Insert into database
    $sql = "INSERT INTO report_case (name, email, type, location, date, file, description)
            VALUES ('$name', '$email', '$type', '$location', '$date', '$file', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Case submitted successfully!'); window.location.href='report_case.html';</script>";
    } else {
        echo "❌ Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>