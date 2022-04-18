<?php
// Get the acutal document and webroot path for virtual directories
$direx = explode('/', getcwd());
define('DOCROOT', "/$direx[1]/$direx[2]/"); // /home/username/
define('WEBROOT', "/$direx[1]/$direx[2]/$direx[3]/"); //home/username/public_html

/*############################################################
Function for connecting to the database
##############################################################*/

function connectDB()
{
    // Load configuration as an array.
    $config = parse_ini_file(DOCROOT . "pwd/config.ini");
    $dsn = "mysql:host=$config[domain];dbname=$config[dbname];charset=utf8mb4";

    try {
        $pdo = new PDO($dsn, $config['username'], $config['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }

    return $pdo;
}
//Function to fetch all the public lists from the db
//Takes in $pdo - $database and an array to store the lists - $listItems
function loadPublicLists($database, &$listItems)
{
    $list = "SELECT u.username, i.Item, l.listID, l.private FROM `Users` u,`ListContent` i, `list` l 
    WHERE l.userID=u.userID AND l.userID = i.userID AND i.listID = l.listID 
    ORDER BY l.listID ";
    $stmt_list = $database->query($list);
    $i=0;       //Index 0 is empty 
    $currList="";
    foreach($stmt_list as $row)
    {
        if($row['private']==0)      //If private add it to the 
        {
            //Get the current user of the list
            if($row['listID']!=$currList)
            {
                  $i+=1;
                    $listItems[$i]="<h3>". $row['username']."</h3 >";
            }
            $listItems[$i].="<li>".$row['Item']."</li>";
            $currList=$row['listID'];
         }
    }
}

//Function to fetch all the public and private lists from the db
function loadLists($database, &$listItems)
{
    $list = "SELECT u.username, i.Item, l.listID, l.private FROM `Users` u,`ListContent` i, `list` l 
    WHERE l.userID=u.userID AND l.userID = i.userID AND i.listID = l.listID 
    ORDER BY l.listID ";
    $stmt_list = $database->query($list);
    $i=0;       //Index 0 is empty 
    $currList="";
    foreach($stmt_list as $row)
    {
        //Get the current user of the list
        if($row['listID']!=$currList)
        {
            $i+=1;
            $listItems[$i]="<h3>". $row['username']."</h3 >";
        }
        $listItems[$i].="<li>".$row['Item']."</li>";
        $currList=$row['listID'];
            
    }
}
