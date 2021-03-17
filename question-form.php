<?php 

    //estiblishing connection with database
    require_once('connection.php');

    //variable decleration
    $question_1 = '';
    $question_2 = '';
    $question_3 = '';
    $question_4 = '';
    $question_5 = '';
    $question_6 = '';
    $question_7 = '';
    $question_8 = '';
    $question_9 = '';
    $question_10 = '';
    $question_11 = '';
    $question_12 = '';
    $question_13 = '';
    $question_14 = '';
    $question_15 = '';
    $answer_1 = '';
    $answer_2 = '';
    $answer_3 = '';
    $answer_4 = '';
    $answer_5 = '';
    $answer_6 = '';
    $answer_7 = '';
    $answer_8 = '';
    $answer_9 = '';
    $answer_10 = '';
    $answer_1 = '';
    $answer_12 = '';
    $answer_13 = '';
    $answer_14 = '';
    $answer_15 = '';
    $question_error = '';
    $answer_error = '';
    $registration_message = '';

    //To capture the data from the URL
    if(isset($_GET['question_1']) && isset($_GET['answer_1']) && isset($_GET['question_2']) && isset($_GET['answer_2']) && isset($_GET['question_3']) && isset($_GET['answer_3']) && isset($_GET['question_4']) && isset($_GET['answer_4']) && isset($_GET['question_5']) && isset($_GET['answer_5'])){
        $question_1 = $_GET['question_1'];
        $question_2 = $_GET['question_2'];
        $question_3 = $_GET['question_3'];
        $question_4 = $_GET['question_4'];
        $question_5 = $_GET['question_5'];
        $question_6 = $_GET['question_6'];
        $question_7 = $_GET['question_7'];
        $question_8 = $_GET['question_8'];
        $question_9 = $_GET['question_9'];
        $question_10 = $_GET['question_10'];
        $question_11 = $_GET['question_11'];
        $question_12 = $_GET['question_12'];
        $question_13 = $_GET['question_13'];
        $question_14 = $_GET['question_14'];
        $question_15 = $_GET['question_15'];
        $answer_1 = $_GET['answer_1'];
        $answer_2 = $_GET['answer_2'];
        $answer_3 = $_GET['answer_3'];
        $answer_4 = $_GET['answer_4'];
        $answer_5 = $_GET['answer_5'];
        $answer_6 = $_GET['answer_6'];
        $answer_7 = $_GET['answer_7'];
        $answer_8 = $_GET['answer_8'];
        $answer_9 = $_GET['answer_9'];
        $answer_10 = $_GET['answer_10'];
        $answer_11 = $_GET['answer_11'];
        $answer_12 = $_GET['answer_12'];
        $answer_13 = $_GET['answer_13'];
        $answer_14 = $_GET['answer_14'];
        $answer_15 = $_GET['answer_15'];


        
        //check weather the data is inserted or not
        $control = 1;
        if($question_1 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_1 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_2 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_2 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_3 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_3 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_4 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_4 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_5 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_5 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_6 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_6 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_7 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_7 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_8 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_8 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_9 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_9 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_10 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_10 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_11 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_11 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_12 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_12 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_13 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_13 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_14 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_14 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($question_15 == ''){
            $question_error = 'Question Required';
            $control = 0;
        }
        if($answer_15 == ''){
            $answer_error = 'Answer Required';
            $control = 0;
        }
        if($control){
            // data base 
            $sql_1 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_1', '$answer_1')"; 
            $sql_2 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_2', '$answer_2')"; 
            $sql_3 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_3', '$answer_3')"; 
            $sql_4 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_4', '$answer_4')"; 
            $sql_5 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_5', '$answer_5')"; 
            $sql_6 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_6', '$answer_6')"; 
            $sql_7 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_7', '$answer_7')"; 
            $sql_8 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_8', '$answer_8')"; 
            $sql_9 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_9', '$answer_9')"; 
            $sql_10 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_10', '$answer_10')"; 
            $sql_11 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_11', '$answer_11')"; 
            $sql_12 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_12', '$answer_12')"; 
            $sql_13 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_13', '$answer_13')"; 
            $sql_14 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_14', '$answer_14')"; 
            $sql_15 = "INSERT INTO `question_bank` (`question_id`, `question`, `answer`) VALUES (NULL, '$question_15', '$answer_15')";
            $conn->query($sql_1);
            $conn->query($sql_2);
            $conn->query($sql_3);
            $conn->query($sql_4);
            $conn->query($sql_5);
            $conn->query($sql_6);
            $conn->query($sql_7);
            $conn->query($sql_8);
            $conn->query($sql_9);
            $conn->query($sql_10);
            $conn->query($sql_11);
            $conn->query($sql_12);
            $conn->query($sql_13);
            $conn->query($sql_14);
            $conn->query($sql_15);

            //registration message
            $registration_message = 'Question added Successfull';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question bank</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        .background-img{
            position: absolute;
            width: 100%;
            height: 100vh;
            left: 0px;
            top: 0px;
            position: fixed;
            z-index: -1;
        }
        .main{
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 10px;
            z-index: 2;
        }
        .question-box{
            display: flex;
        }
        textarea{
            border-radius: 10px;
            border: 0.5px solid black;
            margin-top: 15px;
            padding: 10px;
            width: 400px;
            height: 50px;
            background: white;
        }
        .answer input{
            margin-top: 10px;
        }
        button{
            cursor: pointer;
            color: white;
            margin-top: 20px;
            width: 91px;
            height: 35px;
            background: #3498db;
            border-radius: 5px;
            border: 0.5px solid black;
        }
        .form-message{
            color : red;
            font-size: 12px;
        }
        .success-msg{
            background: rgba(0, 255, 0, 0.3);
            color : green;
            padding: 10px;
            border-radius: 5px;
        }
        h1{
            color: white;
        }
    </style>
</head>
<body>
    <img class="background-img" src="question.jpg" alt="">
    
    <div class="main">
    <h1>Add Questions To Question Bank</h1>
        <form action="">
            <?php if($registration_message != ''){ ?>
                <div class="success-msg"><?php echo $registration_message; ?></div>
            <?php } ?>
            <div class="question_box">
                <textarea name="question_1" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_1" value="true">True&nbsp;&nbsp;
                <input type="radio" name="answer_1" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_2" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_2" value="true">True&nbsp;&nbsp;
                <input type="radio" name="answer_2" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_3" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_3" value="true">True&nbsp;&nbsp;
                <input type="radio" name="answer_3" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_4" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_4" value="true">True&nbsp;&nbsp;
                <input type="radio" name="answer_4" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_5" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_5" value="True">True&nbsp;&nbsp;
                <input type="radio" name="answer_5" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_5" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_5" value="True">True&nbsp;&nbsp;
                <input type="radio" name="answer_5" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_6" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_6" value="True">True&nbsp;&nbsp;
                <input type="radio" name="answer_6" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_7" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_7" value="True">True&nbsp;&nbsp;
                <input type="radio" name="answer_7" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_8" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_8" value="True">True&nbsp;&nbsp;
                <input type="radio" name="answer_8" value="false">False
            </div>
            <div class="question_box">
                <textarea name="question_9" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_9" value="True">True&nbsp;&nbsp;
                <input type="radio" name="answer_9" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_10" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_10" value="True">True&nbsp;&nbsp;
                <input type="radio" name="answer_10" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_11" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_11" value="True">True&nbsp;&nbsp;
                <input type="radio" name="answer_11" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_12" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_12" value="True">True&nbsp;&nbsp;
                <input type="radio" name="answer_12" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_13" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_13" value="True">True&nbsp;&nbsp;
                <input type="radio" name="answer_13" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_14" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_14" value="True">True&nbsp;&nbsp;
                <input type="radio" name="answer_14" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="question_box">
                <textarea name="question_15" id=""></textarea>
            </div>
            <div class="form-message"><?php echo $question_error; ?></div>
            <div class="answer">
                <input type="radio" name="answer_15" value="True">True&nbsp;&nbsp;
                <input type="radio" name="answer_15" value="false">False
            </div>
            <div class="form-message"><?php echo $answer_error; ?></div>
            <div class="button">
                <button>SUBMIT</button>
            </div>
        </form>
    </div>
</body>
</html>