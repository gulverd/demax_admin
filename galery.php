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
		
		$querya = "SELECT * FROM projects WHERE id = '$post_id' ORDER BY id DESC";
		$runa   = mysqli_query($conn,$querya);

		while ($rowa = mysqli_fetch_array($runa)) {
			$projectID    = $rowa['id'];
			$projectNamea = $rowa['name'];
		}
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>გალერეა <span><?php echo $projectNamea;?></span> </h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="projects.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
				<a href="add_project_images.php?<?php echo $projectID;?>" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> სურათის დამატება</a>
				<a href="add_project_videos.php?<?php echo $projectID;?>" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> ვიდეოს დამატება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<?php 
					$queryPictures = "SELECT * FROM projectspictures WHERE projectID = '$post_id' ORDER BY id DESC";
					$runPictures   = mysqli_query($conn,$queryPictures);
					if(mysqli_num_rows($runPictures) >= 1){
						echo 
							'<div class="col-md-6 col6 left">
								<div class="form-group">
									<label>სურათები</label>
									<table class="table table-striped table-hover table-bordered">';
						while($rowPictures = mysqli_fetch_array($runPictures)){
							$pic   = $rowPictures['image'];
							$picID = $rowPictures['id'];

							echo 
							'
								<tr>
									<td class="gl_td_left"><img src="..//imgs/galery/'.$pic.'" id="galery_pic"></td>
									<td class="gl_td_right"><a href="delete_gal_image.php?picID='.$picID.'&post='.$post_id.'" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> წაშლა</a></td>
								</tr>';
						}
						echo '</table>
								</div>
							</div>';
					}else{
						echo '<div class="col-md-6 col6 left"><div class="alert alert-danger" role="alert">არ არის სურათები!</div></div>';
					}


					$queryVideos = "SELECT * FROM projectsvideos WHERE projectID = '$post_id'";
					$runVideos   = mysqli_query($conn,$queryVideos);
					if(mysqli_num_rows($runVideos) >= 1){
						echo 
							'<div class="col-md-6 col6 left">
								<div class="form-group">
									<label>ვიდეოები</label>
									<table class="table table-striped table-hover table-bordered">';
						while($rowVideos = mysqli_fetch_array($runVideos)){
							$vid   = $rowVideos['videoURL'];
							$vidID = $rowVideos['id'];
							$youtubeID = substr(ltrim($vid),32); 

							echo 
							'
								<tr>
									<td class="gl_td_left"><iframe width="100%" height="150" src="https://www.youtube.com/embed/'.$youtubeID.'" frameborder="0" allowfullscreen></iframe></td>
									<td class="gl_td_right"><a href="delete_gal_video.php?picID='.$vidID.'&post='.$post_id.'" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> წაშლა</a></td>
								</tr>';
						}
						echo '</table>
								</div>
							</div>';
					}else{
						echo '<div class="col-md-6 col6 left"><div class="alert alert-danger" role="alert">არ არის ვიდეოები!</div></div>';
					}
				?>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>