<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php
    //database connection
    include 'configure.php';
    //connection error reporting
    error_reporting(0);
    ?>

    <style>
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Optional: Set container height to fill viewport */
    }

    .news-form {
  background-color: #f5f5f5; /* Light gray background */
  padding: 20px;
  margin: 0 auto; /* Center the form horizontally */
  width: 600px; /* Set a fixed width for the form */
  border-radius: 4px; /* Rounded corners for the form */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
}

.form-group {
  margin-bottom: 15px; /* Spacing between form elements */
}

.form-label {
  font-weight: bold;
  margin-bottom: 5px; /* Space between label and input */
  display: block; /* Ensures label appears above input on some layouts */
}

.selct,
.form-input,
.form-btn,
textarea, .goback {
  border: 1px solid #ccc; /* Light gray border */
  border-radius: 4px; /* Rounded corners */
  padding: 8px; /* Padding within input fields */
  font-size: 16px; /* Consistent font size */
  width: 100%; /* Make elements fill the available space */
}

textarea {
  min-height: 100px; /* Set a minimum height for the textarea */
}

.selct {
  /* Additional styles for the select box */
}

.form-input:focus,
textarea:focus {
  border-color: #66afe9; /* Blue border on focus */
  outline: none; /* Remove default outline */
}

.form-btn {
  background-color: #4CAF50; /* Green background */
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}

.goback {
    background-color:red;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    }

.form-btn:hover {
  background-color: #3e8e41; /* Darker green on hover */
}


    </style>
</head>
<body>
    <div class="form-container">
    <form method="post" enctype="multipart/form-data" class="news-form">
  <div class="form-group">
    <label for="variation">Select News Variation:</label>
    <select name="variation" id="variation" class="selct">
      <option selected value="">Select variation</option>
      <option value="news">News</option>
      <option value="sport">Sport</option>
      <option value="business">Business</option>
      <option value="travel">Travel</option>
      <option value="entertainment">Entertainment</option>
      <option value="politics">Politics</option>
    </select>
  </div>

  <div class="form-group">
    <label for="head">News Headline:</label>
    <input type="text" id="head" name="head" required>
  </div>

  <div class="form-group">
    <label for="content">News Content:</label>
    <textarea id="content" name="content" required ></textarea>
  </div>

  <div class="form-group">
    <label for="picture">Upload Cover Photo:</label>
    <input type="file" id="picture" name="picture" accept=".jpg,.jpeg,.png" required>
  </div>

  <div class="form-group">
    <input type="submit" value="Upload" class="form-btn">
  </div>

  <div class="form-group">
    <input type="button" value="Go Back" class="goback" onclick="window.history.back()">
  </div>
  
<?php
     $HEAD= $_POST['head'];
     $escaped_head= addslashes($HEAD); 

     $CONTENT= $_POST['content'];
     //Using addslashes() (for escaping single quotes):
     $escaped_content = addslashes($CONTENT); 

     $file= $_FILES['picture'];
     $PICTURE = $file["name"];
     $variation = $_POST['variation'];
     $jid = $_GET['id'];

//news variation select

switch ($variation) {
    case "news":
        $file_path = "news_photos";
        $table = "news";
        break;
    case "sport":
        $file_path = "sport_photos";
        $table = "sport";
        break;
    case "business":
        $file_path = "business_photos";
        $table = "business";
        break;
    case "travel":
        $file_path = "travel_photos";
        $table = "travel";
        break;
    case "entertainment":
        $file_path = "entertainment_photos";
        $table = "entertainment";
        break;
    case "politics":
        $file_path = "politics_photos";
        $table = "politics";
        break;
}
    
    $query="INSERT INTO $table VALUES('','$escaped_head','$escaped_content', '$PICTURE',current_timestamp(),'$jid')";



    // Validate required fields
if (empty($HEAD) || empty($CONTENT) || empty($_FILES['picture']['tmp_name'])) {
    echo " Please fill in all required fields.";
    exit();
  }

        move_uploaded_file ($file['tmp_name'], "../photos/$file_path/" . $file["name"]);





        // ... (your database connection code)
        
        if ($conn->query($query) === true) {
          echo "Success!";
        } else {
          // Enhanced error handling:
          $error = $conn->error;
        
          // Log the error for debugging and analysis
          error_log("Database query failed: $error", 0); // Append to error log
        
          // Provide a more informative error message to the user (optional)
          if (strpos($error, 'Duplicate entry') !== false) {
            echo "Failed to add data: Duplicate entry detected.";
          } else {
            echo "Failed to add data: An error occurred ($error)."; // Generic error with specific details
          }
        }
        
        // ... (rest of your code)

        $conn->close();
        exit();


?>



    </form>

    </div>



</body>
</html>


