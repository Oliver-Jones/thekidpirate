<html>
    <head>
        <title>Home - The Kid Pirate</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .fakeimg {
                height: 200px;
                background: #aaa;
            }
        </style>
    </head>
	<?php
    session_start(); //starts the session
    if($_SESSION['user']){ // checks if the user is logged in  
    }
    else{
        header("location: index.php"); // redirects if user is not logged in
    }
    $user = $_SESSION['user']; //assigns user value
    ?>
    <body>
        <div class="p-5 bg-primary text-white text-center" style="background-image: linear-gradient(45deg, #ef0909, transparent);">
			<div class="d-flex flex-row-reverse">
				<div class="btn-group" role="group">
					<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						<?php Print "$user"?>
					</button>
					<ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						<li><a class="dropdown-item" href="maintenance.php">Edit Profile</a></li>
						<li><a class="dropdown-item" href="logout.php">Log out</a></li>
					</ul>
				</div>
			</div>
			<h1>The Kid Pirate</h1>
            <p>Changing the world with innovative solutions!</p> 
        </div>
		<!-- Login Modal -->
		<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="checklogin.php" method="POST">
						<div class="modal-header">
							<h5 class="modal-title" id="loginModalLabel">Login</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="form-floating">
								<input id="username_input" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" required="required">
								<label for="username_input">Username</label>
							</div> <br/>
							<div class="form-floating">
								<input type="password" class="form-control" id="password_input" name="password" placeholder="Password">
								<label for="password_input">Password</label>
							</div> <br/>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Sign In</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Register Modal -->
		<div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="register.php" method="POST">
						<div class="modal-header">
							<h5 class="modal-title" id="signUpModalLabel">Register</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<label for="username_input" class="form-label">Username</label>
							<div class="input-group">
								<span class="input-group-text" id="basic-addon1">@</span>
								<input id="username_input" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" required="required">
							</div> <br/>
							<div class="col-auto">
								<label for="password_input" class="form-label">Password</label>
								<input type="password" class="form-control" id="password_input" name="password" placeholder="Password">
							</div> <br/>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Sign Up</button>
						</div>
					</form>
				</div>
			</div>
		</div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <ul id="nav_main" class="navbar-nav">
                    <li id="nav_home" class="nav-item">
                        <a class="nav-link active" href="maintenance.php">Home</a>
                    </li>
                    <li id="nav_blogs" class="nav-item">
                        <a class="nav-link" href="maintenance.php">Blogs</a>
                    </li>
                    <li id="nav_about" class="nav-item">
                        <a class="nav-link" href="maintenance.php">About Us</a>
                    </li>
                    <li id="nav_contact" class="nav-item">
                        <a class="nav-link" href="maintenance.php">Contact</a>
                    </li>
					<script>
						// Add active class to the current button (highlight it)
						var header = document.getElementById("nav_main");
						var btns = header.getElementsByClassName("nav-link");
						for (var i = 0; i < btns.length; i++) {
							btns[i].addEventListener("click", function() {
								var current = document.getElementsByClassName("active");
								current[0].className = current[0].className.replace(" active", "");
								this.className += " active";
							});
						}
					</script>
                </ul>
				<form class="d-flex my-2">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-light" type="submit">Search</button>
				</form>
            </div>
        </nav>
        <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">
            <h2>About Me</h2>
            <h5>Photo of me:</h5>
            <div class="fakeimg">Fake Image</div>
            <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
            <h3 class="mt-4">Some Links</h3>
            <p>Lorem ipsum dolor sit ame.</p>
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <hr class="d-sm-none">
        </div>
        <div class="col-sm-8">
            <h2>TITLE HEADING</h2>
            <h5>Title description, Dec 7, 2020</h5>
            <div class="fakeimg">Fake Image</div>
            <p>Some text..</p>
            <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            <h2 class="mt-5">TITLE HEADING</h2>
            <h5>Title description, Sep 2, 2020</h5>
            <div class="fakeimg">Fake Image</div>
                <p>Some text..</p>
                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            </div>
            </div>
        </div>
        <div class="mt-5 p-4 bg-dark text-white text-center">
            <p>Footer</p>
        </div>
    </body>
</html>
	<head>
        <title>My first PHP Website</title>
    </head>
    <?php
	session_start(); //starts the session
	include 'connection.php';
	if($_SESSION['user']){ // checks if the user is logged in  
	}
	else{
	    header("location: index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['user']; //assigns user value
    ?>
    <body>
        <h2>Home Page</h2>
        <p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
        <a href="logout.php">Click here to logout</a><br/><br/>
        <form action="add.php" method="POST">
            Add more to list: <input type="text" name="details" /> <br/>
            Public post? <input type="checkbox" name="public_checks[]" value="false" /> <br/>
            <input type="submit" value="Add to list"/>
        </form>
    	<h2 align="center">My list</h2>
    	<table border="1px" width="100%">
		<tr>
			<th>Id</th>
			<th>Details</th>
			<th>Post Time</th>
			<th>Edit Time</th>
			<th>Edit</th>
			<th>Delete</th>
			<th>Public Post</th>
		</tr>
		<?php
		    $userid = pg_escape_string($_SESSION['userid']);
            	    $query = pg_query($db, "Select * from list where user_id = '$userid'"); // SQL Query
            	    while($row = pg_fetch_assoc($query)) {
                	Print "<tr>";
			Print '<td align="center">'. $row['id'] . "</td>";
			Print '<td align="center">'. $row['details'] . "</td>";
			Print '<td align="center">'. $row['date_posted'] . " - " . $row['time_posted'] . "</td>";
			Print '<td align="center">'. $row['date_edited'] . " - " . $row['time_edited'] ."</td>";
			Print '<td align="center"><a href="edit.php?id='. $row['id'] .'">edit</a></td>';
	    		Print '<td align="center"><a href="#" onclick="confirmDelete('.$row['id'].')">delete</a></td>';
			Print '<td align="center">'. $row['public'] . "</td>";
		        Print "</tr>";
                    }
		    pg_close($db);
        	?>
	</table>
	<script>
		function confirmDelete(id) {
		   var r = confirm("Are you sure you want to delete this record?");
		   if(r == true) {
			window.location.assign("delete.php?id=" + id);
		   }
		}
	</script>
	</body>
</html>
