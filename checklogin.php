<?php
    session_start();
    include 'connection.php';
    $username = pg_escape_string($_POST['username']);
    $password = pg_escape_string($_POST['password']);
    $bool = true;
    $query = pg_query($db, "SELECT * FROM users WHERE username = '$username'"); // Query the users table
    if(!$query) {
        die("Error in SQL query: " . pg_last_error() . "\n");
    }
    Print '<script>alert("1!"' . $query . ');</script>';
    $exists = pg_num_rows($query);
    $table_users = "";
    $table_password = "";
    if($exists > 0) {
	Print '<script>alert("2!"' . $exists . ');</script>';
        while($row = pg_fetch_assoc($query)) {
	    Print '<script>alert("3!"' . $row . ');</script>';
	    $table_users = $row['username'];
	    $table_password = $row['password'];
	    $table_id = $row['id'];
        }
	Print '<script>alert("4!"' . $username . ');</script>';
	Print '<script>alert("5!"' . $table_users . ');</script>';
	Print '<script>alert("6!"' . $password . ');</script>';
	Print '<script>alert("7!"' . $table_password . ');</script>';
        if(($username == $table_users) && ($password == $table_password)) {
		Print '<script>alert("8!");</script>';
	    $_SESSION['user'] = $username;
	    $_SESSION['userid'] = $table_id;
	    header("location: home.php");
	}
	else {
		Print '<script>alert("9!");</script>';
	    Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
	    Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
	}
    }
    else {
        Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
    pg_close($db);
?>
