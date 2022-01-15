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

$query = mysqli_query($conn,"SELECT * FROM user WHERE user.email='".$email."' AND user.password='".$password."' ");

$temp1;

if($row = mysqli_fetch_array($query))
{
 echo "Welcome ";
 $temp1=$row['email'];
 echo "$temp1";
 echo "<br><br>";

}

echo " <a href=\"index.html\">Home Page</a><br>";
echo " <a href=\"reserve_ticket.html\">Reserve Ticket</a><br>";
echo " <a href=\"cancel_ticket.html\">Cancel Ticket</a><br>";
$conn->close(); 

?>

</body>
</html>
