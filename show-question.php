<?php 
    //connection between database
    require_once('connection.php');

    //table name in database
    $sql = "SELECT * FROM question_bank";
    $result = $conn->query($sql);
    print_r($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
        table{
            border : 0.5px solid rgba(0,0,0,0.3);
            border-collapse: collapse;
        }
        th,td{
            padding: 5px;
            border : 0.5px solid rgba(0,0,0,0.3);
        }
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
    <table>
        <tr>
            <th>S No.</th>
            <th>question</th>
            <th>answer</th>
        </tr>
        <?php 
            $serial_no = 1;
            while($row = $result->fetch_assoc()){
                
        ?>
        <tr>
            <td><?php echo $serial_no; ?></td>
            <td><?php echo $row['question']; ?></td>
            <td><?php echo $row['answer']; ?></td>
            <td><a onclick="return confirm('Are you sure!')" href="delete-user.php?userId=<?php echo $row['registration_id']; ?>">Delete</td>
        </tr>
        <?php 
                $serial_no += 1;
            } 
        ?>
    </table>
</body>
</html>