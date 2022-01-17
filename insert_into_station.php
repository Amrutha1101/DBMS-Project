<html>
<body><!-- style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;"-->


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