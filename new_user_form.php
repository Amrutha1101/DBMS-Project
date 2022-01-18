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

require "db.php";

$name = $_POST['uname'];
$age=$_POST["num"];
$gender = $_POST['gender'];
$phone_number=$_POST["mobileno"];
$email=$_POST["emailid"];
$password=$_POST["password"];

$sql = "INSERT INTO user VALUES ('".$name."','".$age."','".$gender."','".$phone_number."','".$email."','".$password."')";
// echo $sql;

if ($conn->query($sql) === TRUE) 
{
 echo "<h1> Hi $email, <a href=\"user_page.php\"> Click here </a> to browse through our website!!! </h1>" ;
} 
else 
{
 echo "Error:" . $conn->error. "<br> <a href=\"http://localhost/railway/new_user_form.htm\">Go Back to Login!!!</a> ";
}

$conn->close(); 
?>

</body>
</html>
