<?php
    session_start();
    $searchitem=NULL;
   if(isset($_SESSION['searchitem']) && !empty($_SESSION['searchitem']))
   {
        $searchitem=$_SESSION['searchitem'];
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/e4c6fd0b9b.js" crossorigin="anonymous"></script>
    <script defer src="scripts/navbar.js"></script>
    <link rel='stylesheet' href="./styles/master.css" />
    <link rel='stylesheet' href="./styles/search_results.css" />
    <title>List Results</title>
</head>
<body>
    <?php include "includes/navigation_bar.php"; ?>
    <main>
        <h1>Search results for: "<?= $searchitem ?>"</h1>
    </main>
    <footer></footer>
</body>
</html>