<?php
// Collect form data (not saved yet)
$name       = $_POST['full_name'];
$email      = $_POST['email'];
$type       = $_POST['pollution_type'];
$location   = $_POST['location'];
$date       = $_POST['date_of_incident'];
$evidence   = $_POST['upload_evidence'];
$desc       = $_POST['case_description'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preview Report</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="text-center text-success">Preview Your Report</h2>

  <table class="table table-bordered mt-4">
    <tr><th>Full Name</th><td><?php echo $name; ?></td></tr>
    <tr><th>Email</th><td><?php echo $email; ?></td></tr>
    <tr><th>Pollution Type</th><td><?php echo $type; ?></td></tr>
    <tr><th>Location</th><td><?php echo $location; ?></td></tr>
    <tr><th>Date of Incident</th><td><?php echo $date; ?></td></tr>
    <tr><th>Case Description</th><td><?php echo $desc; ?></td></tr>
  </table>

  <!-- Send data again for final save -->
  <form method="POST" action="Report_case.php">
    <input type="hidden" name="full_name" value="<?php echo $name; ?>">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="hidden" name="pollution_type" value="<?php echo $type; ?>">
    <input type="hidden" name="location" value="<?php echo $location; ?>">
    <input type="hidden" name="date_of_incident" value="<?php echo $location; ?>">
    <input type="hidden" name="case_description" value="<?php echo $desc; ?>">

    <div class="d-flex justify-content-between mt-3">
      <a href="Report_case.php" class="btn btn-secondary">Edit</a>
      <button type="submit" class="btn btn-success">Confirm & Submit</button>
    </div>
  </form>
</div>
</body>
</html>
