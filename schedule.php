<html>
<body > 
    <style>
        body{
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQh0m5zMFcRknp3gZI-_RM84EPq3Ot0g6pRxg&usqp=CAU');
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;text-align:center;
			margin-top:100px;
        }
        table{
            padding-top:100px;
            margin:auto;
        }
        td{
            color:green;
            font-size: x-large;
            font-weight: 900;
            text-transform:uppercase;
        }
		label{
            color: purple;
            font-size: larger;
            font-weight: 600;
        }
        .submit,a{
            background-color: rgb(99, 99, 245); /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            margin:auto;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
		.submit{
			background-color: green; 
		}
        a:hover{
            background-color: blue;
        }
        .inputs{
            padding: 10px 15px;
            margin-bottom:8px;
            color:red;
        }
    </style>
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
