<?php
//it will read from the single product page the product options and then match it with the proOP table 
session_start();
$cusID = $_SESSION['cusID'];

include("connection.php");
echo "cusID from session: " . $cusID . "<br>";

if (isset($_POST["placeOrder"])) {
    $size=$_POST["size"];
    $color = $_POST ["colors"]; 
    $quantity = $_POST ["quantity"];
    $proID = $_POST["proID"]; 

      $fileTmp = $_FILES['cusImg']['tmp_name'];
      $fileName = $_FILES['cusImg']['name'];
      $filePath = "uploaded/" . $fileName;
      move_uploaded_file($fileTmp, $filePath);

      

    $query = "SELECT proOpID FROM productoptions WHERE proID = '$proID' AND  proSize='$size' AND proColor='$color'";
   $result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "No matching product option found. Please check size/color selection.";
    exit;
}

$row = mysqli_fetch_assoc($result);
$proOpID = $row['proOpID'];

    
     // Insert into orders table
    $insertQuery = "INSERT INTO orders (proOpID, cusID, quantity, cusImg) 
                    VALUES ('$proOpID', '$cusID', '$quantity', '$fileName')";
         
    $insertResult = mysqli_query($conn, $insertQuery);

 header('Location: cart.php');

}
?>


        
