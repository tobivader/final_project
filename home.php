<?php
    //Pass the username to the session global array
    session_start();
    $listItems = array();       //Stores the slideshow items
    //Call the database to load sample lists
    include 'includes/library.php';
    $pdo = connectDB();
    loadPublicLists($pdo, $listItems);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/e4c6fd0b9b.js" crossorigin="anonymous"></script>
    <script defer src="./scripts/home.js"></script>
    <script defer src="./scripts/navbar.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/master.css">
    <link rel="stylesheet" href="./styles/home.css">
    <title>Home Page</title>
</head>
<body>
    <?php include "includes/navigation_bar.php"; ?>
    <main>
        <div id="slide-container">
            <button id="left">&#xab;</button>

            <?php
                echo"<div id=box1>$listItems[1]</div>";
                echo"<div id=box2>$listItems[2]</div>";
                echo"<div id=box3>$listItems[3]</div>";
            ?>
            <button id="right">&#xbb;</button>
        </div>
        <div id="createList">
        <p>Welcome to our generic list creator. Here your can create any type of list with differnet items in it<br>
            Start creating your various generic lists now with just a click
            <span><a href="./list.php">Create</a></span></p>
        </div>
    </main>
</body>
</html>