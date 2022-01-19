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
		label{
            color: purple;
            font-size: larger;
            font-weight: 600;
        }
        .submit,a{
            background-color: rgb(99, 99, 245); /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            margin:auto;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
		.submit{
			background-color: green; 
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

require "db.php";

if(!isset($_POST["station"])){ 
echo "
<form action=\"edit_station.php?id=".$_GET["id"]."\" method=\"post\">
<label>
Edit Station :</label> 
<input type=\"text\" name=\"station\" class=\"inputs\" required>
<input type=\"submit\" class=\"submit\">
</form>
";
}
else{
	$sql = "UPDATE `station` SET `station_name`='".$_POST["station"]."' where station_id= ('".$_GET["id"]."')";
	
	if ($conn->query($sql) === TRUE) {
    	echo "Station updated successfully";
	} else {
	    echo "Error:" . $conn->error;
	}
}

echo "<br> <a href=\"http://localhost/railway/admin_page.php\">Go Back to Admin Menu!!!</a> ";

$conn->close();
?>

</body>
</html>



