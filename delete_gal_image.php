<?php ob_start();?>
<?php
		$post_id = $_GET['post'];
		$pic_id  = $_GET['picID'];
		echo $post_id .'</br>';
		echo $pic_id;
		include 'db.php';


	$query1 = "DELETE FROM projectspictures WHERE id = '$pic_id'";
	$run1   = mysqli_query($conn,$query1);
	header('Location: galery.php?'.$post_id);

?>