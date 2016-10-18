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
		$post_id = $_GET['project_id'];
		$flo_id  = $_GET['floor_id'];
/*		echo $post_id.'</br>';

		echo $flo_id;*/
		$now = date("YmdHms");

		$query1 = "SELECT b.name as project_name, a.floor_name as floor_name ,a.id as id,a.image as image
					FROM projects_floors a
					JOIN projects b on b.id = a.projectID
					WHERE a.id = '$flo_id'";
		$run1   = mysqli_query($conn,$query1);

		while ($row1 = mysqli_fetch_array($run1)){
			$picURL  	  = $row1['image'];
			$project_name = $row1['project_name'];
			$floor_name   = $row1['floor_name'];
			$id           = $row1['id'];
		}
?>
<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>პროექტები <span><?php echo $project_name;?></span> <span class="floor_span"><?php echo $floor_name;?></span></h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="projects_flats.php?floor_id=<?php echo $flo_id;?>&post_id=<?php echo $post_id;?>" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="add_project_flat.php?project_id=<?php echo $post_id;?>&floor_id=<?php echo $flo_id;?>" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> ბინის მონიშვნა</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
					<div class="col-md-3 flat_padds left">
						<label>ბინის ნომერი</label>
						<input type="text" name="flat_name" class="form-control" placeholder="მაგ: #11">
					</div>
					<div class="col-md-3 flat_padds left">
						<label>ბინის ფართობი</label>
						<input type="text" name="flat_m2" class="form-control" placeholder="მაგ: 70 m2">
					</div>
					<div class="col-md-3 flat_padds left">
						<label>ბინის ფასი</label>
						<input type="text" name="flat_price" class="form-control" placeholder="მაგ: 30000$">
					</div>
					<div class="col-md-3 flat_padds">
						<label>სტატუსი</label>
						<select class="form-control" name="flat_status">
							<option value="1">იყიდება</option>
							<option value="2">გაყიდულია</option>
						</select>
					</div>
					<div class="col-md-12 flat_padds">
						<div class="form-group">
							<label>ბინის სურათი</label>
							<input type="file" name="image" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-7">
							<label for="coordinates">შენობის სურათზე სართულის კოორდინატების მონიშვნა</label>
							<canvas id="drawimage" width="430" height="430" style="cursor:crosshair" data-imgsrc="..//imgs/projects_maps/<?php echo $picURL;?>" onmousedown="point_it(event)" oncontextmenu="return false;">გთხოვთ გამოიყენოთ სხვა ინტერნეტ ბროუზერი ან თქვენი ბროუზერის ახალი ვერსია.</canvas>
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
					<div class="form-group">
						<input type="submit" name="submit" value="დამატება" class="btn btn-primary pull-right btn-margin-top  col-xs-12 col-md-2" />
					</div>
				</form>
			</div>
		</div>
</div>
	<script type="text/javascript" src="public/js/drawer.js"></script>

	<script>
		window.onload = clear_canvas();
	</script>
	<script type="text/javascript" src="http://demax.ge/public/js/jquery.maphilight.js"></script>

	<script type="text/javascript">
		$('.building-image').maphilight();
	</script>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>

<?php
	
	
	if(isset($_POST['submit'])){

		$flat_name   = $_POST['flat_name'];
		$flat_m2 	 = $_POST['flat_m2'];
		$flat_price  = $_POST['flat_price'];
		$flat_status = $_POST['flat_status'];
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
				    move_uploaded_file($file_tmp,"..//imgs/projects_flats/".$fl_name);

					$query = "INSERT INTO projects_flats (projectID,floorID,flat_name,m2,price,coordinates,status,image) VALUES ('$post_id','$flo_id','$flat_name','$flat_m2','$flat_price','$coordinates','$flat_status','$fl_name')";
					$run   = mysqli_query($conn,$query);

					header('Location: projects_flats.php?floor_id='.$flo_id.'&post_id='.$post_id);

					/*echo $flat_name . " " . $flat_m2 . " " . $flat_price . " " . $flat_status . " " . $coordinates . " " . $post_id . " " . $flo_id . " " . $fl_name;*/

				}else{
				    print_r($errors);
				}
			}

	}
?>