<?php
include "connection.php";
$sql = "SELECT * FROM lifestyle_monitoring ";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lifestyle Monitoring Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="container mt-5">

<h2 class="mb-4">📊 Lifestyle Monitoring Reports</h2>

<!-- Data Table -->
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Commute Mode</th>
            <th>Exercise</th>
            <th>Health Issue</th>
            <th>Waste Management</th>
            <th>Water Source</th>
            
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['commute']; ?></td>
                    <td><?= $row['exercise']; ?></td>
                    <td><?= $row['health_issue']; ?></td>
                    <td><?= $row['waste']; ?></td>
                    <td><?= $row['water']; ?></td>
                    
                </tr>
        <?php } } else { echo "<tr><td colspan='7'>No records found</td></tr>"; } ?>
    </tbody>
</table>

<a href="Monitoring_form.php" class="btn btn-primary mt-3">➕ New Entry</a>

<hr>

<!-- Charts Section -->
<div class="row mt-5">
    <div class="col-md-6">
        <canvas id="commuteChart"></canvas>
    </div>
    <div class="col-md-6">
        <canvas id="healthChart"></canvas>
    </div>
</div>

<?php
// Prepare data for charts
$commuteData = [];
$healthData = [];

$sqlCommute = "SELECT commute, COUNT(*) as total FROM lifestyle_monitoring GROUP BY commute";
$resCommute = $conn->query($sqlCommute);
while($row = $resCommute->fetch_assoc()) {
    $commuteData[$row['commute']] = $row['total'];
}

$sqlHealth = "SELECT health_issue, COUNT(*) as total FROM lifestyle_monitoring GROUP BY health_issue";
$resHealth = $conn->query($sqlHealth);
while($row = $resHealth->fetch_assoc()) {
    $healthData[$row['health_issue']] = $row['total'];
}

$conn->close();
?>

<script>
// Commute Data Chart
const commuteCtx = document.getElementById('commuteChart');
new Chart(commuteCtx, {
    type: 'pie',
    data: {
        labels: <?= json_encode(array_keys($commuteData)); ?>,
        datasets: [{
            label: 'Commute Mode',
            data: <?= json_encode(array_values($commuteData)); ?>,
            backgroundColor: ['#007bff','#28a745','#ffc107','#dc3545']
        }]
    }
});

// Health Issues Chart
const healthCtx = document.getElementById('healthChart');
new Chart(healthCtx, {
    type: 'bar',
    data: {
        labels: <?= json_encode(array_keys($healthData)); ?>,
        datasets: [{
            label: 'Reported Health Issues',
            data: <?= json_encode(array_values($healthData)); ?>,
            backgroundColor: 'rgba(255,99,132,0.7)'
        }]
    },
    options: {
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>

</body>
</html>
