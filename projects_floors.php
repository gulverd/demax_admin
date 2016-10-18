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
				<a href="projects.php" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="add_project_floor.php?<?php echo $post_id;?>" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> სართულის მონიშვნა</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<p>
					<map name="building-map">
						<?php

							$query3 = "SELECT * FROM projects_floors WHERE projectID = '$post_id'";
							$run3   = mysqli_query($conn,$query3);

							if(mysqli_num_rows($run3)>=1){
								while($row3 = mysqli_fetch_array($run3)){
									$fl_id       = $row3['id'];
									$coordinates = $row3['coordinates'];
									echo '<area href="projects_flats.php?floor_id='.$fl_id.'&post_id='.$post_id.'" shape="poly" coords="'.$coordinates.'" alt="" title="">';
								}
							}

						?>
						
					</map>
					<img src="..//imgs/projects/<?php echo $picURL;?>" width="430" height="430" class="building-image" usemap="#building-map" />
				</p>
			</div>
			<?php 
				$query2 = "SELECT * FROM projects_floors WHERE projectID = '$post_id' ORDER BY id DESC";
				$run2   = mysqli_query($conn,$query2);

				if(mysqli_num_rows($run2)>=1){
					echo '
						<div class="col-md-12 floor_table_wrapper">
							<h3>სართულები</h3>
							<table class="table table-striped table-hover table-bordered">
								<tr>
									<td>სართული</td>
									<td class="tbl_floors_td">სართული გეგმა</td>
									<td class="tbl_floors_td">რედაქტირება</td>
									<td class="tbl_floors_td">წაშლა</td>
								</tr>
						';
					while($row2 = mysqli_fetch_array($run2)){
						$floor_id = $row2['id'];
						$floor_name = $row2['floor_name'];

						echo '
							<tr>
								<td>'.$floor_name.'</td>
								<td class="tbl_floors_td"><a href="projects_flats.php?floor_id='.$floor_id.'&post_id='.$post_id.'" class="btn btn-default"><i class="fa fa-building-o"></i> სართულის გეგმა და ბინები</a></td>
								<td class="tbl_floors_td"><a href="#" class="btn btn-primary"><i class="fa fa-edit"></i> რედაქტირება</a></td>
								<td class="tbl_floors_td"><a href="delete_floor.php?postID='.$post_id.'&floorID='.$floor_id.'" class="btn btn-danger"><i class="fa fa-remove"></i> წაშლა</a></td>
							</tr>

						';
					}	
					echo '
							</table>
						</div>
					';
				}else{
					echo '<div class="col-md-12 floor_table_wrapper"><div class="alert alert-danger" role="alert">არ არის მონიშნული სართულები!</div></div>';
				}
			?>

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

