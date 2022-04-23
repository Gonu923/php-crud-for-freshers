<?php 
	include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add users</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<div class="card text-center" style="width: 100%;">
	  <div class="card-body">
	  	<br><br>
	    <h5 class="card-title">Add new user</h5>
	  </div>
	  <br><br><br>
	</div>
	<div style="padding: 30px;">
	<form class="form-group" action="add.php" method="post">
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Name</label>
		  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Type your full name">
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Age</label>
		  <input type="text" name="age" class="form-control" id="exampleFormControlInput1" placeholder="type your age">
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Email</label>
		  <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="type your email">
		</div>
		<div class="mb-3">
			<input type="submit" name="submit" value="Add" class="btn btn-success">
		</div>

	</form>
	</div>
</body>
</html>

<?php 

if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	if (empty($name) || empty($age) || empty($email)) {
		if (empty($name)) {
			echo "<p>"."Name field is empty"."</p>";
		}
		if (empty($age)) {
			echo "<p>"."Age field is empty"."</p>";
		}
		if (empty($email)) {
			echo "<p>"."Email field is empty"."</p>";
		}
	}else{
		$result = mysqli_query($mysqli, "INSERT INTO users(name, age, email) VALUES('$name', '$age', '$email') ");
		echo "<p>"."User added successfully"."</p>";
		echo "<a href='index.php' class='btn btn-secondary'>"."View all users"."</p>";
	}
}

?>