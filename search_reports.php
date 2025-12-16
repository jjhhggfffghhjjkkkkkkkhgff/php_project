<?php
include "connection.php";
$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM report_case 
            WHERE id LIKE '%$search%' 
            ";
} else {
    $sql = "SELECT * FROM report_case ";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Search Reports</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h2 class="text-primary">🔍 Search Pollution Reports</h2>

  <!-- Search Form -->
  <form method="POST" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Enter keyword (name, email, location...)" value="<?php echo $search; ?>">
    <button type="submit" class="btn btn-primary mt-2">Search</button>
  </form>

  <!-- Results -->
  <table class="table table-bordered table-striped">
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
      <?php if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["type"]; ?></td>
            <td><?php echo $row["location"]; ?></td>
            <td><?php echo $row["date"]; ?></td>
            <td><?php echo $row["file"]; ?></td>
            <td><?php echo $row["description"]; ?></td>       
          </tr>
        <?php }
      } else { ?>
        <tr><td colspan="7" class="text-center">No records found</td></tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
