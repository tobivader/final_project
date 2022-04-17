<?php
require "./includes/library.php";
$pdo = connectDB();
if (isset($_POST['id'])) {


    $id = $_POST['id'];
    if (empty($id)) {
        echo  0;
    } else {
        $stmt = $pdo->prepare("DELETE FROM list WHERE listID=?");
        $res = $stmt->execute([$id]);
        if ($res) {
            echo "Are you sure ??";
        } else {
            echo 0;
        }
        $pdo = null;
        exit();
    }
} else {
    header("Location: ../list.ph?mess=error");
}
?>