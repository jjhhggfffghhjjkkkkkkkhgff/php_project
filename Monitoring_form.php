
<!DOCTYPE html>
<html>
<head>
  <title>Lifestyle Monitoring Form</title>
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
      h2{
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
          <li class="nav-item"><a class="nav-link " href="inspection.php">Inspection</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">Lifestyle Monitoring</a></li>
        </ul>        
      </div>
    </div>
  </nav>        

<h2>Human Lifestyle Monitoring</h2>
<form method="POST" action="save_lifestyle.php" class="p-3 border rounded">
  <label>Daily Commute Mode</label>
  <select name="commute" class="form-select mb-2">
    <option value="">Select</option>
    <option value="Walking">Walking</option>
    <option value="Cycling">Cycling</option>
    <option value="Public Transport">Public Transport</option>
    <option value="Private Vehicle">Private Vehicle</option>
  </select>

  <label>Physical Activity per Day</label>
  <input type="text" name="exercise" class="form-control mb-2" placeholder="e.g. 30 min walk">
  
  <label>Health Issues</label>
  <select name="health_issue" class="form-select mb-2">
    <option value="None">None</option>
    <option value="Cough">Cough</option>
    <option value="Asthma">Asthma</option>
    <option value="Breathing Difficulty">Breathing Difficulty</option>
  </select>

  <label>Waste Management</label>
  <select name="waste" class="form-select mb-2">
    <option value="">Select</option>
    <option value="Segregated">Segregated</option>
    <option value="Not Segregated">Not Segregated</option>
  </select>

  <label>Water Source</label>
  <select name="water" class="form-select mb-2">
    <option value="">Select</option>
    <option value="Filtered">Filtered</option>
    <option value="Bottled">Bottled</option>
    <option value="Tap">Tap</option>
  </select>

  <button type="submit" class="btn btn-primary">Submit Lifestyle Data</button>
</form>

</body>
</html>
