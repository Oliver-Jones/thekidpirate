<html>
    <head>
        <title>Home - The Kid Pirate</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <style>
            .fakeimg {
                height: 200px;
                background: #aaa;
            }
        </style>
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
        <div class="p-5 bg-primary text-white text-center" style="background-image: linear-gradient(45deg, #ef0909, transparent);">
			<div class="d-flex flex-row-reverse">
				<div class="btn-group" role="group">
					<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						<?php Print "$user"?>
					</button>
					<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="btnGroupDrop1">
						<li><a class="dropdown-item" href="maintenance.php">Edit Profile</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="logout.php">Log out</a></li>
					</ul>
				</div>
			</div>
			<h1>The Kid Pirate</h1>
            <p>Changing the world with innovative solutions!</p> 
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
		<a class="btn btn-primary mb-5" data-bs-toggle="offcanvas" href="#offCanvasCreateActivity" role="button" aria-controls="offcanvasExample">
				Add an Activity
			</a>
			<div class="offcanvas offcanvas-start" tabindex="-1" id="offCanvasCreateActivity" aria-labelledby="offcanvasExampleLabel">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasExampleLabel">Add an Activity</h5>
					<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body">
					<form action="add.php" method="POST">
						<div class="form-floating">
							<input id="activity_input" type="text" class="form-control" placeholder="Type here..." aria-label="Activity" aria-describedby="basic-addon1" name="details" required="required">
							<label for="activity_input">Activity</label>
						</div> <br/>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="public_checks[]" value="yes" id="active_input">
							<label class="form-check-label" for="active_input">
							Is Currently Active
							</label>
						</div> <br/>
						<button type="submit" class="btn btn-primary">Add my Activity</button>
					</form>
				</div>
			</div>
			<table class="table" border="1px" width="100%">
				<thead class="table-dark">
					<tr>
						<th>Id</th>
						<th>Activity</th>
						<th>Created Date</th>
						<th>Last Modified Date</th>
						<th>Edit</th>
						<th>Delete</th>
						<th>Is Active</th>
					</tr>
				</thead>
				<?php
					$userid = pg_escape_string($_SESSION['userid']);
							$query = pg_query($db, "Select * from list where user_id = '$userid'"); // SQL Query
							while($row = pg_fetch_assoc($query)) {
							Print "<tr>";
					Print '<td align="center">'. $row['id'] . "</td>";
					Print '<td align="center">'. $row['details'] . "</td>";
					Print '<td align="center">'. $row['date_posted'] . " - " . $row['time_posted'] . "</td>";
					Print '<td align="center">'. $row['date_edited'] . " - " . $row['time_edited'] ."</td>";
					Print '<td align="center"><a data-bs-toggle="offcanvas" href="#offCanvasEditActivity" id="edit_Activity">Edit</a></td>';
						Print '<td align="center"><a href="#" onclick="confirmDelete('.$row['id'].')">Delete</a></td>';
					Print '<td align="center">'. $row['public'] . "</td>";
						Print "</tr>";
							}
					pg_close($db);
				?>
			</table>
		<div class="offcanvas offcanvas-start" tabindex="-1" id="offCanvasEditActivity" aria-labelledby="offcanvasExampleLabel">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit an Activity</h5>
					<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body">
					<form action="edit.php" method="POST">
						<div class="form-floating" style="display:none;">
							<input id="edit_id_input" type="text" class="form-control" aria-label="Activity" aria-describedby="basic-addon1" name="id">
							<label for="edit_id_input">Activity Id</label>
						</div>
						<div class="form-floating">
							<input id="edit_activity_input" type="text" class="form-control" placeholder="Type here..." aria-label="Activity" aria-describedby="basic-addon1" name="details" required="required">
							<label for="edit_activity_input">Activity Name</label>
						</div> <br/>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="public_checks[]" value="yes" id="edit_active_input">
							<label class="form-check-label" for="edit_active_input">
							Is Currently Active
							</label>
						</div> <br/>
						<button type="submit" class="btn btn-primary">Save my Activity</button>
					</form>
				</div>
			</div>
			<script>
				$('#offCanvasEditActivity').on('show.bs.offcanvas', e => {
				var $button = $(e.relatedTarget);
				var $activityId = $button.closest('td').prev().prev().prev().prev().text().trim();
				var $activityName = $button.closest('td').prev().prev().prev().text().trim();
				var $activityState = $button.closest('td').next().next().text().trim();
				$('#edit_id_input').val($activityId);
				$('#edit_activity_input').val($activityName);
				$('#edit_active_input').prop('checked', $activityState == 'yes' ? true : false);
				});
			</script>
        </div>
        <div class="mt-5 p-4 bg-dark text-white text-center">
            <p>@ 2021 thekidpirate.com</p>
        </div>
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
