<?php
    session_start();
    include 'connection.php';
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST") {
	$details = pg_escape_string($_POST['details']);
	$userid = pg_escape_string($_SESSION['userid']);
	$datestamp = date('Y-m-d');
	$timestamp = date('H:i:s');
	$decision = "no";
	foreach($_POST['public'] as $each_check) { //gets the data from the checkbox
            if($each_check != null) { //checks if checkbox is checked
	        $decision = "yes"; // sets the value
	    }
        }
	echo '<script type="text/javascript">alert("'.$date.'");</script>';
	    echo '<script type="text/javascript">alert("'.$time.'");</script>';
        pg_query($db, "INSERT INTO list(details, date_posted, time_posted, public, user_id) VALUES ('$details','$datestamp','$timestamp','$decision', '$userid')"); //SQL query
        header("location:home.php");
    }
    else {
        header("location:home.php"); //redirects back to home
    }
    pg_close($db);
?>
