<!-- Create Admin Dashboard -->

<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif($_SESSION['usertype']=='alumni')
{
    header("location:login.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .content{
            margin-left: 40%;
            margin-top: 3%;
            font-size:20px;
            padding: 0px 10px;
        }
    </style>

    <?php

    include 'admin_css.php';
    ?>

  
<body>
    
   <?php
    
    include 'admin_sidebar.php';

   ?>

    <div class="content">
        <h1>Sidebar Accordion</h1>
        <h4>Welcome to the Admin Page! You can add or View an accordion with the help of the side navigation Bar.</h4>
        <h2>Sidebar Dropdown</h2>
        <h4>Click on the dropdown button to open the dropdown menu inside the side navigation.</h4>
        <h4>This sidebar is of full height (100%) and always shown.</h4>
        
    </div>

</body>
</html>