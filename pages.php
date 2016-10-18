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
	<?php include 'nav_in.php';?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>გვერდები</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-striped table-hover table-bordered">
					<tr class="table_header">
						<td class="td_left">დასახელება</td>
						<td class="td_right">რედაქტირება</td>
					</tr>
					<tr>
						<td>კონტაქტი</td>
						<td><button class="btn btn-primary"><a href="edit_contact.php"><span class="glyphicon glyphicon-edit"></span> რედაქტირება</button></a></td>
					</tr>
					<tr>
						<td>კოპანიის შესახებ</td>
						<td><button class="btn btn-primary"><a href="edit_about.php"><span class="glyphicon glyphicon-edit"></span> რედაქტირება</button></a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>