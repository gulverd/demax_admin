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
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>პროექტები</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="add_new_project.php" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> პროექტის დამატება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">

					<?php 
						$query = "SELECT * FROM projects ORDER BY id DESC";
						$run   = mysqli_query($conn,$query);

						if(mysqli_num_rows($run) >=1){
							echo 
							'<table class="table table-striped table-hover table-bordered">
								<tr class="table_header">
									<td>სტატუსი</td>
									<td class="td_name">სახელი</td>
									<td>გეგმა</td>
									<td>გალერეა</td>
									<td class="">რედაქტირება</td>
									<td class="">წაშლა</td>
								</tr>';
							while($row = mysqli_fetch_array($run)){
								$id 		 	= $row['id'];
								$projectName 	= $row['name'];
								$about	   		= $row['about'];
								$status 		= $row['status'];
								if($status == 1){
									$status = '<div class="alert alert-warning st" role="alert">მიმდინარე</div>';
								}
								if($status == 2){
									$status = '<div class="alert alert-success st" role="alert">დასრულებული</div>';
								}
								if($status == 1){
									$status = '<div class="alert alert-info st" role="alert">სამომავლო</div>';
								}

								echo
								'
									<tr>
										<td>'.$status.'</td>
										<td>'.$projectName.'</td>
										<td><a href="projects_floors.php?'.$id.'"><button class="btn btn-default"><i class="fa fa-building" aria-hidden="true"></i> გეგმა და ბინები</button></a></td>
										<td><a href="galery.php?'.$id.'"><button class="btn btn-default floor_button"><i class="fa fa-picture-o" aria-hidden="true"></i> გალერეა</button></a></td>
										<td><button class="btn btn-primary floor_button"><a href="edit_project.php?'.$id.'"><span class="glyphicon glyphicon-edit"></span> რედაქტირება</button></a></td>
										<td><button class="btn btn-danger floor_button"><a href="delete_project.php?'.$id.'"><span class="glyphicon glyphicon-remove"></span> წაშლა</button></a></td>
									</tr>
								';
							}
							echo '</table>';
						}else{
							echo '<div class="alert alert-danger" role="alert">არ არის პროექტები!</div>';
						}

					?>

			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>