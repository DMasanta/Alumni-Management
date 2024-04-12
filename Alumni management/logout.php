<!-- logout page from the Admin Dashboard -->

<?php

session_start();
session_destroy();

header("location:index.php");


?>