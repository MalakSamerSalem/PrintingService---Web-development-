<?php
require 'connection.php';

$orderid = $_POST['ordID']; 


$sql = "DELETE FROM orders WHERE ordID=?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Prepare failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "i", $orderid);

if (mysqli_stmt_execute($stmt)) {
    echo "Order deleted successfully<br>";
    echo "Order with id $orderid is deleted.<br>";
    header("Location: cart.php");
exit;

} else {
    echo "Error deleting record: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>