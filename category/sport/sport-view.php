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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../styles.css">
    <style>
 body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    line-height: 1.6;
    color: #333;
}

.content{
    font-size: 18px;
    color: #555;
    line-height: 1.8;
    margin-bottom: 20px;
    padding: 15px;
    background-color: #fff;
    border-left: 5px solid #0073e6;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 20px 0;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}


.heading{
    font-size: 36px;
    color: #222;
    text-align: center;
    margin-bottom: 30px;
    font-weight: bold;
    letter-spacing: 1.5px;
    border-bottom: 2px solid #0073e6;
    padding-bottom: 10px;
    margin-top: 20px;
}

img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 20px auto; /* Centers the image */
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Styling for the Header */
header {
    background-color: #0073e6;
    color: white;
    padding: 10px 20px;
}

header h1 {
    font-size: 24px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

/* Container Flexbox Layout */
.container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Navigation Styling */
nav ul {
    list-style: none;
    display: none; /* Initially hidden for mobile */
    flex-direction: column; /* Stack items vertically */
    background-color: #005bb5;
    position: absolute;
    top: 60px; /* Adjust based on header height */
    left: 0;
    width: 100%;
}

nav ul li {
    text-align: center;
    padding: 10px;
    border-bottom: 1px solid #0073e6;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
}

/* Hamburger Menu */
.hamburger {
    display: block;
    cursor: pointer;
}

.hamburger div {
    width: 30px;
    height: 3px;
    background-color: white;
    margin: 5px 0;
}

/* Show Navigation on Click */
nav.active ul {
    display: flex; /* Show navigation when active */
}

/* Media Query for Mobile */
@media (min-width: 768px) {
    /* Display Flexbox for larger screens */
    nav ul {
        display: flex;
        flex-direction: row;
        position: static;
        background: none;
        width: auto;
    }

    nav ul li {
        border-bottom: none;
        padding: 0 10px;
    }

    .hamburger {
        display: none; /* Hide hamburger on larger screens */
    }
}



</style>
    <title>Sports</title>
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
    $query ="SELECT * FROM sport WHERE id = $newsID ";
    $result = $conn->query($query);
    $row=mysqli_fetch_array($result);
    $content=$row['content'];
    $contentNL = nl2br($content); // Converts newlines to <br> tags
   
?>
    
    <h1 class = "heading"><?php echo $row['head'];?></h1>
    <time><?php echo $row['date'];?></time>
    <img src = "../../photos/sport_photos/<?php echo $row['pic'];?>">
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

          
           