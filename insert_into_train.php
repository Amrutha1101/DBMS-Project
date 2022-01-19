<html>
<body > 
    <style>
        body{
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQh0m5zMFcRknp3gZI-_RM84EPq3Ot0g6pRxg&usqp=CAU');
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;text-align:center;
			margin-top:200px;
        }
        a{
            background-color: rgb(99, 99, 245); /* Green */
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
    </style>
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
 echo "<h2>Data recorded successfully</h2>" ;
 
} 
else 
{
 echo "<h2>Error: Data is wrong</h2>";
}

$query1 = "INSERT INTO schedule(train_number, station_id, arrival_time, departure_time) VALUES('".$train_number."','".$source_id."',NULL,'".$depature_time."')";
if ($conn->query($query1) === TRUE) 
{
 echo "" ;
 
} 
else 
{
 echo "";
}
$query2 = "INSERT INTO schedule(train_number, station_id, arrival_time, departure_time) VALUES('".$train_number."','".$destination_id."','".$arrival_time."',NULL)";
if ($conn->query($query2) === TRUE) 
{
 echo "" ;
 
} 
else 
{
 echo "";
}
echo "<a href=\"http://localhost/railway/admin_page.php\">Go Back to Admin Menu!!!</a>";
$conn->close(); 
?>

</body>
</html>
