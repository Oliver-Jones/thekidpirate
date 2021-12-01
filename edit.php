<?php
    include 'connection.php';
	session_start();       //starts the session
    	if($_SESSION['user']){ // checks if the user is logged in  
	}
	else{
	    header("location: index.php"); // redirects if user is not logged in
	}
    	$user = $_SESSION['user']; //assigns user value
		if($_SERVER['REQUEST_METHOD'] == "POST") {
	$details = pg_escape_string($_POST['details']);
	$public = "no";
	$id = $_POST['id'];
	$datestamp = date('Y-m-d');
	$timestamp = date('H:i:s');
	foreach($_POST['public_checks'] as $each_check) { //gets the data from the checkbox
            if($each_check == true) { //checks if checkbox is checked
	        $public = "yes"; // sets the value
	    }
        }
	$query = pg_query($db, "UPDATE list SET details='$details', public='$public', date_edited='$datestamp', time_edited='$timestamp' WHERE id='$id'");
	if(!$query) {
	    die("Error in SQL query: " . pg_last_error() . "\n");
	}
	header("location:home.php");
    }
?>
