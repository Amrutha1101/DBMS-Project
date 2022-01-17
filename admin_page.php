<?php

session_start();
require "db.php";

echo " <br><a href=\"http://localhost/railway/insert_into_stations.php\"> Show All Stations </a><br> ";//done
echo " <br><a href=\"http://localhost/railway/show_trains.php\"> Show All Trains </a><br> ";//done
echo " <br><a href=\"http://localhost/railway/show_users.php\"> Show All Users </a><br> "; //done
echo " <br><a href=\"http://localhost/railway/insert_into_train.html\"> Enter New Train </a><br> ";//done
echo " <br><a href=\"http://localhost/railway/insert_into_classes.php\"> Enter Seat Arrangement </a><br> ";//done
echo " <br><a href=\"http://localhost/railway/booked.php\"> View all booked tickets </a><br> "; //need to check after the ticket data is added
echo " <br><a href=\"http://localhost/railway/cancelled.php\"> View all cancelled tickets </a><br> "; //need to check after ticket data is added
echo " <br><a href=\"http://localhost/railway/logout.php\"> Logout </a><br> "; //done

?>