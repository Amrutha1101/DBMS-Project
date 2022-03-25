# DBMS-Project
This is a Railway-Management-System for reserving tickets, adding new trains into the system etc....
Railway Management System divided in two modules:
----> User
----> Admin

This project includes the following operations:
1) User: can reserve, cancel and view tickets.
2) Admin: show all-> stations, running trains, registered users,
          enter-> new train, seat arrangement, 
          view-> all booked and cancelled tickets.

Login details for admin:
email: xyz@gmail.com
password: qwe

User can register him/herself in the website.

Triggers have been applied:
When user books a ticket the total number of seats gets reduced and increases when ticket is cancelled.



To install and run on your pc:-

1)Sign up and sign in in your sql database.

2)Run railway.sql and save databse.

3)Add your sql password and user name in indicated portion of db.php file.

4)Make sure you have active sql database connection. To do so you can use local server solution software like xampp which is open source and easy to use , or deploy site on a web server connected to sql.

For deploying on local host using xampp:-

a)Navigate to folder where xampp is installed. Inside, there is afolder named htdocs, make a folder named railway there. Path would look something like this-"~\xampp\htdocs\railway". Place the the project files in this folder.

b)Go to xampp control panel and make sure mysql service is in running state.

c)Open index.htm in your browser.

5)Finally run index.htm and enjoy!