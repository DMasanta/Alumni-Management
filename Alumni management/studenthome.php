<!-- Create All User Dashboard -->

<?php

// session_start();

// if(!isset($_SESSION['username']))
// {
//     header("location:login.php");
// }
// elseif($_SESSION['usertype']=='admin')
// {
//     header("location:login.php");
// }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Dashboard</title>
    <link rel="stylesheet" type="text/css" href="student.css">

    <?php

    include 'admin_css.php';
    ?>
    
</head>
<body>
    
<?php
    
    include 'student_sidebar.php';

   ?>

    <div class="content">
        <h1>Sidebar Accordion</h1>
        <p>Welcome to the Admin Page! You can add or View an accordion with the help of the side navigation Bar.</p>
    </div>

</body>
</html>