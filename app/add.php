<?php
require "./includes/library.php";


$pdo = connectDB();
if (isset($_POST['additem'])) {
    // require_once("./includes/library.php");



    $title = $_POST['additem'];
    if(empty($title)) {
        header("Location: ../list.php?mess=error");
    } else {
        $stmt = $pdo->prepare("INSERT INTO list(title) VALUE(?)");
        $res = $stmt->execute([$title]);
        if ($res) {
            header("Location: ../list.php?mess =success");
        } else {
            header("Location: ../list.php");
        }
        $pdo = null;
        exit();
    }
} else {
    header("Location: ../list.ph?mess=error");
}
