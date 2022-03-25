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
            padding: 7px;
            padding-left:0px;
        }
        tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color: #f2f2f2}
    </style>


<?php

require "db.php";
session_start();
$doj  = $_SESSION['doj'];
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["cname"])){
    $class_name = $_POST["cname"];

    $query4="SELECT seats_left FROM classes WHERE train_number = '".$_SESSION["train_number"]."' and doj = '".$doj."' and class_name = '".$_POST["cname"]."'";
    $result4 = mysqli_query($conn, $query4);
    $row4=mysqli_fetch_array($result4);
    if($row4["seats_left"] < $_SESSION["nop"]){
        echo "Seats are not available";
    }else{
        $cdquery = "SELECT arrival_time, departure_time, fare, s.station_name, st.station_name FROM ((train t join classes c on t.train_number = c.train_number) join station s on s.station_id = t.source_id) join station st on st.station_id = t.destination_id WHERE class_name = '".$_POST["cname"]."' and t.train_number = '".$_SESSION["train_number"]."' and doj = '".$_SESSION["doj"]."'";
        $cdresult=mysqli_query($conn,$cdquery);
        $cdrow= mysqli_fetch_array($cdresult);
        $cdquery1="INSERT INTO ticket(train_number, arrival_time, departure_time, date_of_journey, fare, source_station_name, destination_station_name, class_name, status, user_email, num_of_pass) VALUES ('".$_SESSION["train_number"]."','".$cdrow[0]."','".$cdrow[1]."','".$doj."','".$cdrow[2]."','".$cdrow[3]."','".$cdrow[4]."','".$_POST["cname"]."',\"BOOKED\",'".$_SESSION["uemail"]."','".$_SESSION["nop"]."')";
        $cdresult1 = mysqli_query($conn, $cdquery1);
        if ($conn->query($cdquery1) === TRUE) {
            echo " Ticket is booked successfully";
        } else {
            echo "Error";
        }

    }
    
    
}else {
    echo "
    <table><form action=\"reserve_2.php\" method=\"post\">
    <tr><td>Train Number</td><td>AC1 Seats</td><td>Fare</td><td>AC2 Seats</td><td>Fare</td><td>AC3 Seats</td><td>Fare</td><td>CC Seats</td><td>Fare</td><td>SL Seats</td><td>Fare</td><td>Choose Class</td></tr>
    
    <tr><td>".$_GET["train_number"]."</td>";
    $_SESSION["train_number"] = $_GET["train_number"];
    $query="SELECT * FROM classes WHERE train_number = '".$_GET["train_number"]."' and doj = '".$doj."'";
    $result=mysqli_query($conn,$query);
    while ($row=mysqli_fetch_array($result)) 
    {
        echo "<td>".$row["seats_left"]."</td><td>".$row["fare"]."</td>";
    }
    echo "<td><select id=\"cname\" name=\"cname\" required>";

    $query="SELECT * FROM classes WHERE train_number = '".$_GET["train_number"]."' and doj = '".$doj."'";
    $result=mysqli_query($conn,$query);
    while ($row=mysqli_fetch_array($result)) 
    {
        $cname = $row["class_name"];
        $tn=$row["class_name"];
        echo " <option value = \"$cname\" > $tn </option> ";
    }

    echo "</select></td><td><input type=\"submit\" value=\"Book\" class=\"submit\"></table>";
}

echo " <br><br><a href=\"http://localhost/railway/user_page.php\">Go Back</a><br>";

$conn->close();
?>

</body>
</html>