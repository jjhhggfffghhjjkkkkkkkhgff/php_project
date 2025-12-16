<?php
include "connection.php";
// Insert Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $location = $_POST['location'];
    $name = $_POST['inspector_name'];
    $parameter = $_POST['parameter'];
    $value = $_POST['value'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];

    $sql = "INSERT INTO inspection (type, location, inspector_name, parameter, value, status, remarks) 
            VALUES ('$type', '$location', '$name', '$parameter', '$value', '$status', '$remarks')";
    
    
    if ($conn->query($sql) === TRUE) {
        echo "<h3>Inspection Saved Successfully!</h3>";
        echo "<a href='view_report.php'>View Report</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
