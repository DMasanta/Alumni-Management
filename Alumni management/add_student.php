<!-- Add Student Deatails in the Admin Dashboard -->

<?php

$insert = false;
if(isset($_POST['add_student']))
 {
$host="localhost";
$user="root";
$password="";
$db="alumni_project";

$data=mysqli_connect($host,$user,$password,$db);

if(!$data){
    die("connection to this database filed due to" . mysqli_connect_error());
}



    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $user_reg=$_POST['registration'];
    $user_batch=$_POST['batch'];
    $user_session=$_POST['session'];
    $user_gender=$_POST['gender'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_dob=$_POST['dob'];
    $user_doa=$_POST['doa'];
    $user_sem=$_POST['semester'];
    $user_address=$_POST['address'];
    $user_password=$_POST['password'];
    

    $check="SELECT * FROM student WHERE  registration = '$user_reg'";
    $check_user=mysqli_query($data,$check);
    $row_count=mysqli_num_rows($check_user);

    if($row_count==1){
        echo "<script type='text/javascript'>
        alert('Registration Number Alreaady Exist. Try Anathor One');
        </script>";
    }
    else
    {

    


$sql="INSERT INTO `student` (`fname`, `mname`, `lname`, `registration`, `batch`, `session`, `gender`, `email`, `phone`, `dob`, `doa`, `semester`, `address`, `password`) 
VALUES ('$fname', '$mname', '$lname', '$user_reg', '$user_batch', '$user_session', '$user_gender', '$user_email', '$user_phone', '$user_dob', '$user_doa', '$user_sem', '$user_address', '$user_password')";

if($data->query($sql) == true){
    echo "<script type='text/javascript'>
        alert('Data Uploaded Successfully');
        </script>";
        header("location:view_student.php");
    
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $data->error";
}

$data->close();
}
//     $result=mysqli_query($data,$sql);
//     if($result)
//     {
//         echo "Data uploaded successfully";
//     }
//     else
//     {
//         echo "Upload Failed";
//     }
// }
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
       
        
        .div_deg {
            background-color: skyblue;
            width: 690px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgb(0 0 0 / 20%);

        }
        input{
            border-radius: 10px;
            padding-bottom:5px;
            text-align:center;
        }
        select {
        width: 350px;
        margin: 10px;
        border-radius: 10px;
        padding-bottom:5px;
        text-align:center;
    }
    select:focus {
        min-width: 350px;
        width: auto;
        border-radius: 10px;
        padding-bottom:5px;
        text-align:center;
    }
    textarea{
        width: 350px;
        margin: 10px;
        border-radius: 10px;
        padding-bottom:5px;
        text-align:center;
    }
        /* button{
        type padding: 10px 20px; 
        border: none; 
        border-radius: 5px;
        cursor: pointer; 
        }

        button[type="submit"]:hover {
        background-color: #3e8e41; 
        } */

        
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
        <h1 class="title">Add Students</h1>

        <div class="div_deg">

            <form action="#" onsubmit="return validateForm();" method="POST">
                <center><width="450" style="border:hidden;font-size:25px"></center>
                    <table width="666" align="center" style="border:2px hidden;" >
            </tr>
            <table >
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">First Name</th>
                <td width="450" style="border:hidden; padding-left: 5px;padding-bottom:5px"><input size="45" type="text" value="" name="fname" placeholder="Enter First name"/></td>
            </tr>
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Mid Name</th>
                <td width="450" style="border:hidden; padding-left: 5px;padding-bottom:5px"><input size="45" type="text" value="" name="mname" placeholder="Enter Mid name"/></td>
            </tr>
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Last Name</th>
                <td width="450" style="border:hidden; padding-left: 5px;padding-bottom:5px"><input size="45" type="text" value="" name="lname" placeholder="Enter Last name"/></td>
            </tr>
            
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Registration Number </th>
                <td width="450" style="border:hidden; padding-left: 5px; padding-bottom:5px"><input size="45" type="text" value="" name="registration"placeholder="Enter Registration number"/></td>
            </tr>
           
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Course </th>
                <td width="450" style="border:hidden; padding-left: 5px; padding-bottom:5px">
		            <select class="dropbtn" name="batch" >
                        <option>Select Course</option>
                        <option>MCA</option>
		                <option>MSC</option>
                        <option>M.Tech</option>
        
			    </td>
            </tr>

            <th align="left" width="450" style="border:hidden;font-size:18px">Session </th>
            <td width="450" style="border:hidden; padding-left: 5px; padding-bottom:5px"><input size="45" type="text" value="" name="session" placeholder="Enter Session"/></td>
		        <!-- <select class="dropbtn" name="session" >
                <option></option>					
				<option>2005-2007</option>
                <option>2005-2008</option>
				<option>2006-2008</option>
                <option>2006-2009</option>
                <option>2007-2009</option>
				<option>2007-2010</option>
                <option>2008-2010</option>
				<option>2008-2011</option>
                <option>2009-2011</option>
				<option>2009-2012</option>
                <option>2010-2012</option>
				<option>2010-2013</option>
                <option>2011-2013</option>
				<option>2011-2014</option>
                <option>2012-2014</option>
				<option>2012-2015</option>
                <option>2013-2015</option>
				<option>2013-2016</option>
                <option>2014-2016</option>
				<option>2014-2017</option>
                <option>2015-2017</option>
				<option>2015-2018</option>
                <option>2016-2018</option>
				<option>2016-2019</option>
                <option>2017-2019</option>
                <option>2017-2020</option>
                <option>2018-2020</option>
                <option>2018-2021</option>
                <option>2019-2021</option>
                <option>2019-2022</option>
                <option>2020-2022</option>
                <option>2021-2023</option> -->
			</td>
            </tr>
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Gender </th>
                <td width="450" style="border:hidden; padding-left: 5px; padding-bottom:5px">
		            <select class="dropbtn" name="gender" >
                        <option>Select the Gender</option>
                        <option>MALE</option>
		                <option>FEMALE</option>
                        <option>OTHERS</option>
        
			    </td>
            </tr>
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Email </th>
                <td width="450" style="border:hidden; padding-left: 5px; padding-bottom:5px"><input size="45" type="email" value="" name="email" placeholder="Enter email id"/></td>
            </tr>
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Phone</th>
                <td width="450" style="border:hidden; padding-left: 5px; padding-bottom:5px"><input size="45" type="phone" value="" name="phone" placeholder="Enter phone number"/></td>
            </tr>
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">DOB</th>
                <td width="450" style="border:hidden; padding-left: 5px; padding-bottom:5px"><input size="45" type="date" value="" name="dob" placeholder=""/></td>
            </tr>
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Date of Addmission </th>
                <td width="450" style="border:hidden; padding-left: 5px; padding-bottom:5px"><input size="45" type="date" value="" name="doa" placeholder=""/></td>
            </tr>
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Current Semester </th>
                <td width="450" style="border:hidden; padding-left: 5px; padding-bottom:5px">
                <!-- <input size="45" type="text" value="" name="semester" placeholder="Enter Current Semester"/> -->
                <select class="dropbtn" name="semester" placeholder="Enter Current Semester">
                        <option>Select Current Semester</option>
                        <option>1st Semester</option>
		                <option>2nd Semester</option>
                        <option>3rd Semester</option>
                        <option>4th Semester</option>
                        <option>5th Semester</option>
                        <option>6th Semester</option>
                </select>
            </td>
            </tr>
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Address </th>
                <td width="450" style="border:hidden; padding-left: 5px; padding-bottom:5px">
                <!-- <input size="100" type="text" value="" name="address"/> -->
                <textarea name="address" type="text" cols="50" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Password </th>
                <td width="450" style="border:hidden; padding-left: 5px; padding-bottom:5px"><input size="45" type="password" value="" name="password"placeholder="Enter the password"/></td>
            </tr>
            <td colspan=2 align="center" style="border:hidden"><input type="submit" class="btn btn-primary" name="add_student" value="Add Student"></td>
            </tr>
            </table>
            </form>

        </div>
        </center>
    </div>

</body>
</html>