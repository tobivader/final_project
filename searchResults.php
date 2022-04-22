<?php
    session_start();
    $lists=array();
    $userID=array();
    $listID=array();
    $searchItem="";
   if(isset($_SESSION['searchitem']) && !empty($_SESSION['searchitem']))
   {
        $searchItem=strtolower($_SESSION['searchitem']);
        $searchArray=explode(" ",$searchItem);
        //Call the database to load sample lists
        include 'includes/library.php';
        $pdo = connectDB();
        SearchDB($pdo, $lists, $searchArray, $listID, $userID);
   }
   //Query the data base for the searched word
   function SearchDB($database, &$lists, $searchArray, &$listID, &$userID)
   {
        //Query and sort in alphabetical order
        $list = "SELECT DISTINCT u.username, l.title , i.Item, l.listID, l.private, u.userID, l.exp_date FROM `Users` u,`ListContent` i, `list` l 
        WHERE l.userID=u.userID AND i.listID = l.listID 
        ORDER BY l.title ASC";
        $stmt_list = $database->query($list);
        $data= $stmt_list->fetchAll();
        $y=0;
        for($i=0; $i<count($data); $i++)
        {
            $currList=$data[$i]['listID'];
            $prevList=$currList;
            //Find the keyword
            if(contains(strtolower($data[$i]['title']), $searchArray))
            {
                $listID[$y]=$currList;
                $userID[$y]=$data[$i]['userID'];
                //Add the username and title to the list
                $lists[$y]="<h3>". $data[$i]['username'].": " .$data[$i]['title']." <div>Expires: ".$data[$i]['exp_date']."</div></h3 >";
                while($prevList==$currList)
                {
                    $prevList=$currList;
                    ++$i;
                    if($i>=count($data))
                    {
                        break;
                    }
                    $currList=$data[$i]['listID'];
                }
                $y+=1;
            }
        }
   }
   //Returns true if keyword is found, false otherwise
   function contains($str, $arr)
   {
       $NewStr=explode(" ",$str);
       foreach($arr as $needle)
       {
            foreach($NewStr as $word)
            {
                if($word==strtolower($needle) && ($word!='list' || $word!='lists') )
                {
                    return true;
                }
            }
       }
       return false;
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
        <?php $search =$_SESSION['searchitem'];?>
        <h1>Search results for: "<?= $search ?>"</h1>
        <section>
            <?php
                $i=0;
                //Display each search result, and attach a link containing the listID and userID
                foreach($lists as $results)
                {
                    echo "<li><a href=./tempList.php?listID=".$listID[$i]."&"."userID=".$userID[$i].">".$results."</a></li>";
                    $i+=1;
                }
            ?>
        </section>
    </main>
    <footer></footer>
</body>
</html>