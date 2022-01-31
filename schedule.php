<html>
<body >    
<style>
        body{
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQh0m5zMFcRknp3gZI-_RM84EPq3Ot0g6pRxg&usqp=CAU');
            height: 100%; margin-top:100px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;text-align:center;
        }
        table{
            padding-top:300px;
            margin:auto;
            border-collapse: collapse;
            width: 80%;
            color: #00332E;
        }
        td{
            color:green;
            font-size: x-large;
            font-weight: 900;
            text-transform:uppercase;
            border:2px solid black;
        }
        a{
            background-color: rgb(99, 99, 245); 
            border: none;
            color: white;
            padding: 15px 32px;
            margin:auto;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        a:hover{
            background-color: blue;
        }
        .inputs{
            padding: 10px 15px;
            margin-bottom:8px;
            color:red;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color: #f2f2f2}
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
<thead><td>Station ID</td><td>Arrival_Time</td><td>Departure_Time</td></thead>
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
