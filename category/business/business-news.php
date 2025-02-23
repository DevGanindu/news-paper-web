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
    <title>TNC Business</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href = "../../styles.css">
</head>
<header>
        <div class="container">
        <h1>TNC</h1>
            <nav>
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
    <div class="mainHead">
        <div class="SecHead">
            <div class="HeadContent">
                <h1>Business News</h1>
            </div>
            <div class = "hhead">
            <div class = "mainnewshead">
            <?php
                $query ="SELECT * FROM business ORDER BY id DESC LIMIT 1";
                $result  = $conn->query($query);
                $row = $result->fetch_assoc()
                ?>
                <a href="business-view.php?id=<?php echo $row['id'];?>">
                <div class="mainnews">
                    <h1><?php echo $row['head'];?></h1>
                    <img src = "../../photos/business_photos/<?php echo $row['pic'];?>" alt="" class="IndvsSAimg">
                </div>
                </a>
</div>


            <div class="sidepart">
            <?php
                // $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM sport AS n ORDER BY id DESC ;";
                $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM business AS n WHERE n.id  ORDER BY id DESC LIMIT 4 OFFSET 1;";
                $rows = $conn->query($query);
                if (!$rows) {
                    echo "Error: Could not execute query. " . $conn->error;  // showing execution errors
                    exit();
                }
                while ($row = $rows->fetch_assoc()) :  //fetch_assoc for associative arrays
                ?>
                <a href="business-view.php?id=<?php echo $row['id'];?>">
                    <div class = "yupun">
                        <h2><?php echo $row['head']; ?></h2>
                        <img src="../../photos/business_photos/<?php echo $row['pic']; ?>" alt=".." class="yupunimg">
                    </div>
                </a>  
                <?php endwhile;  // Close the loop ?>
            </div> 
                </div>
            </div>
        </div>

            <div class="middlecontent">
            <?php
                // $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM sport AS n ORDER BY id DESC ;";
                $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM business AS n WHERE n.id ORDER BY id DESC LIMIT 3 OFFSET 5";
                $rows = $conn->query($query);
                if (!$rows) {
                    echo "Error: Could not execute query. " . $conn->error;  // showing execution errors
                    exit();
                }
                while ($row = $rows->fetch_assoc()) :  //fetch_assoc for associative arrays
                ?>
                <a href="business-view.php?id=<?php echo $row['id'];?>">
                    <div class="section3">
                        <h2><?php echo $row['head']; ?></h2>
                        <img src="../../photos/business_photos/<?php echo $row['pic']; ?>" class="WIvsSLimg"><br>
                        <time><?php echo $row['date']; ?></time>

                        <?php if (strlen($row['content']) > 40) : ?> <!-- news content trim for 40 characters -->
                            <p><?php echo $row['short_title']; ?>...</p>
                        <?php else : ?>
                            <p><?php echo $row['content']; ?></p>
                        <?php endif; ?>
                    </div>
                </a>
                <?php endwhile;  // Close the loop ?>

            </div>
            
            <div class="thirdpart">
                <?php
                $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM business AS n ORDER BY id DESC LIMIT 18446744073709551615 OFFSET 9;";
                $rows = $conn->query($query);
                if (!$rows) {
                    echo "Error: Could not execute query. " . $conn->error;  // showing execution errors
                    exit();
                }
                while ($row = $rows->fetch_assoc()) :  //fetch_assoc for associative arrays
                ?>
                <a href="business-view.php?id=<?php echo $row['id']; ?>">
                <div class="Tsec1">
               
                    <h2><?php echo $row['head']; ?></h2><!-- heading  -->
                    <img src="../../photos/business_photos/<?php echo $row['pic']; ?>"><br><!-- news picture -->
                    <time> <?php echo $row['date']; ?></time> <!-- date and time -->

                
                    <?php if (strlen($row['content']) > 40) : ?> <!-- news content trim for 40 characters -->
                            <p><?php echo $row['short_title']; ?>...</p>
                        <?php else : ?>
                            <p><?php echo $row['content']; ?></p>
                    <?php endif; ?>
                </div>
                </a>
                <?php endwhile;  // Close the loop ?>
            </div>
        </div>   
    </div>
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