<!-- login page for updating the alumni data in all user dashboard -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Dashboard</title>
    <link rel="stylesheet" type="text/css" href="student.css">
    <style type="text/css">
        /* .form_deg{
            background-color: #f2f2f2;
            width: 50%;
            padding: 10px;
            padding-top: 75px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgb(0 0 0 / 20%);
            display: flex;
            justify-content: center;
            align-items: center;
        } */
        .label_deg{
        display: inline-block;
        /* width: 100px; */
        text-align: right;
        /* padding-top: 10px; */
        padding-bottom: 10px;
        }
        .form_deg{
            padding-top: 75px;
            display: flex;
            justify-content: center;
            align-items: center;  
        }
        .form_deg input{
        border: 2px solid black;
        border-radius: 6px;
        font-size: 15px;
        /* width: 100%; */
        text-align:center;
        border:hidden;
        display: inline-block;
        /* margin-bottom: 5px; */
        /* padding-top:10px;
        padding-bottom:10px */
        padding: 5px;
        padding-right:20px;
        }
        
        .login_form{
            background-color: aliceblue;
            border-radius: 10px;
            box-shadow: 0 0 10px rgb(0 0 0 / 20%);
            width: 50%;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>

    <?php

    include 'admin_css.php';
    ?>
    
</head>
<body>
    
<?php
    
    include 'student_sidebar.php';

   ?>

    <div class="content">
        <center>
        <h1 class="title">Profile Login</h1><br>
        <h3 style="color:red">
                    <?php

                    error_reporting(0);
                    session_start();
                    session_destroy();
                     echo $_SESSION['loginMessage'];
                    ?>
        </h3>
        <div class="form_deg">
            <form action="profile_check.php" method="POST" class="login_form">
            <!-- <div>
                <label class="label_deg">Username</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <input type="text" name="username" placeholder="Enter Username">
            </div> -->
            <div>
                <label class="label_deg">Registration Number</label>&emsp;&emsp;&emsp;
                <input type="text" name="registration" placeholder="Enter Registration Number">
            </div>
            <div>
                <label class="label_deg">Please Enter the Password</label>&thinsp;
                <input type="password" name="password" placeholder="Enter your password" >
            </div>
            <div>
                <button class="btn btn-success" type="submit" name="submit">Login</button>
            </div>
            </form>
        </div>
        </center>
        
    </div>

</body>
</html>