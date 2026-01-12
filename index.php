<?php
// RDS Database Configuration
$servername = "mytestdb.cj8maka4e96b.us-west-2.rds.amazonaws.com";
$db_username = "mytestdb";
$db_password = "mytestdb";
$dbname = "mytestdb";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL Query
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Successful Login
        echo "
        <html>
        <head>
            <title>Welcome</title>
            <style>
                body {
                    font-family: Arial;
                    background: linear-gradient(135deg, #e8f0ff, #f7fbff);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
                .box {
                    background: white;
                    padding: 40px;
                    border-radius: 12px;
                    box-shadow: 0 12px 35px rgba(31, 115, 183, 0.2);
                    text-align: center;
                }
                h2 {
                    color: #1f73b7;
                }
            </style>
        </head>
        <body>
            <div class='box'>
                <h2>Welcome, $username 🎉</h2>
                <p>Login Successful</p>
                <p>AWS EC2 • RDS • Jenkins • DevOps</p>
            </div>
        </body>
        </html>";
    } else {
        echo "<h3 style='color:red;text-align:center;'>Invalid Username or Password</h3>";
    }
}

$conn->close();
?>
