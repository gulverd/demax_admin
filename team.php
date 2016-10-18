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
				<h2>მენეჯმენტი</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="add_new_team.php" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> თანამშრომლის დამატება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">

					<?php 
						$query = "SELECT * FROM team ORDER BY id DESC";
						$run   = mysqli_query($conn,$query);

						if(mysqli_num_rows($run) >=1){
							echo 
							'<table class="table table-striped table-hover table-bordered">
								<tr class="table_header">
									<td class="td_name">სახელი</td>
									<td class="">რედაქტირება</td>
									<td class="">წაშლა</td>
								</tr>';
							while($row = mysqli_fetch_array($run)){
								$id 		 	= $row['id'];
								$empName 	 	= $row['empName'];

								echo
								'
									<tr>
										<td>'.$empName.'</td>
										<td><button class="btn btn-primary"><a href="edit_team.php?'.$id.'"><span class="glyphicon glyphicon-edit"></span> რედაქტირება</button></a></td>
										<td><button class="btn btn-danger"><a href="delete_team.php?'.$id.'"><span class="glyphicon glyphicon-remove"></span> წაშლა</button></a></td>
									</tr>
								';
							}
							echo '</table>';
						}else{
							echo '<div class="alert alert-danger" role="alert">არ არის ჩანაწერები!</div>';
						}

					?>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>