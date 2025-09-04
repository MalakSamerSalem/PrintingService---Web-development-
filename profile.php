<?php 
//View customer table --> cusName, cusEmail 
session_start();
$cusID = $_SESSION['cusID'];
include 'connection.php';
$cusname = '';
$cusemail = '';

 $sql = "SELECT cusName, cusEmail FROM customer WHERE cusID=?"; 
 $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "i", $cusID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $cusname = $row['cusName'];
        $cusemail = $row['cusEmail'];
    }

    mysqli_stmt_close($stmt);

    //insert FeedBack 
    if (isset($_POST['submitfb'])) {
    $comment = $_POST['comment'];

    $sql = "INSERT INTO feedback (cusID , thefd) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "is", $cusID, $comment);

    if (mysqli_stmt_execute($stmt)) {
       // echo "New record created successfully";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

     mysqli_stmt_close($stmt);
     mysqli_close($conn);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="topBar">
            <header>
                <img src="Assets\image\PrintService logo.png" alt="PrintService logo" height="157px" width="195px">
            </header>
            <nav>
                <ul>
                    <li> <a href="homePage.php#About"><b>About</b></a>&nbsp;&nbsp;&nbsp;</li>
                    <li> <a href="homePage.php#Items"><b>Items</b></a>&nbsp;&nbsp;&nbsp;</li>
                    <li><a href="homePage.php#Feedback"><b>Feedback</b></a>&nbsp;&nbsp;&nbsp;</li>
                    <li> <a href="profile.php"><b>Profile</b></a>&nbsp;&nbsp;&nbsp;</li>
                    <li> <a href="cart.php"><b>Cart</b></a>&nbsp;&nbsp;&nbsp;</li>
                    <li> <a href="logout.php"><b>Log out</b></a>&nbsp;&nbsp;&nbsp;</li>
                </ul>
            </nav>
        </div>
    <?php 
     include 'connection.php';
    $query= "SELECT * From customer Where cusID == cusID"; 
    ?>
    <div id="procontainer">
        <form method = "post"> 
           <fieldset>
                <legend>───Personal information ⋆⋅☆⋅⋆ ──</legend>
                Name:<br>
               <input type="text" name="username" value="<?php echo htmlspecialchars($cusname); ?>" required>
                <br>
                Email:<br>
                <input type="email" name="userEmail" value="<?php echo htmlspecialchars($cusemail); ?>" required>
                <br><br>
            </fieldset>
            <br><br><br>
            <fieldset>

                <legend>───Submit your feedback ⋆⋅☆⋅⋆ ──</legend>
                <textarea id="comment" name="comment" rows="5" placeholder="Please share your thoughts..."></textarea>
                <br><br><br>
                <button type="submit" name = "submitfb">Submit Feedback </button>
            </fieldset>

        </form>
    </div>
  <footer>
        <div class="contact">
            <h2>Contact</h2>
            <p>✆ 079-XXXX-XXXX</p>
            <p>✉︎ <a href="mailto:Clearprint@gmail.com">Clearprint@gmail.com</a></p>
        </div>
    </footer>
</body>

</html>