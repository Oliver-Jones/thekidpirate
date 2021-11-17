<?php
    session_start();
    include 'connection.php';
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST") {
	    alert("hi");
	    alert("hi".$_SESSION['user']);
	$details = pg_escape_string($_POST['details']);
	$userid = pg_escape_string($_SESSION['userid']);
	$time = strftime("%X"); //time
	$date = strftime("%B %d, %Y"); //date
	$decision = "no";
	foreach($_POST['public'] as $each_check) { //gets the data from the checkbox
            if($each_check != null) { //checks if checkbox is checked
	        $decision = "yes"; // sets the value
	    }
        }
	echo '<script type="text/javascript">alert("'.$date.'");</script>';
	    echo '<script type="text/javascript">alert("'.$time.'");</script>';
        pg_query($db, "INSERT INTO list(details, date_posted, time_posted, public, user_id) VALUES ('$details','$date','$time','$decision', '$userid')"); //SQL query
        header("location:home.php");
    }
    else {
        header("location:home.php"); //redirects back to home
    }
    pg_close($db);
?>
