<html>
<body> <!--style=" background-image: url(userlogin.png);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" -->

<?php 

require "db.php";

$train_number = $_POST['tno'];
$train_name=$_POST['tname'];
$source_id = $_POST['sid'];
$depature_time=$_POST['dtime'];
$destination_id=$_POST["did"];
$arrival_time=$_POST['atime'];
$Day_of_arrival=$_POST['doa'];

$sql = "INSERT INTO train VALUES ('".$train_number."','".$train_name."','".$source_id."','".$depature_time."','".$destination_id."','".$arrival_time."','".$Day_of_arrival."')";
// echo $sql;

if ($conn->query($sql) === TRUE) 
{
 echo "Data recorded successfully" ;
 
} 
else 
{
 echo "Error: Data is wrong ";
}
echo "<a href=\"http://localhost/railway/admin_page.php\">Go Back to Admin Menu!!!</a>";
$conn->close(); 
?>

</body>
</html>
