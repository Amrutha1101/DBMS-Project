<html>

<body > 
    <style>
        body{
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQh0m5zMFcRknp3gZI-_RM84EPq3Ot0g6pRxg&usqp=CAU');
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;text-align:center;
            margin-top:300px;
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
        .inputs{
            padding: 10px 15px;
            margin-bottom:8px;
            color:red;
        }
    </style>

<?php 

session_start();

require "db.php";

$pnr=$_POST["cpnr"];

//echo "$uid";

$query = "SELECT status FROM ticket WHERE ticket.pnr = '".$pnr."' ";
$result=mysqli_query($conn,$query);
$cdrow = mysqli_fetch_array($result);
if($cdrow["status"] == 'CANCELLED'){
    echo "The ticket is already cancelled";
}else{
    $sql=" UPDATE ticket SET status ='CANCELLED' WHERE ticket.pnr='".$pnr."' AND ticket.user_email='".$_SESSION["uemail"]."' ";
    if ($conn->query($sql) === TRUE) 
    {
        echo "Cancellation Successful!!!";
    } 
    else 
    {
        echo "<br><br>Error:" . $conn->error;
    }
}





echo " <br><br><a href=\"http://localhost/railway/user_page.php\">Go Back</a><br>";

$conn->close(); 
?>

</body>
</html>
