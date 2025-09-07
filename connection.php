<?php 
/*
//to connect to database 
$serverName = "localhost";      // Use localhost, not 192.168.0.100
$userName   = "clearpr1_printingservice";
$password   = "VQunS5KBCuUXPgSdddNY";
$dbname     = "clearpr1_printingservice";

//create connection
$conn = mysqli_connect($serverName, $userName, $password, $dbname); 

//check connection 
if (!$conn){
    die("Connection failed" . mysqli_connect_error());
}
else {
       // echo "Connection successfully"; 
    }

*/
?>


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