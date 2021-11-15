<?php
    session_start();
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$mysqli = new mysqli("localhost", "root", "", "thekidpirate_db");
		$details = mysqli_real_escape_string($mysqli, $_POST['details']);
		$userid = mysqli_real_escape_string($mysqli, $_SESSION['userid']);
		$time = strftime("%X"); //time
		$date = strftime("%B %d, %Y"); //date
		$decision = "no";
		foreach($_POST['public'] as $each_check) { //gets the data from the checkbox
          if($each_check != null) { //checks if checkbox is checked
             $decision = "yes"; // sets the value
          }
		}

		mysqli_query($mysqli, "INSERT INTO list(details, date_posted, time_posted, public, user_id) VALUES ('$details','$date','$time','$decision', '$userid')"); //SQL query
		header("location:home.php");
	}
	else {
		header("location:home.php"); //redirects back to home
	}
?>