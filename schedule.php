<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


<?php

require "db.php";

if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 

$cdquery="SELECT * FROM schedule where train_number='".$_GET["train_number"]."' ";
$cdresult=mysqli_query($conn,$cdquery);

echo "
<table>
<thead><td>Station ID</td><td>Arrival_Time</td><td>Departure_Time</td><td></td></thead>
";
while ($cdrow=mysqli_fetch_array($cdresult))
{
	if($cdrow['arrival_time'] == NULL){
		$cdrow['arrival_time'] = "--";
	}
	if($cdrow['departure_time'] == NULL){
		$cdrow['departure_time'] = "--";
	}
	echo "
<tr><td>".$cdrow['station_id']."</td><td>".$cdrow['arrival_time']."</td><td>".$cdrow['departure_time']."</td></tr>
";
}
echo "</table>";

echo " <br><a href=\"http://localhost/railway/show_trains.php\">Go Back to Train Menu!!!</a><br> ";
echo " <br><a href=\"http://localhost/railway/admin_page.php\">Go Back to Admin Menu!!!</a> ";
?>
</body>
</html>
