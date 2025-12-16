<?php
include "connection.php";
// Insert Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commute = $_POST['commute'];
    $exercise = $_POST['exercise'];
    $health = $_POST['health_issue'];
    $waste = $_POST['waste'];
    $water = $_POST['water'];
    
    $sql = "INSERT INTO lifestyle_monitoring(commute, exercise, health_issue, waste, water) 
            VALUES ('$commute', '$exercise', '$health', '$waste', '$water')";
    
    
   if ($conn->query($sql) === TRUE) {
        echo "<h3>Monitoring Saved Successfully!</h3>";
        echo "<a href='view_lifestyle.php'>View Report</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
