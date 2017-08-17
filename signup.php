<?php require_once("header.php") ?>
<?php require_once("config.php") ?>

<?php 
		$name = $email = $gender = $dob = $pass = "";
		$message = $success = "";

	if (isset($_POST["submit"])) {

		  $name = $_POST["name"];
		  $email = $_POST["email"];
		  $pass = $_POST["pass"];
		  $cpass = $_POST["cpass"];
		  $gender = $_POST["gender"];
		  $dob = $_POST["dob"];

		  if ($pass!=$cpass) {
		  	$message = "Password Confirmation doesn't match";
		  }
		  else{
		  	$pass = md5($pass);
		  	$sql = "INSERT INTO users (name, email, password, gender, dob)
				VALUES ('$name', '$email', '$pass', '$gender', '$dob')";

				if (mysqli_query($conn, $sql)) {
				    $success = "New record created successfully";
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
		  }
		}
		


	if ($message) {		
	echo '<div class="alert alert-warning">
	  <strong>Warning!</strong>'. $message.'
	</div>';
	}
	if ($success) {		
	echo '<div class="alert alert-success">
	  <strong>Congrats!</strong>'. $success.'
	</div>';
	}
?>
<div class="container">
	<div class="col-sm-offset-4 col-sm-4">		
	  <form method="post" action="">
	  <div class="form-group">
	  	<label for="name">Name: </label>
	  	<input type="text" class="form-control" id="name" name="name" required/>
	  </div>
	  <div class="form-group">
	  	<label for="name">Email: </label>
	  	<input type="email" class="form-control" id="email" name="email" required />
	  </div>
	  <div class="form-group">
	  	<label for="pass">Password: </label>
	  	<input type="password" class="form-control" id="pass" name="pass" required />
	  </div>
	  <div class="form-group">
	  	<label for="cpass">Confirm Password: </label>
	  	<input type="password" class="form-control" id="cpass" name="cpass" />
	  </div>
	  <div class="form-group">
	  	<label for="gender">Gender: </label>
		  <label class="radio-inline"><input type="radio" value="male" required name="gender">Male</label>
		  <label class="radio-inline"><input type="radio" value="female" name="gender">Female</label>
	   </div>
		<div class="form-group">
		  	<label for="dob">Date of Birth: </label>
		  	<input type="date" class="form-control" id="dob" name="dob" required/>
		</div>
		<input type="submit" class="btn btn-primary" name="submit" value="Signup">

	  </form>
	</div>
</div>

<?php require_once("footer.php") ?>
