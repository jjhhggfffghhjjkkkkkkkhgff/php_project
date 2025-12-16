<?php
include "connection.php";
// Fetch all reports
$sql = "SELECT id, full_name, email, pollution_type, location, date_of_incident, upload_evidence, case_description created_at FROM report_case ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reported Cases</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f9fbfd; }
    .container { margin-top: 40px; }
    h2 { color: rgb(21, 119, 64); margin-bottom: 20px; }
    table { background: #fff; box-shadow: 0px 4px 10px rgba(0,0,0,0.1); }
  </style>
</head>
<body>

<div class="container">
  <h2 class="text-center">📊 Reported Pollution Cases</h2>

 <?php if ($result->num_rows > 0) { ?>
    <table class="table table-bordered table-striped mt-3">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Type</th>
          <th>Location</th>
          <th>Date of Incident</th>
          <th>Upload Evidence</th>
          <th>Case Description</th>
          
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["full_name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["pollution_type"]; ?></td>
            <td><?php echo $row["location"]; ?></td>
            <td><?php echo $row["date_of_incident"]; ?></td>
            <td><?php echo $row["upload_evidence"]; ?></td>
            <td><?php echo $row["case_description"]; ?></td>
            
          </tr>
        <?php } ?>
      </tbody>
    </table> 
  <?php } else { ?>
    <div class="alert alert-info text-center">
      No reports submitted yet.
    </div>
  <?php } ?>
</div>

</body>
</html>

<?php $conn->close(); ?>
