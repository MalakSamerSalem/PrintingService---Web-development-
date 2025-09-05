<?php 
include ("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT INTO customer (cusName, cusEmail, cusPassword) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    $username = $_POST['username'];
    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];
    

    mysqli_stmt_bind_param($stmt, "sss", $username, $userEmail, $password);

    if (mysqli_stmt_execute($stmt)) {
      //  echo "New user added successfully, go to login.";
    } else {
        echo "Error: " . mysqli_error($conn);
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
    <title>Registeration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <form method="POST">
        <div class="reg-container">
            <h2>Register Here</h2>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="userEmail"><b>User Email</b></label>
            <input type="text" placeholder="Enter your email" name="userEmail" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit" name="register">Register</button>
            <a class="reg-link" href="login.php"> Login Here </a>
        </div>
    </form>
 
    
</body>
</html>