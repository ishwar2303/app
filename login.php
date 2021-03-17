<?php
    $email = '';
    $password = '';
    $email_error = '';
    $password_error = '';
    if(isset($_GET['email']) && isset($_GET['password']))
    {
        $email = $_GET['email'];
        $password = $_GET['password'];

        $control = 1;
        if($email == '')
        {
            $email_error = 'Please enter email';
            $control = 0;
        }
        if($password == '')
        {
            $password_error = 'Please enter Password';
            $control = 0;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        .main{
            display: flex;
            justify-content: center;
            padding: 130px;
            background: #bdc3c7;
        }
        .form{
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 0.5px solid rgb(0,0,0,0.2);
            background: white;
            border-radius: 10px;
            padding: 68px;
            box-shadow: 0px 0px 10px 0px rgb(0 0 0 / 20%);
            width: 350px;
            background: #bedef4;
        }
        .name{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .input-box input{
            border: 0.5px solid black;
            border-radius: 3px;
            height: 10px;
            padding: 10px;
        }
        .button{
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }
        button{
            border-radius: 5px;
            border: 0.5px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="form">
            <h1>LOGIN SYSTEM</h1>
            <form action="">
                <div class="email">
                    <div class="name">
                        Email
                    </div>
                    <div class="input-box">
                        <input type="email" name="email">
                    </div>
                    <div><?php echo $email_error; ?></div>
                </div>
                <div class="password">
                    <div class="name">
                        Password
                    </div>
                    <div class="input-box">
                        <input type="text" name="password">
                    </div>
                    <div><?php echo $password_error; ?></div>
                </div>
                <div class="button">
                    <button>LOG IN</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>