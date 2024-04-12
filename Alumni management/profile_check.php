<!-- Chech the login Credencials of alumni for login to update in the All user Dashboard is right or not -->


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
    // $name = $_POST['username'];
    $reg = $_POST['registration'];
    $p_pass = $_POST['password'];

    $sql="SELECT * FROM alumni where registration='".$reg."' AND a_password='".$p_pass."' ";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result); 

    if($count == 1){  
        $_SESSION['a_password']=$p_pass;
        $_SESSION['registration']=$reg;
        header("location:update_profile.php");  
    }  
    else{  
        $message= "Login failed. Invalid data, Please Check your inputs again!";
        $_SESSION['loginMessage']=$message;
        header("location:profile_login.php");  
    }     

}
?>