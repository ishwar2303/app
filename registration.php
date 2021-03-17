<?php 

    require_once('connection.php');

    $name = '';
    $contact = '';
    $email = '';
    $password = '';
    $confirm_password = '';
    $name_error = '';
    $contact_error = '';
    $email_error = '';
    $password_error = '';
    $confirm_password_error = '';
    $registration_message = '';

    function clean_input($str){
        $str = trim($str);
        $str = strip_tags($str);
        $str = addslashes($str);
        return $str;
    }

    if(isset($_GET['name']) && isset($_GET['contact']) && isset($_GET['gender']) && isset($_GET['email']) && isset($_GET['password']) && isset($_GET['confirmPassword'])){
        $name = $_GET['name'];
        $contact = $_GET['contact'];
        $gender = $_GET['gender'];
        $email = $_GET['email'];
        $password = $_GET['password'];
        $confirm_password = $_GET['confirmPassword'];

        $control = 1;
        if($name == ''){
            $name_error = 'Name required!';
            $control = 0;
        }
        else{ // if name is not empty
            $name = clean_input($name);
        }
        if($contact == ''){
            $contact_error = 'Contact required!';
            $control = 0;
        }
        else{
            $contact = clean_input($contact);
        }
        if($email == ''){
            $email_error = 'E-mail required!';
            $control = 0;
        }
        else{
            $email = clean_input($email);
        }
        if($password == ''){
            $password_error = 'Password required!';
            $control = 0;
        }
        else{
            $password = clean_input($password);
        }
        if($confirm_password == ''){
            $confirm_password_error = 'Confirm password required';
            $control = 0;
        }
        else{
            $confirm_password = clean_input($confirm_password);
        }
        if($password != $confirm_password){
            $confirm_password_error = 'Password not matched!';
            $control = 0;
        }
        
        if($control){
            // data base 
            $sql = "INSERT INTO `registration` (`registration_id`, `name`, `contact`, `email`, `gender`, `password`) VALUES (NULL, '$name', '$contact', '$email', '$gender', '$password')";
            $conn->query($sql);
            //mysqli_query($conn, $sql);
            $registration_message = 'Registration Successfull';
            header('Location: login.php');
            exit;
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
            background: #d5dcdc;
        }
        .main{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            font-family: -webkit-pictograph;
        }
        .name{
            padding-bottom: 20px;
        }
        input{
            padding: 10px;
            border-radius: 5px;
            border:.5px solid #bdc3c7;
            width: 300px;
            background: #e3e7e8;
        }
        .female{
            margin-left: 10px;
            margin-right: 10px;
            width: auto;
        }
        .male{
            margin-right: 10px;
            width:auto;
        }
        .input-label{
            font-weight: bold;
            color: #3498db;
            padding-bottom: 5px;

        }
        input:focus{
            box-shadow: 0px 0px 0px 4px #e9f4fb;
            border-color: #3498db;
            outline: none;
            transition: 400ms;
        }
        h1{
            padding-bottom: 20px;
        }
        button{
            padding: 10px;
            border-radius: 5px;
            font-weight: 10px;
            border: .9px solid ;
            background: #3498db;
            color: black;
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
    </style>
</head>
<body>
    <div class="main">
        <form action="" method="GET">
            <h1>Registration Form</h1>
            <?php if($registration_message != ''){ ?>
            <div class="success-msg"><?php echo $registration_message; ?></div>
            <?php } ?>
            <div class="name">
                <div class="input-label">
                    Name:
                </div>
                <div class="name-box">
                    <input type="text" name="name" value="<?php echo $name; ?>" required>
                </div>
                <div class="form-message"><?php echo $name_error; ?></div>
            </div>
            <div class="name">
                <div class="input-label">
                    Contact Number:
                </div>
                <div class="contact-box">
                    <input type="number" name="contact" value="<?php echo $contact; ?>">
                </div>
                <div class="form-message"><?php echo $contact_error; ?></div>
            </div>
            <div class="name">
                <div class="input-label">
                    Email Address:
                </div>
                <div class="email-box">
                    <input type="email" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-message"><?php echo $email_error; ?></div>
            </div>
            <div class="name">
                <input type="radio" class="male" name="gender" value="male">Male
                <input type="radio" class="female" name="gender" value="female">Female
            </div>
            <div class="name">
                <div class="input-label">
                    Password:
                </div>
                <div class="pass-box">
                    <input type="password" name="password" value="<?php echo $password; ?>">
                </div>
                <div class="form-message"><?php echo $password_error; ?></div>
            </div>
            <div class="name">
                <div class="input-label">
                    Confirm Password:
                </div>
                <div class="cpass-box">
                    <input type="password" name="confirmPassword" value="<?php echo $confirm_password; ?>">
                </div>
                <div class="form-message"><?php echo $confirm_password_error; ?></div>
            </div>
            <div class="button">
                <button>Submit</button>
            </div>
        </form>
    </div>
</body>
</html>