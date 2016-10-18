<?php ob_start();?>
<?php
		$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
    	$parse  = parse_url($url, PHP_URL_QUERY);
		$post_id = substr($parse,0);
		echo $post_id;
		include 'db.php';

	$query1 = "DELETE FROM projects WHERE id = '$post_id'";
	$query2 = "DELETE * FROM projectsvideos WHERE projectID = '$post_id'";
	$query3 = "DELETE * FROM projectspictures WHERE projectID = '$post_id'";
	$query4 = "DELETE * FROM projects_floors WHERE projectID = '$post_id'";
	$query5 = "DELETE * FROM projects_flats WHERE projectID = '$post_id'";
	
	$run1   = mysqli_query($conn,$query1);
	$run2   = mysqli_query($conn,$query2);
	$run3   = mysqli_query($conn,$query3);
	$run4   = mysqli_query($conn,$query4);
	$run5   = mysqli_query($conn,$query5);
	
	header('Location: projects.php');

?>
