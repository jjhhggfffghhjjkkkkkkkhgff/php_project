<?php
include "connection.php";
$message="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name  = $_POST["name"];
$email = $_POST["email"];
$number  = $_POST["number"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$date = $_POST["date"];
$gender = $_POST["gender"];
$state = $_POST["state"];
$address = $_POST["address"];
$fileupload = $_POST["fileupload"]; 

$sql= "INSERT INTO form('name', 'email', 'number', 'password', 'cpassword', 'date', 'gender', 'state', 'address', 'fileupload')
        VALUES ('$name', '$email', $number', '$password', '$cpassword', '$date', '$gender', '$state', '$address', '$fileupload')";

 if (empty($name) || empty($email) || empty($number) || empty($password) || empty($cpassword) || empty($date) || empty($gender) || empty($state) || empty($address) || empty($file_upload)) {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format!'); window.history.back();</script>";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit;
    }

    // Check if email already exists
    $check_email = $conn->prepare("SELECT id FROM user WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists! Please login.'); window.location='INDEX2.php';</script>";
        exit;
    }

    // Hash password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Signup successful! You can now login.'); window.location='Index2.php';</script>";
    } else {
        echo "<script>alert('Error while signing up. Please try again.'); window.history.back();</script>";
    }

    // Close connections
    $stmt->close();
    $check_email->close();
    $conn->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Pollution Control- Register Page</title> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" ref="stylesheet">
        <style>
            body{
                border-radius:5px;
                color:green;
                background-color: #e5e7eb; 
                text-align: center;
                align-items: left;
                margin-top: 50px;
                text-underline-offset: 10px;
            }
            container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
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

        address{
            width: 40%;
        }
        
        #role{
            border:2px solid snow;
            border-radius: 5px;
            padding:10px;
            width:20%;
            color: whitesmoke;
        }

        #role select{
            border-radius: 5px;
            padding:5px;
        }

        #Gender{
            border:2px solid snow;
            border-radius: 5px;
            padding:5px;
            width:20%;
            color: whitesmoke;
        }

        #Gender select{
            border-radius: 5px;
            padding:5px;
        }

        #State{
            border:2px solid snow;
            border-radius: 5px;
            padding:5px;
            width:30%;
            color: whitesmoke;
        }

        #State select{
            border-radius: 5px;
            padding:5px;
        }   

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }

        input, textarea, select {
            width: 60%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 70px;
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
        <centre>
                <div class="container mt-5" >
                <h1 class="text-center text-primary"><b>🌍 POLLUTION CONTROL</b></h1>
                <?php echo $message; ?>
                <form method="POST" action="Index3.php">
                
                <h2> REGISTER</h2><br/>
                <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="name" name="name" id="name" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email id" required>
                </div>
                <div class="mb-3">
                <label class="form-label">Mobile Number</label>
                <input type="number" name="number" id="number" placeholder="Enter your mobile number" required>
                </div>
                <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password"><br></br>
                </div>
                <div class="mb-3">
                <label for="c_password">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
                </div>

                <div class="mb-3">
                <label for="date">Date of Birth</label>
                <input type="date" id="date" name="date">
                </div>
                <div class="mb-3">
                <label for="gender">Gender</label>
                <select id="gender"  name="gender" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Others</option>
                </select>
                </div>
                <div class="mb-3">
                <label for="state">State</label>
                <select id="state" name="state" required>
                    <option value="">Select</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Kerela">Kerela</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Andhra_Pradesh">Andhra Pradesh</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Hariyana">Hariyana</option>
                    <option value="Tamil_Nadu">Tamil Nadu</option>
                    <option value="Arunachal_Pradesh">Arunachal Pradesh</option>
                    <option value="Uttar_Pradesh">Uttar Pradesh</option>
                    <option value="Madhya_Pradesh">Madhya Pradesh</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Assam">Assam</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="West_Bengal">West Bengal</option>
                </select>
                </div>
                <div class= "mb-3">
                <label for="address">Address</label>
                <textarea rows="6"cols="60"name="address" id="address" placeholder="Your Address.....">
                </textarea>
                 </div>
                <label for="fileupload">Upload Your Photo</label>
                <input type="file" name="fileupload" id="fileupload" accept="documents/*"/><br></br>
            </div>
            <b>Already user</b> <a href="Index2.php">Login here</a></button><br></br>
             <button type="register">Register</button>
             <button type="reset">Reset</button><br></br>
            </form>
            </div>
            
                
        </centre>    
         
    </body>
    </html>