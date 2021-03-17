<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Styling</title>
    <style>
        .wrapper{
            padding: 50px;
            font-family: monospace;
        }
        .input-container{
            position: relative;
            margin-bottom: 15px;
        }
        .input-container > input{
            border : 0.5px solid rgba(0,0,0,0.5);
            border-radius: 3px;
            height: 50px;
            padding : 0px 15px;
            width: 300px;
            font-size : 18px;
        }
        
        .input-container > input:focus{
            outline : none;
            border-color: rgba(0,0,255,0.5);
            box-shadow: 0px 0px 0px 3px rgba(0,0,255,0.2);
            transition: 400ms;
        }

        .input-container > label{
            position: absolute;
            left : 15px;
            top : 50%;
            transform: translate(0,-50%);
            color: black;
            transition: 400ms;
            font-size: 18px;
        }
        .input-container > input:valid{
            border-color : blue;
        }
        .input-container > input:valid ~ label{
            position: absolute;
            left : 8px;
            top : 0;
            background: white;
            padding : 0px 3px;
            color : blue;
            transition: 400ms;
            font-size: 14px;
        }
        .input-label-set1{
            position: absolute;
            left : 15px;
            top : 50%;
        }
        .input-label-set2{
            position: absolute;
            left : 8px;
            top : 0;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="input-container">
            <input type="text" required>
            <label for="">E-mail</label>
        </div>
        
        <div class="input-container">
            <input type="password" >
            <label for="">Password</label>
        </div>
    </div>
</body>
</html>
