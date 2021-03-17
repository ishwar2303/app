<?php
    $first_name = '';
    $last_name = '';
    $f_first_name = '';
    $f_last_name = '';
    $m_first_name = '';
    $m_last_name = '';
    $dob = '';
    $s_mobile = '';
    $f_mobile = '';
    $s_email = ''; 
    $f_email = ''; 
    $addhar = '';
    $address = '';
    $school_name = '';
    $doj = '';
    $first_name_error = '';
    $last_name_error = '';
    $f_first_name_error = '';
    $f_last_name_error = '';
    $m_first_name_error = '';
    $m_last_name_error = '';
    $dob_error = '';
    $s_mobile_error = '';
    $f_mobile_error = '';
    $s_email_error = ''; 
    $f_email_error = ''; 
    $addhar_error = '';
    $address_error = '';
    $school_name_error = '';
    $doj_error = '';
    if(isset($_GET['first_name']) && isset($_GET['last_name']) && isset($_GET['f_first_name']) && isset($$_GET['f_last_name']) && isset($_GET['m_first_name']) && isset($$_GET['m_last_name']) && isset($_GET['date_of_birth']) && isset($_GET['gender']) && isset($_GET['s_mobile_number']) && isset($_GET['f_mobile_number']) && isset($_GET['s_email']) && isset($_GET['f_email']) && isset($_GET['addhar']) && isset($_GET['address']) && isset($_GET['school_name']) && isset($_GET['date_of_joining'])){
        $first_name = $_GET['first_name'];
        $last_name = $_GET['last_name'];
        $f_first_name = $_GET['father_first_name'];
        $f_last_name = $_GET['father_last_name'];
        $m_first_name = $_GET['mother_first_name'];
        $m_last_name = $_GET['mother_last_name'];
        $dob = $_GET['date_of_birth'];
        $gender = $_GET['gender'];
        $s_mobile = $_GET['mobile_number'];
        $f_mobile = $_GET['father_mobile_number'];
        $s_email = $_GET['s_email']; 
        $f_email = $_GET['f_email']; 
        $addhar = $_GET['addhar'];
        $address = $_GET['address'];
        $school_name = $_GET['school_name'];
        $doj = $_GET['date_of_joining'];

        
        $control = 1;
        if($first_name == ''){
            $first_name_error = 'first Name required!';
            $control = 0;
        }
        if($last_name == ''){
            $last_name_error = ' Last Name required!';
            $control = 0;
        }
        if($f_first_name == ''){
            $first_name_error = 'first Name required!';
            $control = 0;
        }
        if($f_last_name == ''){
            $last_name_error = ' Last Name required!';
            $control = 0;
        }
        if($m_first_name == ''){
            $first_name_error = 'first Name required!';
            $control = 0;
        }
        if($m_last_name == ''){
            $last_name_error = ' Last Name required!';
            $control = 0;
        }
        if($dob == ''){
            $dob_error = 'DOB Required';
            $control = 0;
        }
        if($s_mobile == ''){
            $s_mobile_error = 'Contact required!';
            $control = 0;
        }
        if($f_mobile == ''){
            $f_mobile_error = 'Contact required!';
            $control = 0;
        }
        if($s_email == ''){
            $s_email_error = 'E-mail required!';
            $control = 0;
        }
        if($f_email == ''){
            $f_email_error = 'E-mail required!';
            $control = 0;
        }
        if($addhar == '')
        {
            $addhar_error = 'Addhar required';
            $control = 0;
        }
        if($address == '')
        {
            $address_error = 'Address required';
            $control = 0;
        }
        if($school_name == '')
        {
            $school_name_error = 'School name required';
            $control = 0;
        }
        if($doj == '')
        {
            $doj_error = 'Date of joining';
            $control = 0;
        }
    }
    else echo "in else";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
        }
        .name{
            display: flex;  
            padding-bottom: 20px;
        }
        .sub-child{
            display: flex;
            flex-direction: column;
            margin-right: 15px;
        }
        .number{
            display: flex;
            flex-direction: column;
            padding-bottom: 20px;
        }
        .mail{
            display: flex;
            flex-direction: column;
            padding-bottom: 20px;
        }
        .address{
            display: flex;
            flex-direction: column;
            padding-bottom: 20px;
            width: 300px;
        }
        .address input{
            width: 300px;
        }
        .date{
            display: flex;
            flex-direction: column;
            padding-bottom: 20px;
        }
        .gender input{
            margin-right: 10px;
            margin-bottom: 10px;
        }
        h1{
            padding-bottom: 30px;
        }
        .input-box input{
            background: #e3e7e8;
            border-radius: 5px;
            padding: 10px;
            height: 39px;
        }
        .date{
            display: flex;
            flex-direction: row;
        }
    </style>
</head>
<body>
    <div class="main">
        <h1>STUDENT'S REGISTRATION FORM</h1>
        <form action="">
            <div class="name">
                <div class="sub-child">
                    <div class="input-label">
                        First Name
                    </div>
                    <div class="input-box">
                        <input type="text" name="first_name">
                    </div>
                </div>
                <div class="sub-child">
                    <div class="input-label">
                        Last Name
                    </div>
                    <div class="input-box">
                        <input type="text" name="last_name">
                    </div>
                </div>
            </div>
            <div class="name">
                <div class="sub-child">
                    <div class="input-label">
                        Father's First Name
                    </div>
                    <div class="input-box">
                        <input type="text" name="f_first_name">
                    </div>
                </div>
                <div class="sub-child">
                    <div class="input-label">
                        Last Name
                    </div>
                    <div class="input-box">
                        <input type="text" name="f_last_name">
                    </div>
                </div>
            </div>
            <div class="name">
                <div class="sub-child">
                    <div class="input-label">
                        Mother's First Name
                    </div>
                    <div class="input-box">
                        <input type="text" name="m_first_name">
                    </div>
                </div>
                <div class="sub-child">
                    <div class="input-label">
                        Last Name
                    </div>
                    <div class="input-box">
                        <input type="text" name="m_last_name">
                    </div>
                </div>
            </div>
            <div class="date">
                <div class="input-label">
                    Date of Birth
                </div>
                <div class="input-box">
                    <input type="date" name="date_of_birth">
                </div>
                <div class="input-label">
                    Date of Joining
                </div>
                <div class="input-box">
                    <input type="date" name="date_of_joining">
                </div>
            </div>
            <div class="gender">
                <input type="radio" name="gender">Male
                <input type="radio" name="gender">Female
                </div>
            <div class="number">
                <div class="input-label">
                    Student's Mobile number
                </div>
                <div class="input-box">
                    <input type="number" name="s_mobile_number">
                </div>
            </div>
            <div class="number">
                <div class="input-label">
                    Father's Mobile number
                </div>
                <div class="input-box">
                    <input type="number" name="f_mobile_number">
                </div>
            </div>
            <div class="mail">
                <div class="input-label">
                    Student's Email
                </div>
                <div class="input-box">
                    <input type="email" name="s_email">
                </div>
            </div>
            <div class="mail">
                <div class="input-label">
                    Father's Email
                </div>
                <div class="input-box">
                    <input type="email" name="f_email">
                </div>
            </div>
            <div class="number">
                <div class="input-label">
                    Addhar number
                </div>
                <div class="input-box">
                    <input type="number" name="addhar">
                </div>
            </div>
            <div class="address">
                <div class="input-label">
                    Address
                </div>
                <div class="input-box">
                    <input type="text" name="address">
                </div>
            </div>
            <div class="address">
                <div class="input-label">
                    School Name
                </div>
                <div class="input-box">
                    <input type="text" name="school_name">
                </div>
            </div>
            <div class="date">
                <div class="input-label">
                    Date of Joining
                </div>
                <div class="input-box">
                    <input type="date" name="date_of_joining">
                </div>
            </div> 
            <div class="button">
                <button>Submit</button>
            </div>    
        </form>
    </div>
</body>
</html>