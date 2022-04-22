<?php
// lOGIN PHP
    session_start();
    $errors=array();
    require "./includes/library.php";
    /* Connect to DB */
    $pdo = connectDB();
    //IF submitted -- validate for whether username exists in database or not
    if(isset($_POST['login_submit']))
    {
        $username=$_POST['username'] ?? NULL;
        $password=$_POST['password'] ?? NULL;
        /* Check the database for the $username */
        $query = "SELECT userID, username, password FROM `Users` WHERE username = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([ $username ]);
        $results = $statement->fetch();
        if ($results==NULL)
        {
            $errors['username']=true;
        }
        else
        {
            if($results['password']==$password)
            {
               header("Location: home.php");
            }
            else{
                $errors['password']=true;
            }
        }
    }
    $valid = true;
    //Validate signup
    if(isset($_POST['signup_submit']))
    {
        $query = "SELECT username FROM Users";
        $username=$_POST['s_username'] ?? NULL;
        $stmt = $pdo->query($query);
        foreach($stmt as $row)
        {
            if($row['username']==$username || $username==NULL)
            {
                $errors['s_username']=true;
                $valid = false;
                break;
            }
        }
        $email=$_POST['s_email'];
        $password=$_POST['s_password'];
        $repeat_password=$_POST['s_rp-password'];
        if(!isset($email) || filter_var($email, FILTER_VALIDATE_EMAIL)==FALSE)
        {
            $errors['s_email']=true;
            $valid=false;
        }
        if(isset($password))
        {
            if($password!=$repeat_password)
            {
                $errors['s_password']= true;
                $valid=false;
            }
        }
        else{
            $errors['s_password']= true;
            $valid=false;
        }
        if($valid)
        {
            //Insert into user database
            Insert($username, $email, $password, $pdo);
            $_SESSION['username']=$username;
            header("Location: home.php");
        }
    }
    function Insert($username, $email, $password, $database)
    {
        $query = "INSERT into Users values (?,?,?,?)";
        $stmt = $database->prepare($query);
        $stmt->execute([NULL,$username, $email, $password]);
    }
?>


<!DOCTYPE html>
<html lang="en" class="splashPage">
<head>
    <meta charset="UTF-8">
    <title>Generic List</title>
    <link rel="stylesheet" href="styles/landing-page.css">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Lato:300,400,700|Roboto:300,400,700&display=swap" rel="stylesheet">
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
                    <span class="error <?=!isset($errors['username']) ? 'hidden' : "";?>">Username does not exist</span>
                </div>

                <div>
                    <i class="fa-solid fa-lock"></i>
                    <label for="password"></label>
                    <input id="password" name="password" type="password" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"> <!-- Loads from cookie if it exists -->
                    <span class="error <?=!isset($errors['password']) ? 'hidden' : "";?>">Please correct password</span>
                </div>
                <div>
                    <?php if (isset($_COOKIE['checked']) && $_COOKIE['checked'] == true): ?> <!-- Checks if the checkbox cookie is checked -->
                        <input type="checkbox" id="remember" name="remember" checked> <!-- If it is, create remember me already checked -->
                    <?php else: ?> <!-- Otherwise create an unchecked box.  When user unchecks box their cookies are reset to null values -->
                        <input type="checkbox" id="remember" name="remember">
                    <?php endif; ?>
                    <label for="remember">Remember me</label>
                </div>

                <button id="login_submit" name="login_submit" class="centered">Login</button>

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
                    <input type="text" name="s_username" id="s_username"  placeholder="Enter Username" required>
                    <span class="error <?=!isset($errors['s_username']) ? 'hidden' : "";?>">Please enter an available username</span>
                </div>

                <div class="form-control ">
                    <i class="fa-solid fa-envelope"></i>
                    <label for="email"><b></b></label>
                    <input type="text" name="s_email" id="s_email" placeholder="Enter Email" required>
                    <span class="error <?=!isset($errors['s_email']) ? 'hidden' : "";?>">Please enter a valid email</span>
                </div>

                <div class="form-control">
                    <i class="fa-solid fa-lock"></i>
                    <label for="email"><b></b></label>
                    <input type="password" name="s_password" id="s_password" placeholder="Password" required>
                    <small></small>
                </div>

                <div class="form-control">
                    <i class="fa-solid fa-lock"></i>
                    <label for="email"><b></b></label>
                    <input type="password" name="s_rp-password" id="s_rp_password" placeholder="Repeat Password" required>
                    <span class="error <?=!isset($errors['s_password']) ? 'hidden' : "";?>">Please entere matching passwords</span>
                </div>

                <input type="submit" name="signup_submit" class="registerbtn">Sign Up</input>
                <div class="container">
                    <button id="signup_cancel" type="button" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </div>

    </div>
</body>
</html>