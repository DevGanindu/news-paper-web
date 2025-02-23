<?php
    //database connection
    include 'configure.php';

if (!$conn) {
    echo "<p>Error: Failed to connect to database. " . mysqli_connect_error() . "</p>";
    exit();
  }

    $ID = $_GET['id'];
    $Cato = $_GET['cato'];
    $JID = $_GET['j_id'];
    
    $query ="DELETE FROM $Cato WHERE id= $ID ";
    $result = $conn->query($query);
    if($conn->query($query)==true){
         header("Location:admin_news.php?id=$JID");
     }
    ?>