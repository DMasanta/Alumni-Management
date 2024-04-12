<!-- Update page of Student data in the Admin Dashboard -->

<?php

// session_start();

// if(!isset($_SESSION['username']))
// {
//     header("location:login.php");
// }
// elseif($_SESSION['usertype']=='alumni')
// {
//     header("location:login.php");
// }

$host="localhost";
$user="root";
$password="";
$db="alumni_project";

$data=mysqli_connect($host,$user,$password,$db);

if(!$data){
    die("connection to this database filed due to" . mysqli_connect_error());
}

$id=$_GET['student_id'];

$sql="SELECT * FROM student WHERE id='$id'";

$result=mysqli_query($data,$sql);
$info= mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $semester=$_POST['semester'];
    $dob=$_POST['dob'];
    $address=$_POST['address'];

    $query="UPDATE `student` SET `fname` = '$fname', `mname` = '$mname', `lname` = '$lname', `email` = '$email', `phone` = '$phone', `semester` = '$semester', `dob` = '$dob', `address` = '$address' WHERE `student`.`id` = '$id'";

    
    if (mysqli_query($data, $query)) {
        echo "<script type='text/javascript'>
        alert('Data Updated Successfully');
        </script>";
        header('location:view_student.php');
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
        .div_deg textarea, select{
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
        <h1 class="title">Update Student</h1>
        

        <div class="div_deg">

            <form action="#" method="POST">
                <div>
                    <label>First Name</label>
                    <input type="text" name="fname" placeholder="Update Student First Name" value="<?php echo "{$info['fname']}" ?>">
                </div>
                <div>
                    <label>Mid Name</label>
                    <input type="text" name="mname" placeholder="Update Student Mid Name" value="<?php echo "{$info['mname']}" ?>">
                </div>
                <div>
                    <label>Last Name</label>
                    <input type="text" name="lname" placeholder="Update Student Last Name" value="<?php echo "{$info['lname']}" ?>">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Update Student email" value="<?php echo "{$info['email']}" ?>">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="phone" name="phone" placeholder="Update Student phone number" value="<?php echo "{$info['phone']}" ?>">
                </div>
                <div>
                    <label>Date Of Birth</label>
                    <input type="date" name="dob" placeholder="Update your date of birth" value="<?php echo "{$info['dob']}" ?>">
                </div>
                <div>
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
                    <label>Address</label>
                    <textarea name="address" type="text" placeholder="Update Student address" cols="50" rows="4"><?php echo "{$info['address']}" ?></textarea >
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