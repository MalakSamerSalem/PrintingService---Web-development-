<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
    <div id="cartPage">
        <h1 id="cart-title">Cart</h1>
        <?php 
        session_start(); 
         $cusID = $_SESSION['cusID'];
        include 'connection.php'; 
        $query = "
        SELECT 
        o.ordID, o.cusImg, o.quantity,
        po.proSize, po.proColor, po.proPrice,
        p.proName, p.proImg
        FROM orders o
        JOIN productOptions po ON o.proOpID = po.proOpID
        JOIN products p ON po.proID = p.proID
         WHERE o.cusID = '$cusID'
         ";
        $result = mysqli_query($conn, $query); 
        $total = 0; 
        ?>

        <table id="tableCart">
            <tr>
                <th>Product</th>
                <th>Details</th>
                <th>QTY</th>
                <th>Price</th>
                <th></th>
            </tr>

            <?php 
            if (mysqli_num_rows($result) >0){
                while ($row= mysqli_fetch_assoc($result)){
                $subtotal = $row['proPrice'] * $row['quantity']; 
                $total += $subtotal;

                 echo '<tr>';
                

                $filePath = 'uploaded/' . $row['cusImg'];
               $fileType = mime_content_type($filePath);

                echo "<td>";
                if ($fileType === 'application/pdf') {
                    echo "<img src='Assets/image/papers.png' height='78.5px' width='97.5px'>";
                } else {
                    echo "<img src='" . $filePath . "' height='78.5px' width='97.5px'>";
                    }
                echo "</td>";


               // echo '<td>' . $row['proName'] . '<br>Size: ' . $row['proSize'] . '<br>Color: ' . $row['proColor'] . '</td>';
               echo '<td>' . $row['proName'] . '<br>';
               if (!empty($row['proSize'])) {
                 echo 'Size: ' . $row['proSize'] . '<br>';
                } else {
                     echo 'Size: —<br>';
                    }
                echo 'Color: ' . $row['proColor'] . '</td>';

                 echo '<td>
                <form method="POST" action="updateOrder.php">
                <input type="hidden" name="ordID" value="' . $row['ordID'] . '">
                <input type="number" name="quantity" value="' . $row['quantity'] . '">
                <button type="submit" name="update">Update QTY</button>
                </form>
                </td>';

                 echo '<td>' . $subtotal.'JOD'. '</td>'; 
                echo '<td>
                <form method="POST" action = "deleteOrder.php"> 
                <input type="hidden" name="ordID" value="' . $row['ordID'] . '">
                <button type="submit">Cancel Order</button>
                </form>
                </td>';
                 echo '</tr>'; 
                }
            }
            ?>
            </table>
        <?php
          if ($total > 0) {
            echo '<h3 id="total-text">Total: '.$total.' JOD</h3>'; 
        }
        ?>

        <div class="btn">
            <!-- dealing with interface: Java (not php)-->
              <button type="button" onclick="window.location.href='homepage.php'">
               Continue Ordering
              </button>

            <button type="button">
                Check out
            </button>
        </div>
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