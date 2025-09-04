<?php 
//to connect to database 
$serverName = "localhost"; 
$userName = "root";
$password = ""; 
$dbname = "PrintingService";

//create connection
$conn = mysqli_connect($serverName, $userName, $password, $dbname); 
//check connection 
if (!$conn){
    die("Connection failed" . mysqli_connect_error());
}
else {
       // echo "Connection successfully"; 
    }

?>