<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>



    <style>

        *{
            padding: 0;
            margin: 0;
        }
        .pic{
            height: 200px;
            width: 300px;
        }

        .pic_div{
            border: 3px solid black;
            width: fit-content;
            margin: 6px;
            border-radius: 10px;
        }

        .con{
            height: max-content;
            width: max-content;
            padding: 50px;
            background-color:mediumturquoise;
            margin-top: 40px;
            margin-left: 25%;
            margin-right: 25%;
            display: flex;
            align-items: center;
        }

        .newsid{
            background-color: deepskyblue;
            width: 100px;
            padding: 5px;
            margin: 4px; 
        }
        
        input[type=text]{
            height: 25px;
            width: 300px;
        }

        input[type=submit],button{
            height: 25px;
            width: 90px;
            border: none;
            cursor: pointer;
        }

        input[type=submit]{
            background-color: rgb(82, 255, 47);
        }

        button{
            background-color: rgb(255, 149, 0);
          
        }





        #imageFile{
        content: "Select a File"; /* Replace with your desired text */
        display: inline-block;
        padding: 5px 10px; /* Adjust padding as needed */
        border-radius: 4px; /* Add border radius for rounded corners */
        background-color: #eee; /* Set a background color */
        color: #333; /* Set text color */
        cursor: pointer; /* Make it look clickable */
        }

       
        
    


    </style>
        <?php
    //database connection
    include 'configure.php';
    //connection error reporting
    error_reporting(0);
    // Check connection error
if (!$conn) {
    echo "<p>Error: Failed to connect to database. " . mysqli_connect_error() . "</p>";
    exit();
  }
    ?>
</head>
<body>

    <div class="con">
        <!-- <label> <p class="newsid">News id : 5</p></label> -->

        <?php
            if (isset($_GET['id']) && isset($_GET['cato']) && isset($_GET['j_id'])) {
                $ID = $_GET['id'];
                $Cato = $_GET['cato'];
                $JID = $_GET['j_id'];
                
                $query ="SELECT * FROM $Cato WHERE id= $ID ";
                $result = $conn->query($query);
                $row=mysqli_fetch_array($result);
            } else {
                // Handle the case where data is missing
                echo "Error: Missing form data.";
                exit();
            }
            
 

        ?>

            
            <Form  method="post" enctype="multipart/form-data" >

            Select News variation : <select name="variation" class="selct" require>
                                        <option selected>Please select</option>
                                        <option value="news">News</option>
                                        <option value="sport">Sport</option>
                                        <option value="business">Business</option>
                                        <option value="travel">Travel</option>
                                        <option value="entertainment">Entertainment</option>
                                        <option value="politics">Politics</option>
                                </select> <br><br>

                <label>Heading :</label>
                <input type="text" required value="<?php echo $row['head'];?>" name="head" style="white-space: nowrap;"><br><br>

                <label>Cover photo :</label>
                <div class="pic_div"><img id="selectedImage" src="../photos/news_photos/<?php echo $row['pic']; ?>" alt="Cover Photo" class="pic"></div>
                <label for="imageFile">Select a photo to upload:</label>
                <input type="file" name="picture"  id="imageFile"><br><br>

                <label>Content :</label><br>
                <textarea required rows="10" cols="50" name="content"> <?php echo $row['content'];?></textarea><br><br>
                
                <input type="submit" value="Update">
                <button type="button" onclick="window.history.back()">Go Back</button>


                <?php

                    $HEAD= $_POST['head'];
                    $CONTENT= $_POST['content']; 
                    $file= $_FILES['picture'];
                    $PICTURE = $file["name"];

                $file_path = "";
                $table = $Cato;

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

                    $query="UPDATE $Cato SET head = '$HEAD', content = '$CONTENT', pic = '$PICTURE' WHERE id = $ID";

                        // Validate required fields
                    if (empty($HEAD) || empty($CONTENT) || empty($_FILES['picture']['tmp_name'])) {
                
                        exit();
                    }

                    move_uploaded_file ($file['tmp_name'], "../photos/$file_path/" . $file["name"]);

                    if($conn->query($query)==true){
                   header("Location:select_edit.php");
                   exit;}
                 
              
                 
                   
                ?>




            </Form>


    </div>

    <script>
        const imageFile = document.getElementById('imageFile');
        const imagePreviewContainer = document.querySelector('img'); // Select the container for preview image (adjust the selector if needed)
        const imagePreview = document.createElement('img'); // Create an image element for preview

        imageFile.addEventListener('change', function() {
        const file = this.files[0]; // Get the selected file

        if (file && file.type.startsWith('image/')) { // Check if it's an image
            const reader = new FileReader();
            reader.onload = function(e) {
            imagePreview.src = e.target.result; // Set the image preview source
            imagePreviewContainer.appendChild(imagePreview); // Add the preview image to the container
            };
            reader.readAsDataURL(file);
        } else {
            alert("Please select an image file."); // Alert if it's not an image
        }
        });

    </script>

</body>
</html>
