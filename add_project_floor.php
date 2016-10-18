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




<!-- წამოღებული public demax -->
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/parsley/parsley.css">

    <!--jquery-->
    <script type="text/javascript" src="public/js/jquery-2.1.3.min.js"></script>
    <!--Parsley-->
    <script type="text/javascript" src="public/parsley/parsley.js"></script>
    <!--Bootstrap js-->
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <!--CKEditor-->
    <script type="text/javascript" src="public/ckeditor/ckeditor.js "></script>
    <!--Datepicker-->
    <script type="text/javascript" src="public/js/moment.js "></script>
    <script type="text/javascript" src="public/js/bootstrap-datetimepicker.js "></script>
    <!--bootbox js-->
    <script type="text/javascript" src="public/js/bootbox.min.js"></script>


</head>
<body>
	<?php 
		include 'db.php';
		include 'nav_in.php';
		ob_start();
		$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
    	$parse  = parse_url($url, PHP_URL_QUERY);
		$post_id = substr($parse,0);
		//echo $post_id;
		$now = date("YmdHms");

		$query1 = "SELECT * FROM projects WHERE id = '$post_id'";
		$run1   = mysqli_query($conn,$query1);

		while ($row1 = mysqli_fetch_array($run1)){
			$picURL  = $row1['image'];
			$project_name = $row1['name'];
		}
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>პროექტები <span><?php echo $project_name;?></span></h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="projects_floors.php?<?php echo $post_id;?>" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
					<div class="row">
						<div class="col-xs-12 col-sm-4">
							<label for="file">სართულის დასახელება</label>
							<input type="text" name="floor_name" class="form-control" placeholder="სართულის დასახელება">
						</div>
						<div class="col-xs-12 col-sm-8">
							<label for="file">სართულის გეგმა</label>
							<input type="file" name="image" class="form-control">
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-xs-12 col-sm-7">
							<label for="coordinates">შენობის სურათზე სართულის კოორდინატების მონიშვნა</label>
							<canvas id="drawimage" width="430" height="430" style="cursor:crosshair" data-imgsrc="..//imgs/projects/<?php echo $picURL;?>" onmousedown="point_it(event)" oncontextmenu="return false;">გთხოვთ გამოიყენოთ სხვა ინტერნეტ ბროუზერი ან თქვენი ბროუზერის ახალი ვერსია.</canvas>
						</div>
						<div class="col-xs-12 col-sm-4">
							<label for="coordinates">კოორდინატები</label>
							<textarea name="coordinates" cols="40" rows="10" class="form-control" id="coordinates"></textarea>
							<button onclick="clear_canvas()">გასუფთავება</button>
							<p style="margin-top:40px;">
								მაუსის <strong>მარცხენა კლიკი</strong> წერტილის დასმისთვის.</p><p>მაუსის <strong>მარჯვენა კლიკი</strong> მონიშვნის დასრულებისთვის.
							</p>
						</div>
					</div>
					<input type="submit" name="submit" value="დამატება" class="btn btn-primary pull-right btn-margin-top  col-xs-12 col-md-2" />
				</form>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="public/js/drawer.js"></script>

	<script>
		window.onload = clear_canvas();
	</script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>

<?php
	
	
	if(isset($_POST['submit'])){

		$floor_name  = $_POST['floor_name'];
		$coordinates = $_POST['coordinates'];

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
				    move_uploaded_file($file_tmp,"..//imgs/projects_maps/".$fl_name);

					$query = "INSERT INTO projects_floors (projectID,floor_name,coordinates,image) VALUES ('$post_id','$floor_name','$coordinates','$fl_name')";
					$run   = mysqli_query($conn,$query);

					header('Location: projects_floors.php?'.$post_id);

				}else{
				    print_r($errors);
				}
			}

	}
?>