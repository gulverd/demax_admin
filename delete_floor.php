<?php ob_start();?>
<?php

	include 'db.php';
	$floor_id = $_GET['floorID'];

	$query1 = "DELETE FROM projects_floors WHERE id = '$floor_id'";
	$run1   = mysqli_query($conn,$query1);

	header('Location: projects_floors.php?'.$_GET['postID']);

?>
