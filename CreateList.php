<?php // needs editing 
session_start();
require "./includes/library.php";

// //if user doesnt have a username  
// if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) { // password or username instead of password
//     header("Location: Login.php");
//     exit();
// }

if (isset($_POST['submit'])) {

	$pdo = connectDB();

	$date = $_POST['date'];
	$private = 0;
	if (!empty($_POST['privacy'])) {
		$private = 1;
	}
	$query = "INSERT INTO list (`title`, `userID`, `expirydate`, `description`, `private`) VALUES (?,?,?,?,?)";
	$statement = $pdo->prepare($query);
	$statement->execute([$_POST['title'], $_SESSION['userID'], $date, $_POST['description'], $private]);
	header("Refresh:0"); // refreshses the page , if the user wants to continue making the list
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="styles/navbar.css">
	<link rel="stylesheet" href="styles/CreateList.css">
	<title>Create List</title>
	<script defer src="scripts/navbar.js"></script>
	<script defer src="scripts/script.js"> </script>
</head>

<body>
	<!-- header containing log in and checkout button -->
	<!-- sub header showing Gift registry and wishlist -->
	<?php include 'includes/navigation_bar.php';?>

	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class=" ">
		<div class=" ">
			<h3> Create Your List </h3>
			<p> Complete the following information to create your List </P>
		</div>
		<div class=" ">
			<!-- redirect the user to an account he has  -->
			<p><a href="ManageList.php">Already have a List? Click here to manage it.</a></p> <!-- needs more coding -->

			<!-- form post submit -->

			<form action="<?= $_SERVER['PHP_SELF'] ?>" id=" " method="post" enctype="multipart/form-data">
				<!-- needs more coding -->
				<div class="registry-profile">
					<div class="registry-profile-block">
						<h4>List Profile</h4>
						<div>
							<span style="text-align:left;">List Title <input name="title" type="text"></span>
							<span>ExpiryDate <input name="date" type="datetime-local" id="Test_DatetimeLocal"> </span>
							<!-- <span> <input type = "date" id = "date" name = "date" value = "2022--03--21" min = "2022-03-21" max = "2023-03-21"  >  </span> -->
						</div>
						<div>
							<!-- Description, required before form submission -->
							<span style="text-align: left;">Description <textarea name="description" id="description"></textarea></span>
						</div>
						<div>
							<label for="privacy"></i>Private</label>
							<!-- Allows the user to select if they want their list private or public -->
							<input id="privacy" name="privacy" type="checkbox">
						</div>
						<div>
							<span>List Image <input type="file" name="registry-image"> </span>
						</div>
						<p>5MB Max File Size
						</p>
					</div>
				</div>
		</div>

		<p class="giftreggie-create-buttons">
			<input id="discard-changes" type="button" value="Discard Changes">
			<input type="submit" name="submit" value="Create My List">
		</p>
	</form>

</body>

</html>