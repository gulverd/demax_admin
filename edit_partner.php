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
		$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
    	$parse  = parse_url($url, PHP_URL_QUERY);
		$post_id = substr($parse,0);
		echo $post_id;
		$now = date("YmdHms");
		include 'db.php';
		include 'nav_in.php';

		$query1 	= "SELECT * FROM partners WHERE id  = '$post_id'";
		$run1 		= mysqli_query($conn,$query1);

		while($row1 = mysqli_fetch_array($run1)){

			$partnerName1 = $row1['partnerName'];
			$parnterWeb1  = $row1['parnterWeb'];
			$partnerUrl1  = $row1['partnerUrl'];
		
		}
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>პარტნიორები</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="partners.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>დასახელება</label>
						<input type="text" name="partnerName" class="form-control" placeholder="კომპანიის დასახელება" value="<?php echo $partnerName1;?>">
					</div>
					<div class="form-group">
						<label>ვებ-მისამართი</label>
						<input type="url" name="parnterWeb" class="form-control" placeholder="კომპანიის ვებ-მისამართი" value="<?php echo $parnterWeb1;?>">
					</div>
					<div class="form-group">
						<label>არსებული ლოგო</label></br>
						<img src="..//imgs/partners/<?php echo $partnerUrl1;?>" id="ex_logo">
					</div>
					<div class="form-group">
						<label for="exampleInputFile">კომპანიის ლოგო</label>
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
		$img  		 = $_FILES['image'];
		$partnerName = $_POST['partnerName'];
		$parnterWeb  = $_POST['parnterWeb'];


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
			    move_uploaded_file($file_tmp,"..//imgs/partners/".$fl_name);
			    if($file_name != ''){
			    	$query = "UPDATE partners SET partnerName = '$partnerName', parnterWeb = '$parnterWeb', partnerUrl = '$fl_name' WHERE id = '$post_id'";
					$run   = mysqli_query($conn,$query);
			    }else{
			    	$query = "UPDATE partners SET partnerName = '$partnerName', parnterWeb = '$parnterWeb' WHERE id = '$post_id'";
					$run   = mysqli_query($conn,$query);
			    }
			    

			    header('Location: partners.php');
			}else{
			    print_r($errors);
			}
		}

	}