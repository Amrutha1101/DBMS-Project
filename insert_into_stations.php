<html>
<body>
    <style>
        body{
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQh0m5zMFcRknp3gZI-_RM84EPq3Ot0g6pRxg&usqp=CAU');
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            text-align:center;
        }
        table{
            text-align:center;
            padding-top:100px;
            margin:auto;
        }
        td{
            color:purple;
            font-size: x-large;
            font-weight: 900;
            text-transform:uppercase;
        }
        label{
            color: red;
            font-size: larger;
            font-weight: 600;
        }
        .submit,a{
            background-color: gray; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        a{
            background-color: rgb(99, 99, 245);
        }
        a:hover{
            background-color: blue;
        }
        .inputs{
            padding: 10px 15px;
        }
    </style>

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
    <label>Add Station :</label>
    <input type="text" name="station_id" placeholder="Station Id"  class="inputs" /> 
    <input type="text" name="station_name" placeholder=" New Station" class="inputs" required>
    <input type="submit" value="Add" class="submit"></span>
<?php
echo "<br><br> <a href=\"http://localhost/railway/admin_page.php\">Go Back to Admin Menu!!!</a> ";
?>
</body>
</html>
