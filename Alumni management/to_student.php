<!-- Send the Alumni Data to the student database table -->


<?php
// creating a connection by passing server name,
// username, password and database name
// servername=localhost
// username=root
// password=empty
// database name= geeks_database
$connection_link = new mysqli("localhost", "root", "","alumni_project");

if ($connection_link === false) {
	die("ERROR: Not connected. ".$connection_link->connect_error);
}

//sql query to perform copying data from one table to another
$id=$_GET['check'];
// if(isset($_POST['transfer']) && isset($_POST['check']))
// {
	// if(!empty($_POST['check'])) {
	// 	foreach($_POST['check'] as $value){
		// foreach($_POST['check'] as $checkId){
$sql_query = "INSERT INTO student (fname, mname, lname, registration, batch, session, gender, email, phone, address) SELECT fname, mname, lname, registration, batch, a_session, gender, email, phone, a_address FROM alumni where `alumni`.`id`='$id'";
// $sql2="DELETE FROM alumni where id=$checkId";

	if ($connection_link->query($sql_query) === true)
{
	echo "<script type='text/javascript'>
        alert('Data Transfered Successfully');
        </script>";
		// execute($sql2);
	header("location:view_alumni.php");
}
else
{
	echo "ERROR: Could not able to proceed $sql_query. "
		.$connection_link->error;
	header("location:view_alumni.php");
}
	// }
	// }
// }
// Close the connection
$connection_link->close();
?>
