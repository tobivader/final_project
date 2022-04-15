<?php

session_start();
include 'includes/library.php';


$username = $_POST['username'] ?? null;

$email = $_POST['email'] ?? null;

$password = $_POST['password'] ?? null;

$rp_password = $_POST['rp-password'] ?? null;



$errors = array(); //empty array to add errors to.
$email_regex = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";

if(isset($_POST['submit'])){
    // $valid = true;

   

    //Connect to DB
    $pdo = connectDB();


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
    
    //Second implementation, would display all current errors
    // if (!empty($results)) { //Database contains a user registered with the name
    //     $errors['username'] = true;
    //     // array_push($errors, "Username taken.");
    //     // $valid = false;
    // }
    // if (!preg_match($email_regex, $email)) { //Checks if the email passes regex
    //     array_push($errors, "Invalid E-mail Formatting.");
    //     $valid = false;
    // }
    if ($password != $rp_password) { //Checks if the passwords entered match
        $errors['password'] = true;
        
    }


    // if ($valid) { //If the entered passwords match, and the username isn't already taken, continue with hashing the password
    //     $options = ['cost' => 12];
    //     $password = password_hash($password, PASSWORD_DEFAULT, $options); //Hash the password and store it in the database

    //     $sql="INSERT INTO Users values (NULL,?,?,?)";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->execute([ $username, $email, $password ]);

    //     $_SESSION['username'] = $username; //Gets necessary session variables
    //     $_SESSION['userID'] = $pdo->lastInsertId(); //Gets the last inserted ID from the database, which should associate with the just added user

    //     header("Location: Home.php"); //Redirects the user to their profile page
    //     exit();   
    // }
    
   
}
?>


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
        <h2>Sign Up</h2>
        <form action="" method="post" novalidate>
            <div>
                <label for="username"><b>Username:</b></label>
                <input type="text" name="username" id="username" placeholder="Enter Username" value="<?=$username?>" required>
                <span class="error <?=!isset($errors['username']) ? 'hidden' : "";?>">Please enter your username</span>
                <span class="error <?=!isset($errors['']) ? 'hidden' : "";?>">Username already exits.</span>
            </div>

            <div>
                <label for="email"><b>Email:</b></label>
                <input type="text" name="email" placeholder="Enter Email" required>
                <span class="error <?=!isset($errors['email']) ? 'hidden' : "";?>">Please enter a correct email</span>
            </div>

            <div>
                <label for="email"><b>Password:</b></label>
                <input type="password" name="password" placeholder="Password" required>
                <span class="error <?=!isset($errors['password']) ? 'hidden' : "";?>">Please enter your password</span>
            </div>

            <div>
                <label for="email"><b>Repeat Password:</b></label>
                <input type="password" name="rp-password" placeholder="Repeat Password" required>
                <span class="error <?=!isset($errors['rp-password']) ? 'hidden' : "";?>">Please repeat your password</span>
            </div>


            <button type="submit" name="submit" class="registerbtn">Sign Up</button>

            <div class=" ">
                <p>Already have an account? <a href="login.php">Login</a>.</p>
            </div>
        </form>
    </div>
    
</body>
</html>


