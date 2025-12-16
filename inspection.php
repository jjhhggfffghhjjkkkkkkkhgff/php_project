<?php
include "connection.php";
$message= "";
if ($conn){
    echo "Connection Successful";
}


// Capture form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$type = $_POST['type'];
$location = $_POST['location'];
$name = $_POST['inspector_name'];
$parameter = $_POST['parameter'];
$value = $_POST['value'];
$status = $_POST['status'];
$remarks = $_POST['remarks'];

// Insert into database
$sql = "INSERT INTO inspection (type, location, inspector_name, parameter, value, status, remarks) 
        VALUES ('$type', '$location', '$name', '$parameter', '$value', '$status', '$remarks')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Thank you, $name!  Your inspection has been sent.</h2>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pollution Control | Inspection Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body{
        background: url('https://images.unsplash.com/photo-1508780709619-79562169bc64?auto=format&fit=crop&w=1350&q=80');
      }
      form{
        background-color: rgba(255, 255, 255, 0.9);
        margin: 100px;
      }
      h1{
        color: white;
        text-shadow: 2px 2px 4px #000000;
        text-align: center;
      }
    </style>

</head>
<body class="container mt-5">

 <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="Dashboard.html">🌍Pollution Control</a>
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link " href="Home_Page.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="About_us.html">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="Contact_us.html">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="Monitoring_form.php">Lifestyle Monitoring</a></li>
          <li class="nav-item"><a class="nav-link active" href="inspection.php">Inspection</a></li>
        </ul>        
      </div>
    </div>
  </nav>

<h1> INSPECTION </h1>
<?php echo $message; ?>
<form method="POST" action="save_inspection.php" class="p-3 border rounded">
  <label>Pollution Type</label>
  <select name="type" class="form-select mb-2" required>
    <option value="">-- Select --</option>
    <option value="Air">Air</option>
    <option value="Water">Water</option>
    <option value="Waste">Waste</option>
    <option value="Noise">Noise</option>
  </select>

  <input type="text" name="location" class="form-control mb-2" placeholder="Inspection Location" required>
  <input type="text" name="inspector_name" class="form-control mb-2" placeholder="Inspector Name" required>
  <input type="text" name="parameter" class="form-control mb-2" placeholder="Parameter (e.g. PM2.5, pH)" required>
  <input type="text" name="value" class="form-control mb-2" placeholder="Value (e.g. 40 µg/m³, 7.1)" required>

  <label>Status</label>
  <select name="status" class="form-select mb-2">
    <option value="">-- Select --</option>
    <option value="Safe">Safe</option>
    <option value="Warning">Warning</option>
    <option value="Critical">Critical</option>
  </select>

  <textarea name="remarks" class="form-control mb-2" placeholder="Remarks"></textarea>

  <button type="submit" class="btn btn-primary">Submit Inspection</button>
</form>

</body>
</html>
