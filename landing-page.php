<!-- login php -->
<?php
// start session
session_start();

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if (isset($_POST['submit'])) {

    include 'includes/library.php';
    $pdo = connectDB();

    //query for the username
    $sql = "SELECT * FROM Users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user]);
}

?>


<!DOCTYPE html>
<html lang="en" class="splashPage">

<head>
    <meta charset="UTF-8">
    <title>Generic List</title>
    <link rel="stylesheet" href="styles/landing-page.css">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Lato:300,400,700|Roboto:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/signup.css">
    <script src="https://kit.fontawesome.com/1c8ee6a0f5.js" crossorigin="anonymous"></script>
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
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio possimus a maiores aperiam rem expedita quas iure quasi ab perferendis reiciendis porro dolorem facilis illo accusamus repudiandae deserunt, placeat dolore amet! Eveniet earum impedit laboriosam, quaerat harum nobis fuga ab corporis laudantium ratione illum, nisi aliquid! Aut voluptatum molestias corporis!
            </p>

        </div>

        <div class="splashButtons">

            <button class="button-27" id="login" > Login</button>
            <button class="button-27" id="signup">Signup</button>

        </div>

        <div id="login_pop" class="modal">
            <!-- <form class="modal-content animate" action="/" method="post" novalidate>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <span class="error <?= !isset($errors['username']) ? 'hidden' : ""; ?>">Please enter your username</span>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <span class="error <?= !isset($errors['password']) ? 'hidden' : ""; ?>">Please enter your password</span>

                    <button id="login2" type="submit">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                    <button class="fa fa-google fa-fw " id="googlebtn"> Sign in with google</button>
                    <div class=" ">
                        <p>Don't have an account? <a href="signup.php">Sign Up</a>.</p>
                    </div>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button id="cancel" type="button" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>

            </form> -->
            <form id="main-form" class="modal-content animate" action=" " method="POST"> <!-- Self processing form that validates entered username and password -->
                <div>
                    <i class="fas fa-envelope"></i>
                    
                    <label for="username"></label>
                    <input id="username" name="username" type="text" placeholder="Username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"> <!-- Loads from cookie if it exists -->
                </div>
                <div>
                    <label for="password"><i class="fas fa-lock"></i></label>
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

                <div class="container" style="background-color:#f1f1f1">
                    <button id="cancel" type="button" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>

        <div id="signup_pop">
            
        </div>

    </div>
</body>

</html>