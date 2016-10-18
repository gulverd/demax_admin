<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=0, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Demax Group - Admin</title>
	<link href="https://fonts.googleapis.com/css?family=Advent+Pro" rel="stylesheet">
</head>
<body>
	<div class="container login_container">
		<div class="col-md-12 login_wrapper">
			<div class="col-md-12 login_title">
				<h4>ვებ-გვერდის ადმინისტრირება</h4>
			</div>
			<div class="col-md-12">
				<form action="" method="POST">
					<div class="form-group">
						<input type="text" name="username" class="form-control inputa" placeholder="მომხმარებლის სახელი">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control inputa" placeholder="პაროლი">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary submit" name="submit" value="ავტორიზაცია">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>


<?php

	include 'db.php';

	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];

		$query    = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
		$run	  = mysqli_query($conn,$query);
		
		if(mysqli_num_rows($run)>=1){
			header("Location:dashboard.php");
		}else{
			echo '<div class="alert alert-danger" role="alert">არასწორი მოხმარებლის სახელი ან პაროლი</div>';
		}
	}

?>