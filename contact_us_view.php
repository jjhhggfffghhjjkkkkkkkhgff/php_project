<?php
include "connection.php";
$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $message  = $_POST['pollution_type'];
    
    $sql = "INSERT INTO contact_messages (name, email, message, created_at) 
         VALUES ('$name', '$email', '$message', NOW())";

    if ($conn->query($sql) === TRUE) {
        $message = "<div class='alert alert-success text-center'>✅ Message sended successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger text-center'>❌ Error: " . $conn->error . "</div>";
    }
}
// Fetch all reports
$result = $conn->query("SELECT * FROM contact_messages ");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Message List</title>
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
  <h2 class="text-center text-primary">Contact Messages Lists</h2>
  <?php echo $message; ?>

  <!-- Reports Table -->
  <h3 class="mt-5 text-success">📊 Submitted Messages</h3>
  <?php if ($result->num_rows > 0) { ?>
    <table class="table table-bordered table-striped mt-3">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
                   
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row["Id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["message"]; ?></td>
            
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } else { ?>
    <div class="alert alert-info mt-3">No reports submitted yet.</div>
  <?php } ?>
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

<?php $conn->close(); ?>
