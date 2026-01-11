<?php
session_start();

$host = "logindb.cj8maka4e96b.us-west-2.rds.amazonaws.com";
$user = "admin";
$pass = "admin123";
$db   = "logindb";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Database connection failed");
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $_SESSION['user'] = $username;
} else {
    echo "<h3 style='color:red'>Invalid Login</h3>";
    echo "<a href='index.html'>Go Back</a>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
<style>
body {
  background: linear-gradient(120deg,#43cea2,#185a9d);
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  font-family:Arial;
}
.card {
  background:white;
  padding:40px;
  border-radius:10px;
}
</style>
</head>
<body>

<div class="card">
<h1>Welcome Here 🎉</h1>
<p>Hello <b><?php echo $_SESSION['user']; ?></b></p>
</div>

</body>
</html>
