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
            background-color:green;
        }
        a:hover{
            background-color: blue;
        }
    </style>

<?php 

session_start();

require "db.php";

if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 

$email=$_POST["emailid"];
$password=$_POST["password"];

$_SESSION["uemail"] = $email;

$query = mysqli_query($conn,"SELECT * FROM user WHERE user.email='".$email."' AND user.password='".$password."' ");

$temp1;

if($row = mysqli_fetch_array($query))
{
    header('location:user_page.php');
} else {
    echo "<h2>Wrong Email id or Password</h2>";
}

$conn->close(); 

?>

</body>
</html>
