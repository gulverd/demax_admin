<?php
	$conn = mysqli_connect('localhost','root','','demax');

	if($conn == TRUE){
		//echo 'Connected';
	}else{
		echo 'Not Connected!';
	}