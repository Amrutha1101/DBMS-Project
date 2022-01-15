<html>
<body><!-- style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;"-->


<?php

require "db.php";

$cdquery="SELECT * FROM train";
$cdresult=mysqli_query($conn,$cdquery);
echo "
<table>
<thead><td>Train_no</td><td>Train_name</td><td>Starting_Point</td><td>Departure_Time</td><td>Destination_Point</td><td>Arrival_Time</td><td>Day of Arrival</td><td></td></thead>
";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow['train_number']."</td><td>".$cdrow['train_name']."</td><td>".$cdrow['source_id']."</td><td>".$cdrow['depature_time']."</td><td>".$cdrow['destination_id']."</td><td>".$cdrow['arrival_time']."</td><td>".$cdrow['Day_of_arrival']."</td><td><a href=\"http://localhost/railway/schedule.php?train_number=".$cdrow['train_number']."\"><button>Schedule</button></a></td></tr>
";
}
echo "</table>";

echo " <br><a href=\"http://localhost/railway/admin_page.php\">Go Back to Admin Menu!!!</a> ";
?>
</body>
</html>
