<?php
include "connection.php";
$sql = "SELECT * FROM inspection ";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inspection Reports</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h2>Pollution Inspection Reports</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pollution Type</th>
            <th>Inspection Location</th>
            <th>Inspector Name</th>
            <th>Parameter</th>
            <th>Value</th>
            <th>Status</th>
            <th>Remarks</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['type']; ?></td>
                    <td><?= $row['location']; ?></td>
                    <td><?= $row['inspector_name']; ?></td>
                    <td><?= $row['parameter']; ?></td>
                    <td><?= $row['value']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['remarks']; ?></td>

                </tr>
        <?php } } else { echo "<tr><td colspan='9'>No records found</td></tr>"; } ?>
    </tbody>
</table>

<a href="inspection.php" class="btn btn-primary">New Inspection</a>

</body>
</html>
