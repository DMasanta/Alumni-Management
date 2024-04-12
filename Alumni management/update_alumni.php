<!-- Update page of Alumni data in the Admin Dashboard -->

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

if(!$data){
    die("connection to this database filed due to" . mysqli_connect_error());
}

$id=$_GET['student_id'];

$sql="SELECT * FROM alumni WHERE id='$id'";

$result=mysqli_query($data,$sql);
$info= mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $company=$_POST['company'];
    $address=$_POST['address'];
    $password=$_POST['password'];

    $query="UPDATE `alumni` SET `fname` = '$fname', `mname` = '$mname', `lname` = '$lname', `email` = '$email', `phone` = '$phone', `company` = '$company', `a_address` = '$address', `a_password` = '$password' WHERE `alumni`.`id` = '$id'";

    
    if (mysqli_query($data, $query)) {
        echo "<script type='text/javascript'>
        alert('Data Uploaded Successfully');
        </script>";
        header('location:view_alumni.php');
      } else {
        echo "Error updating record: ". mysqli_error($data);
      }
      
      mysqli_close($data);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Alumni Page</title>
    <link rel="stylesheet" type="text/css" href="admin.css">

    <style type="text/css">

        /* label{
            display: inline-block;
            width:100px;
            text-align:right;
            padding-top:10px;
            padding-bottom:10px
        } */
       
        
        .div_deg {
            background-color: #f2f2f2;
            width: 690px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgb(0 0 0 / 20%);
            display: flex;
            justify-content: center;
            align-items: center;
    

        }
        .div_deg input,
        .div_deg textarea{
        border: 2px solid black;
        border-radius: 6px;
        font-size: 15px;
        width: 100%;
        text-align:center;
        border:hidden;
        display: inline-block;
        margin-bottom: 5px;
        /* padding-top:10px;
        padding-bottom:10px */
        padding: 5px;

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
        <h1 class="title">Update Alumni</h1>
        

        <div class="div_deg">

            <form action="#" method="POST">
                <div>
                    <label>First Name</label>
                    <input type="text" name="fname" placeholder="Update Alumni First Name" value="<?php echo "{$info['fname']}" ?>">
                </div>
                <div>
                    <label>Mid Name</label>
                    <input type="text" name="mname" placeholder="Update Alumni Mid Name" value="<?php echo "{$info['mname']}" ?>">
                </div>
                <div>
                    <label>Last Name</label>
                    <input type="text" name="lname" placeholder="Update Alumni Last Name" value="<?php echo "{$info['lname']}" ?>">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Update Alumni email" value="<?php echo "{$info['email']}" ?>">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" placeholder="Update Alumni phone number" value="<?php echo "{$info['phone']}" ?>">
                </div>
                <div>
                    <label>Company</label>
                    <input type="text" name="company" placeholder="Update Alumni Company name" value="<?php echo "{$info['company']}" ?>">
                </div>
                <div>
                    <label>Address</label>
                    <textarea name="address" type="text" placeholder="Update Alumni Address" cols="50" rows="4"><?php echo "{$info['a_address']}" ?></textarea >
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password" placeholder="Update Alumni password" value="<?php echo "{$info['a_password']}" ?>">
                </div>
                <div>
                <input class="btn btn-success" type="submit" name="update" value="Update">
                </div>

            </form>

        </div>
        
    </center>
</div>

</body>
</html>