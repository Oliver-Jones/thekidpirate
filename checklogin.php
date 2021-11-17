<?php
    session_start();
    include 'connection.php';
    $username = pg_escape_string($_POST['username']);
    $password = pg_escape_string($_POST['password']);
    $bool = true;
    $query = pg_query($db, "SELECT * FROM users WHERE username = '$username'"); // Query the users table
    $exists = pg_num_rows($query); //Checks if username exists
    $table_users = "";
    $table_password = "";
    if($exists > 0) { //IF there are no returning rows or no existing username
        while($row = pg_fetch_assoc($query)) { // display all rows from query, the first username row is 
	    $table_users = $row['username']; // passed on to $table_users and so on until the query is finished
	    $table_password = $row['password']; // the first password row is passed on to $table_password, and so on 
	    $table_id = $row['id'];
        } // until the query is finished
        if(($username == $table_users) && ($password == $table_password)) { // checks if there are any matching fields
            if($password == $table_password) {
		$_SESSION['user'] = $username; // set the username in a session. This serves as a global variable
		$_SESSION['userid'] = $table_id;
		header("location: home.php"); // redirects the user to the authenticated home page
	    }
	}
	else {
	    Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
	    Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
	}
    }
    else {
        Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
?>
