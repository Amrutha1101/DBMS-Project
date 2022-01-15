<html>
<body><!-- style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;"-->


<?php

require "db.php";

$cdquery="SELECT * FROM station";
$cdresult=mysqli_query($conn,$cdquery);
echo "
<table>
<thead><td>Stion Id</td>\t\t<td>Station</td><td></td><td></td></thead>
";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
 $cdId=$cdrow['station_id'];$cdTitle=$cdrow['station_name'];
	echo "
<tr><td>$cdId</td>\t\t<td>$cdTitle</td>\t\t<td><a href=\"http://localhost/railway/edit_station.php?id=".$cdId."\"><button>Edit</button></a></td>\t\t<td><a href=\"http://localhost/railway/delete_station.php?id=".$cdId."\"><button>Delete</button></a></td></tr>
";
}
echo "</table>";

?>
<br>
<span><form action="insert_into_station.php" method="post">
Add Station :<input type="text" name="station_id" placeholder="Station Id"/> <input type="text" name="station_name" placeholder=" New Station" required>
<input type="submit" value="Add"></span>
<?php
echo "<br><br> <a href=\"http://localhost/railway/admin_page.php\">Go Back to Admin Menu!!!</a> ";
?>
</body>
</html>
