<?php
// lOGIN PHP
session_start();
require "./includes/library.php";

if ((isset($_SESSION['username']) && $_SESSION['username'] != '')) { //Checks if the user is already logged in, if so redirect to their profile
    header("Location: Login.php"); ////  change to profile.php
    exit();
}

//Array of errors which are displayed
$errors = [];

if (isset($_POST['submit'])) {
    /* Process log-in request */
    $username = $_POST['username'];
    $password = $_POST['password'];

    /* Connect to DB */
    $pdo = connectDB();

    /* Check the database for occurrences of $username */
    $query = "SELECT userID, username, password FROM `Users` WHERE username = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([ $username ]);
    $results = $statement->fetch();

    if ($results === FALSE) { //Checks if the DB call returns any values
        array_push($errors, "That user doesn't exist."); //If the username doesn't exist, notify the user
    } else if (password_verify($password, $results['password'])) { //Check if the entered password matches the hashed password in the database
        $_SESSION['username'] = $username; //If it does, set session variables accordingly
        $_SESSION['userID'] = $results['id'];

        //Check if the remember me function has been selected  ->https://tutorialsclass.com/code/php-login-remember-cookies-script
        if(!empty($_POST["remember"])) {
            setcookie ("username",$_POST["username"],time()+ 3600); //Creates a cookie for the username, password, and checkbox
            setcookie ("password",$_POST["password"],time()+ 3600);
            setcookie ("checked", true, time()+ 3600);
        } else { //If remember me is unticked, then cookies are reset and destroyed
            setcookie("username","");
            setcookie("password","");
            setcookie ("checked", false, time()+ 3600);
        }

        header("Location: CreateList.php"); //Redirects to profile upon successful login
        exit();
    } else {
        array_push($errors, "Incorrect password."); //If password is wrong, notify the user
        $_POST['failed'] = true;
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// SIGNUP PHP


$username = $_POST['username'] ?? null;

$email = $_POST['email'] ?? null;

$password = $_POST['password'] ?? null;

$rp_password = $_POST['rp-password'] ?? null;


$errors = array(); //empty array to add errors to.
$email_regex = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";

if(isset($_POST['submit'])){
    //Connect to DB
    // $pdo = connectDB();


    //Check the database if username already exists
    $sql = "SELECT username FROM `Users` WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ $username ]);
    $results = $stmt->fetch();


    //validate user has entered a name
    if (!isset($username) || strlen($username) === 0) {
        $errors['username'] = true;
        
    }else if(!empty($results)){
        $errors['username'] = true;
    }

    //Validate if user has entered valid email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'] = true;
        
    }
    
    if ($password != $rp_password) { //Checks if the passwords entered match
        $errors['password'] = true;
        
    }


    $options = ['cost' => 12];
    $password = password_hash($password, PASSWORD_DEFAULT, $options); //Hash the password and store it in the database

    $sql="INSERT INTO Users values (NULL,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ $username, $email, $password ]);

    $_SESSION['username'] = $username; //Gets necessary session variables
    $_SESSION['userID'] = $pdo->lastInsertId(); //Gets the last inserted ID from the database, which should associate with the just added user

    header("Location: CreateList.php"); //Redirects the user to their profile page
    exit();   
   
}
?>


<!DOCTYPE html>
<html lang="en" class="splashPage">

<head>
    <meta charset="UTF-8">
    <title>Generic List</title>
    <link rel="stylesheet" href="styles/landing-page.css">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Lato:300,400,700|Roboto:300,400,700&display=swap" rel="stylesheet">
    <!-- <script src="https://kit.fontawesome.com/1c8ee6a0f5.js" crossorigin="anonymous"></script> -->
    <script src="https://kit.fontawesome.com/5e107f84cc.js" crossorigin="anonymous"></script>
    <script defer src="scripts/master.js"></script>
</head>

<body class="splashPage">
    <div class="splashPage main-box">
        <div class="headerBG">
            <h1>Generic List</h1>
            <h4>Have fun, create and share </h4> <!-- Authors -->
        </div>
        <div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Optio possimus a maiores aperiam rem expedita quas iure quasi ab perferendis reiciendis 
                porro dolorem facilis illo accusamus repudiandae deserunt, placeat dolore amet! 
                Eveniet earum impedit laboriosam, quaerat harum nobis fuga ab corporis laudantium 
                ratione illum, nisi aliquid! Aut voluptatum molestias corporis!
            </p>

        </div>

        <div class="splashButtons">

            <button class="button-27" id="login" > Login</button>
            <div class="divider"></div>
            <button class="button-27" id="signup">Signup</button>

        </div>

        <div id="login_pop" class="modal">
            <form id="main-form" class="modal-content animate" action=" " method="POST"> <!-- Self processing form that validates entered username and password -->
                <div>
                    <i class="fa-solid fa-user"></i>
                    <label for="username"></label>
                    <input id="username" name="username" type="text" placeholder="Username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"> <!-- Loads from cookie if it exists -->
                </div>

                <div>
                    <i class="fa-solid fa-lock"></i>
                    <label for="password"></label>
                    <input id="password" name="password" type="password" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"> <!-- Loads from cookie if it exists -->
                </div>
                <div>
                    <?php if (isset($_COOKIE['checked']) && $_COOKIE['checked'] == true): ?> <!-- Checks if the checkbox cookie is checked -->
                        <input type="checkbox" id="remember" name="remember" checked> <!-- If it is, create remember me already checked -->
                    <?php else: ?> <!-- Otherwise create an unchecked box.  When user unchecks box their cookies are reset to null values -->
                        <input type="checkbox" id="remember" name="remember">
                    <?php endif; ?>
                    <label for="remember">Remember me</label>
                </div>

                <button id="login_submit" name="submit" class="centered">Login</button>
                <!-- <?php foreach ($errors as $error): ?> <!-- Displays all errors to the user -->
                    <p><?= $error ?></p>
                <?php endforeach; ?> -->

                <!-- <button class="fa fa-google fa-fw " id="googlebtn"> Sign in with google</button> -->

                <div class="container">
                    <button id="login_cancel" type="button" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>

        <div id="signup_pop" class="modal">
            <form action=" " method="post" id="s_form" novalidate class="modal-content animate">
                <div class="form-control">
                    <i class="fa-solid fa-user"></i>
                    <label for="username"><b></b></label>
                    <input type="text" name="username" id="s_username"  placeholder="Enter Username" value="<?=$username?>" required>
                    <small></small>
                    <!-- <span class="error <?=!isset($errors['username']) ? 'hidden' : "";?>">Please enter your username</span>
                    <span class="error <?=!isset($errors['']) ? 'hidden' : "";?>">Username already exits.</span> -->
                </div>

                <div class="form-control ">
                    <i class="fa-solid fa-envelope"></i>
                    <label for="email"><b></b></label>
                    <input type="text" name="email" id="s_email" placeholder="Enter Email" required>
                    <!-- <span class="error <?=!isset($errors['email']) ? 'hidden' : "";?>">Please enter a correct email</span> -->
                    <small></small>
                </div>

                <div class="form-control">
                    <i class="fa-solid fa-lock"></i>
                    <label for="email"><b></b></label>
                    <input type="password" name="password" id="s_password" placeholder="Password" required>
                    <!-- <span class="error <?=!isset($errors['password']) ? 'hidden' : "";?>">Please enter your password</span> -->
                    <small></small>
                </div>

                <div class="form-control">
                    <i class="fa-solid fa-lock"></i>
                    <label for="email"><b></b></label>
                    <input type="password" name="rp-password" id="s_rp_password" placeholder="Repeat Password" required>
                    <!-- <span class="error <?=!isset($errors['rp-password']) ? 'hidden' : "";?>">Please repeat your password</span> -->
                    <small></small>
                </div>


                <button type="submit" name="submit" class="registerbtn">Sign Up</button>
                <div class="container">
                    <button id="signup_cancel" type="button" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </div>

    </div>
</body>
</html>