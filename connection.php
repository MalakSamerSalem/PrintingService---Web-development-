<?php 
/*
//to connect to database 
$serverName = "192.168.0.100";  // Hostname given by DirectAdmin
$userName   = "clearpr1_PrintingService"; // DB username
$password   = "PZBEuxXjgw2mfa3QXhhY";     // DB password
$dbname     = "clearpr1_PrintingService"; // DB name

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