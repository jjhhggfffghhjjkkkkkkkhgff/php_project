<?php
include "connection.php";
$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM join_programs 
            WHERE name LIKE '%$search%'
            OR email LIKE '%$search%'
            OR phone LIKE '%$search%'
            ";
} else {
    $sql = "SELECT * FROM join_programs";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Join Programs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS + JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

</head>
<body>
<div class="container mt-4">
  <h2 class="text-primary">🔍 Search Join Programs</h2>

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
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Preferred Program</th>
        
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['full_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td><?php echo $row['preffered_programs ']; ?></td>
          </tr>
        <?php }
      } else { ?>
        <tr><td colspan="5" class="text-center">No messages found</td></tr>
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
