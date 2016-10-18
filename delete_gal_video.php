<?php ob_start();?>
<?php
		$post_id = $_GET['post'];
		$vid_id  = $_GET['picID'];
		echo $post_id .'</br>';
		echo $vid_id;
		include 'db.php';


	$query1 = "DELETE FROM projectsvideos WHERE id = '$vid_id'";
	$run1   = mysqli_query($conn,$query1);
	header('Location: galery.php?'.$post_id);

?>