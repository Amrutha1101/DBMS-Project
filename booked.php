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

$query="SELECT * FROM ticket where status='BOOKED' ";
$result=mysqli_query($conn,$query);

echo "<table><thead><td>PNR</td><td>Train_no</td><td>Date_Of_Journey</td><td>Train_Class</td><td>Seats</td><td>Status</td></thead>";

while ($row=mysqli_fetch_array($result))
{
echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[4]."</td><td>".$row[8]."</td><td>".$row[11]."</td><td>".$row[9]."</td></tr>";
}

echo "</table>";

echo "<br> <a href=\"http://localhost/railway/admin_page.php\">Go Back to Admin Menu!!!</a> ";

$conn->close();
?>


</body>
</html>



