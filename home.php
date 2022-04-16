<?php
    //Pass the username to the session global array
    session_start();
    $listItems = array();       //Stores the slideshow items
    //Call the database to load sample lists
    include 'includes/library.php';
    $pdo = connectDB();
    loadListItems($pdo, $listItems);

    //Function to fetch the first 3 public lists from the db
    function loadListItems($database, &$listItems)
    {
        $query = "SELECT * FROM `list`";
        $stmt = $database->query($query);
        $i=0;
        foreach($stmt as $row)
        {
          //Test run to see content of list NOT CHECKING IF PUBLIC/PRIVATE HERE
          $data="<p>".$row['listID']."</p>"."<p>".$row['title']."</p>"."<p>".$row['exp_date']."</p>";
          $listItems[$i] = strval($data); 
          $i+=1;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/e4c6fd0b9b.js" crossorigin="anonymous"></script>
    <script defer src="./js/home.js"></script>
    <script defer src="./js/navbar.js"></script>
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
                echo"<div id=box1>$listItems[0]</div>";
                echo"<div id=box2>$listItems[1]</div>";
                echo"<div id=box3>$listItems[2]</div>";
            ?>
            <button id="right">&#xbb;</button>
        </div>
        <div id="createList">
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam 
            nonummy nibh euismod tincidunt<br> ut laoreet dolore magna aliquam erat volutpat.</p>
            <span><a href="./CreateList.php">Create</a> your own list now</span>
        </div>
    </main>
</body>
</html>