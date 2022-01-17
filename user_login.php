<html>
<body><!-- style=" background-image: url(userlogin.png);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" -->

<?php 

session_start();

require "db.php";

if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 

$email=$_POST["emailid"];
$password=$_POST["password"];

$_SESSION["uemail"] = $email;

$query = mysqli_query($conn,"SELECT * FROM user WHERE user.email='".$email."' AND user.password='".$password."' ");

$temp1;

if($row = mysqli_fetch_array($query))
{
    header('location:user_page.php');
} else {
    echo "Wrong Email id or Password";
}

$conn->close(); 

?>

</body>
</html>
