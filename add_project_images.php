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
		include 'db.php';
		include 'nav_in.php';

		$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
    	$parse  = parse_url($url, PHP_URL_QUERY);
		$post_id = substr($parse,0);
		
		$querya = "SELECT * FROM projects WHERE id = '$post_id'";
		$runa   = mysqli_query($conn,$querya);

		while ($rowa = mysqli_fetch_array($runa)) {
			$projectNamea = $rowa['name'];
		}
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>გალერეა <span><?php echo $projectNamea;?></span> </h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="galery.php?<?php echo $post_id;?>" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>სურათი</label>
						<input type="file" class="form-control" id="exampleInputEmail1" name="image">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="დამატება" class="btn btn-primary submit">
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

	if(isset($_POST['submit'])){

		if(isset($_FILES['image'])){
			$errors= array();
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_tmp  = $_FILES['image']['tmp_name'];
			$file_type = $_FILES['image']['type'];   
			$file_ext  = strtolower(end(explode('.',$_FILES['image']['name'])));
			$extensions = array("jpeg","jpg","png"); 
			$fl_name   = $now.'-'.substr($file_name, -7);                
			if(empty($errors)==true){
			    move_uploaded_file($file_tmp,"..//imgs/galery/".$fl_name);

			    $query = "INSERT INTO projectspictures (image,projectID) VALUES ('$fl_name','$post_id')";
				$run   = mysqli_query($conn,$query);

			    header('Location: galery.php?'.$post_id);
			}else{
			    print_r($errors);
			}
		}

	}