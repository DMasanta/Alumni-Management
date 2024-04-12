<!-- Update page of Student data in the All user Dashboard -->

<?php

session_start();

if(!isset($_SESSION['password']))
{
    header("location:student_login.php");
}
elseif(!isset($_SESSION['registration']))
{
    header("location:student_login.php");
}

$host="localhost";
$user="root";
$password="";
$db="alumni_project";

$data=mysqli_connect($host,$user,$password,$db);

if(!$data){
    die("connection to this database filed due to" . mysqli_connect_error());
}

// $id=$_GET['student_id'];
$reg=$_SESSION['registration'];

$sql="SELECT * FROM student WHERE registration='$reg' ";

$result=mysqli_query($data,$sql);
$info= mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $semester=$_POST['semester'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $password=$_POST['password'];

    $query="UPDATE `student` SET `email` = '$email', `phone` = '$phone', `semester` = '$semester', `dob` = '$dob', `gender` = '$gender', `address` = '$address', `password` = '$password' WHERE `student`.`registration` = '$reg'";

    
    if (mysqli_query($data, $query)) {
        echo "<script type='text/javascript'>
        alert('Data Updated Successfully');
        </script>";
        header('location:view_student_1.php');
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
    <title>Update Student Page</title>
    <link rel="stylesheet" type="text/css" href="student.css">

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
        .div_deg textarea,
        .div_deg select{
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
    
    include 'student_sidebar.php';

   ?>

<div class="content">
    <center>
        <h1 class="title">Update Student Profile</h1>
        

        <div class="div_deg">

            <form action="#" method="POST">
               
                <div>
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Update your email" value="<?php echo "{$info['email']}" ?>">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="phone" name="phone" placeholder="Update your phone number" value="<?php echo "{$info['phone']}" ?>">
                </div>
                <div>
                    <label>Semester</label>
                    <!-- <input type="text" name="semester" value=""> -->
                    <select name="semester" id="">
                        <option><?php echo "{$info['semester']}" ?></option>
                        <option>1st Semester</option>
		                <option>2nd Semester</option>
                        <option>3rd Semester</option>
                        <option>4th Semester</option>
                        <option>5th Semester</option>
                        <option>6th Semester</option>
                    </select>
                </div>
                <div>
                    <label>Date Of Birth</label>
                    <input type="date" name="dob" placeholder="Update your date of birth" value="<?php echo "{$info['dob']}" ?>">
                </div>
                <div>
                <label>Gender</label>
                <select class="dropbtn" name="gender" >
                        <option><?php echo "{$info['gender']}" ?></option>
                        <option>MALE</option>
		                <option>FEMALE</option>
                        <option>OTHERS</option>
                </select>
                </div>
                
                <div>
                    <label>Address</label>
                    <textarea name="address" type="text" placeholder="Update your address" cols="50" rows="4"><?php echo "{$info['address']}" ?></textarea >
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password" placeholder="Update your password" value="<?php echo "{$info['password']}" ?>">
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