<!-- View Faculty Page in the Admin Dashboard -->

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

$host="localhost";
$user="root";
$password="";
$db="alumni_project";

$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM faculty";

$result=mysqli_query($data,$sql);

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
    .testimonial{
        display: flex;
        width: 48%;
        margin: 7px;
        border: 1px solid rgb(6, 68, 68);
        border-radius: 9px;
        background-color: rgb(33, 165, 165);
        float:left;
        
        color: #fff;
        padding: 10px;
    }
    /* .col-md-6 img{
        border-radius: 15px;
        height: 94px;
        padding: 11px;
        position: relative;
        width: 100px;
        max-width: none;
    } */
    .testimonial h5{
        color: rgb(0, 255, 187);
    }
    .testimonial h4{
        color: rgb(0, 255, 187);
    }
    .testimonial h4 a{
        color: rgb(0, 255, 187);
        text-decoration:none;
    }
    .testimonial h4 a:hover{
        font-style: oblique;
        font-weight: bolder;
        font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
        font-size: 17px;
    }
    </style>

    <?php

    include 'admin_css.php';
    ?>

  
<body>
    
   <?php
    
    include 'admin_sidebar.php';

   ?>

    
    <center>
        <h1>Our Faculties</h1>
    </center>

    <div class="content">
        <div class="row">
            <?php

            while($info=$result-> fetch_assoc())
            {

            ?>
            
            <div class="testimonial">
                <div>
                <img class="faculty" src="<?php echo "{$info['image']}" ?>" height="176px" width="132px" style="margin: 5px;">
                <br>
                
                <a class="website" href="<?php echo "{$info['pdf']}" ?>" target="_blank" style="margin: 5px;">
                        <i class="fa fa-download" style="color: rgb(255, 255, 255); font-size: 10px">view profile</i>
                    </a>
                </div>
                <div style="padding: 10px;">
                <b>
                  <i>
                    <h4><a href="https://nbu.ac.in/"><?php echo "{$info['name']}" ?></a></h4>
                  </i>
                </b>
                  <b><h5><?php echo "{$info['post']}" ?></h5></b>
                  <p><?php echo "{$info['description']}" ?></p><br>
                  <i class="fa fa-phone" style="color: rgb(255, 255, 255);font-size: 20px;"></i>
                  <a style="text-decoration: none; color:#fff; font-size:20px" href="<?php echo "{$info['phone']}" ?>"><?php echo "{$info['phone']}" ?></a>
                 <br>
                 <i class="fa fa-envelope" style="color: rgb(255, 255, 255); font-size: 20px"></i>
                 <a style="text-decoration: none; color:#fff; font-size:20px" href="<?php echo "{$info['email']}" ?>"><?php echo "{$info['email']}" ?></a>
                     
                  

                </div>
            </div>

            <?php

            }

            ?>
        </div>

    </div>
        

</body>
</html>