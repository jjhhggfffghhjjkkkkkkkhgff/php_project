<?php
include "connection.php";
$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM volunteers 
            WHERE name LIKE '%$search%'
               OR email LIKE '%$search%'
               OR phone LIKE '%$search%'
             ";
} else {
    $sql = "SELECT * FROM volunteer ";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Volunteers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- jQuery + DataTables + Buttons -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
  
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  
  <!-- Buttons scripts -->
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


</head>
<body>
<div class="container mt-4">
  <h2 class="text-primary">🔍 Search Volunteers</h2>

  <!-- Search Form -->
  <form method="POST" class="mb-3 d-flex">
    <input type="text" name="search" class="form-control me-2" 
           placeholder="Search by name, email, phone, ..." 
           value="<?php echo $search; ?>">
    <button type="submit" class="btn btn-success">Search</button>
  </form>

  <!-- Volunteers Table -->
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Preferred Volunteering Area</th>
        <th>Availability</th>
        <th>Messages</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['preferred_area']; ?></td>
            <td><?php echo $row['availability']; ?></td>
            <td><?php echo $row['message']; ?></td>
          </tr>
        <?php }
      } else { ?>
        <tr><td colspan="7" class="text-center">No volunteers found</td></tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script>
$('#volunteerTable').DataTable({
  dom: '<"d-flex justify-content-between mb-2"Bf>rtip',
  buttons: [
    { extend: 'copy', text: '📋 Copy' },
    { extend: 'excelHtml5', text: '📊 Excel' },
    { extend: 'pdfHtml5', text: '📄 PDF' },
    { extend: 'print', text: '🖨️ Print' },
    { extend: 'colvis', text: '👁️ Show/Hide Columns' } // extra option
  ]
});
</script>

</body>
</html>
