<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select News</title>
    <?php
    //database connection
    include 'configure.php';
    //connection error reporting
    //error_reporting(0);
    ?>
    <style>
/* General Page Styles */
/* General Page Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    color: #333;
}

.m_con {
    margin-top: 30px;
}

/* Section containers */
.con1, .con2, .con3 {
    width: 100%;
    margin-bottom: 30px;
}

/* Table Styles */
.news_con {
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    margin-bottom: 20px;
}

.news_con label {
    font-size: 1.5em;
    font-weight: bold;
    margin-bottom: 10px;
    display: block;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

table thead {
    background-color: #333;
    color: white;
}

table th, table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    font-weight: bold;
    text-transform: uppercase;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table td img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 4px;
}

/* Button Styles */
button {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-transform: uppercase;
    font-size: 0.9em;
    transition: background-color 0.3s ease;
}

button a {
    text-decoration: none;
    color: white;
}

/* Update Button Style */
button.update-btn {
    background-color: #4CAF50; /* Green */
}

button.update-btn:hover {
    background-color: #45a049;
}

/* Delete Button Style */
button.delete-btn {
    background-color: #f44336; /* Red */
}

button.delete-btn:hover {
    background-color: #d32f2f;
}

/* Responsive Design */
@media (max-width: 768px) {
    table td img {
        width: 50px;
        height: 50px;
    }
}


    </style>
</head>
<body>
    <div class="m_con">
        <div class="con1">
            <!-- ....... main news............. -->
        <div class="news_con">
        <label>Main NEWS</label>
            <table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Heading</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>

    <?php
    $JID = $_GET['id'];
    $query ="SELECT * FROM news WHERE j_id = $JID ORDER BY id DESC";
    $rows = $conn->query($query);
    ?>


    
                    <?php foreach($rows as $row) :?>
                    <tr>
                    <td>  <?php echo $row['id'];?></td>
                    <td> <img src="../photos/news_photos/<?php echo $row['pic'];?>"></td>
                    <td> <?php echo $row['head'];?></td>
                    <td><button class="update-btn"><a href="news_edit.php?id=<?php echo $row['id'];?>&cato=news&j_id=<?php echo $row['j_id'];?>">Edit</button>
                        <button class="delete-btn"><a href="news_delete.php?id=<?php echo $row['id'];?>&cato=news&j_id=<?php echo $row['j_id'];?>">Delete</button>
                    </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            </div>


    <!-- .......... sport news .......... -->

    <div class="news_con">
        <label>Sport NEWS</label>
            <table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Heading</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>

    <?php
    $JID = $_GET['id'];
    $query ="SELECT * FROM sport WHERE j_id = $JID ORDER BY id DESC";
    $rows = $conn->query($query);
    ?>


    
                    <?php foreach($rows as $row) :?>
                    <tr>
                    <td>  <?php echo $row['id'];?></td>
                    <td> <img src="../photos/sport_photos/<?php echo $row['pic'];?>"></td>
                    <td> <?php echo $row['head'];?></td>
                    <td><button class="update-btn"><a href="news_edit.php?id=<?php echo $row['id'];?>&cato=sport&j_id=<?php echo $row['j_id'];?>">Edit</button>
                        <button class="delete-btn"><a href="news_delete.php?id=<?php echo $row['id'];?>&cato=sport&j_id=<?php echo $row['j_id'];?>">Delete</button>
                    </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            </div>

            </div>

            <div class="con2">


        <!-- ......... business news ........... -->


        <div class="news_con">
        <label>Business NEWS</label>
            <table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Heading</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>

    <?php
    $JID = $_GET['id'];
    $query ="SELECT * FROM business WHERE j_id = $JID ORDER BY id DESC";
    $rows = $conn->query($query);
      
    ?>


    
                    <?php foreach($rows as $row) :?>
                    <tr>
                    <td>  <?php echo $row['id'];?></td>
                    <td> <img src="../photos/business_photos/<?php echo $row['pic'];?>"></td>
                    <td> <?php echo $row['head'];?></td>
                    <td><button class="update-btn"><a href="news_edit.php?id=<?php echo $row['id'];?>&cato=business&j_id=<?php echo $row['j_id'];?>">Edit</button>
                        <button class="delete-btn"><a href="news_delete.php?id=<?php echo $row['id'];?>&cato=business&j_id=<?php echo $row['j_id'];?>">Delete</button>
                    </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            </div>


    <!-- ............ travel news ................... -->
    <div class="news_con">
        <label>Travel NEWS</label>
            <table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Heading</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>

    <?php
    $JID = $_GET['id'];
    $query ="SELECT * FROM travel WHERE j_id = $JID ORDER BY id DESC";
    $rows = $conn->query($query);
    ?>


    
                    <?php foreach($rows as $row) :?>
                    <tr>
                    <td>  <?php echo $row['id'];?></td>
                    <td> <img src="../photos/travel_photos/<?php echo $row['pic'];?>"></td>
                    <td> <?php echo $row['head'];?></td>
                    <td><button class="update-btn"><a href="news_edit.php?id=<?php echo $row['id'];?>&cato=travel&j_id=<?php echo $row['j_id'];?>">Edit</button>
                        <button class="delete-btn"><a href="news_delete.php?id=<?php echo $row['id'];?>&cato=travel&j_id=<?php echo $row['j_id'];?>">Delete</button>
                    </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            </div>
            </div>

            <div class="con3">

    <!-- ............. entertainment news ................ -->

    <div class="news_con">
        <label>Entertainment NEWS</label>
            <table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Heading</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>

    <?php
    $JID = $_GET['id'];
    $query ="SELECT * FROM entertainment WHERE j_id = $JID ORDER BY id DESC";
    $rows = $conn->query($query);
    ?>


    
                    <?php foreach($rows as $row) :?>
                    <tr>
                    <td>  <?php echo $row['id'];?></td>
                    <td> <img src="../photos/entertainment_photos/<?php echo $row['pic'];?>"></td>
                    <td> <?php echo $row['head'];?></td>
                    <td><button class="update-btn"><a href="news_edit.php?id=<?php echo $row['id'];?>&cato=entertainment&j_id=<?php echo $row['j_id'];?>">Edit</button>
                        <button class="delete-btn"><a href="news_delete.php?id=<?php echo $row['id'];?>&cato=entertainment&j_id=<?php echo $row['j_id'];?>">Delete</button>
                    </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            </div>


            <!--- ........ politics ........ -->

            <div class="news_con">
        <label>Politics NEWS</label>
            <table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Heading</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>

    <?php
    $JID = $_GET['id'];
    $query ="SELECT * FROM politics WHERE j_id = $JID ORDER BY id DESC";
    $rows = $conn->query($query);
    ?>


    
                    <?php foreach($rows as $row) :?>
                    <tr>
                    <td>  <?php echo $row['id'];?></td>
                    <td> <img src="../photos/politics_photos/<?php echo $row['pic'];?>"></td>
                    <td> <?php echo $row['head'];?></td>
                    <td><button class="update-btn"><a href="news_edit.php?id=<?php echo $row['id'];?>&cato=politics&j_id=<?php echo $row['j_id'];?>">Edit</button>
                        <button class="delete-btn"><a href="news_delete.php?id=<?php echo $row['id'];?>&cato=politics&j_id=<?php echo $row['j_id'];?>">Delete</button>
                    </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            </div>
            </div>
    </div>
</body>
</html>