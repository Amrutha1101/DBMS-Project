<html>
<body > 
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
session_start();


require "db.php";

$stations=$_SESSION["stations"];

$temp=0;
$flag=NULL;
$sql=NULL;
while ($temp<$_SESSION["ns"]) 
{
	if($_POST["s1".$temp]>0)
	{$sql = "INSERT INTO classes VALUES ('".$_SESSION["train_number"]."','AC1','".$_POST["f1".$temp]."','".$_POST["s1".$temp]."','".$_SESSION["doj"]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s2".$temp]>0)
	{$sql = "INSERT INTO classes VALUES ('".$_SESSION["train_number"]."','AC2','".$_POST["f2".$temp]."','".$_POST["s2".$temp]."','".$_SESSION["doj"]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s3".$temp]>0)
	{$sql = "INSERT INTO classes  VALUES ('".$_SESSION["train_number"]."','AC3','".$_POST["f3".$temp]."','".$_POST["s3".$temp]."','".$_SESSION["doj"]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s4".$temp]>0)
	{$sql = "INSERT INTO classes  VALUES ('".$_SESSION["train_number"]."','CC','".$_POST["f4".$temp]."','".$_POST["s4".$temp]."','".$_SESSION["doj"]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s5".$temp]>0)
	{$sql = "INSERT INTO classes  VALUES ('".$_SESSION["train_number"]."','SL','".$_POST["f5".$temp]."','".$_POST["s5".$temp]."','".$_SESSION["doj"]."')";
	$flag=($conn->query($sql));
	}

	$temp+=1;
}

if ($flag === TRUE) {
    echo "<h2>New seat arrangement added successfully</h2>";
} else {
    echo "<h2>Data already exists</h2>";
}

echo "<br> <a href=\"http://localhost/railway/admin_page.php\">Go Back to Admin Menu!!!</a> ";

?>
</body>
</html>
