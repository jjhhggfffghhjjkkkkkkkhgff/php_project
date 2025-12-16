<?php
include 'connection.php';
$message="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT * FROM form WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

        if ($result->num_rows == 1) {
        $_SESSION['user'] = $email; // store user session
        header("Location: Dashboard.php");
        exit();
    } else {
        echo "<script>alert('❌ Invalid Email Mobile or Password');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pollution Control Report</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <style>
    body{
        border-radius:5px;
        color:green;
        background-color: #e5e7eb; 
        text-align: center;
        margin-top: 50px;
        text-underline-offset: 10px;
    }

    h1 {
            text-align: center;
            color: seagreen ;
        }
             h4 {
            text-align: center;
            color: black ;
        }
        
        .card { border-radius: 5px; background-color:#e5e7eb; padding: 15px; }


    input, textarea, select {
            width: 50%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            margin-top: 20px;
            background-color: #2c6e49;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }


   </style>
    </head>
   
    <body>
    <form>
        <div class="container mt-5" style="max-width:1000px;">
        <h1 class="text-center text-primary"><b>🌍 POLLUTION CONTROL</b></h1>
        <?php echo $message; ?>
        <form method="POST" action="">
        <h2> LOGIN</h2><br></br>
        <div class="mb-3">
         <label class="email"> Email</label>
         <input type="text" class="form-control" placeholder="Enter your email id" required>
        </div>
        <div class="mb-3">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password"><br></br>
        </div>
         

        <button id="loginbtn">Login</button><br></br>
        <b>New user</b> <a href="Index3.php">Register here</a>
        
    </div>
        
    </div>

    
    </form>
    <script>
    function loginUser(event) {
      event.preventDefault();
      
      // Dummy authentication (for demo only)
      const email = document.getElementById("email").value;
      const mobile_number = document.getElementById("mobile").value;
      const password = document.getElementById("password").value;

      if(email === "" && mobile_number === "" && password === "") {
        localStorage.setItem("loggedIn", "true"); // store session
        window.location.href = "Dashboard.html"; // redirect to dashboard
      } else {
        alert("Invalid login! Try again.");
      }
    }
    </script>

        
    </body>


</html>
