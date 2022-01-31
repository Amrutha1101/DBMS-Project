<html>
<body>   
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

$cdquery="SELECT * FROM train";
$cdresult=mysqli_query($conn,$cdquery);
echo "
<table>
<thead><td>Train_no</td><td>Train_name</td><td>Starting_Point</td><td>Departure_Time</td><td>Destination_Point</td><td>Arrival_Time</td><td>Day of Arrival</td></thead>
";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow['train_number']."</td><td>".$cdrow['train_name']."</td><td>".$cdrow['source_id']."</td><td>".$cdrow['depature_time']."</td><td>".$cdrow['destination_id']."</td><td>".$cdrow['arrival_time']."</td><td>".$cdrow['Day_of_arrival']."</td><td><a href=\"http://localhost/railway/schedule.php?train_number=".$cdrow['train_number']."\"><button>Schedule</button></a></td>\t\t<td><a href=\"http://localhost/railway/delete_train.php?train_number=".$cdrow['train_number']."\"><button>Delete</button></a></td></tr>
";
}
echo "</table>";

echo " <br><a href=\"http://localhost/railway/admin_page.php\">Go Back to Admin Menu!!!</a> ";
?>
</body>
</html>
