<?php
    //database connection
    include 'configure.php';

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
    <title>TNC - Trusted News Channel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>TNC</h1>
            <nav>
                <ul>
                    <li><a href="">News</a></li>
                    <li><a href="category/news/main-news.php">Local News</a></li>
                    <li><a href="category/politics/politics-news.php">Politics</a></li>
                    <li><a href="category/business/business-news.php">Business</a></li>
                    <li><a href="category/sport/sport-news.php">Sport</a></li>
                    <li><a href="category/travel/travel-news.php">Travel</a></li>
                    <li><a href="category/entertainment/entertainment-news.php">Entertainment</a></li>
                    <li class="login"><a href="jornalist_pro/login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="featured">
                <h2>Trusted News Channel</h2>
                <div class="articles grid-container">

                    <!-- Main Article -->
                    <article class="article large">
                    <?php $query ="SELECT * FROM news ORDER BY id DESC LIMIT 1";
                        $result = $conn->query($query);
                        $row=mysqli_fetch_array($result);
                    ?>
                        <img src="photos/news_photos/<?php echo $row['pic'];?>" alt="News 1">
                        <h3><?php echo $row['head'];?></h3>
                        <a href="category/news/news-view.php?id=<?php echo $row['id'];?>">Read more</a>
                    </article>


                    <!--Sub Article in the side   -->
                    <article class="article medium">
                    <?php
                        $query = "SELECT n.*, RIGHT(n.content, 60) AS short_title FROM news AS n WHERE n.id  ORDER BY id DESC LIMIT 1 OFFSET 1;";
                        $rows = $conn->query($query);
                        if (!$rows) {
                            echo "Error: Could not execute query. " . $conn->error;  // showing execution errors
                            exit();
                        }
                        while ($row = $rows->fetch_assoc()) :  //fetch_assoc for associative arrays
                    ?>
                        <img src="photos/news_photos/<?php echo $row['pic'];?>" alt="News 2">
                        <h3><?php echo $row['head']; ?></h3>
                        <?php if (strlen($row['content']) > 40) : ?> <!-- news content trim for 40 characters -->
                            <p><?php echo $row['short_title']; ?>...</p>
                        <?php else : ?>
                            <p><?php echo $row['content']; ?></p>
                        <?php endif; ?>
                        <a href="category/news/news-view.php?id=<?php echo $row['id'];?>">Read more</a>
                        <?php endwhile;  // Close the loop ?>
                    </article>


                    <!-- Small Articles -->

                     <!-- Business -->
                     <?php
                        $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM business AS n WHERE n.id ORDER BY id DESC LIMIT 3";
                        $rows = $conn->query($query);
                        if (!$rows) {
                            echo "Error: Could not execute query. " . $conn->error;  // showing execution errors
                            exit();
                        }
                        while ($row = $rows->fetch_assoc()) :  //fetch_assoc for associative arrays
                        ?>
                    <article class="article small">
                        <img src="photos/business_photos/<?php echo $row['pic']; ?>" alt="News 3">
                        <h3><?php echo $row['head']; ?></h3>
                        <?php if (strlen($row['content']) > 40) : ?> <!-- news content trim for 40 characters -->
                            <p><?php echo $row['short_title']; ?>...</p>
                        <?php else : ?>
                            <p><?php echo $row['content']; ?></p>
                        <?php endif; ?>                        
                    <a href="category/business/business-view.php?id=<?php echo $row['id'];?>">Read more</a>
                    </article>
                    <?php endwhile;  // Close the loop ?>


                    <!-- Sport -->
                    <?php
                        $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM sport AS n WHERE n.id ORDER BY id DESC LIMIT 3";
                        $rows = $conn->query($query);
                        if (!$rows) {
                            echo "Error: Could not execute query. " . $conn->error;  // showing execution errors
                            exit();
                        }
                        while ($row = $rows->fetch_assoc()) :  //fetch_assoc for associative arrays
                        ?>
                    <article class="article small">
                        <img src="photos/sport_photos/<?php echo $row['pic']; ?>" alt="News 3">
                        <h3><?php echo $row['head']; ?></h3>
                        <?php if (strlen($row['content']) > 40) : ?> <!-- news content trim for 40 characters -->
                            <p><?php echo $row['short_title']; ?>...</p>
                        <?php else : ?>
                            <p><?php echo $row['content']; ?></p>
                        <?php endif; ?>                        
                    <a href="category/sport/sport-view.php?id=<?php echo $row['id'];?>">Read more</a>
                    </article>
                    <?php endwhile;  // Close the loop ?>


                    <!-- entertainment-->
                    <?php
                        $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM entertainment AS n WHERE n.id ORDER BY id DESC LIMIT 2";
                        $rows = $conn->query($query);
                        if (!$rows) {
                            echo "Error: Could not execute query. " . $conn->error;  // showing execution errors
                            exit();
                        }
                        while ($row = $rows->fetch_assoc()) :  //fetch_assoc for associative arrays
                        ?>
                    <article class="article small">
                        <img src="photos/entertainment_photos/<?php echo $row['pic']; ?>" alt="News 3">
                        <h3><?php echo $row['head']; ?></h3>
                        <?php if (strlen($row['content']) > 40) : ?> <!-- news content trim for 40 characters -->
                            <p><?php echo $row['short_title']; ?>...</p>
                        <?php else : ?>
                            <p><?php echo $row['content']; ?></p>
                        <?php endif; ?>                        
                    <a href="category/entertainment/entertainment-view.php?id=<?php echo $row['id'];?>">Read more</a>
                    </article>
                    <?php endwhile;  // Close the loop ?>

                    <!-- politics -->
                    <?php
                        $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM politics AS n WHERE n.id ORDER BY id DESC LIMIT 2";
                        $rows = $conn->query($query);
                        if (!$rows) {
                            echo "Error: Could not execute query. " . $conn->error;  // showing execution errors
                            exit();
                        }
                        while ($row = $rows->fetch_assoc()) :  //fetch_assoc for associative arrays
                        ?>
                    <article class="article small">
                        <img src="photos/politics_photos/<?php echo $row['pic']; ?>" alt="News 3">
                        <h3><?php echo $row['head']; ?></h3>
                        <?php if (strlen($row['content']) > 40) : ?> <!-- news content trim for 40 characters -->
                            <p><?php echo $row['short_title']; ?>...</p>
                        <?php else : ?>
                            <p><?php echo $row['content']; ?></p>
                        <?php endif; ?>                        
                    <a href="category/politics/politics-view.php?id=<?php echo $row['id'];?>">Read more</a>
                    </article>
                    <?php endwhile;  // Close the loop ?>


                    <!-- travel -->
                        <?php
                        $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM travel AS n WHERE n.id ORDER BY id DESC LIMIT 4";
                        $rows = $conn->query($query);
                        if (!$rows) {
                            echo "Error: Could not execute query. " . $conn->error;  // showing execution errors
                            exit();
                        }
                        while ($row = $rows->fetch_assoc()) :  //fetch_assoc for associative arrays
                        ?>
                    <article class="article small">
                        <img src="photos/travel_photos/<?php echo $row['pic']; ?>" alt="News 3">
                        <h3><?php echo $row['head']; ?></h3>
                        <?php if (strlen($row['content']) > 40) : ?> <!-- news content trim for 40 characters -->
                            <p><?php echo $row['short_title']; ?>...</p>
                        <?php else : ?>
                            <p><?php echo $row['content']; ?></p>
                        <?php endif; ?>                        
                    <a href="category/travel/travel-view.php?id=<?php echo $row['id'];?>">Read more</a>
                    </article>
                    <?php endwhile;  // Close the loop ?>

                    <!-- news -->
                    <?php
                        $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM news AS n WHERE n.id ORDER BY id DESC LIMIT 2 OFFSET 2;";
                        $rows = $conn->query($query);
                        if (!$rows) {
                            echo "Error: Could not execute query. " . $conn->error;  // showing execution errors
                            exit();
                        }
                        while ($row = $rows->fetch_assoc()) :  //fetch_assoc for associative arrays
                        ?>
                    <article class="article small">
                        <img src="photos/news_photos/<?php echo $row['pic']; ?>" alt="News 3">
                        <h3><?php echo $row['head']; ?></h3>
                        <?php if (strlen($row['content']) > 40) : ?> <!-- news content trim for 40 characters -->
                            <p><?php echo $row['short_title']; ?>...</p>
                        <?php else : ?>
                            <p><?php echo $row['content']; ?></p>
                        <?php endif; ?>                        
                    <a href="category/news/news-view.php?id=<?php echo $row['id'];?>">Read more</a>
                    </article>
                    <?php endwhile;  // Close the loop ?>


                     <!-- Business -->
                     <?php
                        $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM business AS n WHERE n.id ORDER BY id DESC LIMIT 2 OFFSET 4";
                        $rows = $conn->query($query);
                        if (!$rows) {
                            echo "Error: Could not execute query. " . $conn->error;  // showing execution errors
                            exit();
                        }
                        while ($row = $rows->fetch_assoc()) :  //fetch_assoc for associative arrays
                        ?>
                    <article class="article small">
                        <img src="photos/business_photos/<?php echo $row['pic']; ?>" alt="News 3">
                        <h3><?php echo $row['head']; ?></h3>
                        <?php if (strlen($row['content']) > 40) : ?> <!-- news content trim for 40 characters -->
                            <p><?php echo $row['short_title']; ?>...</p>
                        <?php else : ?>
                            <p><?php echo $row['content']; ?></p>
                        <?php endif; ?>                        
                    <a href="category/business/business-view.php?id=<?php echo $row['id'];?>">Read more</a>
                    </article>
                    <?php endwhile;  // Close the loop ?>

                <!-- politics -->
                    <?php
                        $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM politics AS n WHERE n.id ORDER BY id DESC LIMIT 3 OFFSET 3";
                        $rows = $conn->query($query);
                        if (!$rows) {
                            echo "Error: Could not execute query. " . $conn->error;  // showing execution errors
                            exit();
                        }
                        while ($row = $rows->fetch_assoc()) :  //fetch_assoc for associative arrays
                        ?>
                    <article class="article small">
                        <img src="photos/politics_photos/<?php echo $row['pic']; ?>" alt="News 3">
                        <h3><?php echo $row['head']; ?></h3>
                        <?php if (strlen($row['content']) > 40) : ?> <!-- news content trim for 40 characters -->
                            <p><?php echo $row['short_title']; ?>...</p>
                        <?php else : ?>
                            <p><?php echo $row['content']; ?></p>
                        <?php endif; ?>                        
                    <a href="category/politics/politics-view.php?id=<?php echo $row['id'];?>">Read more</a>
                    </article>
                    <?php endwhile;  // Close the loop ?>


                    <!-- Sport -->
                    <?php
                        $query = "SELECT n.*, RIGHT(n.content, 40) AS short_title FROM sport AS n WHERE n.id ORDER BY id DESC LIMIT 2 OFFSET 4;";
                        $rows = $conn->query($query);
                        if (!$rows) {
                            echo "Error: Could not execute query. " . $conn->error;  // showing execution errors
                            exit();
                        }
                        while ($row = $rows->fetch_assoc()) :  //fetch_assoc for associative arrays
                        ?>
                    <article class="article small">
                        <img src="photos/sport_photos/<?php echo $row['pic']; ?>" alt="News 3">
                        <h3><?php echo $row['head']; ?></h3>
                        <?php if (strlen($row['content']) > 40) : ?> <!-- news content trim for 40 characters -->
                            <p><?php echo $row['short_title']; ?>...</p>
                        <?php else : ?>
                            <p><?php echo $row['content']; ?></p>
                        <?php endif; ?>                        
                    <a href="category/sport/sport-view.php?id=<?php echo $row['id'];?>">Read more</a>
                    </article>
                    <?php endwhile;  // Close the loop ?>

                    
                </div>
            </section>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 TNC. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
