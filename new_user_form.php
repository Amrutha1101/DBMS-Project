<html>
<body> <!--style=" background-image: url(userlogin.png);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" -->

<?php 

require "db.php";

$name = $_POST['uname'];
$age=$_POST["num"];
$gender = $_POST['gender'];
$phone_number=$_POST["mobileno"];
$email=$_POST["emailid"];
$password=$_POST["password"];

$sql = "INSERT INTO user VALUES ('".$name."','".$age."','".$gender."','".$phone_number."','".$email."','".$password."')";
// echo $sql;

if ($conn->query($sql) === TRUE) 
{
 echo "Hi $email, <a href=\"user_page.php\"> Click here </a> to browse through our website!!! " ;
} 
else 
{
 echo "Error:" . $conn->error. "<br> <a href=\"http://localhost/railway/new_user_form.htm\">Go Back to Login!!!</a> ";
}

$conn->close(); 
?>

</body>
</html>
