<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <?php
    //database connection
    include 'configure.php';
    //connection error reporting
    error_reporting(0);
    ?>



<html>
<head>
<title>Log In</title>

<link rel="stylesheet" href="log/stylesheet.css">
<meta name="viewport" content="width=device-width,initial"/>

</head>
<body>

	<div  class="main">

	<div class="bg">
		<h2>Login</h2>
		<form method="post" class="form" action="login.php">

			<div class="up1con">	
				<input type="text" placeholder="Username"  name="id" ><br>
			</div>


			<div class="up1con">
				<input type="password" placeholder="Password"  name="pass"><br>
			</div>



			<input type="submit" value="Log In" class="btn"><br><br>




	</form>


	</div>


</div>
<footer><center>Copyright&copy;2024|All Rights Reserved|Group X</center></footer>
<style>
    footer{
        background-color: #000;
        padding: 16px;
        color: #708090;
        font-family:Andel Mono,monospace;
    }
</style>
</body>
</html>



<?php
session_start();
$PASSWORD= $_POST['pass'];
$ID= $_POST['id'];

if(!$ID OR $PASSWORD=='' OR $ID==''){
	exit;
}

// Select Tabel
$query= "SELECT pass FROM journalist WHERE id=$ID";


//Connect Database with tabel
$result=mysqli_query($conn,$query);
 
//fetch data to page
$data=mysqli_fetch_array($result);

$REALPASS=$data['pass'];


//Password Checking 
if($REALPASS==$PASSWORD){
	$_SESSION['id'] = $ID;
    $_SESSION['logged_in'] = true;
	header("location: profile.php?id=$ID");
	exit;
}else {
    // In case of incorrect login
    echo "Incorrect password or ID";
}

$conn->close();


?>
</body>
</html>