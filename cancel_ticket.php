<html>

<body style=" background-image: url(pnglogin.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

<?php 

session_start();

require "db.php";

$pnr=$_POST["cpnr"];

//echo "$uid";

$sql=" UPDATE ticket SET status ='CANCELLED' WHERE ticket.pnr='".$pnr."' AND ticket.user_email='".$_SESSION["uemailid"]."' ";

if ($conn->query($sql) === TRUE) 
{
 echo "Cancellation Successful!!!";
} 
else 
{
 echo "<br><br>Error:" . $conn->error;
}

echo " <br><br><a href=\"http://localhost/railway/user_page.php\">Go Back</a><br>";

$conn->close(); 
?>

</body>
</html>
