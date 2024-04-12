<?php

error_reporting(0);
session_start();

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

$sql="SELECT * FROM alumni order by fname asc limit 25";

$result=mysqli_query($data,$sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.00/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="admin.css">

    <?php

    include 'admin_css.php';
    ?>
    <style type="text/css">

        /* .container{
            text-align: right;
            margin-left: 14%;
            margin-top: 2%;
            
        } */

    .content{
        text-align:center;
        
    }
     
    /* table{
        padding-right: 25px;
    } */
    .t_data{
        float:right;
        font-size:13.3px;
    }
    .table_th{
        padding: 2px;
        font-size:smaller;
        text-align:center;
        
    }
    .table_td{
        padding:2px;
        background-color:skyblue;
        font-size:12px;
        text-align:center;

        
    }

    </style>
</head> 
<body>
    
   <?php
    
    include 'admin_sidebar.php';

   ?>
    <!-- The search box code -->
   <!-- <div class="container">
    <form action="search.php" method="post">
        <input type="text" placeholder="Search the Data" name="search">
        <button class="btn btn-info btn-sm" name="submit">Search</button>
    </form>
    
   </div> -->



    <div class="content">
        <h1>Alumni Data</h1>
        <form action="search.php" method="post">
        <input type="submit" class="btn btn-info btn-sm" name="search" value="Search Alumni Data Here">
    </div>
    <div class="t_data">   
    </form><br>
        <?php
        if($_SESSION['message'])
        {
            echo $_SESSION['message'];
        }

        unset($_SESSION['message']);
        ?>

        <table border="1px">
            <tr>
                <th class="table_th">First Name</th>
                <th class="table_th">Mid Name</th>
                <th class="table_th">Last Name</th>
                <th class="table_th">Registration Number</th>
                <th class="table_th">Course</th>
                <th class="table_th">Session</th>
                <th class="table_th">Gender</th>
                <th class="table_th">Email</th>
                <th class="table_th">Phone</th>
                <th class="table_th">Company</th>
                <th class="table_th">Address</th>
                <th class="table_th">Password</th>
                <th class="table_th">Action</th>

            </tr>

            <?php

            while($info=$result -> Fetch_assoc())
            {

            ?>

            <tr>
                <td class="table_td">
                    <?php
                    echo "{$info['fname']}";
                    ?>
                </td>
                <td class="table_td">
                    <?php
                    echo "{$info['mname']}";
                    ?>
                </td>
                <td class="table_td">
                    <?php
                    echo "{$info['lname']}";
                    ?>
                </td>
                <td class="table_td">
                <?php
                    echo "{$info['registration']}";
                    ?>
                </td>
                <td class="table_td">
                <?php
                    echo "{$info['batch']}";
                    ?>
                </td>
                <td class="table_td">
                <?php
                    echo "{$info['a_session']}";
                    ?>
                </td>
                <td class="table_td">
                <?php
                    echo "{$info['gender']}";
                    ?>
                </td>
                <td class="table_td">
                <?php
                    echo "{$info['email']}";
                    ?>
                </td>
                <td class="table_td">
                <?php
                    echo "{$info['phone']}";
                    ?>
                </td>
                <td class="table_td">
                <?php
                    echo "{$info['company']}";
                    ?>
                </td>
                <td class="table_td">
                <?php
                    echo "{$info['a_address']}";
                    ?>
                </td>
                <td class="table_td">
                <?php
                    echo "{$info['a_password']}";
                    ?>
                </td>
                <td class="table_td">
                    
                <?php
                    echo "<a onClick=\"javascript:return confirm('Are you sure to Delete this')\" class='btn btn-danger' href='delete.php?student_id={$info['id']}'>Delete</a>";
                    echo "<a class='btn btn-primary' href='update_alumni.php?student_id={$info['id']}'>Update</a>";
                    ?>
                    
                </td>

            </tr>

            <?php

            }

            ?>
        </table>
        
    </div>

</body>
</html>