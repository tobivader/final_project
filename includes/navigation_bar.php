<?php
    //Value in the search box
    $searchItem=$_POST['searchbox'] ?? null;
    if(isset($_POST['submit']) && strlen($searchItem)!=0)
    {
        $_SESSION['searchitem']=$searchItem;
        header('Location: searchResults.php');
    }
?>
<header>
<nav>
    <i class="fa-solid fa-yin-yang  fa-5x"></i>
    <div>
        <h1 id="logo">YOURLIST</h1>
        <form method="POST" enctype="multipart/form-data" action="">
            <input id="searchbox" type="textbox" name="searchbox" placeholder="Find your friend or their list...">
            <button type="submit" name="submit" id="nav_search">SEARCH</button>
        </form>
        <button id="open">&#9776; </button>
    </div>
</nav>
<div id="navbar">
    <div id="nav-content">
        <a id="navbar_home" href="./home.php">Home</a>
        <a id="navbar_acc" href="#">Account</a>
        <a id="navbar_ml" href="./list.php">Manage Lists</a>
        <a id="navbar_lo" href="#">Logout</a>
    </div>
</div>
</header>