<?php
    //database connection
    include 'configure.php';

    //error_reporting(0);

//connection error reporting

if(!$conn){
    die("Connection Error". mysqli_connect_error());
}
//error_reporting(0);

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // If not logged in, redirect to login page
    header("location: login.php");
    exit;
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css">
    <title>Administrator Page</title>
    <style>
        /* General Page Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Full Width Layout */
.admin-container {
    max-width: 90%;
    width: 100%;
    margin: 0 auto;
    padding: 40px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    margin-top: 50px;
}

/* Admin Profile Section */
.admin-profile {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    margin-bottom: 60px;
    padding-left: 20px;
}

.profile-pic img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-right: 40px;
    object-fit: cover;
}

.admin-info h2 {
    margin: 0;
    font-size: 2.5em;
}

.admin-info p {
    margin: 5px 0 0;
    font-size: 1.2em;
    color: #555;
}

/* Header Section */
.admin-header {
    background-color: #333;
    color: #fff;
    padding: 15px;
    text-align: left;
    margin-bottom: 60px;
}

.admin-header h1 {
    margin: 0;
    font-size: 2em;
}

/* Button Styles */
.btn-container {
    display: flex;
    justify-content: flex-start;
    padding-left: 20px;
    gap: 40px;
}

.admin-btn {
    background-color: #333;
    color: #fff;
    padding: 20px 40px;
    border: none;
    border-radius: 5px;
    font-size: 1.5em;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.admin-btn a {
    text-decoration: none;
    color: #fff;
}

.admin-btn:hover {
    background-color: #555;
}

    </style>
</head>
<body>

<?php 

//ID fetch
$ID= $_GET['id'];
 
 // Select Tabel
$query= "SELECT f_name,l_name,email FROM journalist WHERE id=$ID";

//Connect Database with tabel
$result=mysqli_query($conn,$query);
//fetch data to page

$data=mysqli_fetch_array($result);

//error_reporting(0);

?>

    <div class="admin-container">
        <!-- Admin Profile Section -->
        <div class="admin-profile">
            <div class="profile-pic">
                <img src="rrr.png" alt="Admin Profile Picture">
            </div>
            <div class="admin-info">
                <h2><?php echo $data['f_name'] ."  ". $data['l_name'] ?></php></h2>
                <p><?php echo $data['email']?></p>
            </div>
        </div>

        <!-- Header Section -->
        <header class="admin-header">
            <h1>News Website Admin Panel</h1>
        </header>

        <!-- Action Buttons Section -->
        <div class="btn-container">
            <button class="admin-btn">
                <a href="admin_news.php?id=<?php echo $ID;?>">Your News</a>
            </button>
            <button class="admin-btn">
                <a href="news_upload.php?id=<?php echo $ID;?>">Upload News</a>
            </button>
        </div>
    </div>
</body>
</html>
