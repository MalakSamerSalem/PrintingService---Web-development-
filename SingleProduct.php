<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
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
    <div class="prdContainer">
         
<?php 


    include 'connection.php';
   if (isset($_GET['id'])) {
    $proID = $_GET['id'];

    $query = "SELECT * FROM products WHERE proID = $proID";
    $result = mysqli_query($conn, $query);

    if ($product = mysqli_fetch_assoc($result)) {
        $proName = $product["proName"];
        $path = $product["proImg"];
        echo '
            <h1>'.$proName.'</h1>
            <div class="prd-left">
                <img src="'.$path.'" alt="papers" height="399px" width="300px">
            </div>
        ';
        // Query for sizes
        $query = "SELECT  po.proSize 
                  FROM productoptions po
                  INNER JOIN products p ON po.proID = p.proID
                  WHERE po.proColor = 'Colored'
                  AND p.proID = $proID
                  AND po.proSize != ''";

        $result = mysqli_query($conn, $query);

        echo '<div class="prd-right">';

        if (mysqli_num_rows($result) > 0) {
            echo "<h3>Select Size</h3><div class='paperSizes'>";
            while ($row = mysqli_fetch_assoc($result)) {
                $size = $row["proSize"];
                echo '<button type="button" onclick="post()">'.$size.'</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            }
            echo '</div>';
        }
    }
}
?>
            <br> <br>
            <form action="insertCart.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="proID" value="<?php echo $proID; ?>">
             <!-- SIZE buttons will set a hidden input -->
            <input type="hidden" name="size" id="sizeInput">
             <!-- QUANTITY -->   
            <h3>How many copy you want to print?</h3>
            <input type="number" name="quantity" value="1" min="1">
            <br> <br>
            <!-- COLOR options -->
            <div class="color-options">
                <h3>Color Options</h3>
                <div class="color-option">
                    <input type="radio" name="colors" id="colored" value="colored" checked>
                    <label for="colored">Colored</label>
                </div>
                <div class="color-option">
                    <input type="radio" name="colors" id="no-color" value="no-color">
                    <label for="no-color">No Colors</label>
                </div>
           
                 <!-- File submitting -->
                 <input type="file" name="cusImg" accept="image/*,application/pdf" required>

        
             <div class="createOrder">
              <button type="submit" name="placeOrder">Place Order</button>
             </div>
            </form>
         </div>

        </div>
    </div>
   <footer>
        <div class="contact">
            <h2>Contact</h2>
            <p>✆ 079-XXXX-XXXX</p>
            <p>✉︎ <a href="mailto:Clearprint@gmail.com">Clearprint@gmail.com</a></p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Size selection functionality
            const sizeButtons = document.querySelectorAll('.paperSizes button');
            const sizeInput = document.getElementById('sizeInput');

            sizeButtons.forEach(button => {
                button.addEventListener('click', function () {
                    sizeButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    sizeInput.value = this.textContent; // save the chosen size
                });
            });

            // Set first size as active by default
            if (sizeButtons.length > 0) {
                sizeButtons[1].classList.add('active'); 
                sizeInput.value = sizeButtons[1].textContent;
            }
        });
    </script>
</body>

</html>