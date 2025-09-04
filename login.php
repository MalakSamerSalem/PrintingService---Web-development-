<?php
session_start();
require("connection.php"); 

if (isset($_POST['login'])) {
    $sql = "SELECT * FROM customer WHERE cusEmail=? AND cusPassword=?";
    $stmt = mysqli_prepare($conn, $sql);

    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];

    mysqli_stmt_bind_param($stmt, "ss", $userEmail, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

   if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['cusID'] = $row['cusID'];
    $_SESSION['cusEmail'] = $row['cusEmail'];
    $_SESSION['cusName']  = $row['cusName'];

    header("Location: homePage.php");
    exit();
} else {
    echo "Invalid email or password";
}

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="POST">
        <div class="login-container">
            <h2>Login Here</h2>
            <label for="userEmail"><b>User Email</b></label>
            <input type="text" placeholder="Enter your email" name="userEmail" required>
             <br> <br>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
             <br> <br>
            <button id="login-btn" type="submit" name="login">Login</button>
            <a class="reg-link" href="register.php"> Register Here </a>
        </div>
    </form>
</body>

</html>
