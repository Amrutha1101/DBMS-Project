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

$sql = "INSERT INTO station VALUES ('".$_POST["station_id"]."','".$_POST["station_name"]."')";

if ($conn->query($sql) === TRUE) {
    echo " '".$_POST["station_name"]."':New record created successfully";
} else {
    echo "Error:" . $conn->error;
}

echo "<br> <a href=\"http://localhost/railway/admin_page.php\">Go Back to Admin Menu!!!</a> ";

$conn->close();
?>

</body>
</html>