<html>
<body> 
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
session_start();

require "db.php";

if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 

$email=$_POST["email"];
$password=$_POST["password"];

$query = mysqli_query($conn,"SELECT * FROM admin WHERE admin.email='".$email."' AND admin.password='".$password."' ");
if($row = mysqli_fetch_array($query))
{
    header('location:admin_page.php');
} else {
    echo "<h3>Wrong Email id or Password</h3>";
}


?>
<br><a href="index.html">Go to Home Page!!!</a>
</div>
</body>
</html>
