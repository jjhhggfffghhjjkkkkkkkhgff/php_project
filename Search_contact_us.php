<?php
include "connection.php";
$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM contact_messages 
            WHERE name LIKE '%$search%'
            OR email LIKE '%$search%'
            ";
} else {
    $sql = "SELECT * FROM contact_messages";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Contact Messages</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h2 class="text-primary">🔍 Search Contact Messages</h2>

  <!-- Search Form -->
  <form method="POST" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Search by name, email, ..." value="<?php echo $search; ?>">
    <button type="submit" class="btn btn-success mt-2">Search</button>
  </form>

  <!-- Results Table -->
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['Id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['message']; ?></td>
          </tr>
        <?php }
      } else { ?>
        <tr><td colspan="6" class="text-center">No messages found</td></tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
