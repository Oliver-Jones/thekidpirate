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
    $exists = pg_num_rows($query);
    $table_users = "";
    $table_password = "";
    if($exists > 0) {
	Print '<script>alert("2!");</script>';
        while($row = pg_fetch_assoc($query)) {
	    Print '<script>alert("3!");</script>';
	    $table_users = $row['username'];
	    $table_password = $row['password'];
	    $table_id = $row['id'];
        }
	//echo '<script type="text/javascript">alert("'.($username == $table_users).'");</script>';
        if(strcmp($username, $table_users) == 0 && ($password === $table_password)) {
	    $_SESSION['user'] = $username;
	    $_SESSION['userid'] = $table_id;
	    header("location: home.php");
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
    pg_close($db);
?>
