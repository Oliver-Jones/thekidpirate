<?php
    session_start(); //starts the session
    if($_SESSION['user']){ //checks if user is logged in
    }
    else {
       header("location:index.php"); //redirects if user is not logged in.
    }

    if($_SERVER['REQUEST_METHOD'] == "GET") {
		$mysqli = new mysqli("localhost", "root", "", "thekidpirate_db");
		$id = $_GET['id'];
		mysqli_query($mysqli, "DELETE FROM list WHERE id='$id'");
		header("location:home.php");
    }
?>