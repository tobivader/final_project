<?php
// start session
session_start();

$username = $_POST['username']?? null;
$password = $_POST['password']?? null;

if(isset($_POST['submit'])){

  include 'includes/library.php';
  $pdo = connectDB();
  
  //query for the username
  $sql="SELECT * FROM Users WHERE username = ?";
  $stmt=$pdo->prepare($sql);
  $stmt->execute([$user]);
    
}

?>

<span class="error <?=!isset($errors['email']) ? 'hidden' : "";?>">Please enter a correct email</span>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles/signup.css">
</head>
<body>
    <div class="container">
        <h2>Log In</h2>
        <form action="" method="post" novalidate>
            <div>
                <label for="username"><b>Username/Email:</b></label>
                <input type="text" name="username" id="username" placeholder="Enter Username or Email" value="<?=$username?>" required>
                <span class="error <?=!isset($errors['username']) ? 'hidden' : "";?>">Please enter your username</span>
            </div>

            

            <div>
                <label for="password"><b>Password:</b></label>
                <input type="password" name="password" placeholder="Enter Password" required>
                <span class="error <?=!isset($errors['password']) ? 'hidden' : "";?>">Please enter your password</span>
            </div>


            <button type="submit" name="submit" class="registerbtn">Log In</button>

            <div class=" ">
                <p>Don't have an account? <a href="signup.php">Sign Up</a>.</p>
            </div>
        </form>
    </div>
    
</body>
</html>



<!-- <section class="signup-form">
    <div class="center">
        <h1>Please Log In</h1>
        <form method="post">
            <div class="login-methods">
                <input type="text" name="name" placeholder="Username/Email"  required>
                <input type="password" name="password" placeholder="Password" required>
                
                <button type="submit" name="login">Login</button>

                
                <button id="forgot" class="modBtn" type="button">Forgot Password</button>

            </div>
        </form>
    </div>
</section> -->