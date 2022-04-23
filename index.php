<?php
	include_once("config.php");

	$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP CRUD Good Practice</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<div class="card text-center" style="width: 100%;">
	  <div class="card-body">
	    <h5 class="card-title">All PHP Users List</h5>
	    <p class="card-text">Let's see our all users</p>
	  </div>
	  <br><br><br>
	</div>
	<a class="btn btn-success text-center" style="margin:30px;" href="add.php">Add new data</a>
	<table class="table" style="margin:30px;">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Name</th>
	      <th scope="col">Age</th>
	      <th scope="col">Email</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  	
	  	<?php 
	  	while ($res = mysqli_fetch_array($result)) {
	  		echo "<tr>";
	  	 	echo "<th>".$res['id']."</th>"; 
	  	 	echo "<td>".$res['name']."</td>";
	  	 	echo "<td>".$res['age']."</td>";
	  	 	echo "<td>".$res['email']."</td>";	    
	  	 	echo "<td><a href=\"edit.php?id=$res[id]\" class=\"btn btn-success\">Edit</a>|<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure want to delete this?')\" class=\"btn btn-danger\">Delete</a></td>";	
	      	echo "</tr>";
	      	}	
	    ?>    
	  </tbody>
	</table>
</body>
</html>