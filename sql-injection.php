<?php 
    require_once('connection.php');
    if(isset($_GET['userId'])){
        $userID = $_GET['userId'];
        //$userID = addslashes($userID);
        $sql = "SELECT * FROM registration WHERE registration_id = '$userID'";
        $result = $conn->query($sql);
        print_r($result);
        while($row = $result->fetch_assoc()){
            echo "<br>/";
            print_r($row);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sql Injection</title>
    <style>
        
        .success-msg{
            background: rgba(0, 255, 0, 0.3);
            color : green;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0px;
        }
    </style>
</head>
<body>
    <div class="success-msg"><?php echo $sql; ?></div>
    <form action="">
        Enter user ID : 
        <input type="text" name="userId" required>
        <input type="submit" value="Find">
    </form>
</body>
</html>