<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/e4c6fd0b9b.js" crossorigin="anonymous"></script>
    <script defer src="./Js/home.js"></script>
    <script defer src="./Js/navbar.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/home.css">
    <title>Home Page</title>
</head>
<body>
    <?php include "includes/navigation_bar.php"; ?>
    <main>
        <div id="slide-container">
            <button id="left">&#xab;</button>
            <div id="box1">ABC</div>
            <div id="box2">BAC</div>
            <div id="box3">CAB</div>
            <button id="right">&#xbb;</button>
        </div>
        <div id="createList">
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam 
            nonummy nibh euismod tincidunt<br> ut laoreet dolore magna aliquam erat volutpat.</p>
            <span><a href="CreateList.php">Create</a> your own list now</span>
        </div>
    </main>
</body>
</html>