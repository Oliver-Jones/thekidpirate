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
	foreach($_POST['public_checks'] as $each_check) { //gets the data from the checkbox
            if($each_check == true) { //checks if checkbox is checked
	        $decision = "yes"; // sets the value
	    }
        }
        $query = pg_query($db, "INSERT INTO list(details, date_posted, time_posted, public, user_id) VALUES ('$details','$datestamp','$timestamp','$decision','$userid')"); //SQL query
        if(!$query) {
	    die("Error in SQL query: " . pg_last_error() . "\n");
	}
	header("location:home.php");
    }
    else {
        header("location:home.php"); //redirects back to home
    }
    pg_close($db);
?>
