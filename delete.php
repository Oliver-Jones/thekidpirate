<?php
    include 'connection.php';
    session_start(); //starts the session
    if($_SESSION['user']){ //checks if user is logged in
    }
    else {
       header("location:index.php"); //redirects if user is not logged in.
    }
    if($_SERVER['REQUEST_METHOD'] == "POST") {
    	$act_id = pg_escape_string($_POST['id']);
	$query = pg_query($db, "DELETE FROM list WHERE id='$id'");
	if(!$query) {
	    die("Error in SQL query: " . pg_last_error() . "\n");
	}
	header("location:home.php");   
    }
    if($_SERVER['REQUEST_METHOD'] == "GET") {
        $id = $_GET['id'];
	pg_query($db, "DELETE FROM list WHERE id='$id'");
	header("location:home.php");
    }
?>
