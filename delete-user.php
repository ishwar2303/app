<?php 
    require_once('connection.php');
    $userID = $_GET['userId'];
    $sql = "DELETE FROM registration WHERE registration_id = '$userID'";
    $conn->query($sql);
    echo "user with ". $userID." deleted successfully";
    header('Location: show-registered-user.php');
    exit;
?>