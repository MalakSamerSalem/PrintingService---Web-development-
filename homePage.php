<?php
session_start();

// must stop caching
// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Pragma: no-cache");
// header("Expires: 0");

if (!isset($_SESSION['cusID'])) {
    header("Location: login.php");
    exit;
}

$cusID = $_SESSION['cusID'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="container">
        <div class="topBar">
            <header>
                <img src="Assets\image\PrintService logo.png" alt="PrintService logo" height="157px" width="195px">
            </header>
            <nav>
                <ul>
                    <li> <a href="#About"><b>About</b></a>&nbsp;&nbsp;&nbsp;</li>
                    <li> <a href="#Items"><b>Items</b></a>&nbsp;&nbsp;&nbsp;</li>
                    <li><a href="#Feedback"><b>Feedback</b></a>&nbsp;&nbsp;&nbsp;</li>
                    <li> <a href="profile.php"><b>Profile</b></a>&nbsp;&nbsp;&nbsp;</li>
                    <li> <a href="cart.php"><b>Cart</b></a>&nbsp;&nbsp;&nbsp;</li>
                    <li> <a href="logout.php"><b>Log out</b></a>&nbsp;&nbsp;&nbsp;</li>
                </ul>
            </nav>
        </div>
        <main>
            <div class="intro">
                <h2>What to do</h2>
                <br> <br>
                <img src="Assets\image\SelectIcon.png" alt="SelectIcon" height="78.5px" width="97.5px">
                <img src="Assets\image\PrinterIcon.png" alt="PrinterIcon" height="78.5px" width="97.5px">
                <img src="Assets\image\DeliveryIcon.png" alt="DeliveryIcon" height="78.5px" width="97.5px">
            </div>

         <section id="Items">
              <h2>Pick Item to print on</h2>
             <?php 
             include 'connection.php';
             $query= "SELECT * From products"; 
             $result = mysqli_query ($conn, $query); 
              while ($row = mysqli_fetch_assoc ($result))
                {
                $proName = $row ["proName"]; 
                $path = $row ["proImg"]; 
                $proID = $row["proID"];
                echo '
                 <div class="card">
                       <img src="'.$path.'"
                       alt="papers" hight="399px" width="300px">
                  <h1>'.$proName.'</h1>
                   <p>
                    <a href="SingleProduct.php?id='.$proID.'" class="cardBtn">View details</a>
                   </p>
               </div>
                ';     
                } 
             ?>  
        </section>


            <section id="About">
                <h2>About</h2>
                <p>Clear Print revolutionizes printing by bringing the convenience of on-demand orders straight to your
                    doorstep. Whether you need documents, custom apparel, or personalized merchandise, our seamless
                    process lets you upload, customize, and receive high-quality prints—all from the comfort of your
                    home. Designed for students, professionals, and businesses alike, we save you time and effort with
                    fast, reliable delivery, making printing as easy as ordering food. Say goodbye to print shop hassles
                    and hello to effortless, instant results!</p>
            </section>

            <div class="Bcktotop">
                <button onclick="topFunction()" id="toTop" title="Go to top">▲</button>
                <script>
                    // Get the button
                    let mybutton = document.getElementById("toTop");

                    // When the user scrolls down 20px from the top of the document, show the button
                    window.onscroll = function () { scrollFunction() };

                    function scrollFunction() {
                        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                            mybutton.style.display = "block";
                        } else {
                            mybutton.style.display = "none";
                        }
                    }

                    // When the user clicks on the button, scroll to the top of the document
                    function topFunction() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    }
                </script>
            </div>
            <section id="Feedback">
                <h2>Feedback</h2>

                <div class="slideshow-container">

                    <div class="mySlides">
                        <q>The outcome was way better than expected i love it!!</q>
                        <p class="author">- Reem Malkawi</p>
                    </div>

                    <div class="mySlides">
                        <q>I appreciate the hard work, thank you very much</q>
                        <p class="author">- Ahmed Ali</p>
                    </div>

                    <div class="mySlides">
                        <q>I have tried printing many papers and the quality did not disappoint at all, thank you for
                            the effort, i will order again!</q>
                        <p class="author">- Maryam Al-Sayed</p>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>

                </div>

                <div class="dot-container">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>

                <script>
                    var slideIndex = 1;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                        showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                        showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                        var i;
                        var slides = document.getElementsByClassName("mySlides");
                        var dots = document.getElementsByClassName("dot");
                        if (n > slides.length) { slideIndex = 1 }
                        if (n < 1) { slideIndex = slides.length }
                        for (i = 0; i < slides.length; i++) {
                            slides[i].style.display = "none";
                        }
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" active", "");
                        }
                        slides[slideIndex - 1].style.display = "block";
                        dots[slideIndex - 1].className += " active";
                    }
                </script>
            </section>

        </main>
    </div>
    <footer>
        <div class="contact">
            <h2>Contact</h2>
            <p>✆ 079-XXXX-XXXX</p>
            <p>✉︎ <a href="mailto:Clearprint@gmail.com">Clearprint@gmail.com</a></p>
        </div>
    </footer>

    </div>
    </div>
</body>

</html>