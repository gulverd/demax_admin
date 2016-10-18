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
	<script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
</head>
<body>
	<?php 
		ob_start();
		include 'nav_in.php';
	?>
	<?php
		
		include 'db.php';

		$query   = "SELECT * FROM about";
		$run     = mysqli_query($conn,$query);

		while($row = mysqli_fetch_array($run)){
			$about 	= $row['about'];
		}

		if(empty($about)){
			$about = '';
		}

	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>გვერდის რედაქტირება <span>კომპანიის შესახებ</span> </h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<div class="col-md-12">
					<a href="pages.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
				</div>
				<div class="container edit_wrp">
					<form action="" method="POST">
						<div class="col-md-12">
							<div class="col-md-12 edt_title_wrp">
								<h4>კომპანიის შესახებ</h4>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>აღწერა</label>
									<textarea name="about"><?php echo $about;?></textarea>
		        					<script>
		           			 			CKEDITOR.replace( 'about' );
		       	 					</script>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="submit" name="submit" value="შენახვა" class="btn btn-primary submit">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>


<?php

	if(isset($_POST['submit'])){

		$aboutI 	 	 = $_POST['about'];
	
		$queryI  	 	 = "UPDATE about SET about ='$aboutI'";
		$runI 			 = mysqli_query($conn,$queryI);


		header('Location: edit_about.php');

	}