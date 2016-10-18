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
		$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
    	$parse  = parse_url($url, PHP_URL_QUERY);
		$post_id = substr($parse,0);
		//echo $post_id;
		$now = date("YmdHms");
		include 'db.php';
		include 'nav_in.php';

		$query1 	= "SELECT * FROM team WHERE id  = '$post_id'";
		$run1 		= mysqli_query($conn,$query1);

		while($row1 = mysqli_fetch_array($run1)){

			$empName1 	    = $row1['empName'];
			$empPosition1   = $row1['empPosition'];
			$about1  		= $row1['about'];
			$empImage1 		= $row1['empImage'];
		
		}
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>მენეჯმენტი</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="team.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>სახელი</label>
						<input type="text" name="empName" class="form-control" placeholder="თანამშრომლის სახელი" value="<?php echo $empName1;?>">
					</div>
					<div class="form-group">
						<label>პოზიცია</label>
						<input type="text" name="empPosition" class="form-control" placeholder="თანამშრომლის პოზიცია" value="<?php echo $empPosition1;?>">
					</div>
					<div class="form-group">
						<label>არსებული სურათი</label></br>
						<img src="..//imgs/employees/<?php echo $empImage1;?>" id="ex_logo">
					</div>
					<div class="form-group">
						<label for="exampleInputFile">კომპანიის ლოგო</label>
						<input type="file" class="form-control" id="exampleInputEmail1" name="image">
					</div>
					<div class="form-group">
						<label>ბიოგრაფია</label>
						<textarea name="about"><?php echo $about1;?></textarea>
		        		<script>
		           			CKEDITOR.replace( 'about' );
		       	 		</script>
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
		$img  		  = $_FILES['image'];
		$empName 	  = $_POST['empName'];
		$empPosition  = $_POST['empPosition'];
		$about 		  = $_POST['about'];


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
			    move_uploaded_file($file_tmp,"..//imgs/employees/".$fl_name);
			    if($file_name != ''){
			    	$query = "UPDATE team SET empName = '$empName', empPosition = '$empPosition', about = '$about', empImage = '$fl_name' WHERE id = '$post_id'";
					$run   = mysqli_query($conn,$query);
			    }else{
			    	$query = "UPDATE team SET empName = '$empName', empPosition = '$empPosition', about = '$about' WHERE id = '$post_id'";
					$run   = mysqli_query($conn,$query);
			    }
			    

			    header('Location: team.php');
			}else{
			    print_r($errors);
			}
		}

	}