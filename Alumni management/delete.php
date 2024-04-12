<!-- Delete the Alumni data -->

<?php

session_start();

$host="localhost";
$user="root";
$password="";
$db="alumni_project";

$data=mysqli_connect($host,$user,$password,$db);

if($_GET['student_id'])
{
    $user_id=$_GET['student_id'];

    $sql="DELETE FROM alumni WHERE id='$user_id'";
    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']='Delete Alumni is successful';
        header("location:view_alumni.php");
    }
}

?>