<?php
    require_once('connection.php');

    $sql = "SELECT * FROM question_bank";
    $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXAM</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
    </style>
</head>
<body>
    <div class="main">
        <h1>QIUZ</h1>
        <form action="">
            <div class="qa_box">
                <?php 
                    $serial_no = 1;
                    while($row = $result->fetch_assoc()){
                        
                ?>
                    <?php echo $serial_no; ?>
                    <?php echo $row['question'];?>
                    <div class="answer">
                        <input type="radio" name="answer_1" value="true">True
                        <input type="radio" name="answer_1" value="false">false
                    </div>
                    </br>
                <?php 
                        $serial_no += 1;
                    } 
                ?>    
            </div>
            <div class="submit">
                    <button>Submit</button>
            </div>
        </form>
    </div>
</body>
</html>