<?php
require "./includes/library.php";
$pdo = connectDB();
if (isset($_POST['id'])) {


    $id = $_POST['id'];
    if (empty($id)) {
        echo  'error';
    } else {
        $list = $pdo->prepare("SELECT id, checked FROM list WHERE id =?");
        $list-> execute([$id]);
        $list = $list->fetch();
        $uID = $list['id'];
        $uchecked = $checked ? 0: 1;
        $res = $conn->query("UPDATE list SET checked =$uchecked WHERE ID = $uID");
        if($res){
            echo $checked;
        }
        else{
            echo "error";
        }
        $pdo = null;
        exit();
    }
} else {
    header("Location: ../list.ph?mess=error");
}
?>