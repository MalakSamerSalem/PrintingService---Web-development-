<?php 
/*Update qty of the order :
1- Select which order 
2- Update which value 


TO do that i need Order ID --> update: where ordID  
*/

session_start();
$cusID = $_SESSION['cusID'];
include ("connection.php"); 


if (isset($_POST['update'])) {
   $ordID = $_POST['ordID']; 
   $quantity = $_POST['quantity'];
    
    // UPDATE query
    $sql = "UPDATE orders SET quantity = ? WHERE ordID = ? AND cusID = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "iii", $quantity, $ordID, $cusID);

    if (mysqli_stmt_execute($stmt)) {
       header("Location: cart.php?updated=1");
        exit();
    } else {
        echo "Error updating record: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}

// SELECT updated oreder 
$sql = "SELECT quantity FROM orders WHERE ordID=?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Prepare failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    echo "Order ID: " . $row['ordID'] . "<br>";
    echo "Quantity: " . $row['quantity'] . "<br>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);


?> 