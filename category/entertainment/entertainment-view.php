<?php
//database connection
include '../../configure.php';
//connection error reporting
//error_reporting(0);
// Check connection error
if (!$conn) {
echo "<p>Error: Failed to connect to database. " . mysqli_connect_error() . "</p>";
exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entertainment</title>
    <link rel="stylesheet" href="../../styles.css">
    <link rel="stylesheet" href = "../view-style.css">

</head>
<header>
    <div class="container">
        <h1>TNC</h1>
        <div class="hamburger" id="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <nav id="navbar">
            <ul>
                <li><a href="../../index.php">News</a></li>
                <li><a href="../news/main-news.php">Local News</a></li>
                <li><a href="../politics/politics-news.php">Politics</a></li>
                <li><a href="../business/business-news.php">Business</a></li>
                <li><a href="../sport/sport-news.php">Sport</a></li>
                <li><a href="../travel/travel-news.php">Travel</a></li>
                <li><a href="../entertainment/entertainment-news.php">Entertainment</a></li>
                <li class="login"><a href="../../jornalist_pro/login.php">Login</a></li>
            </ul>
        </nav>
    </div>
</header>
<body>

<?php
    $newsID = $_GET['id'];
    $query ="SELECT * FROM entertainment WHERE id = $newsID ";
    $result = $conn->query($query);
    $row=mysqli_fetch_array($result);
    $content=$row['content'];
    $contentNL = nl2br($content); // Converts newlines to <br> tags
   
?>
    
    <h1 class = "heading"><?php echo $row['head'];?></h1>
    <time><?php echo $row['date'];?></time>
    <img src = "../../photos/entertainment_photos/<?php echo $row['pic'];?>">
    <p class= "content">  <?php echo $contentNL?></p>

<script>
    // JavaScript for toggling the mobile menu
    const hamburger = document.getElementById('hamburger');
    const navbar = document.getElementById('navbar');

    hamburger.addEventListener('click', () => {
        navbar.classList.toggle('active');
    });
</script>

</body>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section about">
                    <h3>TNC NEWS</h3>
                    <p>Your daily source for the latest news, trends, and stories happening across the globe. Stay informed with unbiased reporting and expert opinions.</p>
                </div>
                
                <div class="footer-section links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">World News</a></li>
                        <li><a href="#">Politics</a></li>
                        <li><a href="#">Entertainment</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>

                <div class="footer-section social-media">
                    <h4>Follow Us</h4>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>

            <div class="footer-bottom">
                &copy; 2024 TNC NEWS | All Rights Reserved
            </div>
        </div>
    </footer>
</html>

          
           