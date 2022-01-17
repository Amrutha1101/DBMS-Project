<html>
<body><!-- style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
<div align="center"-->
<?php 
session_start();

require "db.php";

if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 

$email=$_POST["email"];
$password=$_POST["password"];

$query = mysqli_query($conn,"SELECT * FROM admin WHERE admin.email='".$email."' AND admin.password='".$password."' ");
if($row = mysqli_fetch_array($query))
{
    header('location:admin_page.php');
} else {
    echo "Wrong Email id or Password";
}


?>
<br><a href="index.html">Go to Home Page!!!</a>
</div>
</body>
</html>
