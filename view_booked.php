<html>
<body>

<?php

require "db.php";

session_start();

$email = $_SESSION["uemail"];

$query="SELECT * FROM ticket where user_email = '".$_SESSION["uemail"]."' ";
$result=mysqli_query($conn,$query);

echo "<table><thead><td>PNR</td><td>Train_no</td><td>Date_Of_Journey</td><td>Train_Class</td><td>Seats</td><td>From Station</td><td>To Station</td><td>Fare</td><td>Status</td></thead>";

while ($row=mysqli_fetch_array($result))
{
echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[4]."</td><td>".$row[8]."</td><td>".$row[11]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[5]."</td><td>".$row[9]."</td></tr>";
}

echo "</table>";

echo "<br> <a href=\"http://localhost/railway/user_page.php\">Go Back</a> ";

$conn->close();

?>

</body>
</html>