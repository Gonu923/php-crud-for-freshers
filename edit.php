

<?php 
	// database connection
	include_once("config.php");

	if (isset($_POST['update'])) {
		$id = mysqli_real_escape_string($mysqli, $_POST['id']);
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
			$result = mysqli_query($mysqli, "UPDATE  users SET name = '$name', age = '$age', email = '$email' WHERE id = $id");
			//redirectig to the display page. In our case, it is index.php
			header("Location: index.php");
		}
	}	

?>

<?php 
	
	// get the data from index page with id
	$id = $_GET['id'];

	// select all data with id
	$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = '$id'");

	// fetch all data as array
	while($res = mysqli_fetch_array($result)){
		$name = $res['name'];
		$age = $res['age'];
		$email = $res['email'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User- Edit</title>
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
	<form class="form-group" action="edit.php" method="post">
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Name</label>
		  <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="exampleFormControlInput1" placeholder="Type your full name">
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Age</label>
		  <input type="text" name="age" value="<?php echo $age; ?>" class="form-control" id="exampleFormControlInput1" placeholder="type your age">
		</div>
		<div class="mb-3">
		  <label for="exampleFormControlInput1" class="form-label">Email</label>
		  <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" id="exampleFormControlInput1" placeholder="type your email">
		</div>
		<div class="mb-3">
			<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
			<input type="submit" name="update" value="Update" class="btn btn-success">
		</div>

	</form>
	</div>
</body>
</html>s