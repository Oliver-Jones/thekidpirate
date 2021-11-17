<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back</a><br/><br/>
        <form action="register.php" method="POST">
           Enter Username: <input type="text" 
           name="username" required="required" /> <br/>
           Enter password: <input type="password" 
           name="password" required="required" /> <br/>
           <input type="submit" value="Register"/>
        </form>
    </body>
</html>

<?php
    include 'connection.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = pg_escape_string($_POST['username']);
	$password = pg_escape_string($_POST['password']);
	$bool = true;
	$query = pg_query($db, "SELECT * FROM users WHERE username = '{$username}'"); //Query the users table
	while($row = pg_fetch_row($query)) { //display all rows from query
            $table_users == $row['username']; // the first username row 
                                          // is passed on to $table_users, 
                                          // and so on until the query is finished
	    if($username == $table_users) { // checks if there are any matching fields
    	        $bool = false; // sets bool to false
    		Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
    		Print '<script>window.location.assign("register.php");</script>'; //redirects to register.php
    	    }
        }
	if($bool) { // checks if bool is true
	    pg_query($db, "INSERT INTO users (username, password) VALUES ('$username', '$password')"); // inserts value into table users
	    Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
	    Print '<script>window.location.assign("home.php");</script>'; // redirects to home.php
	}
    }
?>
