<html>
<body> 
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
            padding-top:30px;
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

$sql = "DELETE from user where email= ('".$_GET["id"]."')";
echo $_GET["id"];

if ($conn->query($sql) === TRUE) {
    echo "<h2>Record deleted successfully</h2>";
} else {
    echo "Error:" . $conn->error;
}

echo "<br> <a href=\"http://localhost/railway/admin_page.php\">Go Back to Admin Menu!!!</a> ";

$conn->close();
?>

</body>
</html>

