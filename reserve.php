<html>
   <body>

<?php

session_start();

$db = require "db.php";

if(isset($_POST["did"])) {
    $_SESSION["stid"] = $_POST["sid"];
    $_SESSION["dtid"] = $_POST["did"];
    $_SESSION["nop"] = $_POST["num"];
    $doj = $_POST['doj'];
    $_SESSION['doj'] = $doj;
    
    echo "<table>";
    $cdquery = "SELECT * FROM train WHERE source_id = '".$_SESSION["stid"]."' and destination_id = '".$_SESSION["dtid"]."'";
    $cdresult1=mysqli_query($conn,$cdquery);
    echo "<tr><td>Train Number</td><td>From Station</td><td>To Station<td></td><td>AC1 Seats</td><td>AC2 Seats</td><td>AC3 Seats</td><td>CC Seats</td><td>SL Seats</td></tr>";
    while($cdrow1=mysqli_fetch_array($cdresult1)){
        echo "<tr><td>".$cdrow1["train_number"]."</td><td>".$_SESSION["stid"]."</td><td>".$_SESSION["dtid"]."</td>";
        $cdquery2 = "SELECT * FROM classes WHERE train_number = '".$cdrow1["train_number"]."' and doj = '".$_SESSION["doj"]."'";
        $cdresult2 = mysqli_query($conn, $cdquery2);
        while($cdrow2 = mysqli_fetch_array($cdresult2)){
            echo "<td>".$cdrow2["seats_left"]."</td>";
        }
        echo "<td><a href=\"http://localhost/railway/reserve_2.php?train_number=".$cdrow1['train_number']."\"><button>Book</button></a></td></tr>";
    }
    echo"</table>";
} else{
    $query="SELECT * FROM station";
    $result=mysqli_query($conn,$query);

    echo "
    <br>Add Train :
    <br>
    <form action=\"reserve.php\" method=\"post\">
    <table>
    <thead><td>From Station</td><td>To Station</td><td>Number of Passengers</td><td>Date of Journey</td></thead>
    <tr><td><select id=\"sid\" name=\"sid\" required>";

    while ($row=mysqli_fetch_array($result)) 
    {
        $sid=$row['station_id'];
        
        $tn=$row['station_name']." - ".$row['station_id'];
        echo " <option value = \"$sid\" > $tn </option> ";
    }

    echo "</select></td>
    <td><select id=\"did\" name=\"did\" required>";

    $query="SELECT * FROM station";
    $result=mysqli_query($conn,$query);

    while ($row=mysqli_fetch_array($result)) 
    {
        $did=$row['station_id'];
        
        $tn=$row['station_name']." - ".$row['station_id'];
        echo " <option value = \"$did\" > $tn </option> ";
    }

    echo "</select></td><td><input type=\"text\" name=\"num\" required></td><td><input type=\"date\" name=\"doj\" required></td></tr>
    </table>
    <input type=\"submit\" value=\"Search\">";
}
echo " <br><br><a href=\"http://localhost/railway/user_page.php\">Go Back</a><br>";

?>

</body>
</html>