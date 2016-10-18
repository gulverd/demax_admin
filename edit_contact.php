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
	<?php 
		ob_start();
		include 'nav_in.php';
	?>
	<?php
		
		include 'db.php';

		$query   = "SELECT * FROM contact";
		$run     = mysqli_query($conn,$query);

		while($row = mysqli_fetch_array($run)){
			$companyName 	= $row['companyName'];
			$companyAddress = $row['companyAddress'];
			$companyPhone	= $row['companyPhone'];
			$companyMob1    = $row['companyMob1'];
			$companyMob2    = $row['companyMob2'];
			$companyEmail1  = $row['companyEmail1'];
			$companyEmail2  = $row['companyEmail2'];
			$facebook 		= $row['facebook'];
			$twitter 		= $row['twitter'];
			$instagram 		= $row['Instagram'];
			$pinterest 		= $row['pinterest'];
			$youtube 		= $row['youtube'];
			$mapx 			= $row['mapx'];
			$mapy 			= $row['mapy'];
		}

		if(empty($companyName)){
			$companyName = '';
		}
		if(empty($companyAddress)){
			$companyAddress = '';
		}
		if(empty($companyPhone)){
			$companyPhone = '';
		}
		if(empty($companyMob1)){
			$companyMob1 = '';
		}
		if(empty($companyMob2)){
			$companyMob2 = '';
		}
		if(empty($companyEmail1)){
			$companyEmail1 = '';
		}
		if(empty($companyEmail2)){
			$companyEmail2 = '';
		}
		if(empty($facebook)){
			$facebook = '';
		}
		if(empty($twitter)){
			$twitter = '';
		}
		if(empty($instagram)){
			$instagram = '';
		}
		if(empty($pinterest)){
			$pinterest = '';
		}
		if(empty($youtube)){
			$youtube = '';
		}
		if(empty($mapx)){
			$mapx = '';
		}
		if(empty($mapy)){
			$mapy = '';
		}

	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>გვერდის რედაქტირება <span>კონტაქტი</span> </h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<div class="col-md-12">
					<a href="pages.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
				</div>
				<div class="container edit_wrp">
					<form action="" method="POST">
						<div class="col-md-6">
							<div class="col-md-12 edt_title_wrp">
								<h4>ძირითადი ინფორმაცია</h4>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>კომპანიის დასახელება</label>
									<input type="text" name="companyName" placeholder="დასახელება" class="form-control" value="<?php echo $companyName;?>">
								</div>
								<div class="form-group">
									<label>კომპანიის მისამართი</label>
									<input type="text" name="companyAddress" placeholder="მისამართი" class="form-control" value="<?php echo $companyAddress;?>">
								</div>
								<div class="form-group">
									<label>კომპანიის ტელეფონის ნომერი</label>
									<input type="text" name="companyPhone" placeholder="ტელეფონის ნომერი" class="form-control" value="<?php echo $companyPhone;?>">
								</div>
								<div class="form-group">
									<label>მობილურის ნომერი 1</label>
									<input type="text" name="companyMob1" placeholder="მობილურის ნომერი" class="form-control" value="<?php echo $companyMob1;?>">
								</div>
								<div class="form-group">
									<label>მობილურის ნომერი 2</label>
									<input type="text" name="companyMob2" placeholder="მობილურის ნომერი" class="form-control" value="<?php echo $companyMob2;?>">
								</div>
								<div class="form-group">
									<label>კომპანიის ელ-ფოსტა</label>
									<input type="email" name="companyEmail1" placeholder="ელ-ფოსტა" class="form-control" value="<?php echo $companyEmail1;?>">
								</div>
								<div class="form-group">
									<label>კომპანიის ელ-ფოსტა</label>
									<input type="email" name="companyEmail2" placeholder="ელ-ფოსტა" class="form-control" value="<?php echo $companyEmail2;?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-12 edt_title_wrp">
								<h4>სოციალური ქსელები</h4>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</label>
									<input type="url" name="facebook" class="form-control" placeholder="Facebook URL" value="<?php echo $facebook;?>">
								</div>
								<div class="form-group">
									<label><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</label>
									<input type="url" name="twitter" class="form-control" placeholder="Twitter URL" value="<?php echo $twitter;?>">
								</div>
								<div class="form-group">
									<label><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</label>
									<input type="url" name="instagram" class="form-control" placeholder="Instagram URL" value="<?php echo $instagram;?>">
								</div>
								<div class="form-group">
									<label><i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest</label>
									<input type="url" name="pinterest" class="form-control" placeholder="Pinterest URL" value="<?php echo $pinterest;?>">
								</div>
								<div class="form-group">
									<label><i class="fa fa-youtube" aria-hidden="true"></i> Youtube</label>
									<input type="url" name="youtube" class="form-control" placeholder="youtube URL" value="<?php echo $youtube;?>">
								</div>
								<div class="form-group">
									<label><i class="fa fa-map-marker" aria-hidden="true"></i> მონაცემები რუკაზე X</label>
									<input type="text" name="mapx" class="form-control" placeholder="კოორდინატი X" value="<?php echo $mapx;?>">
								</div>
								<div class="form-group">
									<label><i class="fa fa-map-marker" aria-hidden="true"></i> მონაცემები რუკაზე Y</label>
									<input type="text" name="mapy" class="form-control" placeholder="კოორდინატი Y" value="<?php echo $mapy;?>">
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

		$companyNameI 	 = $_POST['companyName'];
		$companyAddressI = $_POST['companyAddress'];
		$companyPhoneI 	 = $_POST['companyPhone'];
		$companyMob1I 	 = $_POST['companyMob1'];
		$companyMob2I 	 = $_POST['companyMob2'];
		$companyEmail1I  = $_POST['companyEmail1'];
		$companyEmail2I  = $_POST['companyEmail2'];
		$facebookI 		 = $_POST['facebook'];
		$twitterI 		 = $_POST['twitter'];
		$instagramI 	 = $_POST['instagram'];
		$pinterestI 	 = $_POST['pinterest'];
		$youtubeI 		 = $_POST['youtube'];
		$mapxI   	     = $_POST['mapx'];
		$mapyI	 		 = $_POST['mapy'];
	
		$queryI  	 	 = "UPDATE contact 
		SET companyName ='$companyNameI', companyAddress = '$companyAddressI', companyPhone = '$companyPhoneI', companyMob1 = '$companyMob1I', companyMob2 = '$companyMob2I', companyEmail1 = '$companyEmail1I', companyEmail2 = '$companyEmail2I',facebook = '$facebookI', instagram = '$instagramI', twitter = '$twitterI', pinterest = '$pinterestI', youtube = '$youtubeI', mapx = '$mapxI', mapy = '$mapyI'";
		$runI 			 = mysqli_query($conn,$queryI);


		header('Location: edit_contact.php');

	}