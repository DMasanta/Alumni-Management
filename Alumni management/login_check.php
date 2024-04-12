<!-- Chech the login Credencials for login to the Admin Dashboard is right or not -->

<?php
error_reporting(0);
session_start();

$host="localhost";
$user="root";
$password="";

$db="alumni_project";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST['Username'];
    $pass = $_POST['Password'];

    $sql="SELECT * FROM user where username='".$name."' AND password='".$pass."' ";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);

    // if($row["usertype"]=="alumni")
    // {

    //     $_SESSION['username']=$name;
    //     $_SESSION['usertype']="alumni";
    //     header("location:studenthome.php");
    // }
    if($row["usertype"]=="admin")
    {
        $_SESSION['username']=$name;
        $_SESSION['usertype']="admin";
        header("location:adminhome.php");
    }
    else
    {
        
        $message= "Username  or Password do not match";
        $_SESSION['loginMessage']=$message;
        header("location:login.php");
    }
    
}
?>