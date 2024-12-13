<html>
<head>
	<title>Add Users</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<body><br>

<div class="container">
<div class="btn-group">
  <a href="create.php" class="btn btn-primary active" aria-current="page">Home</a>
  
</div>
</div>



	<br>
	<h2 align="center"><!-- <a href="create.php"> -->Add New User Information</h2>
	<br/>


	<div class="container">
	<form action="add.php" method="post" name="form1">
		<div class="col-md-12">
		<b><label for="firstname">Name</label></b>
		<input type="text" name="name" class="form-control" required=""></input><br>

	<b><label for="lastname">Email</label></b>	
		<input type="text" name="email" class="form-control" required=""></input><br>

		<b><label for="address">Mobile #</label></b>
<input type="tel" name="mobile" class="form-control" required="" pattern="\d{11}" inputmode="numeric" placeholder="Enter 11-digit mobile number"></input><br>


		<input class="btn btn-primary" type="submit" name="Submit" value="Submit" onclick="sample()"><br>

	</div></div>
	
		
	</form>

	<?php

	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];

		// include database connection file
		include_once("config.php");

		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO users(name,email,mobile) VALUES('$name','$email','$mobile')");
		
		// Show message when user added
		/*echo "User added successfully. <a href='create.php'>View Users</a>";*/
		header('Location:create.php');
		
			
	}
	?>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>

<script>
	function sample(){

		alert('Details Added!')
	}
</script>






<!-- OLD CODE -->
		<!-- <tr>
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Mobile</td>
				<td><input type="text" name="mobile"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr> -->