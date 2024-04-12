<?php
$servername='localhost';
$username="root";
$password="";
 
try
{
    $con=new PDO("mysql:host=$servername;dbname=alumni_project",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo 'connected';
}
catch(PDOException $e)
{
    echo '<br>'.$e->getMessage();
}
$searchErr = '';
$student_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from student where registration like '%$search%' or fname like '%$search%' or semester like '%$search%'");
        $stmt->execute();
        $student_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($employee_details);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 
?>
<html>
<head>
<title>Alumni Search</title>
<link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-theme.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.00/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="admin.css">
<?php

    include 'admin_css.php';
    ?>
<style>
.container{
    /* width:70%;
    height:30%;
    padding:20px; */
    text-align: center;
    margin-left: 14%;
    margin-top: 5%;
}
.table_th{
        padding: 11px;
        font-size: 11px;
        text-align:center;
        
    }
    .table_td{
        padding:3px;
        background-color:skyblue;
        font-size:12px;
        text-align:center;
        
    }
    .table-responsive{
        padding-left:25px;
    }
</style>
</head>
 
<body>
<?php
    
    include 'admin_sidebar.php';

   ?>
    <div class="container">
    <h3><u>Student Data Search</u></h3>
    <br/><br/>
    <form class="form-horizontal" action="#" method="post">
    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-4" for="email"><b>Search Student Information:</b>:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="search" placeholder="search with name or registration number or semester">
            </div>
            <div class="col-sm-2">
              <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
            </div>
        </div>
        <div class="form-group">
            <span class="error" style="color:red;">* <?php echo $searchErr;?></span>
        </div>
         
    </div>
    </form>
    <!-- <br/><br/> -->
    <h3><u>Search Result</u></h3>
    <div class="table-responsive"> 
    <center>         
      <table class="table" border="1px">
        <thead>
          <tr>
            <th class="table_th">Username</th>
            <th class="table_th">Registration Number</th>
            <th class="table_th">Batch</th>
            <th class="table_th">Session</th>
            <th class="table_th">Gender</th>
            <th class="table_th">Email</th>
            <th class="table_th">Phone</th>
            <th class="table_th">Date of Birth</th>
            <th class="table_th">Date of Addmission</th>
            <th class="table_th">Semester</th>
            <th class="table_th">Address</th>
            <th class="table_th">Action</th>
          </tr>
        </thead>
        <tbody>
                <?php
                 if(!$student_details)
                 {
                    // echo '<tr>No data found</tr>';
                    echo '<h4 class=text-danger>No data found <br></h4>';
                 }
                 else{
                    foreach($student_details as $key=>$value)
                    {
                        ?>
                    <tr>
                        
                        <td class="table_td"><?php echo $value['name'];?></td>
                        <td class="table_td"><?php echo $value['registration'];?></td>
                        <td class="table_td"><?php echo $value['batch'];?></td>
                        <td class="table_td"><?php echo $value['session'];?></td>
                        <td class="table_td"><?php echo $value['gender'];?></td>
                        <td class="table_td"><?php echo $value['email'];?></td>
                        <td class="table_td"><?php echo $value['phone'];?></td>
                        <td class="table_td"><?php echo $value['dob'];?></td>
                        <td class="table_td"><?php echo $value['doa'];?></td>
                        <td class="table_td"><?php echo $value['semester'];?></td>
                        <td class="table_td"><?php echo $value['address'];?></td>
                        <td class="table_td">
                            <?php
                                echo "<a onClick=\"javascript:return confirm('Are you sure to Delete this')\" class='btn btn-danger' href='delete_1.php?student_id={$value['id']}'>Delete</a>";
                                echo "<a class='btn btn-primary' href='update_student.php?student_id={$value['id']}'>Update</a>";
                            ?>
                    
                        </td>   
                    </tr>
                         
                        <?php
                    }
                     
                 }
                ?>
             
         </tbody>
      </table>
    </center>
    </div>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>