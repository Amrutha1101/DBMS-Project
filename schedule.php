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


$cdquery="SELECT * FROM train WHERE train_number='".$_GET["train_number"]."'";
$cdresult=mysqli_query($conn,$cdquery);
echo "
<table>
<thead><td>Train_no</td><td>Train_name</td><td>Starting_Point</td><td>Departure_Time</td><td>Destination_Point</td><td>Arrival_Time</td><td>Day of Arrival</td></thead>
";
while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow['train_number']."</td><td>".$cdrow['train_name']."</td><td>".$cdrow['source_id']."</td><td>".$cdrow['depature_time']."</td><td>".$cdrow['destination_id']."</td><td>".$cdrow['arrival_time']."</td><td>".$cdrow['Day_of_arrival']."</td></tr>
";
}
echo "</table>";



$cdquery="SELECT * FROM schedule where train_number='".$_GET["train_number"]."' ";
$cdresult=mysqli_query($conn,$cdquery);
// $stations=array();
// $arrival=array();
// $departure=array();
// $distance=array();
echo "
<table>
<thead><td>Id</td><td>Staring_Point</td><td>Arrival_Time</td><td>Departure_Time</td><td></td></thead>
";
while ($cdrow=mysqli_fetch_array($cdresult))
{
	// $stations[$i]=$cdrow["station_name"];
	// $arrival[$i]=$cdrow["arrival_time"];
	// $departure[$i]=$cdrow["departure_time"];
	// $i+=1;
	if($cdrow['arrival_time'] == NULL){
		$cdrow['arrival_time'] = "--";
	}
	if($cdrow['departure_time'] == NULL){
		$cdrow['departure_time'] = "--";
	}
	echo "
<tr><td>".$cdrow['train_number']."</td><td>".$cdrow['station_id']."</td><td>".$cdrow['arrival_time']."</td><td>".$cdrow['departure_time']."</td></tr>
";
}
echo "</table>";


// echo "
// <table>
// <thead><td>Id</td><td>Staring_Point</td><td>Arrival_Time</td><td>Departure_Time</td><td></td></thead>
// ";
// $temp=0;
// while ($temp<$i-1) 
// {
// 	echo "
// <tr><td>".($temp+1)."</td><td>".$stations[$temp]."</td><td>".$departure[$temp]."</td><td>".$stations[$temp+1]."</td><td>".$arrival[$temp+1]."</td><td>".($distance[$temp+1]-$distance[$temp])."</td><td><a href=\"http://localhost/railway/seat_plan.php?trainno=".$_GET["trainno"]."&sp=".$stations[$temp]."&dp=".$stations[$temp+1]."\"><button>Seat Plan</button></a></td></tr>
// ";
// $temp+=1;
// }
// echo "</table>";

echo " <br><a href=\"http://localhost/railway/show_trains.php\">Go Back to Train Menu!!!</a><br> ";
echo " <br><a href=\"http://localhost/railway/admin_page.php\">Go Back to Admin Menu!!!</a> ";
?>
</body>
</html>
