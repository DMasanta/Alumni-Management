<!-- Add Faculty Deatails in the Admin Dashboard -->

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
if(isset($_POST['add_faculty']))
{
    $f_name=$_POST['name'];
    $f_post=$_POST['post'];
    $f_description=$_POST['description'];
    $f_phone=$_POST['phone'];
    $f_email=$_POST['email'];
    
    $f_image=$_FILES['image']['name'];
    $dst="./Faculties/".$f_image;
    $dst_db="Faculties/".$f_image;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    $f_profile = $_FILES['pdf_file']['name'];
    $target="./Faculty_pdf/".$f_profile;
    $target_db="Faculty_pdf/".$f_profile;
    move_uploaded_file($_FILES['pdf_file']['tmp_name'],$target);

    $sql="INSERT INTO faculty (name,post,description,phone,email,image,pdf) VALUES('$f_name','$f_post','$f_description','$f_phone','$f_email','$dst_db','$target_db')";

    $result=mysqli_query($data,$sql);
    if($result)
    {
        header('location:add_faculty.php');
    }
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
    <style type="text/css">
        
        label{
            display:inline-block;
            width: 100px;
            text-align: right;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .div_deg {
            background-color: skyblue;
            width: 690px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgb(0 0 0 / 20%);
            /* display: flex;
            justify-content: center;
            align-items: center; */
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
        <center>
        <h1 class="title" >Add Faculty</h1>

        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Faculty Name</label>
                    <input type="text" name="name">
                </div>
                <br>
                <div>
                    <label>Post</label>
                    <input type="text" name="post">
                </div>
                <br>
                <div>
                    <label>Description</label>
                    <input type="text" name="description">
                </div>
                <br>
                <div>
                    <label>Phone</label>
                    <input type="phone" name="phone">
                </div>
                <br>
                <div>
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
                <br>
                <div>
                    <label>Image</label>
                    <input type="file" name="image">
                </div>
                <br>
                <div>
                    <label>Profile</label>
                    <input type="file" name="pdf_file">
                </div>
                <br>
                <div>
                    
                    <input class="btn btn-primary" type="submit" name="add_faculty" value="Add Faculty">
                </div>
            </form>
        </div>
        
        </center>
    </div>

</body>
</html>